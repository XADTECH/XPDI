<div class="sidebar mb-5">




    <div class="card card-item">
        <div class="card-body">
            <h3 class="card-title fs-18 pb-2">Instructors</h3>
            <div class="divider"><span></span></div>


            @php

                $instructors = \App\Models\Course::select('instructor_id', \DB::raw('COUNT(*) as total_courses'))
                    ->where('subcategory_id', $subcategory_id)
                    ->groupBy('instructor_id')
                    ->with('instructor')
                    ->get();

                // $all_instructor = \App\Models\User::where('role', 'instructor')->get();

            @endphp

            @foreach ($instructors as $index => $data)
                <div class="custom-control custom-checkbox mb-1 fs-15">
                    <input type="checkbox" class="custom-control-input instructor-checkbox"
                        id="instructorCheckbox{{ $index }}" value="{{ $data['instructor']['name'] }}">
                    <label class="custom-control-label custom--control-label text-black"
                        for="instructorCheckbox{{ $index }}">
                        {{ $data['instructor']['name'] }}
                    </label>
                </div><!-- end custom-control -->
            @endforeach


        </div>
    </div><!-- end card -->

    <div class="card card-item">
        <div class="card-body">
            <h3 class="card-title fs-18 pb-2">Level</h3>

            @php
                $beginer = \App\Models\Course::where('subcategory_id', $subcategory_id)
                    ->where('label', 'beginer')
                    ->count();
                $medium = \App\Models\Course::where('subcategory_id', $subcategory_id)
                    ->where('label', 'medium')
                    ->count();
                $advance = \App\Models\Course::where('subcategory_id', $subcategory_id)
                    ->where('label', 'advance')
                    ->count();
            @endphp


            <div class="divider"><span></span></div>
            <div class="custom-control custom-checkbox mb-1 fs-15">
                <input type="checkbox" class="custom-control-input level-filter" id="levelCheckbox" value="beginer">
                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox">
                    Beginer<span class="ml-1 text-gray">({{ $beginer }})</span>
                </label>
            </div><!-- end custom-control -->
            <div class="custom-control custom-checkbox mb-1 fs-15">
                <input type="checkbox" class="custom-control-input level-filter" id="levelCheckbox2" value="medium">
                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox2">
                    Medium<span class="ml-1 text-gray">({{ $medium }})</span>
                </label>
            </div><!-- end custom-control -->
            <div class="custom-control custom-checkbox mb-1 fs-15">
                <input type="checkbox" class="custom-control-input level-filter" id="levelCheckbox3" value="advance">
                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox3">
                    Advance<span class="ml-1 text-gray">({{ $advance }})</span>
                </label>
            </div><!-- end custom-control -->

        </div>
    </div><!-- end card -->

    <div class="card card-item">
        <div class="card-body">
            <h3 class="card-title fs-18 pb-2">Ratings</h3>
            <div class="divider"><span></span></div>
            <div class="custom-control custom-radio mb-1 fs-15">
                <input type="radio" class="custom-control-input rating-radio" id="fiveStarRating" value='5'
                    name="radio-stacked" required>
                <label class="custom-control-label custom--control-label" for="fiveStarRating">
                    <span class="rating-wrap d-flex align-items-center">
                        <span class="review-stars">
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                        </span>
                        <span class="rating-total pl-1">
                            <span class="mr-1 text-black">5.0</span>

                            @php

                                $rating_5 = DB::table('courses')
                                    ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                                    ->where('courses.subcategory_id', $subcategory_id)
                                    ->where('reviews.rating', 5)
                                    ->count();

                            @endphp
                            ({{ $rating_5 }})

                        </span>
                    </span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-1 fs-15">
                <input type="radio" class="custom-control-input rating-radio" id="fourStarRating" value="4"
                    name="radio-stacked" required>
                <label class="custom-control-label custom--control-label" for="fourStarRating">
                    <span class="rating-wrap d-flex align-items-center">
                        <span class="review-stars">
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>

                        </span>
                        <span class="rating-total pl-1"><span class="mr-1 text-black">4.0 & up</span>
                            @php

                                $rating_4 = DB::table('courses')
                                    ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                                    ->where('courses.subcategory_id', $subcategory_id)
                                    ->where('reviews.rating', 4)
                                    ->count();

                            @endphp
                            ({{ $rating_4 }})
                        </span>
                    </span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-1 fs-15">
                <input type="radio" class="custom-control-input rating-radio" id="threeStarRating" value="3"
                    name="radio-stacked" required>
                <label class="custom-control-label custom--control-label" for="threeStarRating">
                    <span class="rating-wrap d-flex align-items-center">
                        <span class="review-stars">
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                        </span>


                        <span class="rating-total pl-1"><span class="mr-1 text-black">3.0 & up</span>
                            @php

                                $rating_3 = DB::table('courses')
                                    ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                                    ->where('courses.subcategory_id', $subcategory_id)
                                    ->where('reviews.rating', 3)
                                    ->count();

                            @endphp
                            ({{ $rating_3 }})
                        </span>


                    </span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-1 fs-15">
                <input type="radio" class="custom-control-input rating-radio" id="twoStarRating" value="2"
                    name="radio-stacked" required>
                <label class="custom-control-label custom--control-label" for="twoStarRating">
                    <span class="rating-wrap d-flex align-items-center">
                        <span class="review-stars">
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                        </span>


                        <span class="rating-total pl-1"><span class="mr-1 text-black">2.0 & up</span>
                            @php

                                $rating_2 = DB::table('courses')
                                    ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                                    ->where('courses.subcategory_id', $subcategory_id)
                                    ->where('reviews.rating', 2)
                                    ->count();

                            @endphp
                            ({{ $rating_2 }})
                        </span>


                    </span>
                </label>
            </div>
            <div class="custom-control custom-radio mb-1 fs-15">
                <input type="radio" class="custom-control-input rating-radio" id="oneStarRating" value="1"
                    name="radio-stacked" required>
                <label class="custom-control-label custom--control-label" for="oneStarRating">
                    <span class="rating-wrap d-flex align-items-center">
                        <span class="review-stars">
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                            <span class="la la-star-o"></span>
                        </span>

                        <span class="rating-total pl-1"><span class="mr-1 text-black">1.0 & up</span>
                            @php

                                $rating_1 = DB::table('courses')
                                    ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                                    ->where('courses.subcategory_id', $subcategory_id)
                                    ->where('reviews.rating', 1)
                                    ->count();

                            @endphp
                            ({{ $rating_1 }})
                        </span>

                    </span>
                </label>
            </div>
        </div>
    </div><!-- end card -->























