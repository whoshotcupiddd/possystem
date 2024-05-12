<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
//    public function showLoginForm()
//    {
//        return view('adminlogin');
//    }
//
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            \Log::info('User authenticated successfully.'); // Log successful authentication
//            return redirect()->route('staff.index'); // Redirect to the staff index page upon successful login
//        }
//        return redirect()->route('staff.index');
//        //return redirect()->route('admin.login')->with('error', 'Invalid credentials');
//    }
}
