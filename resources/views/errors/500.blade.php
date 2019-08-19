@extends('layouts/base')

@section('title', '500 Internal Server Error')
@section('show-header', false)

@section('content-full')
    <div class="h-full flex flex-col items-center justify-center text-center">
        <div class="font-semibold text-6xl text-gray-700">500</div>

        <div class="text-lg text-gray-600">Something went wrong</div>

        <div class="mt-6">
            <a class="text-blue-600 hover:text-blue-700 no-underline" href="/dashboard">&larr; Home</a>
        </div>
    </div>
@endsection

