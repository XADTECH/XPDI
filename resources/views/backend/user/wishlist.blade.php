@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/wishlist.css') }}">

<body>
    <div class="d-flex">
        <!-- Sidebar (collapsed on <lg) -->
        @include('backend-components.users.sidebar')

        <!-- Page area -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Top bar with toggle button -->
            @include('backend-components.users.header')

            <!-- Main content -->
            <main class="content-wrapper p-4">
                <h2 class="fw-bold mb-4">Wishlist Courses</h2>

                <div class="wishlist-container mt-4">
                    <div class="row">
                        <!-- Course Card 1 -->
                        <div class="col-md-4 mb-4 pe-lg-5">
                            <div class="course-card p-3">
                                <div class="course-img-wrapper">
                                    <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                        alt="Course image" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                            class="rounded-circle me-2" width="30" height="30" alt="Author">
                                        <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-warning small me-1">★★★★★</div>
                                        <strong class="me-1 small">5.0</strong>
                                        <small class="text-muted">(170)</small>
                                    </div>
                                </div>
                                <h6 class="fw-bold mb-1 course-title">The Ultimate React Course 2025</h6>
                                <p class="text-muted small mb-2">
                                    Master modern React from beginner to advanced! Next.js, Context API, React Query,
                                    Redux,
                                    Tailwind, advanced patterns
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
                                <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">START
                                    LEARNING
                                    →</a>
                            </div>
                        </div>

                        <!-- Course Card 2 -->
                        <div class="col-md-4 mb-4 ps-lg-5">
                            <div class="course-card p-3">
                                <div class="course-img-wrapper">
                                    <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                        alt="Course image" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                            class="rounded-circle me-2" width="30" height="30" alt="Author">
                                        <span class="text-dark small fw-semibold">Ms. Alveena</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-warning small me-1">★★★★★</div>
                                        <strong class="me-1 small">5.0</strong>
                                        <small class="text-muted">(12)</small>
                                    </div>
                                </div>
                                <h6 class="fw-bold mb-1 course-title">Speak and Understand English with Confidence</h6>
                                <p class="text-muted small mb-2">
                                    Build your English speaking, listening, and grammar skills step by step...
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-info text-dark small">Beginner</span>
                                    <span class="text-orange fw-bold">Free</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted mt-2 small">
                                    <span><i class="bi bi-people"></i> 110 Students</span>
                                    <span><i class="bi bi-clock"></i> 5 hrs</span>
                                    <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                                </div>
                                <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">START
                                    LEARNING
                                    →</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Course Card 1 -->
                        <div class="col-md-4 mb-4 pe-lg-5">
                            <div class="course-card p-3">
                                <div class="course-img-wrapper">
                                    <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                        alt="Course image" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                            class="rounded-circle me-2" width="30" height="30" alt="Author">
                                        <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-warning small me-1">★★★★★</div>
                                        <strong class="me-1 small">5.0</strong>
                                        <small class="text-muted">(170)</small>
                                    </div>
                                </div>
                                <h6 class="fw-bold mb-1 course-title">The Ultimate React Course 2025</h6>
                                <p class="text-muted small mb-2">
                                    Master modern React from beginner to advanced! Next.js, Context API, React Query,
                                    Redux,
                                    Tailwind, advanced patterns
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
                                <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">START
                                    LEARNING
                                    →</a>
                            </div>
                        </div>

                        <!-- Course Card 2 -->
                        <div class="col-md-4 mb-4 ps-lg-5">
                            <div class="course-card p-3">
                                <div class="course-img-wrapper">
                                    <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                        alt="Course image" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                            class="rounded-circle me-2" width="30" height="30"
                                            alt="Author">
                                        <span class="text-dark small fw-semibold">Ms. Alveena</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-warning small me-1">★★★★★</div>
                                        <strong class="me-1 small">5.0</strong>
                                        <small class="text-muted">(12)</small>
                                    </div>
                                </div>
                                <h6 class="fw-bold mb-1 course-title">Speak and Understand English with Confidence</h6>
                                <p class="text-muted small mb-2">
                                    Build your English speaking, listening, and grammar skills step by step...
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-info text-dark small">Beginner</span>
                                    <span class="text-orange fw-bold">Free</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted mt-2 small">
                                    <span><i class="bi bi-people"></i> 110 Students</span>
                                    <span><i class="bi bi-clock"></i> 5 hrs</span>
                                    <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                                </div>
                                <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">START
                                    LEARNING
                                    →</a>
                            </div>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>
    @include('backend-components.users.footer')
