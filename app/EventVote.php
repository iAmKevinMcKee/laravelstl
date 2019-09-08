<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVote extends Model
{

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
