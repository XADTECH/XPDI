<section class="testimonial-area">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Testimonials</h5>
            <h2 class="section__title">Student's Feedback</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
    </div><!-- end container -->
    <div class="container-fluid">
        <div class="testimonial-carousel owl-action-styled">

            @foreach($all_reviews as $item)
            <div class="card card-item">
                <div class="card-body">
                    <div class="media media-card align-items-center pb-3">
                        <div class="media-img avatar-md">
                            <img src="{{asset($item->user->photo)}}" alt="Testimonial avatar"
                                class="rounded-full">
                        </div>
                        <div class="media-body">
                            <h5>{{$item->user->name}}</h5>
                            <div class="d-flex align-items-center pt-1">
                                <span class="lh-18 pr-2">Student</span>



                                <div class="review-stars">

                                    @for($i=0; $i < $item->rating; $i++)
                                    <span class="la la-star"></span>
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div><!-- end media -->
                    <p class="card-text">
                       {{$item->comment}}
                    </p>
                </div><!-- end card-body -->
            </div><!-- end card -->
            @endforeach


        </div><!-- end testimonial-carousel -->
    </div><!-- container-fluid -->
</section><!-- end testimonial-area -->
