<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Event extends Component
{

    protected $event = null;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event', [
            'score' => $this->event->score
        ]);
    }

    public function incrementScore()
    {
        $this->event->score = $this->event->score + 1;
        $this->event->save();
    }

    public function decrementScore()
    {
        if ($this->event->score > 0) {
            $this->event->score = $this->event->score - 1;
            $this->event->save();
        }
    }
}
