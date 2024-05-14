<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $title = "login page";
        return view("auth.login", compact("title"));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email Anda tidak terdaftar']);
        }

        return redirect()->back()->withInput($request->only('email'))
            ->withErrors(['password' => 'Password Anda salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
