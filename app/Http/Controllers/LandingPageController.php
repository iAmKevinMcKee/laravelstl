<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show()
    {
        $events = Event::all();
        return view('landing')
            ->with(compact('events'));
    }
}
