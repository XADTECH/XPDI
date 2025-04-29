<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
{{-- <link rel="stylesheet" href="{{ asset('frontend_assets/css/courses.css') }}" /> --}}
<!-- Main Navbar -->
@include('frontend_components.nav')

<link rel="stylesheet" href="{{ asset('frontend_assets/css/courses.css') }}">
<!--//////////////////////////////       Hero Section //////////////////////////////////////////////// -->
<section class="hero-section d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <h1 class="hero-title position-relative">All Courses</h1>
</section>


<div class="container-fluid mt-4 px-5">
    <div class="row">
        <!-- Left Sidebar - Filters -->
        <div class="col-md-3 mt-2">
            <div class="all-filters">
                <h5 id="all-filters">All Filters</h5>
                <a href="#!" class="clear-btn" id="clearFilters">Clear</a>
            </div>



            <!-- Categories -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Categories</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cat1">
                    <label class="form-check-label" for="cat1">Language & Office Skills (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cat2" checked>
                    <label class="form-check-label" for="cat2">Creative & IT Skills (0)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cat3">
                    <label class="form-check-label" for="cat3">Business & Customer Skills (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cat4">
                    <label class="form-check-label" for="cat4">Vocational & Technical Skills (1)</label>
                </div>
            </div>

            <!-- Instructors -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Instructors</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inst1">
                    <label class="form-check-label" for="inst1">Nabeel Javed</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inst2" checked>
                    <label class="form-check-label" for="inst2">Akram Khan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inst3">
                    <label class="form-check-label" for="inst3">Ali</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="inst4">
                    <label class="form-check-label" for="inst4">Sana</label>
                </div>
            </div>

            <!-- Level -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Level</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="level1">
                    <label class="form-check-label" for="level1">Beginner (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="level2" checked>
                    <label class="form-check-label" for="level2">Medium (0)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="level3">
                    <label class="form-check-label" for="level3">Advance (1)</label>
                </div>
            </div>

            <!-- Ratings -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Ratings</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rate1">
                    <label class="form-check-label" for="rate1">
                        ⭐⭐⭐⭐⭐ 5.0 (12)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rate2">
                    <label class="form-check-label" for="rate2">
                        ⭐⭐⭐⭐ 4.0 & up (12)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rate3">
                    <label class="form-check-label" for="rate3">
                        ⭐⭐⭐ 3.0 & up (12)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rate4">
                    <label class="form-check-label" for="rate4">
                        ⭐⭐ 2.0 & up (12)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rate5">
                    <label class="form-check-label" for="rate5">
                        ⭐ 1.0 & up (12)
                    </label>
                </div>
            </div>

            <!-- Video Duration -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Video Duration</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dur1">
                    <label class="form-check-label" for="dur1">2 Hours Plus (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dur2" checked>
                    <label class="form-check-label" for="dur2">5 Hours Plus (0)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dur3">
                    <label class="form-check-label" for="dur3">10 Hours Plus (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dur4">
                    <label class="form-check-label" for="dur4">16 Hours Plus (1)</label>
                </div>
            </div>


        </div>

        <!-- Main Content - Course Listings -->
        <div class="col-md-9 ps-lg-5 mt-1">

            <div class="container">
                <div class="row">
                    <div class="top-filters">
                        <h3 class="explore-more-courses all-filters mb-0">Explore from 16+ Courses</h3>

                        <div class="tabs-container">
                            <div class="tab active" data-tab="recommended"><b>Recommended</b></div>
                            <div class="tab" data-tab="popular"><b>Popular</b></div>
                            <div class="tab" data-tab="recent"><b>Recently added</b></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- courses -->

            <div class="row">
                <!-- Course Card 1 -->
                <div class="col-md-6 mb-4 pe-lg-5">
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
                                <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(170)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0 course-title">The Ultimate React Course 2025</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Master modern React from beginner to advanced! Next.js, Context API, React Query, Redux,
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
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="col-md-6 mb-4 ps-lg-5">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Language and Office skills</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/english-british-england-language-education-concept_53876-133734.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">Ms Alveena</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(12)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0 course-title">Speak and Understand English with Confidence
                        </h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Build your english speaking, listening and grammer skills, step by step. This course
                            focuses on
                            everyday... </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 110 Students</span>
                            <span><i class="bi bi-clock"></i> 5 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 3 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3 p-18">START LEARNING →</button>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Course Card 1 -->
                <div class="col-md-6 mb-4 pe-lg-5">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/human-resource-hiring-recruiter-select-career-concept.jpg') }}"
                                alt="Course image" />
                            <div class="course-badge">Language and Office skills</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/human-resource-hiring-recruiter-select-career-concept.jpg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">Ms Maheen</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★</div>
                                <strong class="me-1 small">4.0</strong>
                                <small class="text-muted">(16)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0 course-title">Introduction to Human Resource Management</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Learn the essentials of HR, including recruitment, employee relations, training and
                            performace
                            management...
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Advanced</span>
                            <span class="text-orange fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 50 Students</span>
                            <span><i class="bi bi-clock"></i> 5.6 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 5 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="col-md-6 mb-4 ps-lg-5">
                    <div class="course-card p-3">
                        <div class="course-img-wrapper">
                            <img src="{{ asset('frontend_assets/images/Courses/telecom.jpeg') }}"
                                alt="Course image" />
                            <div class="course-badge">Telecom and Fixed Networks</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend_assets/images/Courses/telecom.jpeg') }}"
                                    class="rounded-circle me-2" width="30" height="30" alt="Author">
                                <span class="text-dark small fw-semibold">Mr. Azhar Iqbal</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-warning small me-1">★★★★★</div>
                                <strong class="me-1 small">5.0</strong>
                                <small class="text-muted">(150)</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-1 ps-0 ms-0 course-title">Master of modern telecommunications</h6>
                        <p class="text-muted small mb-2 ps-0 ms-0">
                            Learn telecommunications from industry experts and gain hands-on skills to thrive in
                            today’s
                            connected world
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-info text-dark small">Beginner</span>
                            <span class="text-orange fw-bold">Paid</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mt-2 small">
                            <span><i class="bi bi-people"></i> 160 Students</span>
                            <span><i class="bi bi-clock"></i> 4 hrs</span>
                            <span><i class="bi bi-play-circle"></i> 6 lessons</span>
                        </div>
                        <button class="btn btn-learn mt-3">START LEARNING →</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>




<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');

                // Hide all tab content
                const tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(content => content.classList.remove('active'));

                // Show the selected tab content
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        document.getElementById('clearFilters').addEventListener('click', function() {
            document.querySelectorAll('.form-check-input').forEach(cb => cb.checked = false);
        });
    });
</script>
@include('frontend_components.footer')
