<?php

namespace App\Http\Livewire\Account;


use Livewire\Component;

class Invoice extends Component
{
    public function render()
    {
        $inv = \DB::table('invoices')
        ->join('students','invoices.student_id','students.id')
        ->join('classes','invoices.class_id','classes.id')
        ->join('courses','classes.course_id','courses.id')
        ->select('invoices.*','students.st_name_kh as kh_name','courses.name as c_name')
        ->get();
       
        return view('livewire.account.invoice' , compact('inv'));
    }
    public function print($id)
    {
        $this->dispatchBrowserEvent('name-updated', ['id' => $id]);
    }
}
