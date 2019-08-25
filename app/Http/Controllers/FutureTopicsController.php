<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FutureTopicsController extends Controller
{
    public function index()
    {
        return view('future_topics');
    }
}
