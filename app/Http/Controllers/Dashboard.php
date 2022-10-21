<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
        $data = DB::table("invoices")->sum('total');

       $class = DB::table('classes')->count();
       $course = DB::table('courses')->count();
              
        return view('dashboard' , compact('countStudent','data','class','course'));
    }

    public function printInvoice($id)
    {
        $inv = Invoice::findOrFail($id);

        return view('invoice-print' , compact('inv'));
    }

    public function printResult($id)
    {
        $score = \DB::table('scores')->whereIn('class_id',[$id])->get();

        return view('Class.result' , compact('score'));
    }

}
