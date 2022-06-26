<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use Illuminate\Support\Str;
use App\Models\Exam;
use App\Models\Instructor\Student;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ExaminationController extends Controller
{
    public function index()
    {
        session()->forget('examination');
        session()->forget('data');
        return view('backend.students.exams.index');
    }

    public function login()
    {
       $school_code =  request('school_code');
       $exam_code =  request('exam_code');

       if(! Student::where('school_code', $school_code )->exists()){

            Alert::error('Sorry', 'Please Enter Correct School Code');
            return back();
       }
     
       $student = Student::where('school_code', $school_code )->first();

       if(! Hash::check($school_code, $student->code_hash)){
        
            Alert::error('Sorry', 'Invalid School Code');
            return back();
       }

       if($student->status !== 'Registered'){

            Alert::error('Sorry', 'Your are not registered to take this Exam');
            return back();
       }

       if(! Exam::where('exam_code', $exam_code)->exists()){

            Alert::error('Sorry', 'Invalid Exam Code');
            return back();
       }

       $class_exam = $student->class->class_exam()->where('exam_code', $exam_code)->first();
      
       if(! $class_exam){

            Alert::error('Sorry', 'Your class is not assigned to this exam');
            return back();
       }

       $active_exam = $class_exam->pivot->status;

       if($active_exam !== 'Active'){
            
            Alert::error('Sorry', 'This Exam is no longer available');
            return back();
       }

       if(Examination::where('exam_id', $class_exam->id)->where('student_id', $student->id)->exists()){

            $examination = Examination::where('exam_id', $class_exam->id)->where('student_id', $student->id)->first();
            
            if($examination->time_remaining <= 0 || $examination->time_remaining === null){

                Alert::error('Sorry', 'You have already completed this Exam');
                return back();
            }

            if($examination->status == true){

                Alert::error('Sorry', 'You have already completed this Exam');
                return back();
            }

            session()->forget('data');
            session()->put(['examination' => ['uuid' => $examination->uuid]]);
            return redirect()->route('student.examination', ['examination' => $examination]);

       }

       session()->forget('data');
       session()->forget('examination');
       return view('backend.students.exams.instructions', ['exam' => $class_exam, 'student' => $student]);
    }

    public function startExam(Exam $exam, Student $student)
    {
        if(session()->has('examination')){
            $uuid = session('examination')['uuid'];
            $examination = Examination::where('uuid', $uuid)->first();
            
            if($examination->student_id == $student->id){
                return redirect()->route('student.examination', ['examination' => $examination]);
            }else{
                return redirect()->route('student.index.cbt');
            }
        }
        $data = [];

        $data['exam_id'] = $exam->id;
        $data['student_id'] = $student->id;
        $data['uuid'] = Str::uuid()->toString();
        $data['time_remaining'] = $exam->duration * 60;

        $examination = Examination::updateOrCreate($data);

        session()->put(['examination' => ['uuid' => $examination->uuid]]);
        return redirect()->route('student.examination', ['examination' => $examination]);
    }

    public function examination(Examination $examination)
    {
        
        if( ! session()->has('examination')){
            return redirect()->route('student.index.cbt');
        }

        if(session('examination')['uuid'] !== $examination->uuid){
            
            Alert::error('Error', 'Invalid Session ID');
            return redirect()->route('student.index.cbt');
        }

        if($examination->time_remaining <= 0 || $examination->time_remaining === null){

            Alert::error('Sorry', 'You have already taken this exam');
            return redirect()->route('student.index.cbt');
        }

        return view('backend.students.exams.examination', ['examination' => $examination]);
        
    }

    public function complete(Examination $examination)
    {
        return view('backend.students.exams.completion', compact('examination'));
    }

    public function timeup()
    {
        return view('backend.students.exams.timeup');
    }

}
