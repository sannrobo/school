<?php

namespace App\Http\Livewire\Account;

use App\Models\Invoice;
use Livewire\Component;

class Income extends Component
{
    public $from_date,$to_date;
    public function render()

    {  
         $invd = \DB::table('invoice_detail')
         ->join('invoices','invoice_detail.invoice_id','invoices.id')
         ->join('students','invoices.student_id','students.id')
         ->join('classes','invoices.class_id','classes.id')
         ->whereBetween('invoice_detail.date', [$this->from_date, $this->to_date])
         ->select('invoice_detail.*','students.st_name_kh as kh_name','classes.name as class_name')
         
         ->get();
        
        return view('livewire.account.income' , compact('invd'));
    }

    public function mount()
    {
        $this->from_date=date('Y-m-d');
        $this->to_date=date('Y-m-d');
    }
}
