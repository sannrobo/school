<?php

namespace App\Http\Livewire\Score;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Score;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use stdClass;

class Index extends Component
{
    use LivewireAlert;
    public $class_id;
    public $students;
    public $scores;
    public $asg=[] , $reading=[] , $speaking=[] , $listening=[] , $writing=[] , $grammar=[];
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
        
        return view('livewire.score.index' , compact('classes'));
    }



    public function search()
    {
        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        // $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        // ->whereIn('class_student.class_id',([$this->class_id]))
        // ->where('students.status',1)
  
        // ->get();

        

        foreach($this->students as $a)
        {
         
        $score = Score::where('student_id',$a->student_id)
        ->whereIn('class_id',[$this->class_id])
        ->get();
       


                if(count($score)>0)
                {
                   foreach($score as $s)
                   {

                   
    
                        $this->asg[$s->student_id]=$s->asg;
                        $this->reading[$s->student_id]=$s->reading;
                        $this->listening[$s->student_id]=$s->listening;
                        $this->speaking[$s->student_id]=$s->speaking;
                        $this->writing[$s->student_id]=$s->writing;
                        $this->grammar[$s->student_id]=$s->grammar;
            
                        $this->scores[$s->student_id]['asg']=$s->asg;
                        $this->scores[$s->student_id]['writing']=$s->writing;
                        $this->scores[$s->student_id]['reading']=$s->reading;
                        $this->scores[$s->student_id]['listening']=$s->listening;
                        $this->scores[$s->student_id]['grammar']=$s->grammar;
                        $this->scores[$s->student_id]['speaking']=$s->speaking;
                    }
                }
                else
                {
                    $sc = new Score();
                    $sc->student_id = $a->student_id;
                    $sc->class_id = $this->class_id;
                    $sc->save();
                }
      
  
            
        }
      

   
    
    }


    public function saveScore()
    {

       foreach($this->scores as $key=>$val)
       {
       
        $sc = Score::where('student_id',$key)
        ->whereIn('class_id',[$this->class_id])
        ->get();

        foreach($sc as $s)
        {
      
            $s->asg = $val['asg'];
            $s->writing = $val['writing'];
            $s->listening = $val['listening'];
            $s->speaking = $val['speaking'];
            $s->grammar = $val['grammar'];
            $s->reading = $val['reading'];
        
            $s->save();

            if(auth()->user()->lang=='en')
            {
                $this->alert('success', 'Successfully', [
                    'position' => 'center',
                    'timer' => '1000',
                    'toast' => false,
                    'timerProgressBar' => true,
                    'width' => '300',
                ]);
            }else
            {
                $this->alert('success', 'ជោគជ៍យ!', [
                    'position' => 'center',
                    'timer' => '1000',
                    'toast' => false,
                    'timerProgressBar' => true,
                    'width' => '300',
                ]);
            }

        }

        
     

      

         
       }

       $this->search();
     

 
    }

    public function updatedAsg($val , $key)
    {
        $this->asg[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['asg']=$val;
    }

    public function updatedwriting($val , $key)
    {
        $this->writing[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['writing']=$val;
    }
    
    public function updatedReading($val , $key)
    {
        $this->reading[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['reading']=$val;

        
    }

    public function updatedListening($val , $key)
    {
        $this->listening[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['listening']=$val;
        
    }

    public function updatedSpeaking($val , $key)
    {
        $this->speaking[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['speaking']=$val;

        
    }

    public function updatedGrammar($val , $key)
    {
        $this->grammar[$key]=$val;

        $this->students = ClassStudent::join('students','class_student.student_id','students.id')

        ->whereIn('class_student.class_id',([$this->class_id]))
        ->where('students.status',1)
  
        ->get();

        $this->scores[$key]['grammar']=$val;

        
    }



    
}
