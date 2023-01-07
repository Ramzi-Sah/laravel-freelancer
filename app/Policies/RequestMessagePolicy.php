<?php

namespace App\Policies;

use App\Models\RequestMessage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestMessagePolicy
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

    public function update(User $user, RequestMessage $requestMessage)
    {
        return $requestMessage->user()->is($user);
    }

    public function delete(User $user, RequestMessage $requestMessage)
    {
        return $requestMessage->user()->is($user);
    }

}
