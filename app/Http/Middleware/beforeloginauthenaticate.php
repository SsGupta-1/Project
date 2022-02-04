<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class beforeloginauthenaticate
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
        if (Auth::check()) {
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }elseif(Auth::user()->role_id ==2){
                return redirect('Dashboard');
            }
           
        }
        return $next($request);
    }
}
