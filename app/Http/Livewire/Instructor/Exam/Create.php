<?php

namespace App\Http\Livewire\Instructor\Exam;

use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $schoolID = [];
    public $title;
    public $mia_course;
    public $duration;
    public $instructions;
    public $createButton = false;

    protected $rules = [
        'title' => 'required',
        'mia_course' => 'required',
        'duration' => 'required',
        'schoolID' => 'required',
        'instructions' => 'required'
    ];

    protected function messages()
    {
        return [
            'schoolID.required' => 'Please select a School'
        ];
    }

    public function updated()
    {
        $this->validate();
    }

    
    public function addSchools()
    {
        $this->validate();

        $exam_code = $this->generateExamCode(6);

        $data = [
            'title' => $this->title,
            'mia_course' => $this->mia_course,
            'duration' => $this->duration,
            'instructions' => $this->instructions,
            'uuid' => Str::uuid()->toString(),
            'exam_code' => $exam_code
        ];
        
        $this->emitTo('exam-classes','selectedSchools', $this->schoolID, $data);
        $this->emitTo('exam-classes', 'refreshPage');
        $this->createButton = true;
    }
    

    protected function generateExamCode($length = 10) 
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    
    public function render()
    {
        return view('livewire.instructor.exam.create', [
            'schools' => auth()->user()->schools
        ]);
    }
}
