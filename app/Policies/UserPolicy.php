<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $logged
     * @return bool
     */
    public function manage(User $logged): bool
    {
        return $logged->hasRole(['superadmin','admin']) ;
    }

    /**
     * Determine whether the current logged user can delete another one (not itself).
     *
     * @param User $logged
     * @param User $other
     * @return bool
     */
    public function delete(User $logged, User $other): bool
    {
        return $logged->hasRole(['superadmin','admin']) && $logged->getKey() != $other->getKey() && !$other->hasRole('superadmin');
    }

    /**
     * Determine whether the current logged user can deactivate another one (not itself).
     *
     * @param User $logged
     * @param User $other
     * @return bool
     */
    public function deactivate(User $logged, User $other): bool
    {
        return $logged->hasRole(['superadmin','admin']) && $logged->getKey() != $other->getKey() && !$other->hasRole('superadmin');
    }
}
