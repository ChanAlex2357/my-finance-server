<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\ProfessionalStatus;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');        
    }
    function dologin(LoginRequest $request) {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('user.home'));
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => "Email invalide ou Mode de passe incorecte"
        ]);
    }

    function register() {
        $status = ProfessionalStatus::all();
        return view('auth.register',[ 'status'  => $status]);
    }


    function doregister(Request $request){
        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user_profile = UserProfile::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'birth_date' => $request->input('birth_date'),
            'salary' => $request->input('salary'),
            'id_professional_status' => $request->input('professional_status'),
            'id_user' => $user->id
        ]);
    }
}
