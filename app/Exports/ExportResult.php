<?php

namespace App\Exports;

use App\Models\Score;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportResult implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $score;
    public function __construct($id)
    {
        $this->score = \DB::table('scores')->whereIn('class_id',[$id])->get();
 

 
 
    
     
    }
    public function view():view
    {
        //
        return view('Class.result-export',
        [
            'score'=>$this->score
        ]);
    }
}
