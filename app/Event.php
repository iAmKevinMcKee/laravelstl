<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['date', 'start_time', 'end_time'];
    protected $guarded = [];

//    public function getStartTimeAttribute($value) {
//        return $value->format('hh:mm');
//    }
}
