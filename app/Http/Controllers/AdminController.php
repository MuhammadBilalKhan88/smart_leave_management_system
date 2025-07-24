<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class AdminController extends Controller
{
    public function admin_index()
    {

        $totalUsers = User::count();
        $totalEmployee = Employee::count();
        $leaves = Leave::orderby('created_at', 'desc')->paginate(7);
        return view('admin.index', compact('totalUsers', 'totalEmployee', 'leaves'));
    }

    // All Users    
    public function admin_all_users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.user', compact('users'));
    }


    // Employee Management
    // All Employees
    public function admin_all_employees()
    {
        $Employees = Employee::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.employee.all_employees', compact('Employees'));
    }

    // Adding a new employee Form
    public function admin_employee_add()
    {
        return view('admin.employee.add_employee');
    }

    // Storing a new employee and user
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


        $user = User::where('email', $request->emp_email)->first();
        if (!$user) {

            $user = new User();
            $user->name = $request->emp_name;
            $user->email = $request->emp_email;
            $user->password = Hash::make($request->password);
            $user->save();
        }


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

    // Editing an employee Form 
    public function admin_employee_edit($id)
    {
        $employee = Employee::with('user')->findOrFail($id);
        return view('admin.employee.edit_employee', compact('employee'));
    }

    // Updating an employeea and user
    public function admin_employee_update(Request $request)
    {
        $request->validate([
            'id'                => 'required|exists:employees,id',
            'emp_name'          => 'required|string|max:255',
            'emp_email'         => 'required|email|unique:employees,emp_email,' . $request->id,
            'emp_phone'         => 'required|digits:11',
            'emp_address'       => 'required|string|max:255',
            'emp_departments'   => 'required|string|max:255',
            'emp_position'      => 'nullable|string|max:255',
            'emp_salary'        => 'nullable|numeric|min:0',
            'emp_joining_date'  => 'nullable|date',
            'emp_timing'        => 'required|string|max:255',
            'emp_total_leaves'  => 'nullable|integer|min:0',
            'emp_total_taken'   => 'nullable|integer|min:0',
            'password'          => 'nullable|string|min:8',
        ]);

        $employee = Employee::findOrFail($request->id);

        // Update Employee table
        $employee->emp_name = $request->emp_name;
        $employee->emp_email = $request->emp_email;
        $employee->emp_phone = $request->emp_phone;
        $employee->emp_address = $request->emp_address;
        $employee->emp_departments = $request->emp_departments;
        $employee->emp_position = $request->emp_position;
        $employee->emp_salary = $request->emp_salary;
        $employee->emp_joining_date = $request->emp_joining_date;
        $employee->emp_timing = $request->emp_timing;
        $employee->emp_total_leaves = $request->emp_total_leaves;
        $employee->emp_total_taken = $request->emp_total_taken;
        $employee->save();


        $user = User::find($employee->user_Id);

        if ($user) {
            $user->name = $request->emp_name;
            $user->email = $request->emp_email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
        } else {
            $user->save();
        }

        return redirect()->route('admin.all_employees')->with('Status', 'Employee and User updated successfully.');
    }

    // Deleting an employee and User
    public function admin_employee_delete($id)
    {
        $employee = Employee::find($id);
        $user = User::find($employee->user_Id);
        if ($user) {
            $user->delete();
        }

        $employee->delete();

        return redirect()->route('admin.all_employees')->with('success', 'Employee and User deleted successfully.');
    }


    // All Leave requests
    public function admin_all_leaves_requests()
    {
        $user = Auth::user();
        $leaves = Leave::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.leaves.leave_request', compact('leaves',));
    }

    public function admin_leave_edit(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);


        $leave = Leave::find($id);
        $employee = Employee::where('user_id', $leave->user_id)->first();
        if (!$employee) {
            return redirect()->back()->with('Status', 'Employee not found for this leave request.');
        }

        $oldStatus = $leave->status;
        $newStatus = $request->status;

        $Form = Carbon::parse($leave->Form_date);
        $to = Carbon::parse($leave->to_date);
        $totalDays = $Form->diffInDays($to) + 1;

        $originalLeaves = $employee->emp_total_leaves + $employee->emp_total_taken;
        $orginalTakenLeaves = $employee->emp_total_taken;

        $remainingLeaves = max(0, min($originalLeaves, $employee->emp_total_leaves));
        // dd(
        //     "Employee Total Leaves  :   " . $employee->emp_total_leaves,
        //     "Employee Total Taken Leaves  :   " . $employee->emp_total_taken,
        //     "Orginal Leaves  :   " . $originalLeaves,
        //     "Orginal  Taken Leaves  :   " . $orginalTakenLeaves,
        //     "Remaining  :   " . $remainingLeaves,

        // );


        if ($oldStatus === 'Approved' && $newStatus === 'Rejected') {


            $employee->emp_total_leaves = max(0, min($originalLeaves, $employee->emp_total_leaves + $totalDays));
            $employee->emp_total_taken = max(0, min($originalLeaves, $employee->emp_total_taken - $totalDays));

            if ($employee->emp_total_leaves < 0 || $employee->emp_total_taken < 0) {
                return back()->with('Status', 'Leave cannot be rejected. Not enough remaining leaves.');
            }

        }

        if ($oldStatus === 'Rejected'  && $newStatus === 'Approved') {
         
            $employee->emp_total_taken = max(0,min($employee->emp_total_leaves, $employee->emp_total_taken + $totalDays));
            $employee->emp_total_leaves = max(0,min($employee->emp_total_leaves, $employee->emp_total_leaves - $totalDays));

             if ($employee->emp_total_leaves < 0 || $employee->emp_total_taken < 0) {
                return back()->with('Status', 'Leave cannot be Approved. Not enough remaining leaves.');
            }
           
        }

        if($oldStatus === 'Approved' && $newStatus === 'Pending') {

            $employee->emp_total_leaves = max(0, $employee->emp_total_leaves, $employee->emp_total_leaves + $totalDays);
            $employee->emp_total_taken = max(0, min($employee->emp_total_leaves, $employee->emp_total_taken - $totalDays));
          
        }
        if($oldStatus === 'Pending' && $newStatus === 'Approved') {

            $employee->emp_total_taken = max(0, min($employee->emp_total_leaves, $employee->emp_total_taken + $totalDays));
            $employee->emp_total_leaves = max(0, min($employee->emp_total_leaves, $employee->emp_total_leaves - $totalDays));


          
        }









        // if ($newStatus === 'Approved' && $oldStatus !== 'Approved') {

        //     $remainingLeaves = $employee->emp_total_leaves - $employee->emp_total_taken;

        //     if ($remainingLeaves < $totalDays) {
        //         return back()->with('Status', 'Leave cannot be approved. Not enough remaining leaves.');
        //     }

        //     $employee->emp_total_taken  = max(0, $employee->emp_total_taken + $totalDays);
        //     $employee->emp_total_leaves  = max(0, $employee->emp_total_leaves - $totalDays);
        // }

        // if ($oldStatus === 'Approved' && $newStatus === 'Rejected') {

        //     $employee->emp_total_taken  = max(0, $employee->emp_total_taken - $totalDays);
        //     $employee->emp_total_leaves  = min( $originalLeaves, $employee->emp_total_leaves + $totalDays);
        // }

        // if ($oldStatus === 'Approved' && $newStatus === 'Pending') {

        //     $employee->emp_total_taken  = max(0, $employee->emp_total_taken - $totalDays);
        //     $employee->emp_total_leaves  = min( $originalLeaves, $employee->emp_total_leaves + $totalDays);
        // }

        // if ($oldStatus === 'Rejected' && $newStatus === 'Approved') {

        //     $remainingLeaves = max(0,$employee->emp_total_leaves - $employee->emp_total_taken);

        //     dd("Employee Total Taken Leaves : " . $employee->emp_total_taken  ,  "Employee Total  Leaves : " . $employee->emp_total_leaves, "Employee Total Days For Leaves : " . $totalDays, "Employee Remaing Leaves :" . $remainingLeaves);  
        //     if ($remainingLeaves < $totalDays) {
        //         return back()->with('Status', 'Leave cannot be approved. Not enough remaining leaves.');
        //     }



        //     $employee->emp_total_taken  = max(0, $employee->emp_total_taken + $totalDays);
        //     $employee->emp_total_leaves  = max(0, $employee->emp_total_leaves - $totalDays);

        // }

        $leave->status = $newStatus;
        $leave->save();
        $employee->save();

        return back()->with('Status', 'Leave status updated and leave counts adjusted successfully.');
    }

    public function admin_leave_delete($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        return redirect()->route('admin.leave_request')->with('success', 'Leave request deleted successfully.');
    }
}
