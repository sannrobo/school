<?php

namespace App\Http\Livewire\Account;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Invoice;
use App\Models\Invoice_Detail;
use Livewire\Component;

class Create extends Component
{
    public $student_id , $class_id , $fee, $discount , $total , $paid , $rest;
    public function render()

    {  
        if($this->discount=="")
        {
            $this->discount=0;
        }
        
        $students = Student::where('status',1)->orderBy('id','desc')->get();
        $classes = Classes::where('status',1)
        ->join('courses','classes.course_id','courses.id')
        ->join('rooms','classes.room_id','rooms.id')
        ->join('sections','classes.section_id','sections.id')
        ->join('employees','classes.teacher_id','employees.id')

        ->select('classes.name as class_name','classes.id as class_id','courses.*','sections.name as time','rooms.name as room_name','employees.name_en as teacher_name_en','employees.name_kh as teacher_name_kh')
        ->orderBy('class_id' ,'desc')
       ->get();
        return view('livewire.account.create' , compact('students','classes'));
    }

    public function updatedClassId($val)
    {
      
        $course = Classes::join('courses','classes.course_id','courses.id')
        ->where('classes.id',$val)
        ->first();
        
       $this->fee = $course->price;

        $this->total = $this->fee;
        $this->discount=0;
    }
    public function updatedDiscount()
    {
        $this->total = $this->fee - $this->discount;
    }

    public function updatedPaid()
    {
        $this->rest = $this->total  - $this->paid;
    }

    public function mount()
    {
        $this->resetFied();
    }

    public function resetFied()
    {
     
        $this->discount=0;
        $this->paid=0;
        $this->rest=0;
        $this->total=0;
        $this->fee=0;
        
    }

    public function store()
    {
        $inv = new Invoice();
        $inv->student_id = $this->student_id;
        $inv->class_id = $this->class_id;
        $inv->fee = $this->fee;
        $inv->discount = $this->discount;
        $inv->total = $this->total;
        $inv->paid = $this->paid;
        $inv->rest = $this->rest;
        $inv->save();


        $invd = new Invoice_Detail();
        $invd->invoice_id = $inv->id;
        $invd->paid = $this->paid;
        $invd->date = date('Y-m-d');
        $invd->save();
       $this->resetFied();
       $this->reset('student_id','class_id');
    }
}
