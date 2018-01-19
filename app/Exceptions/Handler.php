<?php

namespace App\Exceptions;

use App\User;
use Exception;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NoActiveTokensNotification;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \GuzzleHttp\Exception\ConnectException) {
            flash()->error('There was an error in your internet connection.. try again');

            return back()->withInput();
        }

        Notification::send(
            User::all(),
            new NoActiveTokensNotification(
                $exception->getMessage().' '.
                $exception->getTraceAsString()
            )
        );

        return parent::render($request, $exception);
    }
}
