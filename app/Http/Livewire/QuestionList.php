<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Instructor\Question;

class QuestionList extends Component
{
    use WithPagination;

    public $exam;
    public $questionArchive = false;
    public $questionID = [];

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshPage' => '$refresh'
    ];
    
    public function syncQuestionsToExam()
    {
      
       $this->exam->exam_question()->syncWithoutDetaching($this->questionID);
        
    }

    public function deleteQuestion($id)
    {
        
        $questionData = Question::find($id);

        if($questionData->examinations()->count() > 0){
            $this->exam->exam_question()->detach($questionData);

        }else{
            $questionData->delete();
        }
        
        $this->emitSelf('refreshPage');

    }
    
    public function question_archive()
    {
        
        $this->questionArchive = true;
    }

    public function created_question()
    {
        $this->questionArchive = false;
    }

    public function render()
    {
        return view('livewire.question-list', [
            'exam' => $this->exam->load('exam_question'),
            'questions' => auth()->user()->questions()->where('question_category', $this->exam->mia_course)->paginate(20)
        ]);
    }
}
