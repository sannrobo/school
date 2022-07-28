<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $isModalOpen = false;
    public $rolename;
    public $text='';
    public $roleid;
    public $role ; 

    protected $listeners = [
        'confirmed'
    ];

    public function paginationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {


        $roles = Role::paginate(10);
        return view('livewire.role.index' , compact('roles'));
    }

    public function OpenModal()
    {
        $this->isModalOpen=true;
        $this->text = 'Save';
       
    }


    public function save()
    {
        dd('here');
    }

    protected $rules = [
        'rolename' => 'required',
        
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if(!$this->isModalOpen)
        {
            $this->rolename='';
        }
    }

    public function saveRole()
    {
        $validatedData = $this->validate();
        $role= new Role();
        $role->title = $this->rolename;
        $role->save();




        $this->isModalOpen = false;

        $this->rolename='';

        $this->alert('success', 'Saved!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
         
           ]);


        return redirect()->route('roles.assign',['id' => $role->id]);
    }

    public function Edit($id)
    {
        $this->isModalOpen=true ; 
        $role = Role::find($id);
        $this->roleid = $id;
        $this->rolename = $role->title;
      $this->text = 'Update';

    }
    public function updateRole()
    {
        $validatedData = $this->validate();
        $role = Role::find($this->roleid);
        $role->title = $this->rolename;
        $role->save();
        $this->alert('success', 'Updated!', [
            'position' => 'Center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
           ]);
        $this->isModalOpen=false ; 
     

    }

    public function deleteConfirm($id)
    {

        $this->role = Role::FindOrFail($id);
        $this->alert('warning', '', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'text' => 'Do you want to delete ? ',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'onDismissed' => '',
            'confirmButtonText' => 'Delete',
            'cancelButtonText' => 'No',
           ]);
    }

    public function confirmed()
    {

        $this->role->delete();
        $this->alert('success', 'Deleted!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
           ]);
    }




}
