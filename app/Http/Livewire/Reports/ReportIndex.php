<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Instructor\Report;

class ReportIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        if(auth()->user()->role == 'admin'){

            $reports = auth()->user()->report();
  
          }else{
  
            $reports = auth()->user()->report();
          }
         
        return view('livewire.reports.report-index', [
            'reports' => $reports->paginate(15)
        ]);
    }
}
