<?php

namespace App\Repositories;

use App\Models\Hobby;
use App\Models\User;
use App\Models\UserLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UsersLanguages extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return UserLanguage::class;
    }

    /**
     * *All* user languages query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* user languages from the database.
     *
     * @param array $options
     * @return Collection<int,UserLanguage>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new UserLanguage object.
     *
     * @param  array $attributes
     * @return UserLanguage
     */
    public function build(array $attributes = []): UserLanguage
    {
        return $this->make($attributes);
    }

    /**
     * Creates a UserLanguage instance.
     *
     * @param array $attributes
     * @param User $user
     * @return UserLanguage|null
     */
    public function create(array $attributes, User $user): ?UserLanguage
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
     * Updates a UserLanguage instance.
     *
     * @param UserLanguage $instance
     * @param array $attributes
     * @param User $user
     * @return Hobby|null
     */
    public function update(UserLanguage $instance, array $attributes, User $user): ?UserLanguage
    {
        $instance->fill($attributes);

        $instance->user()->associate($user);

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a UserLanguage instance.
     *
     * @param UserLanguage $instance
     * @return void
     */
    public function delete(UserLanguage $instance): void
    {
        $instance->delete();
    }
}
