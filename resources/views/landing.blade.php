@extends('layouts/public')

@section('title', 'Laravel STL')

@section('content')

    <body class="bg-gray-100">
        <div class="px-8 py-12">
            <h1 class="text-center text-6xl text-gray-800">Laravel STL</h1>

            <h3 class="text-center text-4xl text-gray-800 mt-10">Meetups</h3>

            @auth
                Add new events here
            @endauth

            <table class="w-full mt-6 bg-white shadow-xl rounded-lg">
                <thead class="text-lg">
                <th class="pt-3">Date</th>
                <th class="pt-3">Location</th>
                <th class="pt-3">Time</th>
                <th class="pt-3">Topic</th>
                </thead>
                <tfoot style="display: table-row-group">
                <th class="p-2"><input type="text" class="form-input" placeholder="Choose Date" ></th>
                <th class="p-2"><input type="text" class="form-input" placeholder="Location" ></th>
                <th class="p-2"><input type="text" class="form-input" placeholder="Time" ></th>
                <th class="p-2"><input type="text" class="form-input" placeholder="Topic" ></th>
                </tfoot>
                <tbody>
                @forelse($events as $event)
                <tr class="text-center">
                    <td>{{$event->date->format('m/d/Y')}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->start_time->isoFormat('h:mm a')}} - {{$event->end_time->isoFormat('h:mm a')}}</td>
                    <td>{{$event->topic}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-3xl text-indigo-600">No events listed</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </body>


@endsection
