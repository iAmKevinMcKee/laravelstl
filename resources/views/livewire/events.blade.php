<div>
    <div>
        <div class="w-full flex">
            @auth
                <input wire:model.debounce.1ms="topic" wire:keydown.enter="addTopic" type="text" class="w-full md:w-5/6 border-2 text-blue-800 text-center
                px-4 py-3 text-xl bg-gray-100 border-r-0 rounded-r-none rounded-l-full
                focus:border-blue-800 focus:bg-white focus:outline-none" placeholder="Find a topic or add a new one">
                <button wire:click="addTopic" class="w-full md:w-1/6 bg-stl-red hover:bg-red-800 focus:bg-red-800 rounded-r-full focus:outline-none">Add New Topic</button>
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
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold hover:bg-blue-600" wire:click="$toggle('hideUnscheduled')"><i class="far {{$hideUnscheduled ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Unscheduled Events</button>
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold hover:bg-blue-600" wire:click="$toggle('hideScheduled')"><i class="far {{$hideScheduled ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Scheduled Events</button>
            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold hover:bg-blue-600" wire:click="$toggle('hideCompleted')"><i class="far {{$hideCompleted ? 'fa-check-square' : 'fa-square'}} mr-1"></i> Hide Completed Events</button>

{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Completed Events</button>--}}
{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Scheduled Events</button>--}}
{{--            <button class="bg-blue-800 p-2 rounded-lg flex-1 mx-3 focus:outline-none uppercase font-bold"><i class="far fa-check-square mr-1"></i> Hide Unscheduled Events</button>--}}
        </div>
        <div class="w-full border-t-8 border-gray-400 mt-8 text-gray-800">
            @foreach($events as $event)
                @livewire('event', $event, key($event->id))
            @endforeach
        </div>
    </div>
</div>
