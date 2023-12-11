<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\User;
use App\Support\Arr;
use App\Support\Str;
use App\Support\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
        $instance->fill(Arr::except($attributes, ['image']));

        $instance->user()->associate($user);

        if (isset($attributes['image'])){
            if ($instance->exists){
                Storage::disk('public')->delete($instance->image);
            }

            $path = Storage::randomFileName($user->getKey().'/projects/', $attributes['image']->extension());
            Storage::disk('public')->put($path, $attributes['image']->get());
            $instance->image = $path;
        }

        $result = $instance->save();

        $instance->skills()->detach();

        if (isset($attributes['skills'])){
            $instance->skills()->attach($attributes['skills']);
        }

        if (!$result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a project instance.
     *
     * @param Project $instance
     * @return void
     */
    public function delete(Project $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        $instance->delete();
    }
}
