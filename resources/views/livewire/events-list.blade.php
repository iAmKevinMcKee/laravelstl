<div class="w-full mt-10 bg-white shadow-xl rounded-lg border-t-8 border-teal-600">
    <table class="w-full">
        <thead class="text-lg cursor-pointer">
        <th class="pt-3" wire:click="$set('sortBy', 'topic')">Topic</th>
        <th class="pt-3" wire:click="$set('sortBy', 'location')">Location</th>
        <th class="pt-3" wire:click="$set('sortBy', 'date')">Date</th>
        <th class="pt-3" wire:click="$set('sortBy', 'start_time')">Time</th>
        </thead>
        <tfoot style="display: table-row-group">
        <th class="p-2"><input type="text" class="form-input" placeholder="Filter Topic" wire:model="topicFilter"></th>
        <th class="p-2"><input type="text" class="form-input" placeholder="Filter Location" wire:model="locationFilter"></th>
        <th class="p-2"><input type="text" class="form-input" placeholder="Filter Date" disabled></th>
        <th class="p-2"><input type="text" class="form-input" placeholder="Filter Time" disabled></th>
        </tfoot>
        <tbody>
        @forelse($events as $event)
            <tr class="text-center h-16 border-b-2">
                <td class="font-bold text-teal-800 uppercase">{{$event->topic}}@auth<button class="ml-2 bg-red-200 rounded px-2" wire:click="destroy({{$event->id}})">X</button>@endauth</td>
                <td>{{$event->location}}</td>
                <td>{{$event->date->format('m/d/Y')}}</td>
                <td>{{$event->start_time->isoFormat('h:mm a')}} - {{$event->end_time->isoFormat('h:mm a')}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-10 text-3xl text-teal-800">No events listed</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
