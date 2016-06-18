<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function show(Patient $patient, Contact $contact)
    {
        return $patient->patient_id === $contact->patient_id;
    }
    public function update(Patient $patient, Contact $contact)
    {
        return $patient->patient_id === $contact->patient_id;
    }
    public function destroy(Patient $patient, Contact $contact)
    {
        return $patient->patient_id === $contact->patient_id;
    }

    
}
