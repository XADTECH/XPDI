<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/course_detail.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')
<!-- Course Header -->
<header class="course-header" style="background-image: url('{{ url('/' . $course->course_image) }}');">

    <div class="container">
        <div class="row course-header-content">
            <div class="col-lg-8">
                <div class="d-flex mb-2">
                    <a href="#" class="category-badge">
                        {{ Str::title($course->category->name ?? '') }}
                    </a>

                    <a href="#" class="category-badge">
                        {{ Str::title($course->subCategory->name ?? '') }}
                    </a>
                </div>

                <h1 class="course-title">{{ Str::title($course->title ?? '') }}</h1>
                <p class="course-subtitle">
                    {!! html_entity_decode($course->description) !!}
                </p>



                <div class="instructor-info">
                    <img src="{{ asset($course->instructor->photo) }}" alt="Instructor" height="100" width="100"
                        class="instructor-photo">
                    <span>{{ Str::title($course->instructor->name ?? '') }}</span>
                </div>


                <div class="course-stats">
                    <div class="stat-item">
                        <span>👤 {{ $course->students_count }} student</span>
                    </div>
                    <div class="stat-item">
                        <span>⏱️ {{ $course->duration . ' Minutes' }}</span>
                    </div>
                    <div class="stat-item">
                        <span>🎬 {{ $course->course_lecture_count }}</span>
                    </div>

                </div>

                <div class="action-buttons mt-3">
                    <div class="stat-item flex">
                        <span>📚 {{ $course->label }}</span>

                        <span> </span>

                        <div class="star-rating text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= round($course->review_avg_rating ?? 0))
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>
                        <span>
                            {{ number_format($course->review_avg_rating ?? 0, 1) }}
                            ({{ $course->review_count }} ratings)
                        </span>


                    </div>

                </div>
                <div class="action-buttons mt-3">
                    <button class="btn btn-outline-light">
                        ❤️ Wish list
                    </button>
                    <button class="btn btn-outline-light ml-2">
                        🔄 Share
                    </button>
                </div>
            </div>

            {{-- <div class="col-lg-4 mt-lg-0 mt-lg-43.4rem mt-md-0rem course-card-wrapper"> --}}
            <div class="col-lg-4 mt-lg-19.4rem mt-md-0rem course-card-wrapper">
                <div class="card course-card">
                    <div class="video-player position-relative">
                        <!-- Embedded YouTube Video -->
                        <iframe width="100%" height="315" src="{{ $course->video }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>


                    </div>

                    <div class="price-section" style="text-align: center;">
                        <div class="price">Free</div>
                        <a href="{{ url('/register') }}" class="cta-button">Enroll Now -></a>
                    </div>

                    <div class="course-includes">
                        <p class="mb-3"><b>This course includes:</b></p>
                        <div class="include-item mb-3">
                            <span>🎥 {{ $course->duration . ' Minutes' }} of video</span>
                        </div>
                        <div class="include-item mb-3">
                            <span>📝 {{ $course->course_section->count() }} Sections</span>
                        </div>
                        <div class="include-item mb-3">
                            <span>📝 {{ $course->course_lecture_count }} lectures</span>
                        </div>
                        <div class="include-item mb-3">
                            <span>🏆 Certificate of completion</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- What You'll Learn Section -->
            <section class="learn-section">
                <h3>What you will Learn?</h3>
                <ul class="learn-list">
                    <li>Learn React from the ground up and build beautiful React apps as an advanced React developer
                    </li>
                    <li>Become job-ready by learning React + modern JavaScript, plus tools like ES6+, npm, Parcel,
                        Babel</li>
                    <li>Learn React from a professional developer who has worked with React in a professional
                        setting</li>
                    <li>Build 3 beautiful, real-world projects with React, including an advanced app with multiple
                        pages</li>
                    <li>Learn all about React Hooks and modern React function components</li>
                    <li>Master advanced React concepts like state management, useReducer, Context API, and
                        performance optimization</li>
                    <li>Learn to fetch data with React Query (useQuery, useMutation, and more)</li>
                    <li>Understand the newest React Router from the ground up</li>
                    <li>Learn to use Tailwind CSS in React applications</li>
                    <li>Advanced React patterns: Compound Components, Higher-Order Components, Render Props, Context
                        API</li>
                    <li>Optional: Learn Redux, Redux Toolkit and thunks for fetching with Redux</li>
                    <li>Optional: Learn Node.js, Express, and MongoDB</li>
                </ul>
            </section>

            <!-- Requirements Section -->
            <section class="requirements-section">
                <h3>Requirements</h3>
                <div class="requirement-container" style="background-color: #D2D2D2;">
                    {!! $course->prerequisites !!}
                </div>

            </section>
        </div>
    </div>


    <!-- Course Content Section -->
    {{-- <section class="content-section">
        <h3>Course content</h3>
        <p>42 sections • 152 lectures • 25h total length</p>

        <div class="accordion content-accordion" id="courseContentAccordion">
            <!-- Getting Started Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Getting Started
                        <span class="section-info">5 lectures • 42 min</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#courseContentAccordion">
                    <div class="accordion-body">
                        <ul class="lecture-list">
                            <li class="lecture-item">
                                <div class="lecture-title">
                                    <i class="far fa-play-circle lecture-icon"></i>
                                    <span>Introduction to React.js</span>
                                </div>
                                <span class="lecture-duration">9:57</span>
                            </li>
                            <li class="lecture-item">
                                <div class="lecture-title">
                                    <i class="far fa-play-circle lecture-icon"></i>
                                    <span>Introduction to React 16</span>
                                </div>
                                <span class="lecture-duration">8:15</span>
                            </li>
                            <li class="lecture-item">
                                <div class="lecture-title">
                                    <i class="far fa-play-circle lecture-icon"></i>
                                    <span>Introduction to React 17</span>
                                </div>
                                <span class="lecture-duration">8:27</span>
                            </li>
                            <li class="lecture-item">
                                <div class="lecture-title">
                                    <i class="far fa-play-circle lecture-icon"></i>
                                    <span>Introduction to React 18</span>
                                </div>
                                <span class="lecture-duration">7:33</span>
                            </li>
                            <li class="lecture-item">
                                <div class="lecture-title">
                                    <i class="far fa-play-circle lecture-icon"></i>
                                    <span>Introduction to React.js</span>
                                </div>
                                <span class="lecture-duration">8:14</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- JavaScript Refresher Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        JavaScript Refresher
                        <span class="section-info">11 lectures • 62 min</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#courseContentAccordion">
                    <div class="accordion-body">
                        <!-- Content for JavaScript Refresher would go here -->
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="content-section">
        <h3>Course content</h3>
        <p>
            {{ $course->course_section->count() }} sections •
            {{ $course->course_lecture_count }} lectures •
            {{ $course->duration . ' Minutes' ?? 'Total time not set' }}
        </p>

        <div class="accordion content-accordion" id="courseContentAccordion">
            @foreach ($course->course_section as $index => $section)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-controls="collapse{{ $index }}">
                            {{ $section->section_title }}
                            <span class="section-info">
                                {{ $section->lecture->count() }} lectures
                                <!-- Optional: total section time if available -->
                            </span>
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}"
                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                        aria-labelledby="heading{{ $index }}" data-bs-parent="#courseContentAccordion">
                        <div class="accordion-body">
                            <ul class="lecture-list">
                                @foreach ($section->lecture as $lecture)
                                    <li class="lecture-item d-flex justify-content-between">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>{{ $lecture->lecture_title }}</span>
                                        </div>
                                        <span class="lecture-duration">
                                            {{ $lecture->video_duration . ' Minutes' ?? '--:--' }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="instructor-card md-text-center">
        <h1 class="instructor-heading">Course Instructor</h1>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ $course->instructor->photo ? asset($course->instructor->photo) : asset('frontend_assets/images/default-instructor.jpg') }}"
                    width="300" alt="Instructor Profile" class="profile-img">
            </div>

            <div class="col-md-9 mt-3 mt-md-0 ps-md-5 instructor-ratings">
                <h2 class="instructor-name">
                    {{ isset($course->instructor->name) ? Str::title($course->instructor->name) : '' }}
                </h2>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-star-fill stat-icon"></i>
                    <span class="stat-text">
                        {{ number_format($course->instructor->average_rating ?? 0, 1) }} Instructor Rating
                    </span>
                </div>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-chat-left-text-fill stat-icon"></i>
                    <span class="stat-text">
                        {{ $course->instructor->reviews_count ?? 0 }} Reviews
                    </span>
                </div>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-people-fill user-icon"></i>
                    <span class="stat-text">
                        {{ $course->instructor->students_count ?? 0 }} Students
                    </span>
                </div>

                <div class="instructor-stats d-flex align-items-center">
                    <i class="bi bi-journal-bookmark-fill stat-icon"></i>
                    <span class="stat-text">
                        {{ $course->instructor->courses_count ?? 0 }} Courses
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p class="instructor-bio mt-4" style="text-align: justify;">
                    {{ $course->instructor->bio ?? 'No instructor bio available.' }}
                </p>
            </div>
        </div>
    </div>


    <section class="reviews-section">
        <h1 class="reviews-title">Reviews</h1>

        @php
            $totalReviews = $course->review_count;
            $averageRating = $course->review_avg_rating ?? 0;

            $starCounts = [
                5 => $course->reviews->where('rating', 5)->count(),
                4 => $course->reviews->where('rating', 4)->count(),
                3 => $course->reviews->where('rating', 3)->count(),
                2 => $course->reviews->where('rating', 2)->count(),
                1 => $course->reviews->where('rating', 1)->count(),
            ];
        @endphp

        <div class="row justify-content-start">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="review-summary">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="rating-number">{{ number_format($averageRating, 1) }}</div>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($averageRating))
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="total-reviews">({{ $totalReviews }} Reviews)</div>
                        </div>
                        <div class="col-md-8 rating-details">
                            @foreach ($starCounts as $star => $count)
                                @php
                                    $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                @endphp
                                <div class="row align-items-center mb-2">
                                    <div class="col-2 star-count">{{ $star }} star{{ $star > 1 ? 's' : '' }}
                                    </div>
                                    <div class="col-8">
                                        <div class="rating-bar">
                                            <div class="rating-fill" style="width: {{ $percentage }}%;"></div>
                                        </div>
                                    </div>
                                    <div class="col-2 count-number">{{ $count }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($course->reviews as $review)
                <div class="col-md-4 mb-4">
                    <div class="review-card">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($review->user->photo) ?? 'https://i.pravatar.cc/120' }}"
                                alt="{{ $review->user->name }}" class="reviewer-img">
                            <div class="ms-3">
                                <h5 class="reviewer-name">{{ $review->user->name }}</h5>
                                <p class="reviewer-title">Student</p>
                            </div>
                        </div>
                        <div class="review-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="review-text">
                            {{ $review->comment ?? 'No comment provided.' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <!-- ////////////////////////////////////////////////// More Courses ////////////////////////////////////////////////////////// -->
    {{-- <section>
        <h2 class="fw-bold">More Courses by Nabeel javed</h2>
        <div class="row g-4 justify-content-center mt-3">
            <!-- Card 1 -->

            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2025</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Master modern React from beginner to advanced! Next.js, Context API, React Query...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <button class="btn btn-learn mt-3">Enroll Now →</button>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">Introduction to Data Structure Course 2025</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Learn the fundamentals of data structures like arrays, linked lists...
                    </p>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <button class="btn btn-learn mt-3">Enroll Now →</button>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">Node Js Learning Course</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Master backend development with Node.js, Express, REST APIs, authentication...

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <button class="btn btn-learn mt-3">Enroll Now →</button>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">Laravel for Beginners: From Zero to Production</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Learn Laravel from scratch and build real-world applications with routing...
                    </p>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <button class="btn btn-learn mt-3">Enroll Now →</button>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">Full Stack Development Course</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Become a full-stack developer by mastering HTML, CSS, JavaScript, React, Node.js...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <button class="btn btn-learn mt-3">Enroll Now →</button>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="course-card p-3">
                    <div class="course-img-wrapper">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            alt="Course image" />
                        <div class="course-badge">Software Development</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="text-dark small fw-semibold">Mr. Nabeel Javed</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-warning small me-1">★★★★★</div>
                            <strong class="me-1 small">5.0</strong>
                            <small class="text-muted">(170)</small>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-1 ps-0 ms-0">MySQL Database Course 2025</h6>
                    <p class="text-muted small mb-2 ps-0 ms-0">
                        Learn how to design, query, and manage databases using MySQL. Covers normalization...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark small">Beginner</span>
                        <span class="text-orange fw-bold">Paid</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted mt-2 small">
                        <span><i class="bi bi-people"></i> 180 Students</span>
                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                    </div>
                    <a href="{{ url('/register') }}" class="btn btn-learn mt-3">Enroll Now →</a>
                </div>
            </div>

        </div>

    </section> --}}

    <section>
        <h2 class="fw-bold">More Courses by {{ Str::title($course->instructor->name) }}</h2>
        <div class="row g-4  mt-3">
            @forelse ($moreCourses as $moreCourse)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset($moreCourse->course_image) }}" alt="Course image" />
                            <div class="course-badge">
                                {{ $moreCourse->category->name ?? 'Uncategorized' }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ $course->instructor->profile_image ?? 'https://i.pravatar.cc/120' }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">
                                    {{ Str::title($course->instructor->name) }}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($moreCourse->review_avg_rating ?? 0))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <strong class="me-1 small">
                                    {{ number_format($moreCourse->review_avg_rating ?? 0, 1) }}
                                </strong>
                                <small class="text-muted">
                                    ({{ $moreCourse->review_count }} reviews)
                                </small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">
                            {{ Str::limit($moreCourse->course_title, 50) }}
                        </h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            {{ Str::limit(strip_tags($moreCourse->description), 100) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">
                                {{ $moreCourse->label ?? 'General' }}
                            </span>
                            <span class="text-orange fw-bold">
                                {{ $moreCourse->selling_price > 0 ? 'Paid' : 'Free' }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> {{ $moreCourse->students_count }} Students</span>
                            <span><i class="bi bi-clock"></i> {{ $moreCourse->duration ?? '—' }} hrs</span>
                            <span><i class="bi bi-play-circle"></i> {{ $moreCourse->course_lecture_count }}
                                lessons</span>
                        </div>

                        <a href="{{ url('/course-details/' . $moreCourse->course_name_slug) }}"
                            class="btn btn-learn mt-3">Enroll Now →</a>
                    </div>
                </div>
            @empty
                <p class="text-muted">No other courses available by this instructor yet.</p>
            @endforelse
        </div>
    </section>


</main>

@include('frontend_components.footer')
