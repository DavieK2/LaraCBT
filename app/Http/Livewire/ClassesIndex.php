<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;

class ClassesIndex extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.classes-index', [
            'schools' => auth()->user()->school()->with('class')->paginate(15)
        ]);
    }
}
