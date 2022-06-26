<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            if(auth()->user()->role_id === 'admin'){
                return redirect()->route('instructor.index.dashboard');
            }
            if(auth()->user()->role_id === 'instructor'){
                return redirect()->route('instructor.index.dashboard');
            }
            if(auth()->user()->role_id === 'student'){
                return redirect()->route('instructor.index.dashboard');
            }
        }
    }
}
