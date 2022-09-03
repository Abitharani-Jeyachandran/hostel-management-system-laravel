<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if(Auth::user()->is_user == 'warden'){
            return view('warden.pages.auth.profile',compact('user'));
        }
        if(Auth::user()->is_user == 'sub_warden'){
            return view('sub-warden.pages.auth.profile',compact('user'));
        }
        if(Auth::user()->is_user == 'student'){
            return view('student.pages.auth.profile',compact('user'));
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $user = User::find(Auth::user()->id);
            if (Hash::check($request->current_password, $user->password)) {
            $user->password=bcrypt($request->password);
            $user->save();

            Flasher::addSuccess('message', "Password has been changed successfully");
            return back();

            } else {

                Flasher::addError('addError', "Password mismatch please try again");
                return back();

            }
        }catch(\Exception $e){
            Flasher::addError('addError', "Something went wrong.");
            return back();
        }
    }
}
