<?php

namespace App\Http\Livewire;

use App\Models\Instructor\School;
use Livewire\Component;

class ExamClasses extends Component
{
    public $schools = [];
    public $schoolsID;
    public $classID = [];
    public $exam;

    protected $listeners = ['selectedSchools', 'refreshPage' => '$refresh', 'createExam'];

    public function selectedSchools($schools, $data)
    {
        $this->schoolsID = $schools;
        $this->schools = School::whereIn('id', $schools)->get();
        $this->exam = $data;
    }

    public function createExam()
    {
        $exam = auth()->user()->exams()->updateOrCreate($this->exam);
        
        $exam->exam_school()->sync($this->schoolsID);

       
        foreach( $this->classID as $class){
            $class = [ $class => ['status' =>'Inactive']];
            $exam->exam_class()->syncWithoutDetaching($class);
        }

        // dd($exam);
        return redirect()->route('instructor.create.question', $exam);
    }

    public function render()
    {
        return view('livewire.exam-classes');
    }
}
