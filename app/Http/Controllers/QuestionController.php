<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Imports\QuestionsImport;
use App\Models\Question;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
{
  
    public function index(Exam $exam)
    {

        return inertia('Admin/Exam/create', [
            'exam_id' => $exam->id,
            'exam_title' => $exam->title,
            'exam_code' => $exam->exam_code,
            'questionCategory' => $exam->course,
            'questions' => $exam->questions, 
            'csrf_token' => csrf_token() 
 
        ]);
    }

    public function create()
    {

        $data = request()->validate([
            'marks' => 'required',
            'question' => 'required',
            'questionType' => 'required',
            'questionCategory' => 'required',
            'answers.*' => 'required_if:questionType,Multiple Choice Question',
            'correctAnswer' => 'required_if:questionType,Multiple Choice Question',
        ], 
        [ 
            'marks.required' => 'Please include the mark for this question',
            'question.required' => 'The question field is required',
            'questionType.required' => 'Please select a question type',
            'correctAnswer.required_if' => 'Please select a correct answer',
            'answers.*.required_if' => 'Please enter all options fields'

        ]);

        $data['user_id'] = 1;
        $question = Question::find(request('id'));

        if($question && $question->exams()->count() > 1){
            
            $question->exams()->detach(request('examID'));
            $question = Question::create($data);
        }
        elseif($question){

            $question->update($data);
        } 
        else{

            $question = Question::create($data);
        }  
             
        $exam = Exam::find(request('examID'));
        $question->exams()->syncWithoutDetaching($exam->id);

        return back();
    }

    public function edit(Question $question)
    {
        return response(['data' => $question ]);
    }

    public function delete()
    {
        $question = Question::find(request('id'));
        $question && $question->exams()->count() > 1 ? $question->exams()->detach(request('examId')) : $question->delete();
        return back();
    }

    public function questionBank(Exam $exam)
    {
    
        return inertia('Admin/Exam/create', [
            'exam_id' => $exam->id,
            'exam_title' => $exam->title,
            'exam_code' => $exam->exam_code,
            'questionCategory' => $exam->course,
            'questions' => Question::where('questionCategory', $exam->course)->get(),
            'csrf_token' => csrf_token() 
 
        ]);
    }

    public function addQuestion()
    {
        Question::find(request('id'))->exams()->syncWithoutDetaching(request('examId'));
        return back();
    }

    public function upload()
    {
        $import = Excel::import(new QuestionsImport, request()->file('excel'));

       
        Alert::success('Success', 'Questions Uploaded');
        return back();
    }

    public function download()
    {
        return Storage::download('public/Question.xlsx', 'Question Format.xlsx');
    }
}
