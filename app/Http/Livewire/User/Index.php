<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;






class Index extends Component
{   
    
    use LivewireAlert;

    public $text;
    public $isModalOpen=false;
    public $show;
    public $fullname;
    public $email;
    public $roleid;
    public $cfpassword;
    public $password;
    public $userid;
    public $updatePass=false;
    public $isResetPass=false;
    public $newpass;





    protected $rules = [
        'fullname' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'cfpassword'=>'same:password',
        'roleid'=>'required',
        'newpass'=>'required|min:6'
        
    ];
    protected $listeners = [
        'confirmed'
    ];

    protected $messages = [
        'email.required' => 'The Email must be required.',
        'email.email' => 'The Email format is not valid.',
        'email.unique' => 'The Email is already used.',
        'fullname.required'=>'The Name must be required.',
        'fullname.min'=>'The Name at atleast 4 character.',
        'password.required' => 'The Password must be required.',
        'password.min'=>'The Password at atleast 6 character.',
        'cfpassword.same'=>'The Confirm Password must the same password.',
        'roleid.required'=>'Please Select Role Name.',
        'newpass.required' =>'New Password is required',
        'newpass.min'=>'The New Password at atleast 6 character'


    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);


    }
    public function render()
    {
        abort_if(Gate::denies('show_user'),403);
        $users = User::all();
        $roles = Role::all();
        

        return view('livewire.user.index' , compact('users','roles'));
    }

    public function OpenModal()
    {
        $this->isModalOpen=true;
        $this->text='Save';

      
    }

    public function saveUser()
    {
        abort_if(Gate::denies('create_user'),403);
        
        $validateData = $this->validate();
        $user=User::create([
            'name'=>$this->fullname,
            'email'=>$this->email,
            'password'=>hash::make($this->password)
        ]);
        $user->roles()->sync($this->roleid); 
        $this->isModalOpen=false;
        $this->alert('success', 'User has created!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
         
           ]);
           $this->reset();
    }

    public function showPass()
    {
        $this->show = !$this->show;

    
    }

    public function deleteConfirm($id)
    {
       $this->userid=User::findOrFail($id);
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
        $this->userid->delete();
        $this->alert('success', 'Deleted!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
    }

    public function Edit($id)
    {
        $this->isModalOpen=true ; 
        $user = User::find($id);
        $this->userid = $id;
        $this->fullname = $user->name;
        $this->email = $user->email;
        $this->updatePass=true;
        foreach($user->roles as $newrole)
        {
            $this->roleid = $newrole->id;
        }

     
      $this->text = 'Update';

    }
    public function updateUser()
    {
        
     
     $u= User::findOrFail($this->userid);
    $u->name = $this->fullname;
    $u->email = $this->email;
    $u->save();
    $u->roles()->sync($this->roleid);
        $this->alert('success', 'Updated!', [
            'position' => 'Center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
           ]);
        $this->isModalOpen=false ; 
     

    }

    public function editUserPass($id)
    {
        $this->isResetPass=true;
        $this->userid = $id;
        $this->reset('newpass');

    }

    public function ResetPass()
    {

        $u = User::FindOrFail($this->userid);
        $u->password = hash::make($this->newpass);
        $u->save();
       
        $this->alert('success', 'Updated!', [
            'position' => 'Center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
           ]);

        $this->isResetPass=false;
    

       
          

    }


}
