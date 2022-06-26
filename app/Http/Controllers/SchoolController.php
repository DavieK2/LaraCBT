<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Instructor\School;

class SchoolController extends Controller
{
    public function index()
    {
        if( auth()->user()->role == 'admin'){
          
            $schools = School::all();  
            
        }else{

            $schools = auth()->user()->school;
        }
        
        return view('backend.instructors.school.index', compact('schools'));
    }

    public function create()
    {
        return view('backend.instructors.school.create');
    }

    public function store()
    {
        request()->validate([
            'school_name' => 'required'
        ]);

        $data = request()->except('_token');
        $data['uuid'] = Str::uuid()->toString();
        
        auth()->user()->school()->create($data);

        return redirect()->route('instructor.index.school');
    }

    public function edit(School $school)
    {
        $this->authorize('view', $school);

        return view('backend.instructors.school.edit', compact('school'));
    }

    public function update(School $school)
    {
        $this->authorize('update', $school);

        request()->validate([
            'school_name' => 'required'
        ]);

        $data = request()->except('_token');
        $school->update($data);

        return redirect()->route('instructor.index.school');

    }
}
