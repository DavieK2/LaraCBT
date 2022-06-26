<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\StudentLoginChecker;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = StudentLoginChecker::checkCredentials();
        
        if(! $student){
            return redirect()->route('student.index.login');
        }

        $results = $student->result()->with('examination.exam')->get();

        return view('backend.students.dashboard.index', compact('student', 'results'));
    }
}
