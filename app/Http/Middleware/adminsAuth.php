<?php

namespace App\Http\Middleware;

use App\Models\Manager;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class adminsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (!Auth::check() == false) {
//            return redirect('/login');
//        }
        return $next($request);

//        if(Auth::check())
//        {
//            return View::make('/login');
//        }
//        return Redirect::route('login')->withInput()->with('errmessage', 'Please Login to access restricted area.');
//    }
    }
}
