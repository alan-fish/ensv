<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
class CheckChangePasswordDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        
        if (Auth::user()->changedpassword==false) {
            return redirect('/docente/update_password');
        }

        return $next($request);
    }
}
