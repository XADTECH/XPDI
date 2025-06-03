<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/home.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')

<meta name="csrf-token" content="{{ csrf_token() }}">


<style>
    .wishlist-btn {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
        /* 🛑 key part to bring it in front */
        background: none;
        border: none;
        padding: 0;
        margin: 1.5rem !important;
    }

    .wishlist-btn i {
        transition: transform 0.2s ease;
    }

    .wishlist-btn:hover i {
        transform: scale(1.2);
    }

    .course-card {
        position: relative;
    }
</style>



<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="display-5 fw-bold mb-3">
            Xad Professional Development <br />
            <span>Institute</span>
            <span class="highlight-orange">(XPDI)</span>
        </h1>

        <h1 style="font-size: 1.5rem">
            Offers <span class="highlight-yellow">Free of Cost</span> Vocational
            and skills development courses in gloabl demanding areas
        </h1>
        <h5 class="display-5 fw-light">Real Skills That Matter.</h5>


        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 justify-content-center gap-5">

            <div class="col-md-3 d-flex align-items-center p-5 glass-card">
                <img src="{{ asset('frontend_assets/images/Hero section/Free-courses.svg') }}" class="icon-img me-3"
                    alt="Display icon">
                <span class="ps-2 icon-text">Free Courses</span>
            </div>


            <div class="col-md-3 d-flex align-items-center p-5 glass-card">
                <img src="{{ asset('frontend_assets/images/Hero section/Flexible-learning.svg') }}"
                    class="icon-img me-3" alt="Notebook icon">
                <span class="ps-2 icon-text">Flexible Learning</span>
            </div>

            <div class="col-md-3 d-flex align-items-center p-5 glass-card">
                <img src="{{ asset('frontend_assets/images/Hero section/expert-instructors.svg') }}"
                    class="icon-img me-3" alt="Mortarboard icon">
                <span class="ps-2 icon-text">Learn from expert instructors</span>
            </div>

        </div>


        <div class="d-flex gap-5 justify-content-center flex-wrap mt-5">
            <a href="{{ url('/courses') }}" class="btn btn-info text-white fw-semibold px-4 py-2">
                EXPLORE COURSES →
            </a>
            <a href="{{ url('/register') }}" class="btn btn-light border fw-semibold px-4 py-2">
                REGISTER NOW →
            </a>
        </div>

    </div>
</section>

