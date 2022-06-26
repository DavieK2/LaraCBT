<?php

namespace App\Http\Livewire\Reports;

use App\Models\Instructor\Attendance;
use Livewire\Component;
use App\Models\Instructor\Student;
use App\Models\Instructor\ClassReport;
use App\Models\Instructor\SchoolClass;

class CreateReport extends Component
{
    public $classID;
    public $className;
    public $report;
    public $studentData = [];
    public $date;
    public $lesson_no;
    public $lesson_notes;
    public $mia_course;
    public $reportUpdate = false;
    public $classReportID;

    protected $listeners = ['class_report_data', 'reportUpdate'];

    protected $rules = [
        'date' => 'required',
        'lesson_no' => 'required',
        'lesson_notes' => 'required',
        'mia_course' => 'required',
        'classID' => 'required',
    ];

    protected function messages()
    {
        return [
            'classID.required' => 'Please Select A class'
        ];
    }
    
    public function updated()
    {
        if($this->classID){
            $this->className = SchoolClass::find($this->classID)->class_name;
        }
           
        $this->validate();
    }

    
    public function class_report_data($classReport)
    {
        $this->date = $classReport['date'];
        $this->lesson_no = $classReport['lesson_no'];
        $this->lesson_notes = $classReport['lesson_notes'];
        $this->mia_course = $classReport['mia_course'];
        $this->classID = $classReport['class_id'];
        $this->classReportID = $classReport['id'];
        $studentData = Attendance::where('class_report_id', $this->classReportID)->first()->student_name;
        $this->studentData = $studentData;

    }
    
    public function addClassReport()
    {
        $this->validate();

        $classReportData = [
            'date' => $this->date,
            'lesson_no' => $this->lesson_no,
            'class_id' => $this->classID,
            'lesson_notes' => $this->lesson_notes,
            'mia_course' => $this->mia_course,
            'report_id' => $this->report->id,
        ];

        $class_report = ClassReport::updateOrCreate(['id' => $this->classReportID], $classReportData);

        $attendance = $this->studentData;

         $attendanceData = [
                'student_name' => $attendance,
                'status' => 'present',
                'class_report_id' => $class_report->id,
            ];

        Attendance::updateOrCreate(['class_report_id' => $class_report->id], $attendanceData);
        
        $this->resetInput();
        $this->emitTo('report-card', 'refreshParent');
    }

    public function reportUpdate()
    {
        $this->reportUpdate = true;
    }

    

    public function resetInput()
    {
        $this->reset(['date', 'lesson_no', 'classID', 'lesson_notes', 'studentData', 'mia_course', 'reportUpdate', 'classReportID']);
    }

    

    public function render()
    { 
        return view('livewire.reports.create-report',[
            'classes' =>  $this->report->school->class,
            'students' => Student::where('school_class_id', $this->classID)->get()
        ]);
    }
}
