<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Classes;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Report extends Component
{
    public $class_id,$atts;
    public function render()
    {
        abort_if(Gate::denies('show_attendance'),403);
        $classes = Classes::where('status',1)
        ->join('courses','classes.course_id','courses.id')
        ->join('rooms','classes.room_id','rooms.id')
        ->join('sections','classes.section_id','sections.id')
        ->join('employees','classes.teacher_id','employees.id')

        ->select('classes.name as class_name','classes.id as class_id','courses.*','sections.name as time','rooms.name as room_name','employees.name_en as teacher_name_en','employees.name_kh as teacher_name_kh')
        ->orderBy('class_id' ,'desc')
        ->get();
        return view('livewire.attendance.report' ,compact('classes'));
    }

    public function search()
    {


        // $this->atts = Attendance::whereIn('class_id', [$this->class_id])
        // ->join('students','attendances.student_id','students.id')
        // ->where('students.status',1)

        // ->select([
        
        //     \DB::raw("SUM(attendances.att='1') AS Present"),

            
        // ]
        // )
        // ->groupBy('students.id')
     
        // ->get();

      

        $this->atts = Attendance::whereIn('class_id', [$this->class_id])
        ->select("student_id", 
        \DB::raw("SUM(att='1' ) as Present"),
        \DB::raw("SUM(att='P' ) as P"),
        \DB::raw("SUM(att='0' ) as A"),
        )
        ->groupBy('student_id')
        ->get();
  

       
 
        
    }
}
