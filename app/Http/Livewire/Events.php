<?php

namespace App\Http\Livewire;

use App\Event;
use Livewire\Component;

class Events extends Component
{
    public $topic = null;
    protected $allEvents;
    protected $events;
    public $hideUnscheduled = false;
    public $hideScheduled = false;
    public $hideCompleted = false;


    public function mount()
    {
        $this->allEvents = Event::with('event_votes')->get();
    }

    public function render()
    {
        $this->mapEvents();
        return view('livewire.events', [
            'events' => $this->events,
        ]);
    }

    public function addTopic()
    {
        $validatedData = $this->validate([
            'topic' => 'required|min:3|unique:events',
        ]);

        Event::create([
            'topic' => $validatedData['topic'],
            'created_by' => request()->user()->id,
        ]);

        $this->emit('showSuccess', $this->topic);

        $this->topic = null;

        $this->refreshEvents();
    }

    private function refreshEvents()
    {
        $this->allEvents = Event::all();
    }

    private function mapEvents()
    {
        $this->events = $this->allEvents;
        if ($this->topic) {
            $this->events = $this->events->filter(function ($event) {
                if (stristr($event->topic, $this->topic)) {
                    return $event;
                }
            });
        }
        if ($this->hideUnscheduled) {
            $this->events = $this->events->filter(function ($event) {
                if ($event->scheduled) {
                    return $event;
                }
            });
        }
        if ($this->hideScheduled) {
            $this->events = $this->events->filter(function ($event) {
                if (!$event->scheduled || $event->completed) {
                    return $event;
                }
            });
        }
        if ($this->hideCompleted) {
            $this->events = $this->events->filter(function ($event) {
                if (!$event->completed) {
                    return $event;
                }
            });
        }
    }
}
