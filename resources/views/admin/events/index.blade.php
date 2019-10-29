@extends('layouts/admin')

@section('title', 'Manage Events')

@section('content')

    <!--Hero-->

    <div class="container mx-auto pt-32 py-8 px-4">
        <h2 class="text-2xl">Manage Events</h2>

        <div class="mt-8">
            @livewire('events-table', $search = request()->query('search'))
        </div>
        
    </div>

    @livewireAssets
@endsection
