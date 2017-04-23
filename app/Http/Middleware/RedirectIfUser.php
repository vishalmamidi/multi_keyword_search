<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfUser
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
       $user = $request->user();
       if ( ($user && $user->role == 'user') || ($user && $user->role == 'admin'))
       {
         return $next($request);
       }
       abort(404,'you should be a verified user');  
        
    }
}
