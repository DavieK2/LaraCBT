<?php

namespace App\Models;

use App\Models\Instructor\Exam;
use App\Models\Instructor\Grade;
use App\Models\Instructor\Question;
use App\Models\Instructor\Report;
use App\Models\Instructor\School;
use App\Models\Instructor\Student;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; 
    
    
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class, 'user_id');
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id');
    }
}
