<section class="testimonial-area bg-gray section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-content-wrap pb-4">
                    <div class="section-heading">
                        <h2 class="section__title mb-3">From the Aduca community</h2>
                        <p class="section__desc">
                            Donec vitae orci sed dolor rutrum auctor. Duis arcu tortor, suscipit eget, imperdiet nec
                        </p>
                    </div><!-- end section-heading -->
                    <div class="btn-box mt-28px">
                        <a href="about.html" class="btn theme-btn">Explore all <i class="la la-arrow-right icon ml-1"></i></a>
                    </div>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <h3 class="fs-22 font-weight-medium pb-3">30+ million people are already learning on Aduca</h3>
                <div class="testimonial-carousel-2 owl-action-styled owl-action-styled-2">

                    @foreach(studentReview() as $item)
                    <div class="card card-item">
                        <div class="card-body">
                            <p class="card-text">
                                {{$item->comment}}
                            </p>
                            <div class="media media-card align-items-center pt-4">
                                <div class="media-img avatar-md">
                                    <img src="{{asset($item->user->photo)}}" alt="Testimonial avatar" class="rounded-full">
                                </div>
                                <div class="media-body">
                                    <h5>{{$item->user->name}}</h5>
                                    <div class="d-flex align-items-center pt-1">
                                        <span class="lh-18 pr-2">{{$item->user->role}}</span>
                                        <div class="review-stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                    @endforeach

                </div><!-- end testimonial-carousel-2 -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->
