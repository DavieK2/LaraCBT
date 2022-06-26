<?php

namespace App\Http\Livewire\Reports;

use App\Models\Instructor\Attendance;
use Livewire\Component;

class ReportDetails extends Component
{
    public $lesson_no;
    public $mia_course;
    public $lesson_notes;
    public $attendance;
    public $report;
    public $classReportDetails = false;

    protected $listeners = ['getClassReportDetails'];

    public function getClassReportDetails($classReportDetails)
    {
        $this->classReportDetails = true;
        $this->lesson_no = $classReportDetails['lesson_no'];
        $this->mia_course = $classReportDetails['mia_course'];
        $this->lesson_notes = $classReportDetails['lesson_notes'];
        $this->attendance = Attendance::find($classReportDetails['id']);
        
    }

    public function render()
    {
        return view('livewire.reports.report-details', [
            'report' => $this->report
        ]);
    }
}
