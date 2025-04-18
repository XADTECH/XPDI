<?php
$course_category = getCourseCategories();
?>

@foreach ($course_category as $data)
    @foreach ($data['course'] as $course)
        <div class="tooltip_templates">
            <div id="{{ $course->course_name_slug }}">
                <div class="card card-item">
                    <div class="card-body">
                        <p class="card-text pb-2">By <a href="teacher-detail.html">{{ $course['user']['name'] }}</a></p>
                        <h5 class="card-title pb-1"><a
                                href="{{ route('course-details', $course->course_name_slug) }}">{{ $course->course_name }}</a>
                        </h5>
                        <div class="d-flex align-items-center pb-1">
                            <h6 class="ribbon fs-14 mr-2">
                                @if ($course->bestseller == 'yes')
                                    Bestseller
                                @elseif($course->featured == 'yes')
                                    Featured
                                @else
                                    HighestRated
                                @endif
                            </h6>
                            <p class="text-success fs-14 font-weight-medium">Updated<span class="font-weight-bold pl-1">
                                    {{ \Carbon\Carbon::parse($course->updated_at)->format('F Y') }}
                                </span></p>
                        </div>
                        <ul
                            class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                            <li>{{ $course->duration }} total hours</li>
                            <li style="text-transform: capitalize">{{ $course->label }}</li>
                        </ul>
                        <p class="card-text pt-1 fs-14 lh-22">{{ $course->course_title }}</p>
                        <ul class="generic-list-item fs-14 py-3">

                            @foreach ($course['course_goal']->slice(0, 5) as $goal)
                                <li>
                                    <i class="la la-check mr-1 text-black"></i>
                                    {{ $goal->goal_name }}
                                </li>
                            @endforeach

                        </ul>
                        <div class="d-flex justify-content-between align-items-center">

                            {{--

                              <a href="javascript:void(0)" class="btn theme-btn flex-grow-1 mr-3 add-to-cart-btn"
                                data-course-id="{{ $course->id }}">
                                <i class="la la-shopping-cart mr-1 fs-18"></i> Add to Cart
                            </a>


                            --}}



                            @php
                                $course_purchase_count = 0;

                                if (auth()->check()) {
                                    // Check if the user is authenticated
                                    $user_id = auth()->user()->id;
                                    $course_purchase_count = \App\Models\Order::where('user_id', $user_id)
                                        ->where('course_id', $course->id)
                                        ->count();
                                }
                            @endphp

                            @if ($course_purchase_count == 0)
                                <button type="button" class="btn theme-btn w-100 mb-2 add-to-cart-btn"
                                    data-course-id="{{ $course->id }}">
                                    <i class="la la-shopping-cart fs-18 mr-1"></i> Add to cart
                                </button>
                            @else
                                <a href="/user/course/{{ $course->course_name_slug }}"
                                    class="btn theme-btn w-100 theme-btn-white mb-2">
                                    <i class="la la-shopping-bag mr-1"></i> Go To Course
                                </a>
                            @endif


                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer wishlist-icon"
                                title="Add to Wishlist" data-course-id="{{ $course->id }}">

                                <?php
                                // Check if the user is authenticated
                                if (auth()->check()) {
                                    $user_id = auth()->user()->id;
                                
                                    // Check if the course is in the wishlist
                                    $isWishlisted = \App\Models\Wishlist::where('user_id', $user_id)->first();
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
                    </div>
                </div><!-- end card -->
            </div>
        </div><!-- end tooltip_templates -->
    @endforeach
@endforeach

@push('scripts')
@endpush
