<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        $users = User::all();

        
        return view('livewire.user.index' , compact('users'));
    }
}
