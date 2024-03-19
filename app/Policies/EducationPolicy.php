<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\User;

class EducationPolicy
{
    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Education $education): bool
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
     * Determine whether the user can store models.
     */
    public function store(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Education $education): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Education $education): bool
    {
        return $user->hasRole('admin');
    }
}
