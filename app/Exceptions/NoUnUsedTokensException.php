<?php

namespace App\Exceptions;

use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NoActiveTokensNotification;

class NoUnUsedTokensException extends \Exception
{
    public function render()
    {
        Notification::send(
            User::all(),
            new NoActiveTokensNotification($this->getMessage())
        );

        flash()->error('There were a few errors with the phone verification engine please try again in 10 minutes');

        return redirect('/');
    }
}
