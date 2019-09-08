<?php

namespace App\Http\Livewire;

use App\Event;
use Livewire\Component;

class Events extends Component
{
    protected $allEvents;
    protected $events;
    public $topic;
    public $hideScheduled = false;
    public $hideCompleted = false;
    public $hideUnscheduled = false;

    public function mount()
    {
        $this->allEvents = Event::all();
        $this->events = $this->allEvents;
    }

    public function render()
    {
        $this->mapEvents();
        return view('livewire.events', ['events' => $this->events]);
    }

    public function addEvent()
    {
        Event::create([
            'topic' => $this->topic,
            'created_by' => request()->user()->id,
        ]);

        $this->topic = null;
    }

    private function mapEvents()
    {
        $this->events = $this->allEvents;
        if($this->hideScheduled) {
            $this->events = $this->events->filter(function($event) {
                if (!$event->scheduled) {
                    return $event;
                }
            });
        }
        if($this->hideCompleted) {
            $this->events = $this->events->filter(function($event) {
                if (!$event->completed) {
                    return $event;
                }
            });
        }
        if($this->hideUnscheduled) {
            $this->events = $this->events->filter(function($event) {
                if ($event->scheduled) {
                    return $event;
                }
            });
        }
    }
}
