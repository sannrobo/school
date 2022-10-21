<?php

namespace App\Http\Livewire\Account;

use App\Models\Classes;
use App\Models\Invoice;
use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $iid ; 
    public $student_id , $class_id , $fee, $discount , $total , $paid , $rest;
    public function render()
    {
        $students = Student::where('status',1)->orderBy('id','desc')->get();
        $classes = Classes::where('status',1)
        ->join('courses','classes.course_id','courses.id')
        ->join('rooms','classes.room_id','rooms.id')
        ->join('sections','classes.section_id','sections.id')
        ->join('employees','classes.teacher_id','employees.id')

        ->select('classes.name as class_name','classes.id as class_id','courses.*','sections.name as time','rooms.name as room_name','employees.name_en as teacher_name_en','employees.name_kh as teacher_name_kh')
        ->orderBy('class_id' ,'desc')
       ->get();
        return view('livewire.account.edit' , compact('students','classes'));
    }
    public function mount($id)
    {
        $inv = Invoice::findOrFail($id);
        $this->student_id = $inv->student_id;
        $this->class_id = $inv->class_id;
        $this->fee = $inv->fee;
        $this->discount = $inv->discount;
        $this->total = $inv->total;
        $this->paid = $inv->paid;
        $this->rest = $inv->rest;
       $this->iid = $id;
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

    public function updateInvoice()
    {
        $inv = Invoice::findOrFail($this->iid);
          $inv->student_id  = $this->student_id;
          $inv->class_id = $this->class_id;
          $inv->fee = $this->fee;
          $inv->discount = $this->discount;
          $inv->total = $this->total;
          $inv->paid = $this->paid;
          $inv->rest = $this->rest;
          $inv->save();

          if(auth()->user()->lang == 'kh')
          {
          $this->alert('success', "បានកែប្រែ", [
              'position' => 'center',
              'timer' => '',
              'toast' => false,
              'timerProgressBar' => true,
              'width' => '300',
              'showCancelButton' => true,
          ]);
          }else
          {
              $this->alert('success', "Updated", [
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
