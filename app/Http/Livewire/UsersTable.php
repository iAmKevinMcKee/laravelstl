<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';
    protected $users = [];
    protected $userBeingEdited = null;
    public  $editedUser = [];
    public $editUser = false;

    protected $listeners = [
        'editUser' => 'editUser'
    ];


    public function mount($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $users = $this->searchUsers();
        return view('livewire.users-table', [
            'users' => $users,
            'userBeingEdited' => $this->userBeingEdited,
            'editUser' => $this->editedUser,
            'columns' => ['name', 'email', 'role'],
            'search' => $this->search
        ]);
    }

    public function searchUsers()
    {
        $this->users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return $this->users;
    }

    public function editUser($user)
    {
        $this->editUser = true;
        $this->userBeingEdited = $this->users->where('id', $user)->first();
    }

    public function saveUser()
    {
        $this->userBeingEdited->role = $this->editedUser['role'];
        $this->userBeingEdited->save();
        $this->stopEditing();
    }

    public function stopEditing()
    {
        $this->editUser = false;
        $this->userBeingEdited = [];
    }
}
