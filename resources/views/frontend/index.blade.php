<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/home.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')


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
            <a href="#" class="btn btn-info text-white fw-semibold px-4 py-2">
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

            @foreach ($popular_courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset($course->course_image) }}" alt="Course image" />
                            <div class="course-badge">
                                {{ isset($course->category->name) ? $course->category->name : '' }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">
                                    {{ isset($course->instructor->name) ? ucwords($course->instructor->name) : '' }}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(170)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">
                            {{ isset($course->course_title) ? Str::ucfirst(Str::limit($course->course_title, 40, '...')) : '' }}
                        </h6>

                        <p class="text-muted small mb-2 ps-0 ms-0">
                            {!! Str::limit($course->description, 100, '...') !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small" style="text-transform: uppercase;">
                                {{ isset($course->label) ? $course->label : '' }}
                            </span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 180 Students</span>
                            <span><i class="bi bi-clock"></i> {{ isset($course->duration) ? $course->duration : '' }}
                                minutes</span>
                            <span><i class="bi bi-play-circle"></i> {{ $course->course_lecture_count }} lessons</span>

                        </div>
                        <a href="{{ url('/course-details/' . $course->course_name_slug) }}"
                            class="btn btn-learn mt-3">START
                            LEARNING
                            →</a>
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
                <h1 class="counter" data-target="50">0</h1>
                <div class="text-muted fs-6 fw-normal text-dark">
                    Expert Teachers
                </div>
            </div>
            <div class="col border-end border-1 border-secondary px-4">
                <h1 class="counter" data-target="54252">0</h1>
                <div class="text-muted fs-6 fw-normal">Foreign Followers</div>
            </div>
            <div class="col border-end border-1 border-secondary px-4">
                <h1 class="counter" data-target="97220">0</h1>
                <div class="text-muted fs-6 fw-normal">Students Enrolled</div>
            </div>
            <div class="col ps-4">
                <h1 class="counter" data-target="20">0</h1>
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
                                <img src="https://i.pravatar.cc/120?img=1" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Ana Vitória</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                XPDI gave me the confidence to switch careers... XPDI gave
                                me the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
                            </p>
                        </div>

                        <!-- Card 2 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=2" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Carlos Silva</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                The sessions were practical and insightful... XPDI gave me
                                the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
                            </p>
                        </div>

                        <!-- Card 3 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=3" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Maria Fernanda</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                Instructors really care about your progress... XPDI gave me
                                the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
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
                                <img src="https://i.pravatar.cc/120?img=4" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Lucas Mendes</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                XPDI gave me the confidence to switch careers... XPDI gave
                                me the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
                            </p>
                        </div>

                        <!-- Card 5 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=5" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Julia Costa</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                XPDI gave me the confidence to switch careers... XPDI gave
                                me the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
                            </p>
                        </div>

                        <!-- Card 6 -->
                        <div class="card p-4" style="width: 22rem">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://i.pravatar.cc/120?img=6" class="rounded-circle me-3" width="100"
                                    height="100" />
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">Pedro Henrique</h6>
                                    <small class="text-muted">Student</small>
                                </div>
                            </div>
                            <div class="text-start text-warning mb-2 fs-5">★★★★★</div>
                            <p class="text-start small text-secondary">
                                XPDI gave me the confidence to switch careers... XPDI gave
                                me the confidence to switch careers... XPDI gave me the
                                confidence to switch careers... XPDI gave me the confidence
                                to switch careers...
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


<!-- footer -->
@include('frontend_components.footer')