<!-- ////////////////////////////////////////////////// Popular Courses ////////////////////////////////////////////////////////// -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold">Popular Courses</h2>
        <p class="mb-5">
            Discover the most in-demand courses, handpicked to boost your skills —
            all for free.
        </p>
        <div class="row g-4 justify-content-center">
            <!-- Card 1 -->

            {{-- @foreach ($popular_courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset($course->course_image) }}" alt="Course image" />
                            <div class="course-badge">
                                {{ $course->category->name ?? '' }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">
                                    {{ $course->instructor->name ? ucwords($course->instructor->name) : '' }}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($course->review_avg_rating ?? 0))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <strong class="me-1 small">
                                    {{ number_format($course->review_avg_rating ?? 0, 1) }}
                                </strong>
                                <small class="text-muted">
                                    ({{ $course->review_count }} Reviews)
                                </small>
                            </div>

                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">
                            {{ $course->course_title ? Str::ucfirst(Str::limit($course->course_title, 40, '...')) : '' }}
                        </h6>

                        <p class="text-muted small mb-2 ps-0 ms-0">
                            {!! Str::limit(strip_tags($course->description), 100, '...') !!}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small" style="text-transform: uppercase;">
                                {{ $course->label ?? '' }}
                            </span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>

                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> {{ $course->students_count }} Students</span>
                            <span><i class="bi bi-clock"></i> {{ $course->duration ?? '' }} minutes</span>
                            <span><i class="bi bi-play-circle"></i> {{ $course->course_lecture_count }} Lessons</span>
                        </div>

                        @if (Auth::check() && Auth::user()->role === 'user')
                            <a href="{{ url('/requirement-gathering/' . $course->course_name_slug) }}"
                                class="btn btn-learn mt-3">Enroll now →</a>
                        @else
                            <a href="{{ url('/course-details/' . $course->course_name_slug) }}"
                                class="btn btn-learn mt-3">Enroll now →</a>
                        @endif
                    </div>
                </div>
            @endforeach --}}


            @foreach ($popular_courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3 position-relative">

                        @if (Auth::check() && Auth::user()->role === 'user')
                            <button class="wishlist-btn position-absolute top-0 start-0 m-2 p-0 border-0 bg-transparent"
                                data-course-id="{{ $course->id }}" data-wishlist-id="{{ $course->wishlist_id ?? '' }}"
                                data-is-liked="{{ $course->is_wished ? '1' : '0' }}">
                                @if ($course->is_wished)
                                    <i class="bi bi-heart-fill text-danger fs-4"></i> {{-- filled red heart --}}
                                @else
                                    <i class="bi bi-heart fs-4" style="color: red;"></i> {{-- outlined red heart --}}
                                @endif
                            </button>
                        @endif


                        <div class="course-img-wrapper">
                            <img src="{{ asset($course->course_image) }}" alt="Course image" />
                            <div class="course-badge">
                                {{ $course->category->name ?? '' }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">
                                    {{ $course->instructor->name ? ucwords($course->instructor->name) : '' }}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($course->review_avg_rating ?? 0))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <strong class="me-1 small">
                                    {{ number_format($course->review_avg_rating ?? 0, 1) }}
                                </strong>
                                <small class="text-muted">
                                    ({{ $course->review_count }} Reviews)
                                </small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">
                            {{ $course->course_title ? Str::ucfirst(Str::limit($course->course_title, 40, '...')) : '' }}
                        </h6>

                        <p class="text-muted small mb-2 ps-0 ms-0">
                            {!! Str::limit(strip_tags($course->description), 100, '...') !!}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small" style="text-transform: uppercase;">
                                {{ $course->label ?? '' }}
                            </span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>

                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> {{ $course->students_count }} Students</span>
                            <span><i class="bi bi-clock"></i> {{ $course->duration ?? '' }} minutes</span>
                            <span><i class="bi bi-play-circle"></i> {{ $course->course_lecture_count }} Lessons</span>
                        </div>

                        @if (Auth::check() && Auth::user()->role === 'user')
                            <a href="{{ url('/requirement-gathering/' . $course->course_name_slug) }}"
                                class="btn btn-learn mt-3">Enroll now →</a>
                        @else
                            <a href="{{ url('/course-details/' . $course->course_name_slug) }}"
                                class="btn btn-learn mt-3">Enroll now →</a>
                        @endif
                    </div>
                </div>
            @endforeach

            <!-- Repeat similar cards for Card 2 and Card 3 -->
            <!-- Just change the badge (Beginner/Medium), image URL, and text content accordingly -->
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/courses') }}" class="text-orange fw-semibold text-decoration-none">
            BROWSE ALL →
        </a>
    </div>

</section>
<!-- //////////////////////////////////////// How XPDI Works /////////////////////////////////////////////////////////////////////// -->
<section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">
            How <span class="text-warning">XPDI</span> Works
        </h2>
        <p class="mb-5 text-muted">
            Getting started is simple — just follow these easy steps to start
            learning online for free.
        </p>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="rounded-4 p-4 h-100 how_it_work_card">
                    <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                        style="width: 70px; height: 70px">
                        <img src="{{ asset('frontend_assets/images/How Xpdi works/Frame 1984077924.svg') }}"
                            alt="Icon" class="img-fluid" style="width: 80px; height: 80px;">
                    </div>
                    <h5 class="fw-bold">Create Your Account</h5>
                    <p class="text-muted small">
                        Sign up in seconds using your email or phone — it’s completely free.
                    </p>
                </div>
            </div>


            <div class="col-md-3">
                <div class="rounded-4 p-4 h-100 how_it_work_card">
                    <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                        style="width: 70px; height: 70px">
                        <img src="{{ asset('frontend_assets/images/How Xpdi works/Frame 1984077924-1.svg') }}"
                            alt="Icon" class="img-fluid" style="width: 80px; height: 80px;">
                    </div>
                    <h5 class="fw-bold">Browse Courses</h5>
                    <p class="text-muted small">
                        Explore a variety of professional courses across multiple
                        categories.
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="rounded-4 p-4 h-100 how_it_work_card">
                    <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                        style="width: 70px; height: 70px">
                        <img src="{{ asset('frontend_assets/images/How Xpdi works/Frame 1984077924-2.svg') }}"
                            alt="Icon" class="img-fluid" style="width: 80px; height: 80px;">
                    </div>
                    <h5 class="fw-bold">Start Learning</h5>
                    <p class="text-muted small">
                        Watch lessons online at your own pace, from anywhere, anytime.
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="rounded-4 p-4 h-100 how_it_work_card">
                    <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                        style="width: 70px; height: 70px">
                        <img src="{{ asset('frontend_assets/images/How Xpdi works/Frame 1984077924-3.svg') }}"
                            alt="Icon" class="img-fluid" style="width: 80px; height: 80px;">
                    </div>
                    <h5 class="fw-bold">Get Certificate</h5>
                    <p class="text-muted small">
                        Complete the course and earn a free certificate to boost your
                        career.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /////////////////////////////////////  Begin Your Skill-Building Journey //////////////////////////////////////////////////// -->
<section class="skill-building-section">
    <div class="container">
        <div class="skill-card">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-title">Begin Your Skill-Building Journey</h2>
                    <p class="section-description">
                        Unlock your potential with free access to practical, in-demand
                        courses. Whether you're just starting out or looking to grow
                        your expertise, XPDI offers the tools and support to help you
                        succeed — anytime, anywhere.
                    </p>
                    <div class="feature-list">
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Flexible learning schedule</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Flexible learning schedule</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-lg"></i>
                            <span>Flexible learning schedule</span>
                        </div>
                    </div>
                    <a href="#" class="register-btn">REGISTER NOW →<i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="col-lg-5">
                    <div class="students-card">
                        <div class="graduation-icon">
                            <img src="{{ asset('frontend_assets/images/Frame.png') }}" alt="Graduation Cap" />
                        </div>
                        <div class="students-info">
                            <p>JOIN 70,000+ STUDENTS</p>
                            <div class="student-avatars">
                                <img src="{{ asset('frontend_assets/images/skill_building/skill_building.jpeg') }}"
                                    alt="Student" class="avatar" />
                                <img src="{{ asset('frontend_assets/images/skill_building/skill_building.jpeg') }}"
                                    alt="Student" class="avatar" />
                                <img src="{{ asset('frontend_assets/images/skill_building/skill_building.jpeg') }}"
                                    alt="Student" class="avatar" />
                                <img src="{{ asset('frontend_assets/images/skill_building/skill_building.jpeg') }}"
                                    alt="Student" class="avatar" />
                                <img src="{{ asset('frontend_assets/images/skill_building/skill_building.jpeg') }}"
                                    alt="Student" class="avatar" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ////////////////////////////////////////  Oue Expert Instructors ////////////////////////////////////////////////////// -->
<section class="pt-5" style="background-color: #ffffff">
    <div class="container text-center">
        <h2 class="fw-bold display-6 text-dark">Oue Expert Instructors</h2>
        <p class="text-secondary mb-5">
            Our instructors are industry professionals with years of real-world
            experience and a passion for teaching
        </p>

        <div class="row justify-content-center">
            <!-- Instructor Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/nabeel-javed.jpg') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Mr. Nabeel Javed</h5>
                        <p class="text-muted small">
                            Software Development and Programming Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">100<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">3<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">5<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repeat the card 2 more times with different images -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/mr-raziq.jpg') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Mr. Razik Khan</h5>
                        <p class="text-muted small">
                            IT Infrastructure and Networking Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">100<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">3<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">5<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/Abdullah-shah-mubarak.png') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Mr. Abdullah Shah Mubarak</h5>
                        <p class="text-muted small">
                            Health and Safety Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">95<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">6<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">4.9<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center">
            <!-- Instructor Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/ms-maheen.jpg') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Ms Maheen</h5>
                        <p class="text-muted small">
                            English and Human Resources Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">150<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">2<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">4.3<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repeat the card 2 more times with different images -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/Muhammad-bilal-zulfiqar.jpg') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Mr. Bilal Zulfiqar </h5>
                        <p class="text-muted small">
                            Mobile Networking Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">80<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">4<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">4.7<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow rounded-4 h-100"
                    style="background-color: #f8f9fa; border-radius: 1.5rem">
                    <div class="pt-4 pb-3"
                        style="
                  background-color: #002b3d;
                  border-top-left-radius: 1.5rem;
                  border-top-right-radius: 1.5rem;
                ">
                        <img src="{{ asset('frontend_assets/images/instructors/Muhammad-shahbaz-ishaq.jpg') }}"
                            class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                            alt="Instructor" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Mr Shahbaz</h5>
                        <p class="text-muted small">
                            Accounts & Finance Expert
                        </p>
                        <div class="d-flex justify-content-around text-muted">
                            <div>
                                <i class="bi bi-people expert-icon"></i>
                                <div class="small">97<br /><small>Students</small></div>
                            </div>
                            <div>
                                <i class="bi bi-play-btn expert-icon"></i>
                                <div class="small">3<br /><small>Courses</small></div>
                            </div>
                            <div>
                                <i class="bi bi-star expert-icon"></i>
                                <div class="small">4.9<br /><small>Ratings</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- //////////////////////////////////// Counters and Testimonials //////////////////////////////////////////////////////////// -->

<!-- Testimonials Section with Background -->
<section class="py-5 mt-3" style="background-color: #ece9e4">
    <div class="container py-5">
        <div class="row text-orange fw-bold text-center">
            <div class="col border-end border-1 border-secondary pe-4">
                <h1 class="counter" data-target="10">0</h1>
                <div class="text-muted fs-6 fw-normal text-dark">
                    Expert Teachers
                </div>
            </div>
            <div class="col border-end border-1 border-secondary px-4">
                <h1 class="counter" data-target="20">0</h1>
                <div class="text-muted fs-6 fw-normal">Foreign Followers</div>
            </div>
            <div class="col border-end border-1 border-secondary px-4">
                <h1 class="counter" data-target="1112">0</h1>
                <div class="text-muted fs-6 fw-normal">Students Enrolled</div>
            </div>
            <div class="col ps-4">
                <h1 class="counter" data-target="2">0</h1>
                <div class="text-muted fs-6 fw-normal">Years of Experience</div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="container pb-5 text-center" style="cursor: default !important">
        <h1 class="fw-bold mb-4 text-dark fw-bold">What our Students says</h1>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <!-- Card 1 -->
                        <div class="card p-4" style="width: 25rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('frontend_assets/images/students/zeeshan_tariq.jpg') }}"
                                    class="rounded-circle me-3" width="100" height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Zeeshan Tariq</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                I recently discovered XPDI and I’m really glad I did. They provide free online courses
                                in Computer skills, HR, and Business English, and the content is honestly impressive.

                                All sessions are conducted live through Zoom, which creates a real classroom feel. The
                                instructors are knowledgeable and supportive — they explain things clearly and are
                                always open to questions, making the whole experience very interactive.

                                It’s rare to find such high-quality education for free. If you’re looking to improve
                                your skills without any cost, I definitely recommend XPDI.
                                Absolutely worth it! ⭐⭐⭐⭐⭐
                            </p>
                        </div>

                        <!-- Card 2 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('frontend_assets/images/students/hammad-alam.jpg') }}"
                                    class="rounded-circle me-3" width="100" height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Hammad Aalam</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                I am a student of XPDI Courses & i have attented 6 of their courses including ( Human
                                Resource, English L1, English L2, English Business, Computer, Customer Services ).
                                Alhamdulillah, i have completed all of them.
                                1st of all i would like to thank Sir Khaled ( CEO ) of ( XAD Technologies ) & founder of
                                ( XPDI ) for taking this great initiative. Then, i would like to say that the
                                environment of XPDI is fantastic, The trainers are expert & qualified in their
                                respective fields.
                            </p>
                        </div>

                        <!-- Card 3 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=5" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Iqra Sultana</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                I am the student of the first batch and I would like to sincerely thank the XPDI team
                                and specially sir Khalid for launching such an impactful initiative. By offering their
                                courses free of cost, they are not only making quality education accessible but also
                                creating valuable opportunities for professional growth. Thank you so much
                                all of you. You are all remained in my special prayers in Sha Allah.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <!-- Card 4 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('frontend_assets/images/students/m-sultan.jpg') }}"
                                    class="rounded-circle me-3" width="100" height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Muhammad Sultan</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                I highly recommend to all that join xpdi and get start with your new skills which build
                                this platform in very effective way. They offers the opportunity for your growth as
                                well.
                            </p>
                        </div>

                        <!-- Card 5 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=5" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Farah Taj</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                BS (Hons.) Computer Science + B. Ed
                                HR, Customer Services, all except one
                                It was overall great experience, learned alot from this platform, amazing lecturers,
                                accurate timing, gained lot of confidence and knowledge
                                Amazing platform to learn and get exposure from. Amazing and very supportive staff
                                members. Would recommed everyone.
                            </p>
                        </div>

                        <!-- Card 6 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('frontend_assets/images/students/raja-ahmed.jpg') }}"
                                    class="rounded-circle me-3" width="100" height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Raja Ahmed</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                "Discover the Power of Free Learning with XPDI! 🌟 I'm thrilled to share my experience
                                with XPDI, an excellent platform offering top-notch online courses in computer skills,
                                HR, and business English at no cost! Their live sessions via Zoom create an immersive
                                learning environment, and the instructors are knowledgeable, approachable, and always
                                ready to answer questions. If you're looking to upskill without breaking the bank, XPDI
                                is a must-try! Highly recommended! ⭐⭐⭐⭐⭐"
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel indicators -->
            <div class="carousel-indicators mt-4">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0"
                    class="active bg-warning rounded-circle" style="width: 12px; height: 12px"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                    class="bg-warning rounded-circle" style="width: 12px; height: 12px"></button>
            </div>
        </div>
    </div>