</div><!-- end sidebar -->



@push('scripts')
    <script>
        // Function to fetch and update the filters
        function fetchFilteredData() {

            var subcategory = "{{ $subcategory_id }}"

            

            // Get selected categories
            let selectedCategories = [];
            $(".category-checkbox:checked").each(function() {
                selectedCategories.push($(this).val());
            });

            // Get selected rating
            let selectedRating = $(".rating-radio:checked").val();

            let selectedDurations = [];
            $(".video-duration-filter:checked").each(function() {
                selectedDurations.push($(this).val());
            });

            let selectedLevels = [];
            $(".level-filter:checked").each(function() {
                selectedLevels.push($(this).val());
            });

            let selectedInstructors = [];
            $(".instructor-checkbox:checked").each(function() {
                selectedInstructors.push($(this).val());
            });



            // Build query parameters for the URL
            let queryParams = [];
            if (selectedCategories.length > 0) {
                queryParams.push("categories=" + selectedCategories.join(","));
            }
            if (selectedRating) {
                queryParams.push("rating=" + selectedRating);
            }

            if (selectedDurations.length > 0) {
                queryParams.push("durations=" + selectedDurations.join(","));
            }
            if (selectedLevels.length > 0) {
                queryParams.push("levels=" + selectedLevels.join(","));
            }

            if (selectedInstructors.length > 0) {
                queryParams.push("instructor=" + selectedInstructors.join(","));
            }



            let queryString = queryParams.length > 0 ? "?" + queryParams.join("&") : "";

            // Update the browser URL without reloading the page
            history.pushState(null, null, queryString);

            // AJAX request to fetch filtered data
            $.ajax({
                url: "/category-course/filter" + queryString,
                method: "GET",

                data: {
                subcategory: subcategory, // Send subcategory as a simple string

            },

                beforeSend: function() {
                    // Optionally, show a loader
                },
                success: function(response) {
                    console.log(response);
                    // Replace content with the filtered results
                    $('.course-main-content').html(response.html);



                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                },
            });
        }

        // Trigger filtering when any filter or dropdown option changes
        $(".category-checkbox, .rating-radio, .video-duration-filter, .level-filter, .instructor-checkbox").on(
            "click",
            function() {

                fetchFilteredData();
            });
    </script>
@endpush
