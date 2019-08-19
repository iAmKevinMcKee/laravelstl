<?php

namespace App\Http\Livewire;

use App\Event;
use Livewire\Component;

class EventsList extends Component
{
    private $events;
    public $topicFilter;
    public $locationFilter;
    public $sortBy = null;
    protected $listeners = ['addEvent' => 'render'];

    public function mount($events)
    {
        $this->events = $events;
    }

    public function render()
    {
        return view('livewire.events-list', [
            'events' => $this->getEvents(),
        ]);
    }

    private function getEvents()
    {
        return Event::where('topic', 'like', '%' . $this->topicFilter . '%')
            ->where('location', 'like', '%' . $this->locationFilter . '%')
            ->get()
            ->sortBy($this->sortBy);
    }

    private function refreshEvents()
    {
        $this->events = Event::all();
    }

    public function destroy($value)
    {
        Event::findorfail($value)->delete();
    }

}
