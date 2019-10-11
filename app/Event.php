<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['date', 'start_time', 'end_time'];
    protected $guarded = [];

    public function event_votes()
    {
        return $this->hasMany(EventVote::class);
    }

    public function getScheduledAttribute()
    {
        if ($this->date) {
            return true;
        }
        return false;
    }

    public function getCompletedAttribute()
    {
        if (!is_null($this->date) && $this->date < now()->startOfDay()) {
            return true;
        }
        return false;
    }

    public function scopeCompleted($query)
    {
        return $query->whereDate('date', '<', now()->startOfDay());
    }

    public function scopeScheduled($query)
    {
        return $query->whereDate('date', '>=', now()->startOfDay());
    }
}
