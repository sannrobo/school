<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;



class Index extends Component
{
    public $text;
    public $isModalOpen=false;
    public $roles;
    public function render()
    {
        abort_if(Gate::denies('show_user'),403);
        $users = User::all();
        $this->roles = Role::all();

        return view('livewire.user.index' , ['roles'=>$roles,'users'=>$users]);
    }

    public function OpenModal()
    {
        $this->isModalOpen=true;
        $this->text='Save';

        dd($this->roles);
    }

    public function saveUser()
    {
        
        $this->isModalOpen=false;
    }
}
