<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return inertia('Admin/Courses/index', [
            'courses' => Course::paginate(20)
        ]);
    }

    public function create()
    {
        $data = request()->validate([
            'name' => 'required'
        ],
    [
        'name.required' => 'Please enter a course name'
    ]);

        Course::create($data);
        return back();
    }
}
