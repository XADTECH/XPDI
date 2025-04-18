@extends('backend.user.master')


@section('content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">My Courses</h3>
    </div>


    <div class="dashboard-cards mb-5">


        @foreach ($courses as $item)
            <div class="card card-item card-item-list-layout">
                <div class="card-image">
                    <a href="course-details.html" class="d-block">
                        <img class="card-img-top" src="{{ asset($item->course->course_image) }}" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">

                        <div class="course-badge">
                            @if ($item->course->bestseller == 'yes')
                                Bestseller
                            @elseif($item->course->featured == 'yes')
                                Featured
                            @else
                                HighestRated
                            @endif
                        </div>

                        <div class="course-badge blue">
                            -{{ round((($item->course->selling_price - $item->course->discount_price) / $item->course->selling_price) * 100) }}%
                        </div>
                    </div>
                </div><!-- end card-image -->


               @include('backend.user.course.main-body')


            </div><!-- end card -->
        @endforeach



    </div><!-- end col-lg-12 -->




   @include('frontend.section.pagination', ['data' => $courses])



@endsection
