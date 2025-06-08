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

    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    // Pour reinitialiser le numero de la page 
    public function updatedSearch(){
        $this->resetPage();
    }

    // Pour reinitialiser le numero de la page
    public function updatedPerpage(){
        $this->resetPage();
    }

    public function updatedIsAdmin(){
        $this->resetPage();
    }

    public function setSortBy($sortByField){
        if ($this->sortBy === $sortByField) {
            
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.user-table',
            [
                'users' => User::search($this->search)
                ->when($this->is_admin !== '', function($query){
                    $query->where('role', $this->is_admin);
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perpage)
            ]
        );
    }
}
