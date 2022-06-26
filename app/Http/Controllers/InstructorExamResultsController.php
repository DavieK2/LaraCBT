<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Instructor\Student;

class InstructorExamResultsController extends Controller
{
    public function index()
    {
        return view('backend.instructors.exams.results.index');
    }

    public function show(Student $student, Examination $examination)
    {
        // dd($examination);
        $examination = $examination->load('exam.exam_question');
        $totalQuestions = $examination->exam->exam_question->count();
        return view('backend.instructors.exams.results.show', compact('student', 'examination', 'totalQuestions'));
    }
}
