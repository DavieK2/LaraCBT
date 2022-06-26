<?php

namespace App\Models;

use App\Models\Instructor\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examination_id');
    }
}
