<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index()
    {
        return inertia('Admin/Classes/index', [
            'grades' => Grade::with(['exams'])
                                ->get()
                                ->transform(function($class){
                                    return [
                                        'id' => $class->id,
                                        'className' => $class->className,
                                        'exams' => $class->exams->map(fn($exam) => $exam->only('id', 'title')),
                                    ];
                                })
                                ->paginate(6),
            'exams' => Exam::all()->map(fn($exam) => $exam->only('id', 'title') )
        ]);
    }

    public function create()
    {
        $data = request()->validate([
            'className' => 'required'
        ]);

        Grade::updateOrCreate(['id' => request('classId')], $data);
        return back();
    }

    public function assignExam()
    {
        $data = request()->validate([
            'classId' => 'required',
            'examId' => 'required'
        ]);

        $grade = Grade::find($data['classId']);

        $grade->exams()->syncWithoutDetaching([$data['examId'] => ['status' => 'Inactive']]);

        return back();
    }

    public function unassignExam()
    {
        $data = request()->validate([
            'classId' => 'required',
            'examId' => 'required'
        ]);

        $grade = Grade::find($data['classId']);

        $grade->exams()->detach($data['examId']);

        return back();
    }

    public function store()
    {
        $data = request()->validate([
            'school_id' => 'required',
            'class_name' => 'required'
        ]);
        
        return redirect()->route('instructor.create.student');
    }

    public function show(Grade $grade)
    {
        // $this->authorize('view', $class);

        return view('backend.instructors.grades.show', compact('class'));
    }

}
