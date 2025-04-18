<div class="course-overview-card pt-4">
    <h3 class="fs-24 font-weight-semi-bold pb-4">Reviews</h3>
    <div class="review-wrap">

        @forelse($ratings_data as $item)


        <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
            <div class="media-img mr-4 rounded-full">
                <img class="rounded-full lazy" src="images/img-loading.png"
                    data-src="{{asset($item->user->photo)}}" alt="User image">
            </div>
            <div class="media-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                    <h5>{{$item->user->name}}</h5>
                    <div class="review-stars">

                        @for($i=0; $i<$item->rating; $i++)
                        <span class="la la-star"></span>
                        @endfor

                    </div>
                </div>
              
                <span class="d-block lh-18 pb-2">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>

                <p class="pb-2">{{$item->comment}}</p>

            </div>
        </div><!-- end media -->

        @endforeach

    </div><!-- end review-wrap -->

</div><!-- end course-overview-card -->

<form method="post" action="{{route('rating.store')}}">
    @csrf
    <input type="hidden" name="course_id" value="{{$course->id}}" />
    <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}" />
    <input type="hidden" name="instructor_id" value="{{$course->instructor_id}}" />
    <div class="course-overview-card pt-4">
        <h3 class="fs-24 font-weight-semi-bold pb-4">Add a Review</h3>
        <div class="leave-rating-wrap pb-4">
            <div class="leave-rating leave--rating">
                <input type="radio" name='rating' id="star5" value="5" />
                <label for="star5"></label>
                <input type="radio" name='rating' id="star4" value="4" />
                <label for="star4"></label>
                <input type="radio" name='rating' id="star3" value="3" />
                <label for="star3"></label>
                <input type="radio" name='rating' id="star2" value="2" />
                <label for="star2"></label>
                <input type="radio" name='rating' id="star1" value="1" />
                <label for="star1"></label>
            </div><!-- end leave-rating -->
        </div>
        <div class="row">

            <div class="input-box col-lg-12">
                <label class="label-text">Message</label>
                <div class="form-group">
                    <textarea class="form-control form--control pl-3" name="comment" placeholder="Write Message" rows="5"></textarea>
                </div>
            </div><!-- end input-box -->
            <div class="btn-box col-lg-12">

                <button class="btn theme-btn" type="submit">Submit Review</button>
            </div><!-- end btn-box -->
        </div>
    </div><!-- end course-overview-card -->

</form>




