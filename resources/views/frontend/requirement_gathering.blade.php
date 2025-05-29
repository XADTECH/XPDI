<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/course_detail.css') }}" />
<!-- Main Navbar -->
<style>
    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control {
        height: 50px;
        font-size: 1rem;
    }

    .form-select {
        height: 50px;
        font-size: 1rem;
    }

    .info-text {
        font-size: 1.1rem;
    }

    .info-italic {
        font-style: italic;
    }

    @media (max-width: 576px) {
        .section-title {
            font-size: 2rem;
        }
    }
</style>
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
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container py-5">
    <section>
        <div class="col-lg-8">
            <h1 class="section-title mb-4">Request Information</h1>
            <p class="info-text mb-3" style="text-align: justify;">
                Coming from a wide variety of industries, participants in our courses bring valuable knowledge and new
                frameworks
                for thinking and problem solving back to their workplaces. Regardless of the size of your business, we
                have courses
                that will supplement your training and professional development needs.
            </p>
            <p class="info-italic mb-4">
                Fill out the form below and a member of our team will follow up with further group courses
            </p>
            <form action="{{ route('requirement.gathering') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="course_slug" value="{{ $course->course_name_slug }}">
                <input type="hidden" name="instructor_id" value="{{ $course->instructor_id }}">
                <input type="hidden" name="course_title" value="{{ $course->course_title }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ auth()->user()->name }}" readonly required>


                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ auth()->user()->email }}" readonly required>
                </div>
                <div class="mb-3">
                    <label for="companyName" class="form-label">Enrollment Purpose <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="companyName" name="enrollment_purpose" required>
                </div>
                <div class="mb-3">
                    <label for="qualification" class="form-label">Qualification <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="qualification" name="qualification" required>
                </div>
                <div class="mb-3">
                    <label for="interest" class="form-label">Area of Interest</label>
                    <input type="text" class="form-control" id="interest" name="area_of_interest">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2">Send Request</button>
            </form>

        </div>

    </section>

</main>

@include('frontend_components.footer')
