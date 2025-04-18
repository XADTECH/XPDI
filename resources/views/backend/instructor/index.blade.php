@extends('backend.instructor.master')

@section('content')
    <div class="page-content">

        @if (!isApprovedUser())
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">
                    <p style="font-size: 20px">Your account is inactive. Please wait admin will check & approved it</p>
                </div>

            </div>
        @endif



        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">{{ $totalData['total_order'] }}</h4>
                                <p class="mb-0 font-13">+{{ $lastWeekData['last_week_orders'] }} from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Earn</p>
                                <h4 class="my-1 text-danger">${{ $totalData['total_earn'] }}</h4>
                                <p class="mb-0 font-13">+{{ $lastWeekData['last_week_earn'] }} from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                <i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Students</p>
                                <h4 class="my-1 text-success">{{ $totalData['total_students'] }}</h4>
                                <p class="mb-0 font-13">+{{ $lastWeekData['last_week_students'] }} from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Courses</p>
                                <h4 class="my-1 text-warning">{{ $totalData['total_course'] }}</h4>

                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                <i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">

            <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Total Sales History</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>




                            </div>
                        </div>
                    </div>

                    <div id="piechart"></div>

                    <ul class="list-group list-group-flush">

                        @foreach ($instructor_courses as $item)
                            <li
                                class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                {{ $item->course_name }}
                                <span class="badge bg-success rounded-pill">
                                    @php

                                        $sale_number = \App\Models\Order::where('course_id', $item->id)
                                            ->distinct('course_id')
                                            ->count();

                                    @endphp
                                    {{ $sale_number }}
                                </span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex">

                <div class="card radius-10">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Recent Orders</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Preview</th>
                                        <th>Course Title</th>
                                        <th>Price</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($recent_order as $item)


                                    <tr>
                                        <td><img src="{{ asset($item->course->course_image) }}"
                                            class="product-img-2" alt="course img"></td>

                                        <td>{{$item->course->course_name}}</td>

                                        <td>${{$item->price}}</td>


                                        <td>{{ $item->created_at->format('d M Y') }}</td>


                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--end row-->






    </div>
@endsection




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Course', 'Orders'],
            @foreach ($chartData as $data)
                ['{{ $data['course_name'] }}', {{ $data['sales_count'] }}],
            @endforeach
        ]);

        var options = {
            title: 'Course Sales',
            width: 550,
            height: 400
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
