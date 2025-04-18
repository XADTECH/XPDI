<?php
$all_category = getCategories();
?>

@extends('frontend.master')

@section('content')
    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">All Category</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">Home</a></li>
                    <li>All Category</li>
                </ul>
            </div><!-- end breadcrumb-content -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->

    <section class="category-area section--padding">
        <div class="container">
            <div class="category-wrapper">
                <div class="row">

                    @foreach ($all_category as $item)

                    <?php

                    $course_count = \App\Models\Course::where('category_id', $item->id)->count();

                    ?>
                     <div class="col-lg-4 responsive-column-half">
                         <div class="category-item">

                             <img class="cat__img lazy" src="{{ asset($item->image ?? 'frontend/images/img2.jpg') }}"
                                 data-src="{{ asset($item->image ?? 'frontend/images/img2.jpg') }}" alt="Category image"
                                 width="370" height="246">

                             <div class="category-content">
                                 <div class="category-inner">
                                     <h3 class="cat__title"><a href="{{route('course-category', $item->slug)}}">{{ $item->name }}</a></h3>
                                     <p class="cat__meta">{{$course_count}} courses</p>
                                     <a href="{{route('course-category', $item->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-white">Explore<i
                                             class="la la-arrow-right icon ml-1"></i></a>
                                 </div>
                             </div><!-- end category-content -->
                         </div><!-- end category-item -->
                     </div><!-- end col-lg-4 -->
                 @endforeach


                </div><!-- end row -->
            </div><!-- end category-wrapper -->
        </div><!-- end container -->
    </section><!-- end category-area -->
@endsection
