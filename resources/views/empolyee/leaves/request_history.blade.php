@extends('layouts.dashboard.empolyee')

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
                        <div class="text-tiny">Leave Request</div>
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
                <div class="wg-table table-all-user">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Total Days</th>
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
                    <td>{{ $leave->total_days }}</td>
                    <td>
                        @if($leave->status === 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($leave->status === 'Rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
               
                    <td>{{ $leave->Total_days_Lev }}</td>
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

@endsection