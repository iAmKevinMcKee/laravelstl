<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEventsController extends Controller
{
    public function index()
    {
        return view('admin.events.index');
    }
}
