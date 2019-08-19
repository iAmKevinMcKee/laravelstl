<div>
    <h3 class="text-2xl text-indigo-600">Create a New Event</h3>
    <div class="bg-white p-6 flex flex-wrap shadow-xl rounded-lg border-t-8 border-teal-600" wire:keydown.enter="saveEvent">
        <div class="md:w-1/2 pr-3 mb-3">
            <input type="text" class="form-input mb-2" placeholder="Topic" wire:model.debounce.200ms="topic">
            @if($errors->has('topic'))
                <span class="text-red-500 text-xs">{{ $errors->first('topic') }}</span>
            @endif
        </div>
        <div class="md:w-1/2 pl-3 mb-3">
            <input type="text" class="form-input mb-2" placeholder="Location" wire:model.debounce.200ms="location">
            @if($errors->has('location'))
                <span class="text-red-500 text-xs">{{ $errors->first('location') }}</span>
            @endif
        </div>
        <div class="w-full md:w-1/3 pr-3 mb-3">
            <input type="date" class="form-input mb-2" placeholder="Choose Date" wire:model.debounce.200ms="date">
            @if($errors->has('date'))
                <span class="text-red-500 text-xs">{{ $errors->first('date') }}</span>
            @endif
        </div>
        <div class="w-full md:w-1/3 px-3">
            <input type="text" class="form-input mb-2" placeholder="Start Time" wire:model.debounce.200ms="startTime">
            @if($errors->has('startTime'))
                <span class="text-red-500 text-xs">{{ $errors->first('startTime') }}</span>
            @endif
        </div>
        <div class="w-full md:w-1/3 pl-3">
            <input type="text" class="form-input mb-2" placeholder="End Time" wire:model.debounce.200ms="endTime">
            @if($errors->has('endTime'))
                <span class="text-red-500 text-xs">{{ $errors->first('endTime') }}</span>
            @endif
        </div>
        <button wire:click="saveEvent" class="px-5 py-3 rounded-lg shadow-lg bg-teal-500 hover:bg-teal-600 text-teal-100">
            Create New Event
        </button>
    </div>


</div>
