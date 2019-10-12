<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    protected $users = [];
    protected $tableUsers = [];
    protected $columns = ['name', 'email', 'role'];
    protected $paginate = [];
    public $search = '';

    public function mount()
    {
        $this->users = User::paginate(5);
        $this->paginate = $this->users;
        $this->tableUsers = $this->users;
    }

    public function render()
    {
        return view(
            'livewire.users-table',
            [
                'users' => $this->users,
                'tableUsers' => $this->tableUsers,
                'paginate' => $this->paginate,
                'columns' => $this->columns,
            ]

        );
    }

    public function searchUsers()
    {
        if ($this->search === '') {
            $this->tableUsers = $this->users;
            return;
        }

        $this->tableUsers = $this->users->filter(function ($user) {
            return strpos(strtolower($user->name), strtolower($this->search)) !== false ||
                strpos(strtolower($user->email), strtolower($this->search)) !== false  ||
                strpos(strtolower($user->role), strtolower($this->search)) !== false;
        });
    }
}
