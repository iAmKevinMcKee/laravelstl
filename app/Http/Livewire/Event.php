<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Event extends Component
{
    public $score = null;
    protected $event = null;

    public function mount($event)
    {
        $this->event = $event;
        $this->score = $this->event->event_votes->sum('value');
    }

    public function render()
    {
        return view('livewire.event');
    }

    public function vote($value)
    {
        //checkfor existing vote
        $existing = $this->event->event_votes->where('user_id', auth()->user()->id)->first();
        if (isset($existing) && $existing->value === $value) {
            return $this->deleteExisting($existing, $value);
        }

        //if existing and different value
        if (isset($existing) && $existing->value != $value) {
            $existing->value = $value;
            $existing->save();
            $this->score = \App\Event::with('event_votes')->where('id', $this->event->id)->first()->event_votes->sum('value');
            return;
        }

        //add new vote
        if (empty($existing)) {
            $this->event->event_votes()->create([
                'user_id' => auth()->user()->id,
                'value' => $value,
            ]);
            $this->score = \App\Event::with('event_votes')->where('id', $this->event->id)->first()->event_votes->sum('value');
            return;
        }
    }

    protected function existingVote()
    {
        return $this->event->event_votes->where('user_id', auth()->user()->id)->first();
    }

    protected function deleteExisting($existing)
    {
        $existing->delete();
        $this->score = \App\Event::with('event_votes')->where('id', $this->event->id)->first()->event_votes->sum('value');
    }
}
