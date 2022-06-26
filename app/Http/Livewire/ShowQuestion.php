<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowQuestion extends Component
{
    public $questions;
    public $questionKey = 0;

    public function nextButton()
    {
        $this->questionKey ++;
    }

    public function render()
    {
        return view('livewire.show-question');
    }
}
