<?php

namespace App\Repositories;

use App\User;

class PatientRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->patients()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}