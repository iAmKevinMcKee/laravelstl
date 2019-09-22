<div>
    <button wire:click="vote(1)" class="text-blue-800 hover:text-blue-600 focus:text-blue-600"><i class="fas fa-arrow-circle-up cursor-pointer"></i></button>
    <div class="text-4xl" wire:model="score">{{$score}}</div>
    <button wire:click="vote(-1)" class="text-blue-800 hover:text-blue-600 focus:text-blue-600"><i class="fas fa-arrow-circle-down cursor-pointer"></i></button>
</div>
