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
                            <div class="tab active" data-tab="recommended"><strong>Recommended</strong></div>
                            <div class="tab" data-tab="popular"><strong>Popular</strong></div>
                            <div class="tab" data-tab="recent"><strong>Recently added</strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- recommended -->
            <div id="recommended">
                @foreach ($courses->chunk(2) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $key => $course)
                            <div class="col-md-6 mb-4 {{ $key % 2 === 0 ? 'pe-lg-5' : 'ps-lg-5' }}">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset($course->course_image) }}" alt="Course image" />
                                        <div class="course-badge">
                                            {{ $course->category->name ?? 'Category' }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($course->course_image) }}" class="rounded-circle me-2"
                                                width="30" height="30" alt="Author">
                                            <span class="text-dark small fw-semibold">
                                                {{ isset($course->instructor->name) ? ucwords($course->instructor->name) : 'Instructor' }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-warning small me-1">★★★★★</div>
                                            <strong class="me-1 small">5.0</strong>
                                            <small class="text-muted">(170)</small>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-1 course-title">
                                        {{ Str::ucfirst(Str::limit($course->course_title, 40, '...')) }}
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        {{ Str::limit($course->description, 100, '...') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span
                                            class="badge bg-info text-dark small text-uppercase">{{ $course->label ?? 'Beginner' }}</span>
                                        <span
                                            class="text-orange fw-bold">{{ $course->is_paid ? 'Paid' : 'Free' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-people"></i> {{ $course->students_count ?? 0 }}
                                            Students</span>
                                        <span><i class="bi bi-clock"></i> {{ $course->duration ?? '0 hrs' }}</span>
                                        <span><i class="bi bi-play-circle"></i> {{ $course->lessons_count }}
                                            lessons</span>
                                    </div>
                                    <a href="{{ url('course-details/english-speaking' . $course->slug) }}"
                                        class="btn btn-learn mt-3">START LEARNING →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

            <!-- popular -->
            <div id="popular" style="display: none;">
                @foreach ($courses->chunk(2) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $key => $course)
                            <div class="col-md-6 mb-4 {{ $key % 2 === 0 ? 'pe-lg-5' : 'ps-lg-5' }}">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset($course->course_image) }}" alt="Course image" />
                                        <div class="course-badge">
                                            {{ $course->category->name ?? 'Category' }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($course->course_image) }}" class="rounded-circle me-2"
                                                width="30" height="30" alt="Author">
                                            <span class="text-dark small fw-semibold">
                                                {{ isset($course->instructor->name) ? ucwords($course->instructor->name) : 'Instructor' }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-warning small me-1">★★★★★</div>
                                            <strong class="me-1 small">5.0</strong>
                                            <small class="text-muted">(170)</small>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-1 course-title">
                                        {{ Str::ucfirst(Str::limit($course->course_title, 40, '...')) }}
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        {{ Str::limit($course->description, 100, '...') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span
                                            class="badge bg-info text-dark small text-uppercase">{{ $course->label ?? 'Beginner' }}</span>
                                        <span
                                            class="text-orange fw-bold">{{ $course->is_paid ? 'Paid' : 'Free' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-people"></i> {{ $course->students_count ?? 0 }}
                                            Students</span>
                                        <span><i class="bi bi-clock"></i> {{ $course->duration ?? '0 hrs' }}</span>
                                        <span><i class="bi bi-play-circle"></i> {{ $course->lessons_count }}
                                            lessons</span>
                                    </div>
                                    <a href="{{ url('/course-details/' . $course->slug) }}"
                                        class="btn btn-learn mt-3">START LEARNING →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach


            </div>

            <div id="recent" style="display: none;">
                @foreach ($courses->chunk(2) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $key => $course)
                            <div class="col-md-6 mb-4 {{ $key % 2 === 0 ? 'pe-lg-5' : 'ps-lg-5' }}">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset($course->course_image) }}" alt="Course image" />
                                        <div class="course-badge">
                                            {{ $course->category->name ?? 'Category' }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($course->course_image) }}" class="rounded-circle me-2"
                                                width="30" height="30" alt="Author">
                                            <span class="text-dark small fw-semibold">
                                                {{ isset($course->instructor->name) ? ucwords($course->instructor->name) : 'Instructor' }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-warning small me-1">★★★★★</div>
                                            <strong class="me-1 small">5.0</strong>
                                            <small class="text-muted">(170)</small>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-1 course-title">
                                        {{ Str::ucfirst(Str::limit($course->course_title, 40, '...')) }}
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        {{ Str::limit($course->description, 100, '...') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span
                                            class="badge bg-info text-dark small text-uppercase">{{ $course->label ?? 'Beginner' }}</span>
                                        <span
                                            class="text-orange fw-bold">{{ $course->is_paid ? 'Paid' : 'Free' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-people"></i> {{ $course->students_count ?? 0 }}
                                            Students</span>
                                        <span><i class="bi bi-clock"></i> {{ $course->duration ?? '0 hrs' }}</span>
                                        <span><i class="bi bi-play-circle"></i> {{ $course->lessons_count }}
                                            lessons</span>
                                    </div>
                                    <a href="{{ url('/course-details/' . $course->slug) }}"
                                        class="btn btn-learn mt-3">START LEARNING →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll(".tab");
        const tabContents = document.querySelectorAll("#recommended, #popular, #recent");

        tabs.forEach(tab => {
            tab.addEventListener("click", function() {
                const target = this.getAttribute("data-tab");

                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove("active"));

                // Hide all tab contents
                tabContents.forEach(content => content.style.display = "none");

                // Show selected tab content and add active class
                document.getElementById(target).style.display = "block";
                this.classList.add("active");
            });
        });
    });
</script>



@include('frontend_components.footer')
