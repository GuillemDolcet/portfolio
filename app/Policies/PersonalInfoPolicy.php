<?php

namespace App\Policies;

use App\Models\PersonalInfo;
use App\Models\User;

class PersonalInfoPolicy
{
    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, PersonalInfo $personalInfo): bool
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
     * Determine whether the user can update the model.
     */
    public function update(User $user, PersonalInfo $personalInfo): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can store the model.
     */
    public function store(User $user, PersonalInfo $personalInfo): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PersonalInfo $personalInfo): bool
    {
        return $user->hasRole('admin');
    }
}
