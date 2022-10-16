<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Student;

class Index extends Component
{
    public $search;
    public $st;
    public function render()
    {
    
      
      
        return view('livewire.student.index' );
    }

    public function mount()
    {
        $this->st = Student::orderBy('id','desc')->get();
    }

    public function updatedSearch()
    {
        $this->st = Student::where('st_code','like','%'.$this->search.'%')
                             ->orWhere('st_name_kh','like','%'.$this->search.'%')
                             ->orWhere('st_name_en','like','%'.$this->search.'%')
                             ->orWhere('phone','like','%'.$this->search.'%')
                            ->orderBy('id','desc')->get();
    }




}
