@extends('layouts.dashboard.admin')
@section('content')
    <div class="main-content-inner">

        <div class="main-content-wrap">
            <div class="mb-30">

                <div class=" flex gap20 flex-wrap-mobile">
                    <div class="w-half">


                        <div class="wg-chart-default">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2">All Users</div>
                                        <h4>
                                            {{$totalUsers}}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="w-half">
                        <div class="wg-chart-default">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2">All Employees</div>
                                        <h4>
                                            {{$totalEmployee}}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Recent Leave Request</h5>
                        <div class="dropdown default">
                            <a class="btn btn-secondary dropdown-toggle" href="#">
                                <span class="view-all">View all</span>
                            </a>
                        </div>
                    </div>
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


                                                    <form action="{{ route('admin.leave.delete', ['id' => $leave->id]) }}"
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

    </div>



@endsection