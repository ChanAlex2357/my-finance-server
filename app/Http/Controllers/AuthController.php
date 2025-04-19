<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\ProfessionalStatus;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');        
    }
    function dologin(LoginRequest $request) {
        $credentials = $request->validated();
        $remember = $request->has('remember');
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('user.home'));
        }
        return back()->withErrors([
            'email' => 'Identifiants invalides',
        ])->withInput();
    }

    function register() {
        $status = ProfessionalStatus::all();
        return view('auth.register',[ 'status'  => $status]);
    }

    function doregister(RegisterRequest $request)
    {
        $validated = $request->validated();
    
        DB::beginTransaction();
    
        try {
            // Create user
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
    
            // Create user profile
            UserProfile::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'],
                'salary' => $validated['salary'],
                'id_professional_status' => $validated['professional_status'],
                'id_user' => $user->id,
            ]);
    
            DB::commit();
    
            // Redirect or return success response
            return redirect()->route('auth.login')->with('success', 'Inscription reussie');
    
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error or handle it
            return back()->withErrors(['error' => 'Une erreur est survenue. Veuillez reessayer.']);
        }
    }
    
}
