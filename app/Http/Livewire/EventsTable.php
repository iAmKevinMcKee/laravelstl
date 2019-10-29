<?php

namespace App\Http\Livewire;

use App\Event;
use Carbon\Carbon;
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
        $regex = "/^\d\d?\/\d\d?\/\d\d\d\d\$|^\d\d\d\d-\d\d?-\d\d?\$/";
        $carbon = '';
        if (preg_match($regex, $this->search, $matches)) {
            $carbon = Carbon::parse($this->search)->format('Y-m-d');
        }

        $this->events = Event::with('createdBy')
            ->where('topic', 'like', '%' . $this->search . '%')
            ->orWhere('speaker', 'like', '%' . $this->search . '%')
            ->orWhere(function ($q) use ($carbon) {
                $q->where('date',  'like', $carbon);
            })
            ->paginate(10);

        return $this->events;
    }

    public function editEvent($event)
    {
        $this->editEvent = true;
        $this->eventBeingEdited = $this->events->where('id', $event)->first();
    }

    public function saveEvent()
    {
        $this->eventBeingEdited->topic = $this->editedEvent['topic'];
        $this->eventBeingEdited->save();
        $this->stopEditing();
    }

    public function stopEditing()
    {
        $this->editEvent = false;
        $this->eventBeingEdited = [];
    }
}
