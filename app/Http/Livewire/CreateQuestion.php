<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Instructor\Question;

class CreateQuestion extends Component
{
    use WithFileUploads;
    
    public $exam;
    public $question;
    public $questionID;
    public $correct_answer;
    public $answers = [];
    public $inputs = [];
    public $i = 1;
    public $marks;
    public $showMarks = false;
    public $question_type;
    public $updateButton = false;
    public $image;

    protected $listeners = ['editQuestion', 'deleteQuestion', 'editQuestionArchive'];

    protected $rules = [
        
        'question' => 'required',
        'question_type' => 'required',
        'marks' => 'required',
    ];

    protected function messages()
    {
        return [
            'correct_answer.required' => 'Please select correct answer',
            'image.image' => 'Please your uploaded file should be an Image',
        ];
    }

    public function updated()
    {

        $answers = $this->answers;

        foreach ($answers as $key => $value ){
            $this->inputs[$key] = $value;
        }

        $this->unsetCorrectAnswer();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'image' => 'image|max:3000'
        ]);
    }

    public function validateInput()
    {
        if($this->question_type == 'Multiple Choice'){
            $this->validate([
                'answers.*' => 'required',
                'correct_answer' => 'required',
            ]);
        }

        if($this->image){
            $this->validate([
                'image' => 'image|max:3000'
            ]);
        }

        $this->validate();
    }

    public function addOptions($i)
    {
        $i = $i++;
        $this->$i = $i;
        array_push($this->inputs, $i);
        $this->showMarks = true;
    }

    public function removeOptions($i)
    {
        unset($this->inputs[$i]);
        unset($this->answers[$i]);
        $this->unsetCorrectAnswer();
        if($this->inputs == null)
            $this->showMarks = false;
    }

    public function saveQuestion($id = null)
    {
        $this->validateInput();

        $data = [
            'marks' => $this->marks,
            'question' => $this->question,
            'questionType' => $this->question_type,
            'questionCategory' => $this->exam->mia_course,
            'answers' => $this->answers,
            'correct_answer' => $this->correct_answer,
        ];
        if($this->image){
            $ext = $this->image->extension();
            $data['image'] = $this->image->storeAs('Questions', Str::uuid().'.'.$ext);
        };

        
        if($id){

            $question = Question::find($id);

            if($question->examinations->count() > 0){
                $question = auth()->user()->questions()->create($data); 
            }
            $question->update($data);
            
        }else{
            $question = auth()->user()->questions()->updateOrCreate(['id' => $id], $data);
        }

        
        $question->question_exam()->syncWithoutDetaching($this->exam->id);

        $this->resetInput();
        $this->emitTo('question-list', 'refreshPage');
    }

    public function editQuestion($id)
    {
        $questionData = Question::find($id);
        $this->question = $questionData->question;
        $this->correct_answer = $questionData->correct_answer;
        $this->marks = $questionData->marks;
        $this->question_type = $questionData->question_type;
        $this->answers = $questionData->answers;
        $this->inputs = $this->answers;
        $this->questionID = $questionData->id;
        $this->updateButton = true;
        $this->showMarks = true;
    }

    public function editQuestionArchive($id)
    {
        $this->resetInput();
        $questionData = Question::find($id);
        $this->question = $questionData->question;
        $this->correct_answer = $questionData->correct_answer;
        $this->marks = $questionData->marks;
        $this->question_type = $questionData->question_type;
        $this->answers = $questionData->answers;
        $this->inputs = $this->answers;
        
    }

   

    public function unsetCorrectAnswer()
    {
        if(! in_array($this->correct_answer, $this->answers))
            $this->reset(['correct_answer']);
    }

    public function resetInput()
    {
        $this->reset(['question', 'correct_answer', 'answers', 'inputs', 'marks', 'showMarks', 'question_type', 'i', 'updateButton', 'questionID' ]);
    }

    public function render()
    {
        return view('livewire.create-question', [
            'title' => $this->exam->title
        ]);
    }
}
