<div class="course-overview-card pt-4">
    <h3 class="fs-24 font-weight-semi-bold pb-40px">Student feedback</h3>
    <div class="feedback-wrap">
        <div class="media media-card align-items-center">
            <div class="review-rating-summary">
                <span class="stats-average__count">{{ number_format($averageRating, 1) }}</span>

                <div class="rating-wrap pt-1">
                    <div class="review-stars">
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
                    <span class="rating-total d-block">({{$count_ratings}})</span>
                    <span>Course Rating</span>
                </div><!-- end rating-wrap -->
            </div><!-- end review-rating-summary -->


            <div class="media-body">
                @foreach (range(5, 1) as $star)  <!-- 5 থেকে 1 পর্যন্ত লুপ -->
                    @php
                        $count = $ratingsCount->get($star, 0);
                    
                        $percent = $totalRatings > 0 ? round(($count / $totalRatings) * 100) : 0;
                    @endphp
                    <div class="review-bars d-flex align-items-center mb-2">
                        <div class="review-bars__text">{{ $star }} stars</div>
                        <div class="review-bars__fill">
                            <div class="skillbar-box">
                                <div class="skillbar" data-percent="{{ $percent }}%">
                                    <div class="skillbar-bar bg-3" style="width: {{ $percent }}%;"></div>
                                </div> <!-- End Skill Bar -->
                            </div>
                        </div><!-- end review-bars__fill -->
                        <div class="review-bars__percent">{{ $percent }}%</div>
                    </div><!-- end review-bars -->
                @endforeach
            </div><!-- end media-body -->


        </div>
    </div><!-- end feedback-wrap -->
</div><!-- end course-overview-card -->
