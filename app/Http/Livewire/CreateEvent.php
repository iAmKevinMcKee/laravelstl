<?php

namespace App\Http\Livewire;

use App\Event;
use Carbon\Carbon;
use Livewire\Component;

class CreateEvent extends Component
{
    public $topic;
    public $date;
    public $location;
    public $startTime;
    public $endTime;

    public function saveEvent()
    {
        $validatedData = $this->validate([
            'topic' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i',
        ]);

        // Execution doesn't reach here if validation fails.

        $date = Carbon::parse($validatedData['date']);

        Event::create([
            'topic' => $validatedData['topic'],
            'location' => $validatedData['location'],
            'date' => $date,
            'start_time' => $date->copy()->setTimeFromTimeString($validatedData['startTime']),
            'end_time' => $date->copy()->setTimeFromTimeString($validatedData['endTime']),
            'created_by' => request()->user()->id,
        ]);

        $this->resetForm();
        $this->emit('addEvent');
    }

    public function render()
    {
        return view('livewire.create-event');
    }

    private function resetForm()
    {
        $this->topic = null;
        $this->date = null;
        $this->location = null;
        $this->startTime = null;
        $this->endTime = null;
    }
}
