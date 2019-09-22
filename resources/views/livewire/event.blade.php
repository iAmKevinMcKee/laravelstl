<div>
    <button wire:click="vote(1)" class="{{$userVote === 1 ? 'text-green-700 hover:text-green-600 focus:text-green-600' :'text-blue-800 hover:text-blue-600 focus:text-blue-600'}}"><i class="fas fa-arrow-circle-up cursor-pointer"></i></button>
    <div class="text-4xl" wire:model="score">{{$score}}</div>
    <button wire:click="vote(-1)" class="{{$userVote === -1 ? 'text-green-700 hover:text-green-600 focus:text-green-600' :'text-blue-800 hover:text-blue-600 focus:text-blue-600'}}"><i class="fas fa-arrow-circle-down cursor-pointer"></i></button>
</div>
