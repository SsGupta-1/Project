<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class afterloginauthenticate
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
        if(Auth::check()){
            $user=Auth::user();
           // dd($user);
            if(Auth::user()->role_id==1){
                return $next($request);
            }elseif(Auth::user()->role_id==2){
                return $next($request);
            }
           
         }else{
            return redirect('login');
        }
      
    }

    public function check($request, Closure $next){
        $user=Auth::user();

        dd($user);
    }
    
}
