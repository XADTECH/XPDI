@extends('frontend.master')

@section('content')

    @include('frontend.pages.instructor.breadcrumb')

    <section class="teacher-details-area pt-50px">

        @include('frontend.pages.instructor.review-section')

        @include('frontend.pages.instructor.tab-section')


    </section><!-- end teacher-details-area -->


    @include('frontend.pages.instructor.course')


    <div class="section-block"></div>

@endsection
