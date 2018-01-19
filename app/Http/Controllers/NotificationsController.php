<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Carbon;

class NotificationsController extends Controller
{
    public function update($id)
    {
        Auth::user()
            ->notifications()
            ->where(compact('id'))
            ->update(['read_at' => Carbon::now()]);
    }
}
