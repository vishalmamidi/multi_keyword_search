<?php

namespace App\Http\Middleware;

use Closure;

class RedirectByStatus
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
       if ( ($user && $user->status == 1) || ($user && $user->role == 'admin') ) 
       {
         return $next($request);
       }
       else
       {
            return redirect('/home');
       }      
        return $next($request);
    }
}
