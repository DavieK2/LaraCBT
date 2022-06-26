<?php

namespace App\Models;

use App\Models\Examination;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'answers' => 'array'
    ];

    protected $guarded = [];

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exams_questions', 'question_id', 'exam_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function examinations()
    {
        return $this->belongsToMany(Examination::class, 'examination_questions', 'question_id', 'examination_id')->withPivot(['answer', 'score'])->withTimestamps();
        
    }
}
