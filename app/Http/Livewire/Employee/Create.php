<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Role;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;


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

    public function mount()
    {
       
        $this->hire_date =  date('Y-m-d');

  
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }

    public function render()
    {
        abort_if(Gate::denies('create_employee'),403);
        $roles = Role::all();
        return view('livewire.employee.create' , compact('roles'));
    }

    public function saveEmp()
    {
      
 
        $validateDate= $this->validate();

        Employee::Create([
            'name_kh'=>$this->name_kh,
            'name_en'=>$this->name_en,
            'gender'=>$this->gender,
            'dob'=>$this->dob,
            'hire_date'=>$this->hire_date,
            'role_id'=>$this->role_id,
            'phone'=>$this->phone,
            'salary'=>$this->salary,
        ]);

        if(auth()->user()->lang=='en')
        {
            $this->alert('success', 'Inserted!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
            ]);
        }else
        {
            $this->alert('success', 'បញ្ចូលបានជោគជ័យ!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
            ]);
        }

        $this->reset();
        $this->hire_date =  date('Y-m-d');

    }

}
