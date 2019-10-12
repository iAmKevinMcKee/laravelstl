<div class="bg-white rounded p-4">
    <div class="mb-4 flex">
        <input type="text" class="p-1 border rounded-l" placeholder="Search Users ..." wire:model.debounce.250ms="search" wire:keyup="searchUsers">
        <button class="p-1 bg-gray-300 rounded-r border" wire:click="searchUsers">Search</button>
    </div>
    <table class="table-auto w-full">
        <tr class="border-b">
            <th></th>
            @foreach($columns as $column)
            <th class="px-4 py-2 text-left">{{ucwords($column)}}</th>
            @endforeach
        </tr>
        @foreach($tableUsers as $user)
        <tr class="border-b">
            <td>
                <button class="h-8 w-8 text-gray-300">
                    <i class="fas fa-pen"></i>
                </button>
            </td>
            @foreach($columns as $column)
            <td class="px-4 py-2">{{$user[$column]}}</td>
            @endforeach
        </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->onEachSide(2)->links('layouts.paginate.tailwind') }}
    </div>
</div>