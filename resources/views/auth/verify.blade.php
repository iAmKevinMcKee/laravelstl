@extends('layouts/base')

@section('title', 'Verify your email')
@section('show-header', false)

@section('content-full')
    <div class="min-h-full h-full bg-gray-100 flex flex-col items-center overflow-auto">
        <div class="p-0 m-auto max-w-md w-full">
            <div class="m-6 sm:m-10">
                <div class="text-xl text-center">
                    <a class="text-gray-700 hover:text-gray-800 no-underline" href="/">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="mt-8 bg-white rounded-lg">
                    <div class="h-3 block rounded-t-lg w-full bg-blue-500"></div>

                    <div class="w-full rounded-b-lg shadow-xl text-center">
                        <div class="p-8 text-gray-700">Verify your email</div>

                        <div class="px-8 text-gray-600 max-w-xs mx-auto">
                            @if (session('resent'))
                                <p>We have just sent you a fresh verification link!</p>
                            @else
                                <p>You must verify your email! Check your email for a link.</p>
                            @endif
                        </div>

                        <div class="mt-6 px-8 py-6 bg-gray-100 text-gray-600 text-sm text-center rounded-b-lg">
                            Didn't get the email?
                            <a tabindex="1" class="font-semibold text-gray-700 no-underline hover:underline" href="{{ route('verification.resend') }}">Resend it</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection