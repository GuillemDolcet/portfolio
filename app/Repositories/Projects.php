<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\User;
use App\Services\Deepl;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class Projects extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Project::class;
    }

    /**
     * *All* projects query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* projects from the database.
     *
     * @param array $options
     * @return Collection<int,Project>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Project object.
     *
     * @param  array $attributes
     * @return Project
     */
    public function build(array $attributes = []): Project
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Project instance.
     *
     * @param array $attributes
     * @param User $user
     * @return Project|null
     */
    public function create(array $attributes, User $user): ?Project
    {
        return $this->update($this->build(), $attributes, $user);
    }

    /**
     * Listing result set.
     *
     * @param Builder $context
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function listing(Builder $context, array $options = []): LengthAwarePaginator
    {
        $options = array_merge(['per_page' => 30], $options);

        return $context->paginate($options['per_page']);
    }

    /**
     * Updates a Project instance.
     *
     * @param Project $instance
     * @param array $attributes
     * @param User $user
     * @return Project|null
     */
    public function update(Project $instance, array $attributes, User $user): ?Project
    {
        if ($instance->exists && isset($attributes['image'])){
            Storage::disk('public')->delete($instance->image);
        }

        $instance->fill($attributes);

        $instance->user()->associate($user);

        if (isset($attributes['image'])){
            Storage::disk('public')->put($user->getKey().'/projects/'.$attributes['image']->getClientOriginalName(),$attributes['image']->get());
            $instance->image = $user->getKey().'/projects/'.$attributes['image']->getClientOriginalName();
        }

        $result = $instance->save();

        $instance->skills()->detach();

        if (isset($attributes['skills'])){
            $instance->skills()->attach($attributes['skills']);
        }

        if (! $result) {
            return null;
        }

        return $instance;
    }
}
