<div>
    <button wire:click="vote(1)" class="{{$userVote === 1 ? 'text-green-700 hover:text-green-600 focus:outline-none' :'text-blue-800 hover:text-blue-600  focus:outline-none'}}">
        @if($userVote === 1) 
            <i class="fas fa-check-circle cursor-pointer"></i>
             @else 
            <i class="fas fa-arrow-circle-up cursor-pointer"></i>
        @endif

    </button>
    <div class="text-4xl" wire:model="score">{{$score}}</div>
    <button wire:click="vote(-1)" class="{{$userVote === -1 ? 'text-red-700 hover:text-red-600 focus:outline-none' :'text-blue-800 hover:text-blue-600  focus:outline-none'}}">
      @if($userVote === -1) 
            <i class="fas fa-check-circle cursor-pointer"></i>
             @else 
            <i class="fas fa-arrow-circle-down cursor-pointer"></i>
        @endif 
    </button>
</div>
