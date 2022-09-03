<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            if(Auth::user()->is_user == 'warden'){
                return redirect()->route('warden.home');
            }
            if(Auth::user()->is_user == 'sub_warden'){
                return redirect()->route('sub-warden.home');
            }
            if(Auth::user()->is_user == 'student'){
                return redirect()->route('student.home');
            }
        }
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records']);
    }

    public function logout()
    {
        $user = Auth::user();
        session()->flush();
        return redirect()->route('login');
    }
}
