<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Instructor\Student;

class StudentNames extends Component
{
    
    public $class;

    protected $listeners = [
        'refreshPage' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.student-names', [
            'students' => Student::where('school_class_id', $this->class->id)->get()
        ]);
    }

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
}
