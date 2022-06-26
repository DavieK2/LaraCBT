<?php

namespace App\Http\Livewire\Student;


use Livewire\Component;

class ExamInstructions extends Component
{
    public $exam;
    public $student;

   

    public function render()
    {
        return view('livewire.student.exam-instructions');
    }
}
