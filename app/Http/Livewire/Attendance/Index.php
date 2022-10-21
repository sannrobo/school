<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\ClassStudent;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $desc;
    public $class_id;
    public   $students;
    public $radio=[];

    public $date;
    public function render()

    {       
        
        $classes = Classes::where('status',1)
        ->join('courses','classes.course_id','courses.id')
        ->join('rooms','classes.room_id','rooms.id')
        ->join('sections','classes.section_id','sections.id')
        ->join('employees','classes.teacher_id','employees.id')

        ->select('classes.name as class_name','classes.id as class_id','courses.*','sections.name as time','rooms.name as room_name','employees.name_en as teacher_name_en','employees.name_kh as teacher_name_kh')
        ->orderBy('class_id' ,'desc')
        ->get();
        // $classes = ClassStudent::join('students','class_student.student_id','students.id')

        // ->whereIn('class_student.class_id',([$this->class_id]))
        // ->where('students.status',1)
  
        // ->get();

      

        return view('livewire.attendance.index',compact('classes'));
    }
    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function updatedDate()
    {
        $this->reset('students' , 'radio','class_id');
       
    }


    public function search()
    {
        $this->reset('students');

        $atts = Attendance::whereIn('class_id', ([$this->class_id]))
        ->whereDate('date',$this->date)
        ->get();

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

      
  

        
        if(count($atts)>0)
        {
       
           foreach($atts as $a)
           {  
               $this->radio [$a->student_id]=$a->att;
            }
       
       }


   
    }

    public function updatedRadio($val,$key){
      
        $this->radio[$key]=$val;
       
        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();
            

    }



    public function saveAtt()
    { 
    
        $atts = Attendance::whereIn('class_id', [$this->class_id])
        ->whereDate('date',$this->date)
        ->get();
  
  


    
             if(count($atts)>0)
             {
            
                foreach($this->radio as $key=>$val)
                {
                

                 $att = Attendance::whereIn('class_id', [$this->class_id])
                 ->whereDate('date',$this->date)
                 ->where('student_id',$key)->update([
                    'att'=>$val
                 ]);

                 if(auth()->user()->lang == 'kh')
                 {
                 $this->alert('success', 'ជោគជ័យ', [
                     'position' => 'center',
                     'timer' => '3000',
                     'toast' => false,
                     'timerProgressBar' => true,
                     'width' => '300',
                     'showCancelButton' => false,
                 ]);
                 }else
                 {
                     $this->alert('success', "Successfully", [
                         'position' => 'center',
                         'timer' => '',
                         'toast' => false,
                         'timerProgressBar' => true,
                         'width' => '300',
                         'showCancelButton' => true,
                     ]); 
                 }
              

                }

     
           
            
            }
            
            
            else{
                foreach($this->radio as $key=>$val)
                {      
                    $at = new Attendance();
                         $at->date = $this->date;
                        $at->student_id = $key;
                        $at->class_id = $this->class_id;
                        $at->att = $val;
                        $at->desc = $this->desc;
                        $at->save();
                    }

                    if(auth()->user()->lang == 'kh')
                    {
                    $this->alert('success', 'ជោគជ័យ', [
                        'position' => 'center',
                        'timer' => '3000',
                        'toast' => false,
                        'timerProgressBar' => true,
                        'width' => '300',
                  
                        'showCancelButton' => false,
                    ]);
                    }else
                    {
                        $this->alert('success', "Successfully", [
                            'position' => 'center',
                            'timer' => '',
                            'toast' => false,
                            'timerProgressBar' => true,
                            'width' => '300',
                            'showCancelButton' => true,
                        ]); 
                    }
                 
             }
      
           

             

       

       $this->students='';
       $this->class_id='';
  

      
    }   

}
