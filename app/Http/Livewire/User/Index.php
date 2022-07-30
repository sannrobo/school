<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $text;
    public $isModalOpen=false;
    public function render()
    {
        $users = User::all();

        
        return view('livewire.user.index' , compact('users'));
    }

    public function OpenModal()
    {
        $this->isModalOpen=true;
        $this->text='Save';
    }

    public function saveUser()
    {
        $this->isModalOpen=false;
    }
}
