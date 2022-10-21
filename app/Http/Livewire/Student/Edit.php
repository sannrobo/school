<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
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
    public $sid;
    public function render()
    {
        abort_if(Gate::denies('update_student'),403);

        return view('livewire.student.edit');
    }
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
    public function mount($id)
    {
        $student = Student::findOrFail($id);
        $this->st_name_kh = $student->st_name_kh;
        $this->st_name_en = $student->st_name_en;
        $this->st_gender = $student->st_gender;
        $this->st_dob = $student->st_dob;
        $this->st_phone = $student->phone;
        $this->mt_name_kh = $student->mt_name_kh;
        $this->mt_name_en = $student->mt_name_en;
        $this->mt_job = $student->mt_job;
        $this->mt_phone = $student->mt_phone;
        $this->ft_name_kh = $student->ft_name_kh;
        $this->ft_name_en = $student->ft_name_en;
        $this->ft_job = $student->ft_job;
        $this->ft_phone = $student->ft_phone;
        $this->st_address = $student->address;
        $this->sid =$id;

    }

    public function editStudent()
    {
        $student = Student::findOrFail($this->sid);
        $student->st_name_kh =  $this->st_name_kh;
          $student->st_name_en = $this->st_name_en ;
        $student->st_gender = $this->st_gender ;
     $student->st_dob = $this->st_dob;
       $student->phone = $this->st_phone ;
         $student->mt_name_kh = $this->mt_name_kh;
         $student->mt_name_en = $this->mt_name_en;
     $student->mt_job = $this->mt_job ;
       $student->mt_phone = $this->mt_phone ;
         $student->ft_name_kh = $this->ft_name_kh ;
         $student->ft_name_en = $this->ft_name_en ;
     $student->ft_job = $this->ft_job ;
       $student->ft_phone = $this->ft_phone ;
            $student->address = $this->st_address ;
            $student->save();
        
        $this->alert('success', 'Updated!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
        ]);
        
    }
}
