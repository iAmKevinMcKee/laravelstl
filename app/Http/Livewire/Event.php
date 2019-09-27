<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Event extends Component
{
    public $score = null;
    public $userVote = null;
    protected $event = null;

    public function mount($event)
    {
        $this->event = $event;
        $this->score = $this->event->event_votes->sum('value');
        if (auth()->check()) {
            $this->userVote = $this->currentUserVote();
        }
    }

    public function render()
    {
        return view('livewire.event', [
            'userVote' => $this->userVote
        ]);
    }

    private function refreshEvent()
    {
        $this->event = $this->event->fresh(['event_votes']);
        $this->score = $this->event->event_votes->sum('value');
        $this->userVote = $this->currentUserVote();
    }

    public function vote($value)
    {
        if (!auth()->check()) {
            return  $this->redirect('/register');
        }

        $existing = $this->event->event_votes->where('user_id', auth()->user()->id)->first();
        if (isset($existing) && $existing->value === $value) {
            $existing->delete();
        }

        if (isset($existing) && $existing->value != $value) {
            $existing->value = $value;
            $existing->save();
        }

        if (empty($existing)) {
            $this->event->event_votes()->create([
                'user_id' => auth()->user()->id,
                'value' => $value,
            ]);
        }
        $this->refreshEvent();
    }

    protected function currentUserVote()
    {
        $vote = $this->event->event_votes->where('user_id', auth()->user()->id);

        if ($vote->count() === 0) {
            return null;
        }
        return $this->event->event_votes->where('user_id', auth()->user()->id)->first()->value;
    }
}
