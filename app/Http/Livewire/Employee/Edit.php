<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $emp_id;
    public $name_kh;
    public $name_en;
    public $dob;
    public $phone;
    public $salary;
    public $hire_date;
    public $gender;
    public $role_id;

    
    protected $rules=[
        'name_kh' => 'required|min:4'   ,    
        'name_en' => 'required|min:4'   ,     
        'gender' => 'required'   ,   
        'dob' => 'required|date'   ,   
        'hire_date' => 'required|date'   ,   
        'salary'=>'required'
    ];

    protected $messages = [
        'name_kh.required' => 'Required',
        'name_kh.min' => 'Atleast 4 chacrater',
        'name_en.required' => 'Required',
        'name_en.min' => 'Atleast 4 chacrater',
        'gender.required'=>'Choose',
        'dob.required' => 'Date Of Birth',
        'dob.date'=>'Date of birth invalid format',
        'hire_date.date'=>'Date of birth invalid format',
        'hire_date.required' => 'Date Of Birth',
        'salary'=>'required'



    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }
    public function render()
    { abort_if(Gate::denies('update_employee'),403);
        $roles = Role::all();
        return view('livewire.employee.edit',compact('roles'));
    }

    public function mount($id)
    {
        $this->emp_id = $id;
        $emp = Employee::findOrFail($id);
        $this->name_kh = $emp->name_kh;
        $this->name_en = $emp->name_en;
        $this->dob = $emp->dob;
        $this->phone = $emp->phone;
        $this->gender = $emp->gender;
        $this->hire_date = $emp->hire_date;
        $this->role_id = $emp->role_id;
        $this->salary = $emp->salary;



    }

    public function updateEmp()
    {
        $validateDate= $this->validate();
        $emp = Employee::findOrFail($this->emp_id);

        $emp->name_kh =  $this->name_kh  ;
        $emp->name_en =  $this->name_en  ;
        $emp->dob =  $this->dob ;
        $emp->phone = $this->phone;
        $emp->gender = $this->gender;
        $emp->hire_date = $this->hire_date;
        $emp->role_id = $this->role_id ;
        $emp->salary = $this->salary ;
       $emp->save();

       if(auth()->user()->lang=='en')
       {
           $this->alert('success', 'Updated!', [
               'position' => 'center',
               'timer' => '1000',
               'toast' => false,
               'timerProgressBar' => true,
               'width' => '300',
           ]);
       }else
       {
           $this->alert('success', 'កែប្រែបានជៅគជ័យ!', [
               'position' => 'center',
               'timer' => '1000',
               'toast' => false,
               'timerProgressBar' => true,
               'width' => '300',
           ]);
       }

       redirect()->route('emp.index');
    }
}
