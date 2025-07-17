<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function admin_index()
    {
        $totalUsers = User::count(); // better naming
        return view('admin.index', compact('totalUsers'));
    }


    // All Leave requests
    public function admin_all_leaves_requests()
    {
        return view('admin.leaves.leave_request');
    }


    public function admin_employee_add()
    {
        return view('admin.employee.add_employee');
    }

    public function admin_employee_store(Request $request)
    {
        $request->validate([
            'emp_name'          => 'required|string|max:255',
            'emp_email'         => 'required|email|unique:users,email|unique:employees,emp_email',
            'emp_phone'         => 'required|digits:11',
            'emp_address'       => 'required|string|max:255',
            'emp_departments'   => 'required|string|max:255',
            'emp_position'      => 'nullable|string|max:255',
            'emp_salary'        => 'nullable|numeric|min:0',
            'emp_joining_date'  => 'nullable|date',
            'emp_timing'        => 'required|string|max:255',
            'password'          => 'required|min:8',

        ]);

        $user = new User();
        $user->name = $request->emp_name;
        $user->email = $request->emp_email;
        $user->password = Hash::make($request->password);
        $user->save();


        $employee = new Employee();
        $employee->emp_name = $request->emp_name;
        $employee->emp_email = $request->emp_email;
        $employee->emp_phone = $request->emp_phone;
        $employee->emp_address = $request->emp_address;
        $employee->emp_departments = $request->emp_departments;
        $employee->emp_position = $request->emp_position;
        $employee->emp_salary = $request->emp_salary;
        $employee->emp_joining_date = $request->emp_joining_date;
        $employee->emp_timing = $request->emp_timing;
        $employee->user_id = $user->id;
        $employee->save();
        return redirect()->route('admin.all_employees')->with('Status', 'Employee Has Been Added successfully');
    }


    public function admin_all_employees()
    {   $Employees = Employee::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.employee.all_employees',compact('Employees'));
    }

    public function admin_all_users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.user', compact('users'));
    }
}
