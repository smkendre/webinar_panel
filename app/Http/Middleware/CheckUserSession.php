<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('is_verified')) {
            // user value cannot be found in session
            return redirect('/');
        }
        
        return $next($request);
    }
}
