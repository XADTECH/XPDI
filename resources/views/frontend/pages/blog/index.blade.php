
@extends('frontend.master')

@section('content')

@include('frontend.section.breadcrumb', ['title' => 'Blog Details'])

<section class="blog-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="card card-item">
                    <div class="card-body">
                        {!! $blog->long_descp  !!}

                    </div>
                </div><!-- end card -->
                <div class="instructor-wrap py-5">
                    <h3 class="fs-22 font-weight-semi-bold pb-4">About the author</h3>
                    <div class="media media-card">
                        <div class="media-img rounded-full avatar-lg mr-4">
                            <img src="{{asset('frontend/images/img-loading.png')}}" data-src="{{asset('frontend/images/small-avatar-1.jpg')}}" alt="Avatar image" class="rounded-full lazy">
                        </div>
                        <div class="media-body">
                            <h5>Alex Smith</h5>
                            <span class="d-block lh-18 pt-2 pb-2">www.techydevs.com</span>
                            <p class="pb-3">I'm a growth-oriented digital marketer with a passion for content marketing, social media marketing wonders, conversion rate optimization, and keyword research. I strongly support permission marketing and earned media. More than anything</p>
                            <ul class="social-icons social-icons-styled social--icons-styled">
                                <li><a href="#"><i class="la la-facebook"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-instagram"></i></a></li>
                                <li><a href="#"><i class="la la-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end instructor-wrap -->



            </div><!-- end col-lg-8 -->

            @include('frontend.pages.blog.right-side')





        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->


@endsection
