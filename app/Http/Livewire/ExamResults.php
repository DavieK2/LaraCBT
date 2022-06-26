<?php

namespace App\Http\Livewire;

use App\Models\Examination;
use App\Models\StudentResult;
use Livewire\Component;
use Livewire\WithPagination;

class ExamResults extends Component
{
    use WithPagination;

    public function publish($examinationID)
    {
        $examination = Examination::find($examinationID);

        $data = [
            'examination_id' => $examination->id,
            'student_id' => $examination->student->id,
            'score' => $examination->questions->sum('pivot.score'),
            'total_marks' => $examination->exam->exam_question->sum('marks'),
        ];

        StudentResult::updateOrCreate(['examination_id' => $examination->id],  $data);

        $examination->update(['result' => true]);

    }

    public function render()
    {
        return view('livewire.exam-results', [
            'students' => auth()->user()->students()->with('examination.exam.exam_class', 'class')->paginate(20)
        ]);
    }
}
