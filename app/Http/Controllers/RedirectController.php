<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function slack()
    {
        return redirect('https://join.slack.com/t/laravelstl/shared_invite/enQtNzM1NTU4MTQ0NTQ0LWQxYjRiYTQxYzY3MGNjNjE2N2MwNDFiNmY0N2E0MmZhMzk0ODFmM2UzNzQyNGM1Yjg0NjA2NWVlOGE4OGU3ZGQ');
    }

    public function meetup()
    {
        return redirect('https://www.meetup.com/Laravel-STL/');
    }
}
