<section class="course-area pb-90px">
    <div class="course-wrapper">
        <div class="container">
            <div class="section-heading text-center">
                <h5 class="ribbon ribbon-lg mb-2">Learn on your schedule</h5>
                <h2 class="section__title">Most Selling Courses</h2>
                <span class="section-divider"></span>
            </div><!-- end section-heading -->
            <div class="course-carousel owl-action-styled owl--action-styled mt-30px">

                @foreach($most_popular_courses as $index => $item)
                <div class="card card-item card-preview" data-tooltip-content="#{{$item->course->course_name_slug}}">
                    <div class="card-image">
                        <a href="{{ route('course-details', $item->course->course_name_slug) }}" class="d-block">
                            <img class="card-img-top" src="{{ asset($item->course->course_image) }}" width="250" height="250" alt="Card image cap">
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
                    <div class="card-body">
                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                            {{ $item->course->label }}
                        </h6>


                        <h5 class="card-title">
                            <a href="{{ route('course-details', $item->course->course_name_slug) }}">
                                {{ \Illuminate\Support\Str::limit($item->course->course_name, 50) }}
                            </a>
                        </h5>

                    <p class="card-text">
                        <a
                            href="{{ route('instructor', [$item->course['user']['name'], $item->course['user']['id']]) }}">
                            {{ $item->course['user']['name'] }}
                        </a>
                    </p>
                        <div class="rating-wrap d-flex align-items-center py-2">

                            <div class="review-stars">

                                @php

                                    $count_ratings = \App\Models\Review::where('status', 1)
                                        ->where('course_id', $item->course->id)
                                        ->count();
                                    $unique_student = \App\Models\Review::where('status', 1)
                                        ->where('course_id', $item->course->id)
                                        ->distinct()
                                        ->pluck('user_id')
                                        ->count();

                                    $averageRating = \App\Models\Review::where(
                                        'course_id',
                                        $item->course->id,
                                    )
                                        ->where('status', 1)
                                        ->avg('rating');

                                @endphp



                                <span
                                    class="rating-number">{{ number_format($averageRating, 1) }}</span>

                                @php
                                    $fullStars = floor($averageRating); // পূর্ণ তারকার সংখ্যা
                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0; // অর্ধেক তারকা (যদি থাকে)
                                    $emptyStars = 5 - $fullStars - $halfStar; // খালি তারকার সংখ্যা
                                @endphp

                                {{-- পূর্ণ তারকা --}}
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <span class="la la-star"></span>
                                @endfor

                                {{-- অর্ধেক তারকা --}}
                                @if ($halfStar)
                                    <span class="la la-star-half"></span>
                                @endif

                                {{-- খালি তারকা --}}
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <span class="la la-star-o"></span>
                                @endfor



                            </div>
                            <span class="rating-total pl-1">({{ $count_ratings }} ratings)</span>
                            <span class="student-total pl-2">{{ $unique_student }} students</span>


                        </div><!-- end rating-wrap -->
                        <div class="d-flex justify-content-between align-items-center">

                            <p class="card-price text-black font-weight-bold">
                                ${{ $item->course->discount_price }} <span
                                    class="before-price font-weight-medium">{{ $item->course->selling_price }}</span>
                            </p>

                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer wishlist-icon"
                            title="Add to Wishlist" data-course-id="{{ $item->course->id }}">

                            <?php
                            // Check if the user is authenticated
                            if (auth()->check()) {
                                $user_id = auth()->user()->id;

                                // Check if the course is in the wishlist
                                $isWishlisted = \App\Models\Wishlist::where('user_id', $user_id)->where('course_id', $item->course->id)->first();
                            } else {
                                $isWishlisted = null; // Default value for non-authenticated users
                            }
                            ?>

                            @if ($isWishlisted)
                                <i class="la la-heart"></i>
                            @else
                                <i class="la la-heart-o"></i>
                            @endif



                        </div>




                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
                @endforeach


            </div><!-- end tab-content -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
</section><!-- end courses-area -->
