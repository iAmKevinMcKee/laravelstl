<div>
    <div class="w-full flex flex-wrap border-b-2 border-gray-200 py-4">
        <div class="w-1/12 text-center text-2xl">
            <button wire:click="vote(1)" class="{{$userVote === 1 ? 'text-green-700 hover:text-green-600 focus:outline-none' :'text-blue-800 hover:text-blue-600 focus:outline-none'}}">
                @if($userVote === 1)
                    <i class="fas fa-check-circle cursor-pointer"></i>
                @else
                    <i class="fas fa-arrow-circle-up cursor-pointer"></i>
                @endif

            </button>
            <div class="text-4xl">{{$score}}</div>
            <button wire:click="vote(-1)" class="{{$userVote === -1 ? 'text-stl-red hover:text-red-600 focus:outline-none' :'text-blue-800 hover:text-blue-600 focus:outline-none'}}">
                @if($userVote === -1)
                    <i class="fas fa-check-circle cursor-pointer"></i>
                @else
                    <i class="fas fa-arrow-circle-down cursor-pointer"></i>
                @endif
            </button>
        </div>
        <div class="w-9/12 flex items-center text-4xl flex-col justify-center">
            <div class="w-full flex align-center">{{$event->topic}}</div>
            @if($event->scheduled || $event->completed)<div class="w-full text-xl text-stl-red">{{optional($event->date)->toFormattedDateString()}} - {{$event->speaker}}</div>@endif
        </div>
        @if($event->video_url)
            <div class="w-1/6 flex justify-center align-content-center">
                <a href="{{$event->video_url}}" target="_blank" class="hover:text-blue-600 text-blue-800 flex flex-col justify-center">
                    <i class="fab fa-youtube self-center text-5xl"></i>
                    <span class="text-sm self-center text-lg">Watch Video</span>
                </a>
            </div>
        @endif
    </div>
</div>
