<div>
    <button wire:click="incrementScore" class="text-blue-800 hover:text-blue-600 focus:text-blue-600"><i class="fas fa-arrow-circle-up cursor-pointer"></i></button>
    <div class="text-4xl">{{$score}}</div>
    <button wire:click="decrementScore" class="text-blue-800 hover:text-blue-600 focus:text-blue-600"><i class="fas fa-arrow-circle-down cursor-pointer"></i></button>
</div>
