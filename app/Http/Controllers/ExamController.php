<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Grade;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function index()
    {
        return inertia('Admin/Exam/index', [
            'classes' => Grade::all() ,
            'courses' => Course::all() ,
            'exams' => Exam::with(['grades'])->get()->map(fn($exam) => $exam->only('id', 'title', 'instructions', 'duration', 'status', 'exam_code', 'grades', 'course'))->paginate(15)
        ]);
    }
    
    public function create()
    {
       
        $data = request()->validate([
            'title' => 'required',
            'instructions' => 'required',
            'duration' => 'required',
            'course' => 'required',
            'assignedClasses' => 'required',
        ],
        [
            'assignedClasses.required' => 'Please assign at least one class for the exam'
        ]);

        $data['user_id'] = 1;
        $data['id'] = 1;
        $data['exam_code'] = strtoupper('EXM'.'-'.Str::random(6));
        
        $assignedClasses = $data['assignedClasses'];
        unset($data['assignedClasses']);

        $examId = request('examId');
        $exam = Exam::updateOrCreate(['id' => $examId ], $data);
        $exam->grades()->sync(collect($assignedClasses)->mapWithKeys(fn($class) => [$class => ['status' => 'Inactive']]));

        return ( $examId && request('closeModal') === true ) ? back() : redirect("/create/question/$exam->exam_code");
    }
    

    public function publish()
    {
        $exam = Exam::find(request('examId'));
        $exam->status = intval($exam->status) === 0 ? 1 : 0;
        $exam->update();
        return back();
    }

    public function show(Exam $exam)
    {
        $this->authorize('view', $exam);
        $questions = $exam->exam_question;
        
        return view('backend.instructors.exams.show', compact('questions'));
    }

    
    // public function edit(Exam $exam)
    // {
    //     $this->authorize('view', $exam);
    //     if($exam->examination()->count() > 0){

    //         Alert::error('Sorry', 'Cannot edit becausue exam already has been taken');
    //         return back();
    //     }
    //     return view('backend.instructors.exams.edit', compact('exam'));
    // }
}