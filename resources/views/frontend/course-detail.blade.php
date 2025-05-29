<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/course_detail.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')
<!-- Course Header -->
<header class="course-header">
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
                    {{ Str::title($course->description ?? '') }}
                </p>

                <div class="instructor-info">
                    <img src="{{ asset($course->instructor->photo) }}" alt="Instructor" height="100" width="100"
                        class="instructor-photo">
                    <span>{{ Str::title($course->instructor->name ?? '') }}</span>
                </div>


                <div class="course-stats">
                    <div class="stat-item">
                        <span>👤 1 student</span>
                    </div>
                    <div class="stat-item">
                        <span>⏱️ 5.6 hours</span>
                    </div>
                    <div class="stat-item">
                        <span>🎬 {{ $course->course_lecture_count }}</span>
                    </div>

                </div>

                <div class="action-buttons mt-3">
                    <div class="stat-item flex">
                        <span>📚 Beginner</span>

                        <span> </span>

                        <div class="star-rating">
                            ★★★★★
                        </div>
                        <span>5.0 (12 ratings)</span>

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
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $course->video }}"
                            title="YouTube video player" frameborder="0"
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
                            <span>🎥 5.6 hours of video</span>
                        </div>
                        <div class="include-item mb-3">
                            <span>📝 3 lessons</span>
                        </div>
                        <div class="include-item mb-3">
                            <span>♾️ Lifetime access on mobile and TV</span>
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
                <ul class="requirements-list text-justify">
                    <li>JavaScript + HTML + CSS fundamentals are absolutely required</li>
                    <li>You DON'T need any React or other framework experience to take this course</li>
                    <li>You DON'T need extensive JavaScript knowledge, but basic ES6+ knowledge is helpful</li>
                    <li>Basic JavaScript knowledge is beneficial but not a must-have</li>
                    <li>No pre-knowledge required in any other tools, libraries or frameworks</li>
                </ul>
            </section>
        </div>
    </div>


    <!-- Course Content Section -->
    <section class="content-section">
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
    </section>


    <div class="instructor-card md-text-center">
        <h1 class="instructor-heading">Course Instructor</h1>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('frontend_assets/images/instructors/nabeel-javed.jpg') }}" width="300"
                    alt="Instructor Profile" class="profile-img">
            </div>
            <div class="col-md-9 mt-3 mt-md-0 ps-md-5 instructor-ratings">
                <h2 class="instructor-name">Nabeel Javed</h2>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-star-fill stat-icon"></i>
                    <span class="stat-text">4.6 Instructor Rating</span>
                </div>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-chat-left-text-fill stat-icon"></i>
                    <span class="stat-text">2,533 Reviews</span>
                </div>

                <div class="instructor-stats d-flex align-items-center mb-3">
                    <i class="bi bi-people-fill user-icon"></i>
                    <span class="stat-text">3,267,999 Students</span>
                </div>

                <div class="instructor-stats d-flex align-items-center">
                    <i class="bi bi-journal-bookmark-fill stat-icon"></i>
                    <span class="stat-text">3 Courses</span>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <p class="instructor-bio mt-4" style="text-align: justify;">
                    Java Python Android and C# Expert Developer - 878K+ students Lorem Ipsum is simply dummy
                    text of the
                    printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                    ever
                    since the 1500s... [trimmed for brevity]
                </p>
            </div>
        </div>

    </div>

    <section class="reviews-section">
        <h1 class="reviews-title">Reviews</h1>

        <div class="row justify-content-start">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="review-summary">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="rating-number">4.7</div>
                            <div class="star-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <div class="total-reviews">(578 Reviews)</div>
                        </div>
                        <div class="col-md-8 rating-details">
                            <div class="row align-items-center mb-2">
                                <div class="col-2 star-count">5 stars</div>
                                <div class="col-8">
                                    <div class="rating-bar">
                                        <div class="rating-fill" style="width: 85%;"></div>
                                    </div>
                                </div>
                                <div class="col-2 count-number">488</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-2 star-count">4 stars</div>
                                <div class="col-8">
                                    <div class="rating-bar">
                                        <div class="rating-fill" style="width: 15%;"></div>
                                    </div>
                                </div>
                                <div class="col-2 count-number">74</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-2 star-count">3 stars</div>
                                <div class="col-8">
                                    <div class="rating-bar">
                                        <div class="rating-fill" style="width: 5%;"></div>
                                    </div>
                                </div>
                                <div class="col-2 count-number">14</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-2 star-count">2 stars</div>
                                <div class="col-8">
                                    <div class="rating-bar">
                                        <div class="rating-fill" style="width: 0%;"></div>
                                    </div>
                                </div>
                                <div class="col-2 count-number">0</div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-2 star-count">1 star</div>
                                <div class="col-8">
                                    <div class="rating-bar">
                                        <div class="rating-fill" style="width: 0%;"></div>
                                    </div>
                                </div>
                                <div class="col-2 count-number">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Review Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=1" alt="Ana Vitória" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Ana Vitória</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>

            <!-- Review Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=2" alt="Liam Harper" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Liam Harper</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>

            <!-- Review Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=3" alt="Sophie Kim" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Sophie Kim</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Review Card 4 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=4" alt="Ravi Patel" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Ravi Patel</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>

            <!-- Review Card 5 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=5" alt="Elena Cruz" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Elena Cruz</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>

            <!-- Review Card 6 -->
            <div class="col-md-4 mb-4">
                <div class="review-card">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/120?img=6" alt="Mason Liu" class="reviewer-img">
                        <div class="ms-3">
                            <h5 class="reviewer-name">Mason Liu</h5>
                            <p class="reviewer-title">Student</p>
                        </div>
                    </div>
                    <div class="review-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="review-text">This course gave me practical tools for real-world success. The structure
                        was perfect and helped build my confidence professionally and personally.</p>
                </div>
            </div>
        </div>


    </section>

    <!-- ////////////////////////////////////////////////// More Courses ////////////////////////////////////////////////////////// -->
    <section>
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

    </section>

</main>

@include('frontend_components.footer')
