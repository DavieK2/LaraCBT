<?php

namespace App\Http\Livewire\Reports;

use App\Models\Instructor\ClassReport;
use Livewire\Component;

class ReportList extends Component
{
    public $report;

    public function reportDetails($class_reportID)
    {
        $classReportDetails = ClassReport::find($class_reportID);
        $this->emit('getClassReportDetails', $classReportDetails);
    }

    public function render()
    {
        return view('livewire.reports.report-list');
    }
}
