<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
class Dashboard extends Controller
{
    //

    public function index()
    {
        $students = Student::all();
        $countStudent = $students->count();
        $data = DB::table("invoice_detail")->sum('paid');

       $class = DB::table('classes')->count();
       $course = DB::table('courses')->count();
              
        return view('dashboard' , compact('countStudent','data','class','course'));
    }

    public function printInvoice($id)
    {
        
    }

}
