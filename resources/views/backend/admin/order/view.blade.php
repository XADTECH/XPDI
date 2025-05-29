@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Request</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/order') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View Request</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex;  justify-content:space-between row">

            <div class="col-md-6">
                <h6 class="mb-0 text-uppercase">View Request Details</h6>
            </div>

            <div class="col-md-6" style="text-align: right;">
                <h3>
                    <a href="{{ url('admin/order') }}" class="btn btn-success"> <- Back</a>
                </h3>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3>Student Information</h3>
                        <div style="display:flex; align-items:center; justify-content: flex-start; gap: 15px">

                            <div>
                                <img src="{{ asset($order->user->photo) }}" alt="Student image" class="text-center"
                                    width="120" height='120' />

                            </div>


                            <div style="display: flex; flex-direction:column; gap: 10px;">
                                <span><b>Name :</b> {{ $order->user->name }}</span>
                                <span><b>Email :</b> {{ $order->user->email }}</span>
                                <span><b>Phone :</b> {{ $order->user->phone }}</span>
                                <span><b>Address:</b> {{ $order->user->address }}</span>
                                <span><b>Gender:</b> {{ $order->user->gender }}</span>
                            </div>

                        </div>



                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Request Details</h3>
                            </div>
                            @if ($order->status == 0)
                                <div class="col-md-6" style="text-align: right;">
                                    <h3>
                                        <a href="{{ url('/admin/approve/enrollment/' . $order->id) }}"
                                            class="btn btn-primary">Approve</a>
                                    </h3>
                                </div>
                            @endif

                        </div>

                        <div style="display:flex; align-items:center; justify-content: flex-start; gap: 15px">

                            <div style="display: flex; flex-direction:column; gap: 10px;">
                                <span><b>Enrollment Purpose :</b> {{ $order->enrollment_purpose }}</span>
                                <span><b>Student's Qualification :</b> {{ $order->qualification }}</span>
                                <span><b>Area of Interest :</b> {{ $order->area_of_interest }}</span>
                                <span><b>address:</b> {{ $order->address }}</span>
                                <span>
                                    <b>Status:</b>
                                    <span class="{{ $order->status ? 'text-success' : 'text-primary' }}">
                                        {{ $order->status ? 'Approved' : 'Pending' }}
                                    </span>
                                </span>

                            </div>

                        </div>



                    </div>
                </div>

            </div>


        </div>

        <div>
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Instructor Image</th>
                                    <th>Course Name</th>
                                    <th>Category</th>
                                    <th>Instructor</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset($order->instructor->photo) }}" alt="Instructor image"
                                            width="80" height="80" style="border-radius: 5px" />
                                    </td>

                                    <td>{{ $order->course->course_name }}</td>
                                    <td>
                                        {{ $order->course->category->name }}
                                    </td>

                                    <td>
                                        {{ $order->instructor->name }}
                                    </td>



                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
