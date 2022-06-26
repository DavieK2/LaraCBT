<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Instructor\Question;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToCollection, WithHeadingRow
{
   
    public function collection(Collection $rows)
    {
        foreach($rows as $excel){

            Validator::make($rows->toArray(), [
                '*.question' => 'required',
                '*.question_type' => 'required',
                '*.question_category' => 'required',
                '*.marks' => 'required',
            ])->validate();
            
            $data = [
                'question' =>$excel['question'],
                'question_type' =>$excel['question_type'],
                'question_category' =>$excel['question_category'],
                'correct_answer' => $excel['correct_answer'],
                'marks' => $excel['marks'],
                'user_id' => auth()->user()->id,
            ];
    
            if($excel['answers'] == ""){
                $data['answers'] = null;
            }else{
                $data['answers'] = explode(',', $excel['answers']);
            }
            
            Question::create($data);
        }
    }
}
