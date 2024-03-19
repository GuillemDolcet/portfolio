<?php

namespace App\Policies;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TestimonialPolicy
{
    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Testimonial $testimonial): bool
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
    public function update(User $user, Testimonial $testimonial): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Testimonial $testimonial): bool
    {
        return $user->hasRole('admin');
    }
}
