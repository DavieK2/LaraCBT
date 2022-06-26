<?php

namespace App\Http\Livewire\Instructor\Grades;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.instructor.grades.index', [

            'schools' => auth()->user()->schools()
                                        ->with(['grades' => fn($query) => $query->orderBy('class_name', 'asc')])
                                        ->paginate(15)
        ]);
    }
}
