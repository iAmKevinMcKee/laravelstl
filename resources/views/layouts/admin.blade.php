<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') &dash; {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

    @if(auth()->user())
        <script>
            window.User = {!! auth()->user()->toJson() !!};
        </script>
    @endif
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->

</head>

<body class="leading-normal tracking-normal bg-gray-300" style="font-family: 'Source Sans Pro', sans-serif;">

<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 bg-stl-blue text-white">

    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

        <div class="pl-4 flex items-center">
            <a class="no-underline hover:no-underline font-bold text-2xl lg:text-4xl"  href="{{route('landing')}}">
                LARAVEL STL
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded  border-gray-600 hover:hover:border-teal-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center text-white">
                <li class="lg:mr-3 mb-2 lg:mb-0">
                    <a class="inline-block py-2 px-4 font-bold nav-links {{request()->segment(1) == 'events' ? 'underline' : 'no-underline'}}" href="{{route('events.index')}}">Events</a>
                </li>
                <li class="lg:mr-3 mb-2 lg:mb-0">
                    <a class="inline-block py-2 px-4 font-bold no-underline nav-links" href="{{route('slack-redirect')}}" target="_blank">Slack Channel</a>
                </li>
                <li class="lg:mr-3 mb-2 lg:mb-0">
                    <a id="navAction" href="{{route('meetup-redirect')}}" class="inline-block py-2 px-4 font-bold no-underline nav-links" target="_blank">Our Meetup</a>
                </li>
                <li class="lg:mr-3 mb-2 lg:mb-0">
                    <a id="navAction" href="{{route('admin.index')}}" class="inline-block py-2 px-4 font-bold no-underline nav-links">Admin</a>
                </li>
            </ul>
        </div>
    </div>

    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
@yield('content')

</body>

@yield('javascript')


<script>


    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;
    function check(e){
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {navMenuDiv.classList.add("hidden");}
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }
    function checkParent(t, elm) {
        while(t.parentNode) {
            if( t == elm ) {return true;}
            t = t.parentNode;
        }
        return false;
    }
</script>

</html>
