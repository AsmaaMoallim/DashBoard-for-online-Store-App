<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class adminsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $path = $request->path();
//        if($path !="login"  && !Session::get('user'))
//        {
//            return redirect('/');
//        }

   if (!$request->url('login')){
       return redirect('/');
   }
//        if(Auth::guest())
//        {
//            return redirect('/');
//        }

        echo "HI";
        return $next($request);
    }
}
