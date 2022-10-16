<?php

namespace App\Http\Livewire\Class;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Room;
use App\Models\Section;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Create extends Component
{
    use LivewireAlert;
    public $name, $roomid , $courseid,$timeid,$teacherid;
    public $check;

    protected $rules = [
        'name' => 'required',
        'roomid'=>'required',
        'courseid'=>'required',
        'timeid'=>'required',
        'teacherid'=>'required',
        
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }
    public function render()
    {
        $rooms = Room::all();
        $emps = Employee::where('role_id',3)->get();
        $times = Section::all();
        $courses = Course::all();
        
        return view('livewire.class.create' , compact('rooms','emps','times','courses',));
    }







    public function store()
    {
        
        $classes = Classes::all();

        if(count($classes)>0)
        {
            foreach($classes as $c)
            {
                if($c->room_id == $this->roomid && $c->section_id == $this->timeid)
                {
                    if(auth()->user()->lang == 'kh')
                    {
                    $this->alert('warning', "បន្ទប់និងម៉ោងសិក្សាមានហើយ", [
                        'position' => 'center',
                        'timer' => '',
                        'toast' => false,
                        'timerProgressBar' => true,
                        'width' => '300',
                        'showCancelButton' => true,
                    ]);
                    }else
                    {
                        $this->alert('warning', "Room and Time is already exist!", [
                            'position' => 'center',
                            'timer' => '',
                            'toast' => false,
                            'timerProgressBar' => true,
                            'width' => '300',
                            'showCancelButton' => true,
                        ]); 
                    }
                    $this->check = false;
                    break;
               
                }else
                {
    
                   $this->check = true;
    
           
                   
                    
                }
            }
        }else
        {
            $this->check = true;
        }

        

    
 
        
 
 

        if($this->check)
        {
            
            $this->validate();
 


            Classes::create([
                'name'=>$this->name,
                'section_id'=>$this->timeid,
                'teacher_id'=>$this->teacherid,
                'course_id'=>$this->courseid,
                'room_id'=>$this->roomid,
                'status'=>1,
            ]);

            if(auth()->user()->lang == 'kh')
            {
            $this->alert('success', "បញ្ចូលបានជោគជ័យ", [
                'position' => 'center',
                'timer' => '3000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
                'showCancelButton' => false,
            ]);
            }else
            {
                $this->alert('success', "Inserted", [
                    'position' => 'center',
                    'timer' => '3000',
                    'toast' => false,
                    'timerProgressBar' => true,
                    'width' => '300',
                    'showCancelButton' => false,
                ]); 
            }

            $this->reset();
            return  redirect()->route('class.index');
        }
        
     
    
        




    }
}
