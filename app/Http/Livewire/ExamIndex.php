<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ExamIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.exam-index', [
            'exams' => auth()->user()->exams()->paginate(15)
        ]);
    }
}
