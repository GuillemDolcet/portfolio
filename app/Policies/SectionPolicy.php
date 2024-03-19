<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;

class SectionPolicy
{
    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Section $section): bool
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
    public function store(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }
}
