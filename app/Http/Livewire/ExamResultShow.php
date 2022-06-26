<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExamResultShow extends Component
{
    public $examination;
    public $student;
    public $totalQuestions;

    public $marks = [];

    protected $listeners = ['refreshPage' => '$refresh'];

 
    public function awardMark($questionID, $key)
    {
        $this->validate([
            "marks.$key" => 'required'
        ]);

        $this->examination->questions()->syncWithoutDetaching([$questionID => ['score' => $this->marks[$key]]]);
        $this->emitSelf('refreshPage');
    }

    

    public function render()
    {
        return view('livewire.exam-result-show');
    }


}
