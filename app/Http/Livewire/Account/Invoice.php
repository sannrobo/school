<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Invoice extends Component
{
    use WithPagination;
    
   public $start_date , $end_date;
  
    public function render()
    {
        if($this->start_date == null || $this->end_date == null) 
        {
            $inv = \DB::table('invoices')
            ->join('students','invoices.student_id','students.id')
            ->join('classes','invoices.class_id','classes.id')
            ->join('courses','classes.course_id','courses.id')
            ->select('invoices.*','students.st_name_kh as kh_name','courses.name as c_name','classes.name as cname')
            ->paginate(25);
        }else
        {
            $inv = \DB::table('invoices')
            ->join('students','invoices.student_id','students.id')
            ->join('classes','invoices.class_id','classes.id')
            ->join('courses','classes.course_id','courses.id')
            ->whereBetween('invoices.created_at' , [$this->start_date,$this->end_date])
            ->select('invoices.*','students.st_name_kh as kh_name','courses.name as c_name','classes.name as cname')
            ->paginate(25);
        }

       
        return view('livewire.account.invoice' ,  compact('inv') );
    }
    public function paginationView()
    {
        return 'custom-pagination-links-view';
    }

    public function print($id)
    {
        $this->dispatchBrowserEvent('name-updated', ['id' => $id]);
    }

    public function Edit($id)
    {
       
        return redirect()->to('/invoices/edit/'.$id);
    }

    public function mount()
    {
   
        $this->start_date = null;
        $this->end_date = null;
    }
    public function updatedStartDate($value)
    {
        $this->start_date = $value;
      
    }

    public function updatedEndDate($value)
    {
        $this->end_date = $value;
      
    }

    public function clear()
    {
        $this->reset();
    }
}
