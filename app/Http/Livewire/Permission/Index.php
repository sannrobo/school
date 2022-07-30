<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use App\Models\Slug;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    public $per=[];
    public $roleid;
    public function render()
    {
       
        $slugs = Slug::with('permissions')->get();
        
        return view('livewire.permission.index', compact('slugs'));
    }

    public function updated($key ,$value)
    {
       
        $this->per[$value] = $value;
        $role = Role::find($this->roleid);

        $role->permissions()->sync($this->per);
        
    }

    public function mount($id)
    {
        
        $role = Role::find($id);
        $this->roleid = $id ; 

        foreach($role->permissions as $permission)
        {
            $this->per[$permission->id] = $permission->id;
        }

       
    }
}
