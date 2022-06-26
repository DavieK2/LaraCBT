<?php

namespace App\Http\Livewire\Instructor\Grades;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AddStudent extends Component
{
    public $class;
    public $first_name = 'Peter';
    public $last_name = 'Samantha';
    public $gender;
    public $age;
    public $student;
    public $studentID;
    public $updateButton = false;

    protected $listeners = ['studentData'];

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'age' => 'required',
    ];


    public function addStudent($classID)
    {
        $this->validate();

        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'age' => $this->age,
            'school_class_id' => $classID,
            'school_id' => $this->class->school->id
        ];

        $school_name = $this->class->school->school_name;
        $initials = $school_name[0].$school_name[1].$school_name[2].$school_name[3];
        $data['school_code'] = strtoupper($initials).'-'.$this->generateStudentCode(5);
        $data['code_hash'] = Hash::make($data['school_code']);
        $data['uuid'] = Str::uuid()->toString();

        auth()->user()->students()->updateOrCreate(['id' => $this->studentID], $data);
        $this->emitTo('student-names', 'refreshPage');
        $this->updateButton = false;
        $this->resetInput();
        
    }


    public function studentData($student)
    {
        $this->first_name = $student['first_name'];
        $this->last_name = $student['last_name'];
        $this->gender = $student['gender'];
        $this->age = $student['age'];
        $this->studentID = $student['id'];
        $this->updateButton = true;
    }


    public function resetInput()
    {
        $this->reset(['last_name','first_name', 'gender', 'age', 'updateButton', 'studentID']);
    }

    protected function generateStudentCode($length = 10) 
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
        return view('livewire.instructor.grades.add-student');
    }
}
