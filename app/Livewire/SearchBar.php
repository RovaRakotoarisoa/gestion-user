<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

class SearchBar extends Component
{
    public $search = "";
    public function render()
    {
        $results = [];
        if(strlen($this->search) >= 1){
            $results = User::where('name','like', '%'.$this->search.'%')->limit(7)->get();
        }

        return view('livewire.search-bar',[
            'users' => $results
        ]);
    }
}
