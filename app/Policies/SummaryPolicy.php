<?php

namespace App\Policies;

use App\Models\Business;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SummaryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user, Business $business)
    {
        // return $user->business_id == $business->id || $user->business_id == null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Summary  $summary
     * @return mixed
     */
    public function view(User $user, Summary $summary)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Summary  $summary
     * @return mixed
     */
    public function update(User $user, Summary $summary)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Summary  $summary
     * @return mixed
     */
    public function delete(User $user, Summary $summary)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Summary  $summary
     * @return mixed
     */
    public function restore(User $user, Summary $summary)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Summary  $summary
     * @return mixed
     */
    public function forceDelete(User $user, Summary $summary)
    {
        //
    }
}
