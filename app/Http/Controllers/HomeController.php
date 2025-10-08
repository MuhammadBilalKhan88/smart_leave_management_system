<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function index()
    {

        $emp = Employee::take(3)->get() ;
      



        return view('layouts.mainsite.index',compact('emp'));
    }
    public function emp_index()
    {
        return view('empolyee.index');
    }
}
