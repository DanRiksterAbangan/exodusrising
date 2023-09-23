<?php

namespace App\Policies;

use App\Models\GiftCode;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GiftCodePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GiftCode $giftCode): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GiftCode $giftCode): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GiftCode $giftCode): bool
    {

        return $user->isAdmin() && $giftCode->claimed_by == null;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GiftCode $giftCode): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GiftCode $giftCode): bool
    {
        return $user->isAdmin() && $giftCode->claimed_by == null;
    }
}
