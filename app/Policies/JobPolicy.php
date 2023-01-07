<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
    
    public function delete(User $user, Job $job)
    {
        return $job->user()->is($user);
    }

    public function update(User $user, Job $job)
    {
        return $this->delete($user, $job);
    }

    public function createRequest(User $user, Job $job)
    {
        return $job->user()->isNot($user);
    }
}
