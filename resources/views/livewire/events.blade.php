<div>
    <div>
        <div class="w-full flex">
            @auth
                <input wire:model.debounce.1ms="topic" wire:keydown.enter="addTopic" type="text" class="w-full md:w-5/6 border-2 text-blue-800 text-center
                px-4 py-3 text-xl bg-gray-100 border-r-0 rounded-r-none rounded-l-full
                focus:border-blue-800 focus:bg-white focus:outline-none" placeholder="Find a topic or add a new one">
                <button wire:click="addTopic" class="w-full md:w-1/6 bg-stl-red hover:opacity-75 rounded-r-full focus:outline-none">Add New Topic</button>
            @else
                <input wire:model.debounce.1ms="topic" type="text" class="w-full border-2 text-blue-800 text-center
                px-4 py-3 text-xl bg-gray-100 rounded-full
                focus:border-blue-800 focus:bg-white focus:outline-none" placeholder="Search for an Event or Topic">
            @endauth
        </div>
        @if($errors->has('topic'))
        <div class="w-full border-2 border-red-800 text-red-800 bg-red-200 p-4 mt-3">
            <span>{{ $errors->first('topic') }}</span>
        </div>
        @endif
        <div class="w-full flex mt-8">
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold" wire:click="$toggle('hideUnscheduled')"><i class="far {{$hideUnscheduled ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Unscheduled Events</button>
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold" wire:click="$toggle('hideScheduled')"><i class="far {{$hideScheduled ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Scheduled Events</button>
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold" wire:click="$toggle('hideCompleted')"><i class="far {{$hideCompleted ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Completed Events</button>

{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Completed Events</button>--}}
{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Scheduled Events</button>--}}
{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Unscheduled Events</button>--}}
        </div>
        <div class="w-full border-t-8 border-gray-400 mt-8 text-gray-800">
            @foreach($events as $event)
                <div class="w-full flex flex-wrap border-b-2 border-gray-200 py-4">
                    <div class="w-1/12 text-center text-2xl">
                        <div><i class="fas fa-arrow-circle-up cursor-pointer text-blue-800 hover:text-blue-600"></i></div>
                        <div class="text-4xl">{{$event->score}}</div>
                        <div><i class="fas fa-arrow-circle-down cursor-pointer text-blue-800 hover:text-blue-600"></i></div>
                    </div>
                    <div class="w-11/12 flex items-center text-4xl flex-col justify-center">
                        <div class="w-full flex align-center">{{$event->topic}} @if($event->video_url)<a href="{{$event->video_url}}" target="_blank" class="hover:text-blue-600 text-blue-800"><i class="fab fa-youtube ml-4"></i><span class="text-sm ml-1">Watch Video</span></a>@endif</div>
                        @if($event->scheduled || $event->completed)<div class="w-full text-xl text-stl-red">{{optional($event->date)->toFormattedDateString()}} - {{$event->speaker}}</div>@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