</section>

<script>
    // Counter animation
    const counters = document.querySelectorAll(".counter");
    counters.forEach((counter) => {
        counter.innerText = "0";
        const updateCounter = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            const increment = target / 100;
            if (count < target) {
                counter.innerText = `${Math.ceil(count + increment)}`;
                setTimeout(updateCounter, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });

    // Swipe support for Bootstrap carousel
    const carousel = document.querySelector("#testimonialCarousel");
    let startX = 0;

    carousel.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
    });

    carousel.addEventListener("touchend", (e) => {
        let endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) {
            bootstrap.Carousel.getInstance(carousel).next();
        } else if (endX - startX > 50) {
            bootstrap.Carousel.getInstance(carousel).prev();
        }
    });

    // Optional: Mouse drag support for desktops
    let isDown = false;
    let startMouseX = 0;

    carousel.addEventListener("mousedown", (e) => {
        isDown = true;
        startMouseX = e.clientX;
    });

    carousel.addEventListener("mouseup", (e) => {
        if (!isDown) return;
        isDown = false;
        const diff = startMouseX - e.clientX;
        if (diff > 50) {
            bootstrap.Carousel.getInstance(carousel).next();
        } else if (diff < -50) {
            bootstrap.Carousel.getInstance(carousel).prev();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll(".navbar-nav .nav-link");
        const path = window.location.pathname;

        links.forEach((link) => {
            if (link.href.includes(`${path}`)) {
                links.forEach((l) => l.classList.remove("active"));
                link.classList.add("active");
            }
        });
    });
</script>

{{-- ///// js for add and remove to and from wishlist in popular coruses section --}}

<script>
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const courseId = this.getAttribute('data-course-id');
            let wishlistId = this.getAttribute('data-wishlist-id');
            const isLiked = this.getAttribute('data-is-liked') === '1';
            const heartIcon = this.querySelector('i');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const baseUrl = "{{ url('/') }}";

            if (isLiked) {
                // DELETE request
                fetch(`${baseUrl}/user/remove/wishlist/${wishlistId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            heartIcon.classList.remove('bi-heart-fill', 'text-danger');
                            heartIcon.classList.add('bi-heart');
                            heartIcon.style.color = 'red';
                            heartIcon.style.borderRadius = '50%';

                            this.setAttribute('data-is-liked', '0');
                            this.setAttribute('data-wishlist-id', '');
                        }
                    })
                    .catch(err => console.error('Error:', err));
            } else {
                // POST request
                fetch(`${baseUrl}/wishlist/add`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            course_id: courseId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            heartIcon.classList.remove('bi-heart');
                            heartIcon.classList.add('bi-heart-fill', 'text-danger');
                            heartIcon.style.border = 'none';

                            this.setAttribute('data-is-liked', '1');
                            this.setAttribute('data-wishlist-id', data.wishlist_id);
                        }
                    })
                    .catch(err => console.error('Error:', err));
            }
        });
    });
</script>


<!-- footer -->
@include('frontend_components.footer')
