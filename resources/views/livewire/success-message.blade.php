<div>
    @if($visible)
    <div wire:transition.fade.750ms class="w-full bg-green-200 border-2 border-green-800 text-green-800 p-4 mb-4 flex justify-between">
        <div>You did it! {{$message}}</div>
        <div wire:click="$set('visible', false)" class="cursor-pointer">
            <i class="fa fa-window-close" aria-hidden="true"></i>
        </div>
    </div>
    @endif
</div>
