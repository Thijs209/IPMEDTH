<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pop;
use Illuminate\Auth\Access\Response;

class PopPolicy
{
    
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isPeopleManager();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pop $Pop): bool
    {
        return $user->Admin | $user->isPeopleManager() | $user->id == $Pop->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isPeopleManager() 
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pop $Pop): bool
    {
        return $user->isdAdmin() || $user->isPeopleManager() || $user->id == $Pop->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pop $Pop): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pop $Pop): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pop $Pop): bool
    {
        return $user->isAdmin();
    }
}