<div class="relative" wire:transition.fade.300ms>
    <div class="modal-mask fixed inset-0 flex items-center justify-center">
        <button class="absolute top-0 right-0 mt-20 mr-20 text-gray-300 text-xl flex items-center"
            wire:click="stopEditing">
            <i class="fas fa-times"></i>
            <span class="ml-2">Close</span>
        </button>
        <div class="w-1/2 bg-white shadow-lg p-8 rounded z-10">
            <h3 class="text-xl mb-8">Manage User</h3>
            <div class="mb-4 flex items-center ">
                <label for="name" class="mr-2 w-32 text-right font-bold">Name:</label>
                <div class="p-2 border rounded w-full bg-gray-100">{{$userBeingEdited->name}}
                </div>
            </div>
            <div class="flex items-center mb-4 ">
                <label for="email" class="mr-2 w-32 text-right font-bold">Email:</label>
                <div type="text" class="p-2 border rounded w-full bg-gray-100">
                    {{$userBeingEdited->email}}
                </div>
            </div>
            <div class="flex items-center mb-4">
                <label for="role" class="mr-2 w-32 text-right font-bold">Role:</label>
                <select name="role" class="appearance-none w-full border p-2 rounded" wire:model="editedUser.role">
                    <option value="" disabled>Select Role ...</option>
                    <option value="admin" {{$userBeingEdited->role === "admin" ? "Selected" : ""}}>Admin</option>
                    <option value="member" {{$userBeingEdited->role === "member" ? "Selected" : ""}}>Member</option>
                </select>
            </div>
            <div class="flex items-center justify-end">
                <button class="underline text-gray-700 mr-8" wire:click="stopEditing">Cancel</button>
                <button
                    class="bg-blue-800 px-4 py-2 rounded focus:outline-none hover:bg-blue-600 text-white"
                    wire:click="saveUser">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>