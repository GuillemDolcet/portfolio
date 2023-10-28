<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Support\Arr;

class Users extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return User::class;
    }

    /**
     * *All* users query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* users from the database.
     *
     * @param array $options
     * @return Collection<int,User>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new User object.
     *
     * @param  array $attributes
     * @return User
     */
    public function build(array $attributes = []): User
    {
        $attributes = array_merge([
            'active' => true,
        ], $attributes);

        return $this->make($attributes);
    }

    /**
     * Creates a User instance.
     *
     * @param  array $attributes
     * @return User|null
     */
    public function create(array $attributes = []): ?User
    {
        return $this->update($this->build(), $attributes);
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
     * Updates a customer instance.
     *
     * @param User $instance
     * @param array $attributes
     * @return User|null
     */
    public function update(User $instance, array $attributes = []): ?User
    {
        $instance->fill($attributes);

        if (isset($attributes['password']) && $attributes['password'] != ''){
            $instance->password = Hash::make($attributes['password']);
        } else {
            $instance->offsetUnset('password');
        }

        $instance->roles()->detach();
        $instance->assignRole($attributes['role']);

        if (is_null($instance->getRememberToken())) {
            $instance->setRememberToken(Str::random(60));
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Gets or creates a User model instance.
     *
     * @param array $where
     * @param array $attributes
     * @return null|User
     */
    public function firstOrCreate(array $attributes = [], array $where = ['email']): ?User
    {
        $findBy = Arr::only($attributes, $where);

        if ($instance = $this->findBy($findBy)) {
            return $instance;
        }

        return $this->create($attributes);
    }

    /**
     * Finds a user by its email attribute.
     *
     * @param string $email
     * @param array $options
     * @return User|null
     */
    public function findByEmail(string $email, array $options = []): ?User
    {
        return $this->findBy(['email' => $email], $options);
    }
}
