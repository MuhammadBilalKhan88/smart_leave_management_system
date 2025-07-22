@extends('layouts.dashboard.empolyee')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Leave Request</h3>
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
                            <div class="text-tiny">Leave Request</div>
                        </a>
                    </li>


                </ul>
            </div>

            <!-- new-category -->
            <div class="wg-box">
                @if (session('Status'))

                    @if (session('Status') === 'Leave Approved')

                        <div class="alert alert-success">
                            <h5>{{ session('Status') }}</h5>
                        </div>

                    @elseif (session('Status') === 'Leave Rejected')

                        <div class="alert alert-danger">
                            <h5>{{ session('Status') }}</h5>
                        </div>


                  
                    @endif
                @endif


                <form class="form-new-employee form-style-1" action="{{ route('employee.leaves.request.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="name">

                        <div class="body-title">Leaves Type<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="e.g., Sick, Casual, Emergency" name="leave_type"
                            tabindex="0" value="{{ old('leave_type') }}" aria-required="true" required="">

                    </fieldset>
                    @error('leave_type')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror
                    <fieldset class="name">

                        <div class="body-title">Reason<span class="tf-color-1">*</span></div>

                        <textarea class="flex-grow" name="Reason" placeholder="Reason for Leave" rows="4"
                            required>{{ old('reason') }} </textarea>

                    </fieldset>
                    @error('reason')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">From Date <span class="tf-color-1">*</span></div>
                        <input type="date" name="from_date" class="form-control" value="{{ old('from_date') }}" required>
                    </fieldset>
                    @error('from_date')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror
                    <fieldset class="name">
                        <div class="body-title">To Date <span class="tf-color-1">*</span></div>
                        <input type="date" name="to_date" class="form-control" value="{{ old('to_date') }}" required>
                    </fieldset>
                    @error('to_date')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror



                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Submit Request</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


@endsection