<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;


class PatientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */

    public function __construct()
    {
        //
    }

    public function destroy(User $user, Task $patient)
    {
        return $user->id === $patient->user_id;
    }

}




