<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;

class Result extends Component
{
    public $class_id;
    public function render()
    {
        $score = \DB::table('scores')->whereIn('class_id',[$this->class_id])->get();
  
        return view('livewire.score.result',compact('score'));
    }
    public function mount($id)
    
    {
        $this->class_id = $id;
    }
}
