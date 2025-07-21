@extends('layouts.dashboard.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Employee</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Add Employee</div>
                        </a>
                    </li>


                </ul>
            </div>

            <!-- new-category -->
            <div class="wg-box">
                @if (session('Status'))
                    <div class="alert alert-success">{{ session('Status') }}</div>
                @endif

                <form class="form-new-employee form-style-1" action="{{ route('admin.employee.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <fieldset class="name">

                        <div class="body-title">Name<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Employee Name" name="emp_name" tabindex="0"
                            value="{{ old('emp_name') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_name')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Email Address<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Employee Email Address" name="emp_email"
                            tabindex="0" value="{{ old('emp_email') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_email')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror



                    <fieldset class="name">

                        <div class="body-title">Password <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="password" placeholder="Employee Password" tabindex="0"
                            value="{{ old('password') }}" name="password" required autocomplete="new-password">

                    </fieldset>

                    @error('password')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Phone Number<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="number" min="11" placeholder="Employee Phone Number" name="emp_phone"
                            tabindex="0" value="{{ old('emp_phone') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_phone')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror


                    <fieldset class="name">

                        <div class="body-title">Address<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Employee Address" name="emp_address" tabindex="0"
                            value="{{ old('emp_address') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_address')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Departments<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Employee Departments" name="emp_departments"
                            tabindex="0" value="{{ old('emp_departments') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_departments')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Position<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Employee Position" name="emp_position"
                            tabindex="0" value="{{ old('emp_position') }}" aria-required="true" required="">

                    </fieldset>
                    @error('emp_position')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Salary <span class="tf-color-1">*</span></div>
                        <input class="form-control" type="number" name="emp_salary" placeholder="Enter salary" min="0"
                            max="1000000" step="0.01" value="{{ old('emp_salary') }}" required>
                    </fieldset>
                    @error('emp_salary')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Joining Date <span class="tf-color-1">*</span></div>
                        <input class="form-control" type="date" name="emp_joining_date"
                            value="{{ old('emp_joining_date') }}" required>
                    </fieldset>

                    @error('emp_joining_date')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Timing <span class="tf-color-1">*</span></div>
                        <input class="form-control" type="text" name="emp_timing" placeholder="e.g. 9:00 AM - 6:00 PM"
                            value="{{ old('emp_timing') }}" required>
                    </fieldset>

                    @error('emp_timing')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Total Leaves Allowed <span class="tf-color-1">*</span></div>
                        <input class="form-control" type="number" name="emp_total_leaves"
                            value="{{ old('emp_total_leaves', 15) }}" required>
                    </fieldset>

                    @error('emp_total_leaves')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror


                    <fieldset class="name">
                        <div class="body-title">Leaves Taken <span class="tf-color-1">*</span></div>
                        <input class="form-control" type="number" name="emp_total_taken"
                            value="{{ old('emp_total_taken', 0) }}" required>
                    </fieldset>

                    @error('emp_total_taken')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror


                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Add Employee</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection