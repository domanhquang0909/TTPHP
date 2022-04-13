<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class MiddlewareClass
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


            $class = Auth::User();
            if($class->classroom_id < 5 )
            {
                return $next($request);
            }
            return redirect('login');
            }else{
                return redirect('login');
            }
    }
}
