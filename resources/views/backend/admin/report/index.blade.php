@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Report</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-8">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Manage Report</h5>


                    </div>

                    <form class="row g-3" method="get" action="{{route('admin.report.create')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="date">
                        </div>

                        <div class="col-md-6">
                            <label for="date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="date">
                        </div>

                        <div class="col-md-12">
                            <label for="month" class="form-label">Month</label>
                            <select class="form-select" name="month">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value='July'>July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="year" class="form-label">Year</label>
                            <select class="form-select" name="year">
                            
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Filter</button>

                    </form>


                </div>

            </div>

        </div>





    </div>
@endsection


