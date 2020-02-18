@extends('layouts/admin')

@section('title', 'Manage Users')

@section('content')

    <!--Hero-->

    <div class="container mx-auto pt-32 py-8 px-4">
        <h2 class="text-2xl">Manage Users</h2>

        <div class="mt-8">
            @livewire('users-table', $search = request()->query('search'))
        </div>
        
    </div>

    @livewireAssets
@endsection
