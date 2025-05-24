<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $perpage = 5;
    public $search = '';
    public $is_admin = '';

    public function render()
    {
        return view('livewire.user-table',
            [
                'users' => User::search($this->search)
                ->when($this->is_admin !== '', function($query){
                    $query->where('role', $this->is_admin);
                })
                ->paginate($this->perpage)
            ]
        );
    }
}
