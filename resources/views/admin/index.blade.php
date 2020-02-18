@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-20 py-8 px-4">
    <div class="sm:flex items-center justify-center">
        <a href="/admin/users" class="h-32 sm:w-64 w-full bg-white hover:bg-gray-600 hover:text-white rounded shadow-md p-4 sm:mr-16 mb-8 sm:mb-0 text-center block focus:outline-none">
            <div class="mb-6"><i class="fas fa-users text-5xl"></i></div>
            <span>
                Manage Users
            </span>
        </a>

        <a href="/admin/events" class="h-32 sm:w-64 w-full bg-white hover:bg-gray-600 hover:text-white rounded shadow-md p-4 text-center block focus:outline-none" >
            <div class="mb-6"><i class="fas fa-comments text-5xl"></i></div>
            <span>
                Manage Events
            </span>
        </a>
    </div>
</div>
@endsection