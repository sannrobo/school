<?php

namespace App\Http\Livewire\CLass;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Room;
use App\Models\Section;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $name, $roomid , $courseid,$timeid,$teacherid;
    public $class_id;
    public $check;
    public function render()
    {
        $rooms = Room::all();
        $emps = Employee::where('role_id',3)->get();
        $times = Section::all();
        $courses = Course::all();
        return view('livewire.c-lass.edit' ,compact('rooms','emps','times','courses',));
    }

    protected $rules = [
        'name' => 'required',
        'roomid'=>'required',
        'courseid'=>'required',
        'timeid'=>'required',
        'teacherid'=>'required',
        
    ];

    public function mount($id)
    {
        $this->class_id = Classes::findOrFail($id);
        $this->name = $this->class_id->name;
        $this->roomid = $this->class_id->room_id;
        $this->courseid = $this->class_id->course_id;
        $this->timeid = $this->class_id->section_id;
        $this->teacherid = $this->class_id->teacher_id;
      
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }

    public function updateClass()
    {
        $classes = Classes::where('status',1)
        ->where('id','!=',$this->class_id->id)->get();
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

        if($this->check)
        {
            $this->validate();
 


            $this->class_id->update([
                'name'=>$this->name,
                'section_id'=>$this->timeid,
                'teacher_id'=>$this->teacherid,
                'course_id'=>$this->courseid,
                'room_id'=>$this->roomid,
                'status'=>1,
            ]);

            if(auth()->user()->lang == 'kh')
            {
            $this->alert('success', "កែប្រែបានជោគជ័យ", [
                'position' => 'center',
                'timer' => '3000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
                'showCancelButton' => false,
            ]);
            }else
            {
                $this->alert('success', "Updated", [
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
