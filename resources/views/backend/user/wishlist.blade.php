@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/wishlist.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .wishlist-btn {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
        /* 🛑 key part to bring it in front */
        background: none;
        border: none;
        padding: 0;
        margin: 1.5rem !important;
    }

    .wishlist-btn i {
        transition: transform 0.2s ease;
    }

    .wishlist-btn:hover i {
        transform: scale(1.2);
    }

    .course-card {
        position: relative;
    }
</style>

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
                        @forelse ($wishlistCourses as $wishlist)
                            @php
                                $course = $wishlist->course;
                            @endphp
                            <div class="col-md-4 mb-4">
                                <div class="course-card p-3 position-relative">
                                    <!-- Heart (remove from wishlist) -->
                                    <button
                                        class="wishlist-btn position-absolute top-0 start-0 m-2 p-0 border-0 bg-transparent"
                                        data-course-id="{{ $course->id }}" data-wishlist-id="{{ $wishlist->id }}"
                                        data-is-liked="1">
                                        <i class="bi bi-heart-fill text-danger fs-4"></i>
                                    </button>

                                    <div class="course-img-wrapper">
                                        <img src="{{ asset($course->course_image) }}" alt="Course image"
                                            class="img-fluid w-100 rounded">
                                        <div class="course-badge">
                                            {{ $course->category->name ?? '' }}
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                                                class="rounded-circle me-2" width="30" height="30"
                                                alt="Author">
                                            <span class="text-dark small fw-semibold">
                                                {{ ucwords($course->instructor->name ?? '') }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-warning small me-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= round($course->review_avg_rating ?? 0))
                                                        ★
                                                    @else
                                                        ☆
                                                    @endif
                                                @endfor
                                            </div>
                                            <strong
                                                class="me-1 small">{{ number_format($course->review_avg_rating ?? 0, 1) }}</strong>
                                            <small class="text-muted">({{ $course->review_count }} Reviews)</small>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold mb-1 course-title">
                                        {{ ucfirst(Str::limit($course->course_title ?? '', 30, '...')) }}
                                    </h6>

                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span
                                            class="badge bg-info text-dark small">{{ $course->label ?? 'Beginner' }}</span>
                                        <span class="text-orange fw-bold">
                                            {{ $course->is_paid ? 'Paid' : 'Free' }}
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-between text-muted mt-2 small">
                                        <span><i class="bi bi-people"></i> {{ $course->students_count }}
                                            Students</span>
                                        <span><i class="bi bi-clock"></i> {{ $course->duration ?? '0' }} minutes</span>
                                        <span><i class="bi bi-play-circle"></i> {{ $course->course_lecture_count }}
                                            Lessons</span>
                                    </div>

                                    <a href="{{ url('/user/lectures/' . $course->id) }}" class="btn btn-learn mt-3">
                                        START LEARNING →
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">You have no courses in your wishlist yet.</p>
                        @endforelse
                    </div>
                </div>



            </main>
        </div>
    </div>
    @include('backend-components.users.footer')
