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

                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cat{{ $category->id }}" name="categories[]"
                            value="{{ $category->id }}">
                        <label class="form-check-label" for="cat{{ $category->id }}">
                            {{ $category->name }} ({{ $category->course_count ?? $category->courses()->count() }})
                        </label>
                    </div>
                @endforeach
            </div>


            <!-- Instructors -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Instructors</h6>

                @foreach ($instructors as $instructor)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inst{{ $instructor->id }}"
                            name="instructors[]" value="{{ $instructor->id }}">
                        <label class="form-check-label" for="inst{{ $instructor->id }}">
                            {{ $instructor->name }}
                            ({{ $instructor->courses_count ?? $instructor->courses()->count() }})
                        </label>
                    </div>
                @endforeach
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

                @foreach ([5, 4, 3, 2, 1] as $star)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rate{{ $star }}" name="ratings[]"
                            value="{{ $star }}">
                        <label class="form-check-label" for="rate{{ $star }}">
                            {{ str_repeat('⭐', $star) }} {{ $star }}.0 & up ({{ $ratingCounts[$star] ?? 0 }})
                        </label>
                    </div>
                @endforeach
            </div>


            <!-- Video Duration -->
            <div class="filter-section mb-2">
                <h6 class="fw-bold mb-3">Video Duration</h6>

                @foreach ([120 => '2 Hours Plus', 300 => '5 Hours Plus', 600 => '10 Hours Plus', 960 => '16 Hours Plus'] as $minutes => $label)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dur{{ $minutes }}" name="durations[]"
                            value="{{ $minutes }}">
                        <label class="form-check-label" for="dur{{ $minutes }}">
                            {{ $label }} ({{ $durationCounts[$minutes] ?? 0 }})
                        </label>
                    </div>
                @endforeach
            </div>


        </div>

        <!-- Main Content - Course Listings -->
        <div class="col-md-9 ps-lg-5 mt-1">

            <div class="container">
                <div class="row">
                    <div class="top-filters">
                        <h3 class="explore-more-courses all-filters mb-0">Explore from
                            {{ isset($totalCourses) ? $totalCourses : '' }}
                            Courses
                        </h3>
                        <div class="tabs-container">
                            <div class="tab active" data-tab="coureses_list"><strong>Recomended</strong></div>
                            <div class="tab" data-tab="popular"><strong>Popular</strong></div>
                            <div class="tab" data-tab="recent"><strong>Recently added</strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- coureses_list -->
            <div id="coureses_list">
                {{-- @foreach ($courses->chunk(2) as $chunk)
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
                                            @php
                                                $averageRating = number_format($course->review_avg_rating ?? 0, 1); // one decimal
                                                $reviewCount = $course->review_count ?? 0;
                                            @endphp

                                            <div class="text-warning small me-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($averageRating))
                                                        ★
                                                    @else
                                                        ☆
                                                    @endif
                                                @endfor
                                            </div>
                                            <strong class="me-1 small">{{ $averageRating }}</strong>
                                            <small class="text-muted">({{ $reviewCount }})</small>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-1 course-title">
                                        {{ Str::ucfirst(Str::limit($course->course_title, 40, '...')) }}
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        {{ Str::limit($course->description, 100, '...') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-info text-dark small text-uppercase">
                                            {{ $course->label ?? 'Beginner' }}
                                        </span>
                                        <span class="text-orange fw-bold">
                                            {{ $course->is_paid ? 'Paid' : 'Free' }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-people"></i> {{ $course->students_count ?? 0 }}
                                            Students</span>
                                        <span><i class="bi bi-clock"></i> {{ $course->duration ?? '0 hrs' }}</span>
                                        <span><i class="bi bi-play-circle"></i> {{ $course->lessons_count }}
                                            lessons</span>
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
                    </div>
                @endforeach --}}

                @include('frontend.partials.course-list')

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


{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll(".tab");
        const tabContents = document.querySelectorAll("#coureses_list, #popular, #recent");

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
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function fetchCourses(page = 1) {
            let params = new URLSearchParams();

            document.querySelectorAll('input[name="categories[]"]:checked').forEach(el => {
                params.append('categories[]', el.value);
            });
            document.querySelectorAll('input[name="instructors[]"]:checked').forEach(el => {
                params.append('instructors[]', el.value);
            });
            document.querySelectorAll('input[name="levels[]"]:checked').forEach(el => {
                params.append('levels[]', el.value);
            });
            document.querySelectorAll('input[name="ratings[]"]:checked').forEach(el => {
                params.append('ratings[]', el.value);
            });
            document.querySelectorAll('input[name="durations[]"]:checked').forEach(el => {
                params.append('durations[]', el.value);
            });

            const activeTab = document.querySelector('.tab.active').dataset.tab;
            if (activeTab) {
                params.append('sort_by', activeTab);
            }
            params.append('page', page);

            fetch(`{{ route('courses') }}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('coureses_list').innerHTML = html;
                });
        }

        // Trigger on filter change
        document.querySelectorAll('.form-check-input').forEach(el => {
            el.addEventListener('change', () => fetchCourses());
        });

        // Trigger on tab click
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => fetchCourses());
        });

        // Infinite scroll
        window.addEventListener('scroll', () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                const nextPage = parseInt(document.querySelector('#coureses_list').dataset.page) + 1;
                fetchCourses(nextPage);
            }
        });
    });
</script>


@include('frontend_components.footer')
