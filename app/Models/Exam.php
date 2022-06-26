<?php

namespace App\Models;

use App\Models\Examination;
use App\Models\Grade;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exams_questions', 'exam_id', 'question_id')->withTimestamps();
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class , 'exam_grades', 'exam_id', 'grade_id')->withPivot('status')->withTimestamps();
    }

   

    public function examination()
    {
        return $this->hasMany(Examination::class, 'exam_id');
    }
}
