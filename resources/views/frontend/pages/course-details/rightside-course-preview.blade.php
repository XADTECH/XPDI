<div class="card card-item">
    <div class="card-body">
        <div class="preview-course-video">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal">
                <img src="{{ asset($course->course_image) }}"
                    data-src="{{ asset($course->course_image) }}" alt="course-img"
                    class="w-100 rounded lazy">
                <div class="preview-course-video-content">
                    <div class="overlay"></div>
                    <div class="play-button">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            viewBox="-307.4 338.8 91.8 91.8"
                            style=" enable-background:new -307.4 338.8 91.8 91.8;"
                            xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #ffffff;
                                    border-radius: 100px;
                                }

                                .st1 {
                                    fill: #000000;
                                }
                            </style>
                            <g>
                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9">
                                </circle>
                                <path class="st1"
                                    d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <p class="fs-15 font-weight-bold text-white pt-3">Preview this course</p>
                </div>
            </a>
        </div><!-- end preview-course-video -->
        <div class="preview-course-feature-content pt-40px">
            <p class="d-flex align-items-center pb-2">
                <span class="fs-35 font-weight-semi-bold text-black">${{$course->discount_price}}</span>
                <span class="before-price mx-1">${{$course->selling_price}}</span>
                <span class="price-discount">{{ round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100) }}% off</span>
            </p>
            <p class="preview-price-discount-text pb-35px">
                <span class="text-color-3">4 days</span> left at this price!
            </p>
            <div class="buy-course-btn-box">

                @php
                $user_id = auth()->check() ? auth()->user()->id : null;
                $course_purchase_count = 0;

                if ($user_id) {
                    $course_purchase_count = \App\Models\Order::where('user_id', $user_id)->where('course_id', $course->id)->count();
                }
            @endphp

            @if($course_purchase_count == 0)
                <button type="button" class="btn theme-btn w-100 mb-2 add-to-cart-btn" data-course-id="{{ $course->id }}">
                    <i class="la la-shopping-cart fs-18 mr-1"></i> Add to cart
                </button>
            @else
                <a href="/user/course/{{ $course->course_name_slug }}" class="btn theme-btn w-100 theme-btn-white mb-2">
                    <i class="la la-shopping-bag mr-1"></i> Go To Course
                </a>
            @endif


            </div>
            <p class="fs-14 text-center pb-4">30-Day Money-Back Guarantee</p>


            <div class="preview-course-incentives">
                <h3 class="card-title fs-18 pb-2">This course includes</h3>
                <ul class="generic-list-item pb-3">
                    <li><i class="la la-play-circle-o mr-2 text-color"></i>{{ number_format($total_lecture_duration / 60, 2) }} hours on-demand video</li>

                    <li><i class="la la-file mr-2 text-color"></i>{{$total_lecture}} articles</li>


                    <li><i class="la la-key mr-2 text-color"></i>Full lifetime access</li>
                    <li><i class="la la-television mr-2 text-color"></i>Access on mobile and
                        TV</li>
                    <li><i class="la la-certificate mr-2 text-color"></i>Certificate of
                        Completion</li>
                </ul>
                <div class="section-block"></div>
                <div class="buy-for-team-container pt-4">
                    <h3 class="fs-18 font-weight-semi-bold pb-2">Training 5 or more people?
                    </h3>
                    <p class="lh-24 pb-3">Get your team access to 3,000+ top Aduca courses
                        anytime, anywhere.</p>
                    <a href="{{route('instructor.register')}}"
                        class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30 w-100">Try
                        Aduca for Business</a>
                </div>
            </div><!-- end preview-course-incentives -->



        </div><!-- end preview-course-content -->
    </div>
</div><!-- end card -->
