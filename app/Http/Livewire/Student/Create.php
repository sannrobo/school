<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public $st_name_kh;
    public $st_name_en;
    public $st_gender;
    public $st_dob;
    public $st_phone;
    public $st_address;
    public $mt_name_kh;
    public $mt_name_en;
    public $mt_job;
    public $mt_phone;
    public $ft_name_kh;
    public $ft_name_en;
    public $ft_job;
    public $ft_phone;

    protected $rules=[
        'st_name_kh' => 'required|min:4'   ,    
        'st_name_en' => 'required|min:4'   ,     
        'st_gender' => 'required'   ,   
        'st_dob' => 'required|date'   ,   
    ];

    protected $messages = [
        'st_name_kh.required' => 'Required',
        'st_name_kh.min' => 'Atleast 4 chacrater',
        'st_name_en.required' => 'Required',
        'st_name_en.min' => 'Atleast 4 chacrater',
        'st_gender.required'=>'Choose',
        'st_dob.required' => 'Date Of Birth',
        'st_dob.date'=>'Date of birth invalid format',



    ];

    public function render()
    {
        return view('livewire.student.create');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }

    public function saveStudent()
    {
        $validate= $this->validate();

        $student = [
            
                'st_name_kh'=>$this->st_name_kh,
                'st_name_en'=>$this->st_name_en,
                'st_gender'=>$this->st_gender,
                'st_dob'=>$this->st_dob,
                'phone'=>$this->st_phone,
                'address'=>$this->st_address,
                'mt_name_kh'=>$this->mt_name_kh,
                'mt_name_en'=>$this->mt_name_en,
                'mt_job'=>$this->mt_phone,
                'mt_phone'=>$this->mt_phone,
                'ft_name_kh'=>$this->ft_name_kh,
                'ft_name_en'=>$this->ft_name_en,
                'ft_job'=>$this->ft_phone,
                'ft_phone'=>$this->ft_phone,
                'status'=>1,


            
        ];
        $st = Student::insertGetId($student);
        $code = str_pad($st,4,"0",STR_PAD_LEFT);
        $st_code= 'ST-'.$code;

        Student::FindOrFail($st)->update([
            'st_code' => str_pad($st_code,4,"0",STR_PAD_LEFT)
        ]);

        $this->reset();
        $this->alert('success', 'Inserted!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
        ]);

    }

}
