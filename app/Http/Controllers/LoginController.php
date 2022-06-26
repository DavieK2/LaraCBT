<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            if(auth()->user()->role === 'admin'){
                return redirect()->route('instructor.index.dashboard');
            }
            if(auth()->user()->role === 'instructor'){
                return redirect()->route('instructor.index.dashboard');
            }
            if(auth()->user()->role === 'student'){
                return redirect()->route('instructor.index.dashboard');
            }
            Auth::logout();
            return redirect('/officials/login');
        }
        return back()->with(['error_message' => 'Invalid Login Credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/officials/login');
    }
}
