<div class="relative" wire:transition.fade.300ms>
    <div class="modal-mask fixed inset-0 flex items-center justify-center">
        <div class="fixed w-full h-full flex items-center justify-center">
            <button class="absolute top-0 right-0 mt-20 mr-20 text-gray-300 text-xl flex items-center"
                wire:click="stopEditing">
                <i class="fas fa-times"></i>
                <span class="ml-2">Close</span>
            </button>
            <div class="bg-white shadow-lg rounded p-8 w-1/2">
                <h3 class="text-xl mb-8">Manage Event</h3>
                <div class="mb-4 flex items-center ">
                    <label for="name" class="mr-2 w-32 text-right font-bold">Name:</label>
                    <input type="text" class="p-2 border rounded w-full" wire:model="editedEvent.topic"
                        value="{{$eventBeingEdited->topic}}">
                </div>
                <div class="flex items-center mb-4 ">
                    <label for="email" class="mr-2 w-32 text-right font-bold">Date:</label>
                    <input type="date" class="p-2 border rounded w-full truncate" wire:model="editedEvent.date"
                        value="{{$eventBeingEdited->date->format('Y-m-d')}}">
                </div>
                <div class="flex items-center mb-4">
                    <label for="role" class="mr-2 w-32 text-right font-bold">Speaker:</label>
                    <input type="text" class="p-2 border rounded w-full" wire:model="editedEvent.speaker"
                        value="{{$eventBeingEdited->speaker}}">
                </div>
                <div class="flex items-center mb-4">
                    <label for="role" class="mr-2 w-32 text-right font-bold">Video URL:</label>
                    <input type="text" class="p-2 border rounded w-full" wire:model="editedEvent.video_url"
                        value="{{$eventBeingEdited->video_url}}">
                </div>
                <div class="flex items-center justify-end">
                    <button class="underline text-gray-700 mr-8" wire:click="stopEditing">Cancel</button>
                    <button
                        class="bg-blue-800 p-2 rounded focus:outline-none uppercase font-bold hover:bg-blue-600 text-white"
                        wire:click="saveEvent">
                        Save Event
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>