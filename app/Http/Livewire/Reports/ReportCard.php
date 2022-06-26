<?php

namespace App\Http\Livewire\Reports;

use App\Models\Instructor\ClassReport;
use Livewire\Component;

class ReportCard extends Component
{
    public $report;

    protected $listeners = ['refreshParent' => '$refresh'];

    public function editClassReport($classReportID)
    {
        $classReport = ClassReport::where('id', $classReportID)->first();
        $this->emit('class_report_data', $classReport); 
        $this->emit('reportUpdate'); 
    }


    public function render()
    {
        
        return view('livewire.reports.report-card', [
            'class_reports' => ClassReport::where('report_id', $this->report->id)->get()
        ]);
    }
}
