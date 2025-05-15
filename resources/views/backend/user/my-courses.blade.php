@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/my-courses.css') }}">

<body>
    <div class="d-flex">
        @include('backend-components.users.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend-components.users.header')

            <main class="content-wrapper p-4">
                <h2 class="fw-bold mb-4">Courses</h2>

                <!-- Tabs -->
                <div class="courses-tabs mb-4">
                    <div class="tabs-inner d-flex">
                        <button class="btn btn-tab" id="tab-my-active-btn" data-bs-toggle="tab"
                            data-bs-target="#tab-my-active" type="button" role="tab" aria-controls="tab-my-active"
                            aria-selected="false">Active Courses</button>
                        <button class="btn btn-tab active" id="tab-my-completed-btn" data-bs-toggle="tab"
                            data-bs-target="#tab-my-completed" type="button" role="tab"
                            aria-controls="tab-my-completed" aria-selected="true">Completed Courses</button>
                    </div>
                </div>

                <!-- Tab content -->
                <div class="tab-content">

                    <!-- Completed Courses -->
                    <div class="tab-pane fade show active" id="tab-my-completed" role="tabpanel"
                        aria-labelledby="tab-my-completed-btn">
                        <div class="row gap-5">

                            <div class="col-md-6 col-lg-3">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                            alt="Course image" />
                                        <div class="course-badge">Software Development</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center instructor-image">
                                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                                class="rounded-circle me-2" width="30" height="30"
                                                alt="Author">
                                            <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2025</h6>

                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2" style="gap: 0.5rem;">
                                        <div class="progress flex-grow-1" style="height: 6px;">
                                            <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="small text-muted" style="position: relative; top: -8px;">20%</span>
                                    </div>


                                    {{-- <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">Continue Learning
                                        →</a> --}}
                                    <a href="{{ url('/user/lectures') }}"
                                        class="btn btn-learn mt-3 start-learning-btn">Continue Learning →</a>

                                </div>
                            </div>


                            <div class="col-md-6 col-lg-3">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                            alt="Course image" />
                                        <div class="course-badge">Software Development</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center instructor-image">
                                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                                class="rounded-circle me-2" width="30" height="30"
                                                alt="Author">
                                            <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2025</h6>

                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2" style="gap: 0.5rem;">
                                        <div class="progress flex-grow-1" style="height: 6px;">
                                            <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="small text-muted" style="position: relative; top: -8px;">20%</span>
                                    </div>


                                    {{-- <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">Continue Learning
                                        →</a> --}}
                                    <a href="{{ url('/user/lectures') }}"
                                        class="btn btn-learn mt-3 start-learning-btn">Continue Learning →</a>

                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="course-card p-3">
                                    <div class="course-img-wrapper">
                                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                            alt="Course image" />
                                        <div class="course-badge">Software Development</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center instructor-image">
                                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                                class="rounded-circle me-2" width="30" height="30"
                                                alt="Author">
                                            <span class="text-dark small fw-semibold">Mr. Nabeel</span>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold mb-1 ps-0 ms-0">The Ultimate React Course 2025</h6>

                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-clock"></i> 5 hrs</span>
                                        <span><i class="bi bi-play-circle"></i> 7 lessons</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2" style="gap: 0.5rem;">
                                        <div class="progress flex-grow-1" style="height: 6px;">
                                            <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="small text-muted"
                                            style="position: relative; top: -8px;">20%</span>
                                    </div>


                                    {{-- <a href="{{ url('/user/lectures') }}" class="btn btn-learn mt-3">Continue Learning
                                        →</a> --}}
                                    <a href="{{ url('/user/lectures') }}"
                                        class="btn btn-learn mt-3 start-learning-btn">Continue Learning →</a>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('backend-components.users.footer')

    <!-- JavaScript to manage tab active class -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabEls = document.querySelectorAll('button[data-bs-toggle="tab"]');
            tabEls.forEach(tabEl => {
                tabEl.addEventListener('click', function(event) {
                    tabEls.forEach(tab => tab.classList.remove('active'));
                    event.target.classList.add('active');
                });
            });
        });
    </script>
