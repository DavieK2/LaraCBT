<?php

namespace App\Services;

use App\Models\Instructor\Student;

class StudentLoginChecker
{
    public static function checkCredentials()
    {
        if(session()->has('student') && Student::where('uuid', session('student')['uuid'])->exists()){
            
            $student = Student::where('uuid', session('student')['uuid'])->first();
            return $student;
        }        
    }
}