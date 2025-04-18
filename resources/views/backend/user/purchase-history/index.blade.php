@extends('backend.user.master')

@section('content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Purchase History</h3>
    </div>

    <div class="table-responsive mb-5">
        <table class="table generic-table">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Course</th>

                    <th scope="col">Instructor</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($order_data as $index => $item)
                <tr>
                    <th scope="row">
                        <ul class="generic-list-item">
                            <li>#{{$index+1}}</li>
                        </ul>
                    </th>
                    <td>
                        <div class="media media-card align-items-center">
                            <a href="{{route('course-details', $item->course->course_name_slug)}}" class="media-img">
                                <img class="mr-3" src="{{asset($item->course->course_image)}}"  alt="Cart image">
                            </a>
                            <div class="media-body">
                                <h5 class="fs-15"><a href="{{route('course-details', $item->course->course_name_slug)}}">{{$item->course->course_name}}</a></h5>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="media media-card align-items-center">
                            <a href="/instructor/{{$item->instructor->name}}/{{$item->instructor->id}}" class="media-img">
                                <img class="mr-3" src="{{asset($item->instructor->photo)}}"  alt="Cart image">
                            </a>
                            <div class="media-body">
                                <h5 class="fs-15"><a href="/instructor/{{$item->instructor->name}}/{{$item->instructor->id}}">{{$item->instructor->name}}</a></h5>
                            </div>
                        </div>
                    </td>


                    <td>
                        <ul class="generic-list-item">
                            <li>${{$item->price}}</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="generic-list-item">
                            <li>{{ $item->created_at->format('F d, Y') }}</li>
                        </ul>

                    </td>
                    <td>
                        <ul class="generic-list-item">
                            <li><span class="badge bg-success text-white p-1">Completed</span></li>
                        </ul>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
