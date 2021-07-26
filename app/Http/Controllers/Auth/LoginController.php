<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

        if (Auth::attempt($credentials))
        {
            return redirect()->intended('manager');
        }

        return redirect('login')->with('error', 'اووه! البيانات التي ادخلتها غير صحيحة');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
