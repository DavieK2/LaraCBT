<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class InstructorRegisterController extends Controller
{
    public function index()
    {
        return view('auth.instructor.register');
    }
    
    public function register()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make(request('password'));
        $data['role'] = 'instructor';
        $data['uuid'] = Str::uuid()->toString();

        $school = request()->validate([
            'school_name' => 'required'
        ]);

        $school['uuid'] = Str::uuid()->toString();

        $user = User::create($data);
        
        $user->school()->create($school);

        return redirect('/officials/login');
    }
}
