<?php

namespace App\Http\Livewire\Instructor\Grades;

use Livewire\Component;
use App\Models\Instructor\Student;

class StudentList extends Component
{
    public $class;

    protected $listeners = [
        'refreshPage' => '$refresh'
    ];

   
    public function edit($studentId)
    {
        $student = Student::find($studentId);
        $this->emitTo('add-student', 'studentData', $student);
    }

    public function delete($studentId)
    {
        $student = Student::find($studentId);
        $student->delete();
    }
    
    public function render()
    {
        return view('livewire.instructor.grades.student-list', [
            'students' => Student::where('school_class_id', $this->class->id)->get()
        ]);
    }
}
