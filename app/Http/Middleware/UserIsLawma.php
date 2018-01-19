<?php

namespace App\Http\Middleware;

use Closure;
use App\Lawma;

class UserIsLawma
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Lawma::acceptsIp($request->ip())) {
            return $next($request);
        }
        abort(401, 'Un authorized Action');
    }
}
