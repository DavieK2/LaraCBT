<?php

namespace App\Http\Livewire;

use App\Models\Instructor\Student;
use Livewire\Component;

class ClassShowView extends Component
{
    public $class;
    public $first_name = 'hello';
    public $last_name;
    public $age;
    public $gender;
    public $student_id;
    public $status;

    protected $listeners = ['refreshPage' => '$refresh'];

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'gender' => 'required',
    ];

    public function active($id)
    {
        $this->class->class_exam()->updateExistingPivot($id, ['status' => 'Active']);
        $this->emitSelf('refreshPage');

    }

    public function inactive($id)
    {
        $this->class->class_exam()->updateExistingPivot($id, ['status' => 'Inactive']);
        $this->emitSelf('refreshPage');
    }

    public function edit($studentID)
    {
        $student = Student::find($studentID);
        $this->first_name = $student->first_name;
        $this->last_name = $student->last_name;
        $this->age = $student->age;
        $this->gender = $student->gender;
        $this->status = $student->status;
        $this->student_id = $student->id;

        $this->dispatchBrowserEvent('showEditStudentForm');
      
    }

    public function updateStudent()
    {
        $this->validate();

        $data = [
            'first_name' =>  $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'gender' =>  $this->gender,
            'status' =>  $this->status,
        ];

        $student = Student::find($this->student_id);
        $student->update($data);

        $this->emitSelf('refreshPage');
        $this->dispatchBrowserEvent('closeEditStudentForm');
        
    }

    public function render()
    {
        return view('livewire.class-show-view', [
                            'students' => $this->class->students()->get()
        ]);
    }
}
