<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<!-- Main Navbar -->
@include('frontend_components.nav')

<link rel="stylesheet" href="{{ asset('frontend_assets/css/courses.css') }}">
<!--//////////////////////////////       Hero Section //////////////////////////////////////////////// -->
<section class="hero-section d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <h1 class="hero-title position-relative">Language and office skills</h1>
</section>

<!-- /////////////////////////////////////////////// Hero Section ///////////////////////////////////////-->

<section class="course-section">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h4 class="fw-bold mb-0">Explore from 16+ Courses</h4>
            <div class="px-3 py-2 rounded-pill bg-white shadow-sm d-inline-flex gap-3">
                <button class="tab-link active">Recommended</button>
                <button class="tab-link">Popular</button>
                <button class="tab-link">Recently added</button>
            </div>
        </div>

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


</section>

<script>
    document.querySelectorAll('.tab-link').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>


<!-- Main Navbar -->
@include('frontend_components.footer')
