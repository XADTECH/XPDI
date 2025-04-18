@extends('frontend.master')

@section('content')
    @include('frontend.section.breadcrumb')

    @include('frontend.pages.about-us.section.area')


    <!----get started area---->
    @include('frontend.pages.home.get-started-area')



    @include('frontend.pages.about-us.section.mission')



    <div class="section-block"></div>


    @include('frontend.pages.about-us.section.instructor-area')

    @include('frontend.pages.about-us.section.review')



    <div class="section-block"></div>

    @include('frontend.pages.about-us.section.instruction')



    <div class="section-block"></div>


    @include('frontend.pages.about-us.section.partner')
@endsection
