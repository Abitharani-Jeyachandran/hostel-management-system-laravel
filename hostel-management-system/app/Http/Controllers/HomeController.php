<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        if(Auth::user()->is_user == 'warden'){
            return view('warden.pages.home');
        }
        if(Auth::user()->is_user == 'sub_warden'){
            return view('sub-warden.pages.home');
        }
        if(Auth::user()->is_user == 'student'){
            return view('student.pages.home');
        }
    }
}
