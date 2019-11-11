<div>
    <div class="bg-white rounded p-8 shadow-lg overflow-hidden">
        <div class="mb-4 flex">
            <input type="text" class="p-1 border rounded-l w-64" placeholder="Search Events ..."
                wire:model.debounce.250ms="search" wire:keyup="searchEvents">
        </div>
        <div class="overflow-x-scroll">
            <table class="table-auto w-full">
                <tr class="border-b">
                    <th></th>
                    <th class="px-4 py-2 text-left">Topic</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Speaker</th>
                    <th class="px-4 py-2 text-left">Video URL</th>
                    <th class="px-4 py-2 text-left">Created By</th>
                </tr>
                @foreach($events as $event)
                <tr class="border-b">
                    <td>
                        <button class="h-8 w-8 text-gray-300" wire:click="$emit('editEvent', '{{$event->id}}')">
                            <i class="fas fa-pen"></i>
                        </button>
                    </td>
                    <td class="px-4 py-2">{{$event->topic}}</td>
                    <td class="px-4 py-2">{{$event->date ? $event->date->format('Y-m-d') : 'Not Scheduled Yet'}}</td>
                    <td class="px-4 py-2">{{$event->speaker}}</td>
                    <td class="px-4 py-2">{{$event->video_url}}</td>
                    <td class="px-4 py-2">{{$event->createdBy->name}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-4">
            {{ $events->links('layouts.paginate.tailwind') }}
        </div>

        @if($editEvent)
        @include('livewire._editEventModal')
        @endif
    </div>
</div>