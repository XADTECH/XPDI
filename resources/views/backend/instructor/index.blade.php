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
                                <p class="mb-0 font-13">+{{ $lastWeekData['last_week_students'] }} from last week</p>

                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                <i class='bx bxs-group'></i>
                            </div>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#sidebarCloseBtn').on('click', function() {
                $('#sidebarWrapper').css('display', 'none');
            });
            $('.bx-menu').on('click', function() {
                $('#sidebarWrapper').css('display', 'block');
            });
        });
    </script>
@endpush
