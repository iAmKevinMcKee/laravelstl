<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuccessMessage extends Component
{
    public $visible = false;
    public $message = '';

    protected $listeners = ['showSuccess' => 'show'];

    public function render()
    {
        return view('livewire.success-message');
    }

    public function show($value)
    {
        $this->message = 'You successfully added ' . $value;
        $this->visible = true;
    }
}
