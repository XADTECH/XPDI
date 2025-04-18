@extends('backend.master')

@section('content')

<div class="page-content">

    @include('backend.admin.dashboard.box')

    <div class="row">
        @include('backend.admin.dashboard.chart')


    </div><!--end row-->

    <div class="col-12 col-lg-12 d-flex">
        <div class="card radius-10 w-100">

            <div class="card-header">
                <h4>Contact List</h4>

            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contact_list as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                   {{$item->name}}
                                </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($item->message, 80) }}</td>

                                <td>{{ $item->created_at->diffForHumans() }}</td>


                                <td>
                                    <a href="{{route('admin.contact.view', $item->id)}}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                          </svg>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>

            </div>

        </div>


    </div>



</div>

@endsection

@push('scripts')

<script>
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months->toArray()) !!}, // Month names
            datasets: [
                {
                    label: 'Orders',
                    data: {!! json_encode($orders_data) !!}, // Orders data for each month
                    backgroundColor: 'rgba(0, 140, 255, 0.6)',
                    borderColor: '#008cff',
                    borderWidth: 1
                },
                {
                    label: 'Courses',
                    data: {!! json_encode($courses_data) !!}, // Courses data for each month
                    backgroundColor: 'rgba(253, 53, 80, 0.6)',
                    borderColor: '#fd3550',
                    borderWidth: 1
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    display: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


@endpush
