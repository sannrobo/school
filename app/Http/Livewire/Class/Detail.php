<?php

namespace App\Http\Livewire\CLass;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Room;
use App\Models\Section;
use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Detail extends Component
{
    use LivewireAlert;
    public $class_id;
    public $student, $student_id, $studata = [];
    public function render()
    {

        $room = Room::join('classes','rooms.id','classes.room_id')->where('classes.id',$this->class_id)->select('rooms.name as room_name','classes.name as class_name')->first();
        $course = Course::join('classes','courses.id','classes.course_id')->where('classes.id',$this->class_id)->select('courses.name  as cname')->first();
        $time = Section::join('classes','sections.id','classes.section_id')->where('classes.id',$this->class_id)->select('sections.name  as time')->first();
        $teacher = Employee::join('classes','employees.id','classes.teacher_id')->where('classes.id',$this->class_id)->select('employees.name_kh  as tname')->first();
        $classes = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();
        
        $count =count($classes);

     
        return view('livewire.c-lass.detail',compact('classes','room','course','time','teacher','count'));
    }

    public function updatedStudent(){
        $this->studata = Student::where('st_code','like','%'.$this->student.'%')
        ->orWhere('st_name_kh','like','%'.$this->student.'%')
        ->orWhere('st_name_en','like','%'.$this->student.'%')
        ->orWhere('phone','like','%'.$this->student.'%')
        ->take(5)->get();

        if($this->studata==''){
            $this->studata = [];
        }
    }
    public function getStudent($id, $name){
        $this->student_id= $id;
        $this->student = $name;
        $this->studata = [];
    }

    public function mount ($id)
    {
        $this->class_id = $id;

     

    }
    protected $rules = [
        'student_id' => 'required',
       
    ];

    public function assignStudent()
    {
        $arrayStu=[];
        $stu = ClassStudent::whereIn('class_id',[$this->class_id])->get();
        foreach ($stu as $s) {
            $arrayStu[$s->student_id]=$s->student_id;
        }
        if(in_array($this->student_id, $arrayStu))
        {
            if(auth()->user()->lang == 'kh')
            {
            $this->alert('warning', 'បញ្ហា', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
                'text'=>"សិស្ស $this->student មានក្នុងថ្នាក់រួចហើយ ",
                'showCancelButton' => false,
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
            $this->dispatchBrowserEvent('is-close');
        }  
        else
        {
            $this->validate();
            $a = new ClassStudent();
            $a->student_id = $this->student_id;
            $a->class_id  = $this->class_id;
            $a->save();
            $this->dispatchBrowserEvent('is-open');
            $this->reset(['student']);
        }

     
     

     ;
    }
}
