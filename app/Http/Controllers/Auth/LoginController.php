<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

//    public function login(Request $request) {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            $user = Auth::user();
//            $user->load('staffType'); // Assuming 'staffType' is a relation on your User model
//            session(['staffType' => $user->staffType]); // Store staffType in session
//            return redirect()->intended('/dashboard');
//        }
//
//        return back()->withErrors([
//                    'email' => 'The provided credentials do not match our records.',
//        ]);
//    }

}
