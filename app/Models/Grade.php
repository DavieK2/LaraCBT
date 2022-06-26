<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_grades', 'grade_id', 'exam_id')->withPivot('status')->withTimestamps();
    }
}
