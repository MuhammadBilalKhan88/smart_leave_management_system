@extends('layouts.dashboard.admin')
@section('content')
    <div class="main-content-inner">

                            <div class="main-content-wrap">
                                <div class="mb-30" >

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
                                                            <h4>1</h4>
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
                                                            <th style="width: 80px">OrderNo</th>
                                                            <th>Name</th>
                                                            <th class="text-center">Phone</th>
                                                            <th class="text-center">Subtotal</th>
                                                            <th class="text-center">Tax</th>
                                                            <th class="text-center">Total</th>

                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Order Date</th>
                                                            <th class="text-center">Total Items</th>
                                                            <th class="text-center">Delivered On</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td class="text-center">Divyansh Kumar</td>
                                                            <td class="text-center">1234567891</td>
                                                            <td class="text-center">$172.00</td>
                                                            <td class="text-center">$36.12</td>
                                                            <td class="text-center">$208.12</td>

                                                            <td class="text-center">ordered</td>
                                                            <td class="text-center">2024-07-11 00:54:14</td>
                                                            <td class="text-center">2</td>
                                                            <td></td>
                                                            <td class="text-center">
                                                                <a href="#">
                                                                    <div class="list-icon-function view-icon">
                                                                        <div class="item eye">
                                                                            <i class="icon-eye"></i>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>



@endsection
