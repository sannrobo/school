<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\ClassStudent;

class ClassStudentExport implements FromView
{



   private $student;
   public function __construct($id)
   {
    $this->student = ClassStudent::join('students','class_student.student_id','students.id')

    ->whereIn('class_student.class_id',([$id]))


    ->get();
    
   }
    public function view():view
    {
        //
        return view('class.print',
        [
            'students'=>$this->student
        ]);
    }
}

