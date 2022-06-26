<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Instructor\Grade;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function create(Grade $class)
    {
        // $this->authorize('view', $class);
        
        return view('backend.instructors.grades.students.create', compact('class'));
    }
}
