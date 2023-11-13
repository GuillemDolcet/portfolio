<?php

namespace App\Repositories;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class Skills extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Skill::class;
    }

    /**
     * *All* skills query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* skills from the database.
     *
     * @param array $options
     * @return Collection<int,Skill>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Skill object.
     *
     * @param  array $attributes
     * @return Skill
     */
    public function build(array $attributes = []): Skill
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Skill instance.
     *
     * @param array $attributes
     * @param User $user
     * @return Skill|null
     */
    public function create(array $attributes, User $user): ?Skill
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
     * Updates a skill instance.
     *
     * @param Skill $instance
     * @param array $attributes
     * @param User $user
     * @return Skill|null
     */
    public function update(Skill $instance, array $attributes, User $user): ?Skill
    {
        if ($instance->exists && isset($attributes['image'])){
            Storage::disk('public')->delete($instance->image);
        }

        $instance->fill($attributes);

        $instance->user()->associate($user);

        if (isset($attributes['image'])){
            Storage::disk('public')->put($user->getKey().'/skills/'.$attributes['image']->getClientOriginalName(),$attributes['image']->get());
            $instance->image = $user->getKey().'/skills/'.$attributes['image']->getClientOriginalName();
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a skill instance.
     *
     * @param Skill $instance
     * @return void
     */
    public function delete(Skill $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        $instance->delete();
    }
}
