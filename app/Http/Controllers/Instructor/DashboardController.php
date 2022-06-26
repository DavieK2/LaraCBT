<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $schools = auth()->user()->school;
        $exams = auth()->user()->students;
        
        foreach($exams as $exam){
            $takenExams[] = $exam->examination->count();
        }
        if($exams->count() <= 0){
            $takenExams = 0;

        }else{
            
            $takenExams = array_sum($takenExams);
        }

       
        $students = auth()->user()->students->count();
        $registeredStudents = auth()->user()->students->where('status', 'Registered')->count();
        $reports = auth()->user()->report->count();

        return view('backend.instructors.dashboard', compact('schools', 'takenExams', 'students', 'registeredStudents', 'reports'));
    }
}
