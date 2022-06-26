<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Instructor\Student;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StudentLoginController extends Controller
{
    public function index()
    {
        return view('backend.students.login');
    }
    
    public function login()
    {
        $last_name = request('last_name');
        $school_code = request('school_code');


        if(! Student::where('last_name', $last_name)->where('school_code', $school_code)->exists()){

            Alert::error('Error', 'This Accout does not exist');
            return back();
        }

        $student = Student::where('last_name', $last_name)->where('school_code', $school_code)->first();

        if(! Hash::check($school_code, $student->code_hash)){

            Alert::error('Error', 'Invalid Student Code');
            return back();
        }

        session()->put(['student' => ['uuid' => $student->uuid]]);

        return redirect()->route('student.index.dashbboard');
    }

    public function logout()
    {
        session()->forget('student');

        return redirect()->route('student.index.login');
    }
}
