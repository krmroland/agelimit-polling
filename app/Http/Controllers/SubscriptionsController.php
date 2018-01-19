<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        Subscription::create(
            $request->validate(
                ['email' => 'required|email|unique:subscriptions'],
                ['email.unique' => 'The email has already subscribed!']
        )
        );
        flash()->success('We will publish results directly to your email when the polling is done');

        return back();
    }
}
