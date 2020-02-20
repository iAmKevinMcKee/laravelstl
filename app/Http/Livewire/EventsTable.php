<?php

namespace App\Http\Livewire;

use App\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsTable extends Component
{
    use WithPagination;

    public $search = '';
    protected $events = [];
    protected $eventBeingEdited = null;
    public  $editedEvent = [];
    public $editEvent = false;

    protected $listeners = [
        'editEvent' => 'editEvent'
    ];


    public function mount($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $users = $this->searchEvents();
        return view('livewire.events-table', [
            'events' => $users,
            'eventBeingEdited' => $this->eventBeingEdited,
            'editEvent' => $this->editedEvent,
            'search' => $this->search
        ]);
    }

    public function searchEvents()
    {
        $search = $this->search;
        $this->events = Event::with('createdBy')
            ->where('topic', 'like', '%' . $search . '%')
            ->orWhere('speaker', 'like', '%' . $search . '%')
            ->orWhere('date',  'like', '%' . $search . '%')
            ->orWhere('video_url',  'like', '%' . $search . '%')
            ->orWhereHas('createdBy', function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
            })->paginate(10);

        return $this->events;
    }

    public function editEvent($event)
    {
        $this->editEvent = true;
        $this->eventBeingEdited = $this->events->where('id', $event)->first();
    }

    public function saveEvent()
    {
        foreach ($this->editedEvent as $key => $value) {
            $value = $value === "" ? NULL : $value;
            $this->eventBeingEdited[$key] = $value;
        }
        $this->eventBeingEdited->save();
        $this->stopEditing();
    }

    public function stopEditing()
    {
        $this->editEvent = false;
        $this->eventBeingEdited = [];
    }
}
