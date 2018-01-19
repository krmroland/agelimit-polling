<?php

namespace App\Http\Controllers;

use App\AgeLimitPoll;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AgeLimitPhoneVerificationController extends Controller
{
    public function create()
    {
        return $this->tryIfSession(function () {
            return view('agelimit.verifyPhoneNumber');
        });
    }

    public function resend(Request $request)
    {
        return  $this->tryIfSession(function () use ($request) {
            $poll = AgeLimitPoll::findOrFail(session('age-limit-poll'));
            app('phoneVerifier')->sendToken($poll->two_factor_user_id, $request->type);

            flash()->title('Code Resent')->success('Wait for a few seconds');

            return redirect()->route('age-limit-verification.create');
        }, function () {
            flash()->error("'something went wrong please try again'");

            return redirect('/');
        });

        //flash code was resent successfully
    }

    public function store(Request $request)
    {
        $request->validate(['token' => 'required'], ['token.required' => 'Verification code is required']);

        try {
            return \DB::transaction(function () use ($request) {
                AgeLimitPoll::verifyToken($request->token);
                flash()->title('Vote Counted')->message('Thanks for participating');

                return redirect('/');
            });
        } catch (\Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                flash()->error('Your session expired please try again');

                return redirect('/');
            }

            return back()->withErrors(['token' => 'Your token was invalid']);
        }
    }

    public function tryIfSession(\Closure $trial, \Closure $failure = null)
    {
        if (!session('age-limit-poll')) {
            return $this->redirectAndFlash();
        }
        try {
            return $trial();
        } catch (\Exception $e) {
            return $failure ? $failure() : $this->redirectAndFlash('flash something went wrong');
        }
    }

    protected function redirectAndFlash($type = 'error', $to = '/')
    {
        flash()->error('Something went wrong');

        return redirect($to);
    }
}
