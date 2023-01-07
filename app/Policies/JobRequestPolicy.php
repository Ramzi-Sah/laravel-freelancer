<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobRequestPolicy
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

    public function delete(User $user, JobRequest $jobRequest)
    {
        return $jobRequest->user()->is($user);
    }

    public function createMessage(User $user, JobRequest $jobRequest)
    {
        return $jobRequest->user()->is($user) || $jobRequest->job->user()->is($user);
    }
}
