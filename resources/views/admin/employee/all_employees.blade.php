@extends('layouts.dashboard.admin')
@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Employees</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Employees</div>
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
                    <a class="tf-button style-1 w208" href="{{ route('admin.employee.add') }}"><i class="icon-plus"></i>Add
                        new</a>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Timing</th>
                                    <th>Leaves</th>
                                    <th>Leaves Taken</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Employees as $employe)
                                    <tr>
                                        <td>{{ $employe->id }}</td>

                                        <td>{{ $employe->emp_name }}</td>
                                        <td>{{ $employe->emp_email }}</td>
                                        <td><span class="m-5">{{ $employe->emp_phone}}</span></td>
                                        <td>
                                            <b>Dipartment:</b>
                                            {{ $employe->emp_departments}}
                                            <b>Position:</b>
                                            {{ $employe->emp_position}}

                                        </td>
                                        <td>{{ $employe->emp_salary}}</td>
                                        <td>{{ $employe->emp_timing}}</td>
                                        <td>{{ $employe->emp_total_leaves}}</td>
                                        <td>{{ $employe->emp_total_taken}}</td>

                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{ route('admin.employee.edit', ['id' => $employe->id]) }}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>

                                                <form action="{{ route('admin.employee.delete', ['id' => $employe->id]) }}"
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
                        {{ $Employees->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'You Want To Delete This Record?',
                    icon: 'warning',
                    showcancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush