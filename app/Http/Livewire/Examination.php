<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Examination extends Component
{
    public $examination;
    public $questionKey = 0;
    public $examQuestions = [];
    public $studentAnswer = [];
    public $questions = [];
    public $answers = [];
    public $scores = [];

    protected $rules = ['studentAnswer' => 'required'];
    protected $listeners = ['timeUp'];

    protected function messages()
    {
        return [
            'studentAnswer.*.required' => 'Please Answer or Skip the question',
        ];
    }

    public function mount()
    {
        $this->examQuestions = $this->examination->exam->exam_question;
        
        foreach($this->examination->questions as $examination){
            
            $this->studentAnswer[] = $examination->pivot->answer;
        }
    }
    
    public function updated()
    {
        $this->validate();
    }

    public function nextButton($key)
    {
        $this->validate([
            "studentAnswer.$key" =>"required"
        ]);

        
        $question = $this->examQuestions[$key];
        $questionIDs = $this->examQuestions[$key]->id;
        $studentAnswer = $this->studentAnswer[$key];
        
        if($question->correct_answer ===  $studentAnswer){
            $score = $question->marks;
        }else{
            $score = 0;
        }

        
        $this->examination->questions()->syncWithoutDetaching([$questionIDs => ['answer' => $studentAnswer, 'score' => $score]]);
        
        $this->questionKey ++;
    }

    public function previousButton()
    {
        $this->questionKey --;
    }

    public function skip($key)
    {
        $questionIDs = $this->examQuestions[$key]->id;
        
        $this->examination->questions()->syncWithoutDetaching($questionIDs);

        $this->questionKey ++;
    }

    public function completeButton($key){

        $this->nextButton($key);

        $this->examination->update(['status' => true]);

        session()->forget('examination');
        session()->forget('data');
        return redirect()->route('student.complete.cbt', ['examination' =>$this->examination]);
    }


    public function timeUp()
    {
        if($this->examination->exam->exam_question){

            $questionIDs = $this->examination->exam->exam_question->pluck('id');
            $this->examination->questions()->syncWithoutDetaching($questionIDs);
        }
        
        session()->forget('data');
        session()->forget('examination');
        return redirect()->route('student.timeup.cbt');
    }

    public function render()
    {
        return view('livewire.examination', [
            'examination' => $this->examination->load('exam.exam_question')
        ]);
    }
}
