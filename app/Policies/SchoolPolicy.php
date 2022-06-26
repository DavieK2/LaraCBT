<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Instructor\School;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor\School  $school
     * @return mixed
     */
    public function view(User $user, School $school)
    {
        return auth()->user()->id === $school->user_id
                ? Response::allow()
                : Response::deny('You do not own this school.');
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
     * @param  \App\Models\Instructor\School  $school
     * @return mixed
     */
    public function update(User $user, School $school)
    {
        return $user->id === $school->user_id
                ? Response::allow()
                : Response::deny('You do not own this school.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor\School  $school
     * @return mixed
     */
    public function delete(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor\School  $school
     * @return mixed
     */
    public function restore(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor\School  $school
     * @return mixed
     */
    public function forceDelete(User $user, School $school)
    {
        //
    }
}
