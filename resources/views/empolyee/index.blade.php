@extends('layouts.dashboard.empolyee')
@section('content')
    <div class="main-content-inner">

        <div class="main-content-wrap">
            <div class=" flex gap20 flex-wrap-mobile mb-30">
                <div class="w-half">


                    <div class="wg-chart-default mb-5 ">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">All Leaves</div>

                                    <h4>{{ round($employee->emp_total_leaves)  }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wg-chart-default mt-5 mb-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Department</div>

                                    <h4>{{ $employee->emp_departments }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wg-chart-default mt-5 mb-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Salary</div>

                                    <h4>Rs:{{ $employee->emp_salary }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">
                    <div class="wg-chart-default mb-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Leaves Taken <h4>{{ round($employee->emp_total_taken ) }}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mt-5 mb-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Position</div>

                                    <h4>{{ $employee->emp_position }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wg-chart-default mt-5 mb-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Timing</div>

                                    <h4>{{ $employee->emp_timing }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="tf-section mb-30 h-100">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Leaves Histroy</h5>
                        <div class="dropdown default">
                            <a class="btn btn-secondary dropdown-toggle" href="{}">
                                <span class="view-all">View all</span>
                            </a>
                        </div>
                    </div>
                    <div class="wg-table table-all-user">
                        <div class="table-responsive">
                            
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Status</th>
                                    <th>AI Feedback</th>
                                    <th>Applied On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                      <tr>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->Reason }}</td>
                    <td>{{ $leave->from_date }}</td>
                    <td>{{ $leave->to_date }}</td>
                    <td>
                        @if($leave->status === 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($leave->status === 'Rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td>{{ $leave->status ?? 'N/A' }}</td>
                    <td>{{ $leave->created_at->format('d-m-Y') }}</td>
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