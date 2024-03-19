<?php

namespace App\Policies;

use App\Models\Experience;
use App\Models\User;

class ExperiencePolicy
{
    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, Experience $experience): bool
    {
        return $user->exists;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can store the model.
     */
    public function store(User $user, Experience $experience): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Experience $experience): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Experience $experience): bool
    {
        return $user->hasRole('admin');
    }
}
