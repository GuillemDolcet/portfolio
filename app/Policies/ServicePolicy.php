<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, Service $service): bool
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
    public function update(User $user, Service $service): bool
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
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Service $service): bool
    {
        return $user->hasRole('admin');
    }
}
