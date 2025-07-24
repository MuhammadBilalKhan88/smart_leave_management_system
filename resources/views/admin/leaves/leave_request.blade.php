@extends('layouts.dashboard.admin')
@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Leave Requests</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Leave Requests</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('employee.leaves.request.form') }}"><i
                            class="icon-plus"></i>Leave Request</a>
                </div>
                @if(session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                @endif    
                <div class="wg-table table-all-user">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>Leave id</th>
                                    <th>Employee id</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Total Days</th>
                                    <th>Status</th>
                                    <th>AI Feedback</th>
                                    <th>Applied On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave->id }}</td>
                                        <td>{{ $leave->user->id }}</td>
                                        <td>{{ $leave->user->name }}</td>
                                        <td>{{ $leave->leave_type }}</td>
                                        <td>{{ $leave->Reason }}</td>
                                        <td>{{ $leave->from_date }}</td>
                                        <td>{{ $leave->to_date }}</td>
                                        <td>{{ $leave->total_days }}</td>
                                           <td>
                                                @php
                                                    $statusClass = match($leave->status) {
                                                        'Approved' => 'btn-success',
                                                        'Rejected' => 'btn-danger',
                                                        'Pending'  => 'btn-warning',
                                                        default    => 'btn-primary'
                                                    };
                                                @endphp

                                                <form action="{{ route('admin.leave.edit', $leave->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="dropdown">

                                                        <button class="btn btn-md   dropdown-toggle  {{ $statusClass }}"
                                                            type="button" data-bs-toggle="dropdown">
                                                            {{ $leave->status }}
                                                        </button>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button class="dropdown-item btn btn-md btn-success" type="submit"
                                                                    name="status" value="Approved" {{ $leave->status == 'Approved' ? 'disabled' : '' }}>
                                                                    Approve
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="dropdown-item btn btn-md btn-danger" type="submit"
                                                                    name="status" value="Rejected" {{ $leave->status == 'Rejected' ? 'disabled' : '' }}>
                                                                    Reject
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="dropdown-item btn btn-md btn-warning" type="submit"
                                                                    name="status" value="Pending" {{ $leave->status == 'Pending' ? 'disabled' : '' }}>
                                                                    Pending
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </td>
                                        <td>{{ $leave->status ?? 'N/A' }}</td>
                                        <td>{{ $leave->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="list-icon-function">


                                                <form action="{{ route('admin.employee.delete', ['id' => $leave->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="item text-danger delete"
                                                        style="background: none; border: none;">
                                                        <i class="icon-trash-2"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                        {{ $leaves->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection