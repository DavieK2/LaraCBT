<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExamTimer extends Component
{
    public $examination;
    public $totalSeconds;
    public $seconds;
    public $minutes;
    public $hours;
    public $currentTime;
    public $endTime;
    public $interval;
    public $sessionEndTime;

    public function mount()
    {
        $this->minutes = $this->examination->time_remaining / 60;
        $this->currentTime = now();
        $this->endTime = now()->addMinutes($this->minutes);

        if(session()->has('data')){
            $this->endTime = session('data')['end_time'];
        }
        $this->setTimer($this->currentTime);  
    }
    
    public function setTimer($currentTime)
    {
        $interval = $this->endTime->diff($currentTime);
        $this->totalSeconds = ($interval->format('%i') + 1) * 60;
        $this->seconds = $this->totalSeconds % 60;
    }

    public function decrement()
    {
        session()->put(['data' => ['end_time' => $this->endTime]]);

        if($this->currentTime !== now()){
            $this->totalSeconds = strtotime($this->endTime) - strtotime(date('Y-m-d H:i:s'));
        }
        
        $this->minutes = intval($this->totalSeconds / 60);
        $this->seconds = intval($this->totalSeconds % 60);
       

        $this->totalSeconds--;
      
        $this->minutes = intval($this->totalSeconds / 60);
        $this->seconds = intval($this->totalSeconds % 60);

        $this->hours = intval($this->totalSeconds /  (60 * 60));
        $minutes = $this->totalSeconds - ($this->hours * 60 * 60);
        $this->minutes = intval($minutes / 60);

        if($this->totalSeconds <= 0){
            $this->minutes = 0;
            $this->seconds = 0;
            $this->totalSeconds = 0;
            $this->hours = 0;

            $this->examination->update(['status' => true]);

            $this->emitTo('examination', 'timeUp');
        }

        $data = [];
        $data['time_remaining'] = $this->totalSeconds;
        $this->examination->update($data);
    }

    
    
    public function render()
    {
        return view('livewire.exam-timer');
    }
}
