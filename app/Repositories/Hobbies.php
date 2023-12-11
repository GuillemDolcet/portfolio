<?php

namespace App\Repositories;

use App\Models\Hobby;
use App\Models\User;
use App\Support\Arr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class Hobbies extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Hobby::class;
    }

    /**
     * *All* hobbies query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* hobbies from the database.
     *
     * @param array $options
     * @return Collection<int,Hobby>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Hobby object.
     *
     * @param  array $attributes
     * @return Hobby
     */
    public function build(array $attributes = []): Hobby
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Hobby instance.
     *
     * @param array $attributes
     * @param User $user
     * @return Hobby|null
     */
    public function create(array $attributes, User $user): ?Hobby
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
     * Updates a Hobby instance.
     *
     * @param Hobby $instance
     * @param array $attributes
     * @param User $user
     * @return Hobby|null
     */
    public function update(Hobby $instance, array $attributes, User $user): ?Hobby
    {
        $instance->fill(Arr::except($attributes, ['image']));

        $instance->user()->associate($user);

        if (isset($attributes['image'])){
            if ($instance->exists){
                Storage::disk('public')->delete($instance->image);
            }
            Storage::disk('public')->put($user->getKey().'/hobbies/'.$attributes['image']->getClientOriginalName(),$attributes['image']->get());
            $instance->image = $user->getKey().'/hobbies/'.$attributes['image']->getClientOriginalName();
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a hobby instance.
     *
     * @param Hobby $instance
     * @return void
     */
    public function delete(Hobby $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        $instance->delete();
    }
}
