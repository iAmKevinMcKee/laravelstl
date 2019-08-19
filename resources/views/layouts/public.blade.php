<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') &dash; {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @if(auth()->user())
        <script>
            window.User = {!! auth()->user()->toJson() !!};
        </script>
    @endif
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
@yield('content')

@yield('javascript')

</html>
