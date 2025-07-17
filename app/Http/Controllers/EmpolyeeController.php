<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmpolyeeController extends Controller
{
    public function index(){
        $user = Auth::User();

        $employee = Employee::where('user_id',$user->id)->first();


        return view('empolyee.index',compact('employee'));
    }

    // Leave Request Form
    public function employee_leaves_request_form()
    {
            return view('empolyee.leaves.request_form');
    }
    public function employee_leaves_request_history()
    {
            return view('empolyee.leaves.request_history');
    }
}
