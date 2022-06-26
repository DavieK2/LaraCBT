<?php

namespace App\Models\Instructor;

use App\Models\User;
use App\Models\Examination;
use App\Models\StudentResult;
use App\Models\Instructor\School;
use App\Models\Instructor\SchoolClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function examination()
    {
        return $this->hasMany(Examination::class);
    }

    public function result()
    {
        return $this->hasMany(StudentResult::class, 'student_id');
    }
}
