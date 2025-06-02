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
                    <input class="form-check-input" name="levels[]" type="checkbox" value="beginer" id="beginer">
                    <label class="form-check-label" for="beginer">Beginner (1)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="levels[]" type="checkbox" value="medium" id="medium"
                        checked>
                    <label class="form-check-label" for="medium">Medium (0)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="levels[]" type="checkbox" value="advance" id="advance">
                    <label class="form-check-label" for="advance">Advance (1)</label>
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
            <div id="coureses_list" data-page="1">
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
            fetchCourses(); // reload courses with no filters
        });
    });
</script>


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

            const activeTab = document.querySelector('.tab.active')?.dataset.tab;
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
                    if (page === 1) {
                        document.getElementById('coureses_list').innerHTML = html;
                    } else {
                        document.getElementById('coureses_list').insertAdjacentHTML('beforeend', html);
                    }
                    document.getElementById('coureses_list').dataset.page = page;
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

        // Clear button: uncheck all + reload page 1
        const clearButton = document.getElementById('clearFilters');
        if (clearButton) {
            clearButton.addEventListener('click', function() {
                document.querySelectorAll('.form-check-input').forEach(cb => cb.checked = false);
                fetchCourses(1);
            });
        }

        // Infinite scroll: load next page when scrolled to bottom
        window.addEventListener('scroll', () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 10) {
                const currentPage = parseInt(document.getElementById('coureses_list').dataset.page ||
                    '1');
                fetchCourses(currentPage + 1);
            }

            // Reset to page 1 if scrolled to top
            if (window.scrollY === 0) {
                fetchCourses(1);
            }
        });
    });
</script>



@include('frontend_components.footer')
