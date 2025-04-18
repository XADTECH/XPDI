@extends('frontend.master')


@section('content')


@include('frontend.section.breadcrumb', ['title' => 'Blog List'])


<section class="course-area section-padding">
    <div class="container">
        <div class="filter-bar mb-4">
            <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                <p class="fs-14">We found <span class="text-black">{{$blog_data['blogpost']->count()}}</span> blogs available for you</p>

            </div><!-- end filter-bar-inner -->

        </div><!-- end filter-bar -->
        <div class="row">

            @foreach($blog_posts as $item)
            <div class="col-lg-4">
                <div class="card card-item">
                    <div class="card-image">
                        <a href="{{route('blogDetails', $item->post_slug)}}" class="d-block">
                            <img class="card-img-top lazy" src="{{$item->post_image}}" alt="Card image cap" style="">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge">{{ $item->created_at->format('M d, Y') }}</div>

                        </div>
                    </div><!-- end card-image -->
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('blogDetails', $item->post_slug)}}">{{$item->post_title}}</a></h5>
                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                            <li class="d-flex align-items-center">By<a href="#">TechyDevs</a></li>
                            <li class="d-flex align-items-center"><a href="#">4 Comments</a></li>
                            <li class="d-flex align-items-center"><a href="#">130 Likes</a></li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <a href="{{route('blogDetails', $item->post_slug)}}" class="btn theme-btn theme-btn-sm theme-btn-white">Read More <i class="la la-arrow-right icon ml-1"></i></a>
                            <div class="share-wrap">
                                <ul class="social-icons social-icons-styled">
                                    <li class="mr-0"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                                    <li class="mr-0"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                                    <li class="mr-0"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                                </ul>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            @endforeach


        </div><!-- end row -->


        @include('frontend.section.pagination', ['data' => $blog_posts])



    </div><!-- end container -->
</section>

@endsection
