<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if(empty(auth::user())){
            set_flash_msg("flash_error", "Please login to view this page.");
            return redirect('/login');
        } 
        return $next($request);
         
    }
}
