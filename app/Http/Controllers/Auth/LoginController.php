<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'man_email' => 'required|string|email',
            'man_password' => 'required|string',

        ]);

        $credentials = $request->only('man_email', 'man_password');
        $admin = $request->only('man_email', 'man_password');

        $credentials = ['man_email' => \Arr::get('man_email', $admin, $request->man_email),
            'password' => \Arr::get('man_password', $admin, $request->man_password)];
//        dd($request->_token);
//dd($request->session());
        if (Auth::attempt($credentials))
        {
//            dd(Auth()->user()->setRememberToken($request->_token));
//            Auth()->user()->setRememberToken($request->_token);
//            $request->session()->save();
            $manager =Auth()->user();
//            dd($manager);
            Auth::login($manager, true);
            \auth()->login($manager,true);

//            Auth::login(, true);
            return redirect()->intended('adminLayout');
        }

        return redirect('login')->with('error', 'اووه! البيانات التي ادخلتها غير صحيحة');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
