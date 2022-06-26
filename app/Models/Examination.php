<?php

namespace App\Models;

use App\Models\StudentResult;
use App\Models\Instructor\Exam;
use App\Models\Instructor\Student;
use App\Models\Instructor\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'examination_questions', 'examination_id', 'question_id')->withPivot(['answer', 'score'])->withTimestamps();
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function result()
    {
        return $this->hasMany(StudentResult::class, 'examination_id');
    }
}
