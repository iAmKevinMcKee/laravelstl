@extends('layouts/admin')

@section('title', 'Events')

@section('content')

    <!--Hero-->

    <div class="container mx-auto pt-32 py-8 px-4">
        <h2 class="text-2xl">Manage Users</h2>

        <div class="mt-8">
            @livewire('user-table', $users)
        </div>
        
    </div>

    @livewireAssets
@endsection
