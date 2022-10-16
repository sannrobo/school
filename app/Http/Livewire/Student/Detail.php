<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use PHPUnit\Framework\MockObject\Builder\Stub;

class Detail extends Component
{
    public $sid;
    public function render()
    {
        $s = Student::FindOrFail($this->sid);
        
        return view('livewire.student.detail',compact('s'));
    }


    public function mount($id)
    {
      $this->sid = $id ; 

    }
}
