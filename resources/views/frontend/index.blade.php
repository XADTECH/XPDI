<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XPDI Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/home.css') }}" />
</head>

<body>
    <!-- Top Contact Bar -->
    <div class="top-bar py-2">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-4">
                <span><i class="bi bi-telephone"></i> +971 54 701 4800</span>
                <span><i class="bi bi-envelope-at"></i> info@xpdi.com</span>
            </div>
            <a href="#" class="text-dark fw-semibold">LOGIN/REGISTER</a>
        </div>
    </div>

    <!-- Main Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #0c1a38; padding: 1rem 2rem">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend_assets/images/XPDI - white w trbg-83.png') }}" alt="XPDI Logo"
                    height="60" />
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav & Search Content -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <!-- Search box (centered on desktop, full-width on mobile) -->
                <!-- Updated Search Bar -->
                <!-- Clean Search Box with Unified Look -->
                <form class="d-flex mx-auto my-3 my-lg-0" style="width: 50%">
                    <div class="input-group w-100"
                        style="
                border-radius: 10px;
                overflow: hidden;
                background-color: white;
                height: 48px;
              ">
                        <span class="input-group-text border-0 bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="search" class="form-control border-0 shadow-none" placeholder="Search"
                            aria-label="Search" style="box-shadow: none; outline: none; height: 100%" />
                    </div>
                </form>

                <!-- Menu -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase fw-bold">
                    <li class="nav-item">
                        <a class="nav-link active" href="#!" style="border-bottom: 2px solid #00bcd4">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">ABOUT</a>
                    </li>

                    <!-- Courses Dropdown -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            COURSES
                        </a>
                        <div class="dropdown-menu w-100 shadow p-4 mega-dropdown bg-white mt-2"
                            aria-labelledby="coursesDropdown">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="fw-bold text-warning">
                                        Language & Office Skills
                                    </h6>
                                    <a class="dropdown-item" href="#">English Language (Basic & Advanced)</a>
                                    <a class="dropdown-item" href="#">Human Resources</a>
                                    <a class="dropdown-item" href="#">Accounts and Finance</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Creative & IT Skills</h6>
                                    <a class="dropdown-item" href="#">Graphic Design</a>
                                    <a class="dropdown-item" href="#">Web Designing</a>
                                    <a class="dropdown-item" href="#">Software Development</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Business & Customer Skills</h6>
                                    <a class="dropdown-item" href="#">Sales and Marketing</a>
                                    <a class="dropdown-item" href="#">Customer Care</a>
                                    <a class="dropdown-item" href="#">Software Development</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Vocational & Technical Skills</h6>
                                    <a class="dropdown-item" href="#">Stitching and Embroidery</a>
                                    <a class="dropdown-item" href="#">Telecommunication</a>
                                    <a class="dropdown-item" href="#">Construction</a>
                                    <a class="dropdown-item" href="#">Health and Safety</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="blogs.html">BLOGS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 justify-content-center">
                <div class="col">
                    <div class="feature-card">
                        <div class="feature-icon">📽️</div>
                        <div>Free Courses</div>
                    </div>
                </div>
                <div class="col">
                    <div class="feature-card">
                        <div class="feature-icon">📜</div>
                        <div>Free certificates upon completing</div>
                    </div>
                </div>
                <div class="col">
                    <div class="feature-card">
                        <div class="feature-icon">🎓</div>
                        <div>Learn from expert instructors</div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-5 justify-content-center flex-wrap mt-5">
                <a href="#" class="btn btn-info text-white fw-semibold px-4 py-2">
                    EXPLORE COURSES →
                </a>
                <a href="#" class="btn btn-light border fw-semibold px-4 py-2">
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
                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/human-resource-hiring-recruiter-select-career-concept.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/human-resource-hiring-recruiter-select-career-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/marketing-strategy-planning-strategy-concept (1).jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/marketing-strategy-planning-strategy-concept (1).jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/shopping-banking-accounting-webpage-text-search-concept.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/shopping-banking-accounting-webpage-text-search-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/young-adult-reusing-fabric-material.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Development</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/young-adult-reusing-fabric-material.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">nabeel javed</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2024</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
                            Tailwind, advanced patterns
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 1 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

                <!-- Repeat similar cards for Card 2 and Card 3 -->
                <!-- Just change the badge (Beginner/Medium), image URL, and text content accordingly -->
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="text-orange fw-semibold text-decoration-none">
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
                            <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                                alt="Instructor" />
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Nabeel Javed</h5>
                            <p class="text-muted small">
                                Machine learning and programming expert
                            </p>
                            <div class="d-flex justify-content-around text-muted">
                                <div>
                                    <i class="bi bi-people expert-icon"></i>
                                    <div class="small">20<br /><small>Students</small></div>
                                </div>
                                <div>
                                    <i class="bi bi-play-btn expert-icon"></i>
                                    <div class="small">20<br /><small>Courses</small></div>
                                </div>
                                <div>
                                    <i class="bi bi-star expert-icon"></i>
                                    <div class="small">4.9<br /><small>Ratings</small></div>
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
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                                alt="Instructor" />
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Nabeel Javed</h5>
                            <p class="text-muted small">
                                Machine learning and programming expert
                            </p>
                            <div class="d-flex justify-content-around text-muted">
                                <div>
                                    <i class="bi bi-people expert-icon"></i>
                                    <div class="small">20<br /><small>Students</small></div>
                                </div>
                                <div>
                                    <i class="bi bi-play-btn expert-icon"></i>
                                    <div class="small">20<br /><small>Courses</small></div>
                                </div>
                                <div>
                                    <i class="bi bi-star expert-icon"></i>
                                    <div class="small">4.9<br /><small>Ratings</small></div>
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
                            <img src="https://randomuser.me/api/portraits/men/44.jpg"
                                class="rounded-circle mx-auto d-block instructor-img border border-3 border-white"
                                alt="Instructor" />
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Nabeel Javed</h5>
                            <p class="text-muted small">
                                Machine learning and programming expert
                            </p>
                            <div class="d-flex justify-content-around text-muted">
                                <div>
                                    <i class="bi bi-people expert-icon"></i>
                                    <div class="small">20<br /><small>Students</small></div>
                                </div>
                                <div>
                                    <i class="bi bi-play-btn expert-icon"></i>
                                    <div class="small">20<br /><small>Courses</small></div>
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
                                    <img src="https://i.pravatar.cc/120?img=1" class="rounded-circle me-3"
                                        width="100" height="100" />
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
                                    <img src="https://i.pravatar.cc/120?img=2" class="rounded-circle me-3"
                                        width="100" height="100" />
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
                                    <img src="https://i.pravatar.cc/120?img=3" class="rounded-circle me-3"
                                        width="100" height="100" />
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
                                    <img src="https://i.pravatar.cc/120?img=4" class="rounded-circle me-3"
                                        width="100" height="100" />
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
                                    <img src="https://i.pravatar.cc/120?img=5" class="rounded-circle me-3"
                                        width="100" height="100" />
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
                                    <img src="https://i.pravatar.cc/120?img=6" class="rounded-circle me-3"
                                        width="100" height="100" />
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

    <footer class="bg-dark text-white pt-5 pb-4" style="background-color: #101c3a !important">
        <div class="container">
            <div class="row gy-4">
                <!-- Logo and description -->
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('frontend_assets/images/XPDI - white w trbg-83.png') }}" alt="XPDI Logo"
                        class="mb-3" style="height: 60px" />
                    <p class="text-secondary" style="max-width: 300px">
                        XPDI Dubai offers hands-on, industry-driven training programs to
                        help individuals grow, upskill, and succeed. Join our community of
                        learners and educators shaping the future of professional
                        development.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-x"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Company -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold text-white mb-3">Company</h6>
                    <ul class="list-unstyled text-secondary">
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">About us</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Contact us</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Become an
                                instructor</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">FAQs</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block">Blogs</a>
                        </li>
                    </ul>
                </div>

                <!-- Courses -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold text-white mb-3">Courses</h6>
                    <ul class="list-unstyled text-secondary">
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Finance &
                                Accounting</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Health &
                                Fitness</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Design</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block mb-2">Business</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block">Marketing</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold text-white mb-3">Contact</h6>
                    <ul class="list-unstyled text-secondary">
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill text-info me-2"></i>+971 54 701
                            4800
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope-at-fill text-info me-2"></i>info@xpdi.com
                        </li>
                        <li>
                            <i class="bi bi-geo-alt-fill text-info me-2"></i>Dubai
                            Investment Park, UAE
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="d-flex justify-content-between flex-wrap border-top mt-4 pt-3 text-secondary small">
                <div>© 2025 XPDI. All rights reserved.</div>
                <div class="d-flex gap-4">
                    <a href="#" class="text-decoration-none text-secondary">Privacy Policy</a>
                    <a href="#" class="text-decoration-none text-secondary">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.js"></script>
</body>

</html>
