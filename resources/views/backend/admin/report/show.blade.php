@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Payment</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Payment</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">All Payments</h6>


        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filteredPayments as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->order_date}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->invoice_no}}</td>
                                <td>${{$item->total_amount}}</td>
                                <td>
                                    <span class="badge bg-primary px-3 py-2" style="font-weight: 200">  {{$item->payment_type}} </span>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection


