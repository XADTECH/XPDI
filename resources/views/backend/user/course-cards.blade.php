<div class="row gap-5">
    @foreach ($studentCourses as $course)
        <div class="col-md-6 col-lg-3">
            <div class="course-card p-3">
                <div class="course-img-wrapper">
                    <img src="{{ asset($course->course->course_image) }}" alt="Course image" />
                    <div class="course-badge">
                        {{ $course->course->category->name ?? '' }}
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                    <div class="d-flex align-items-center instructor-image">
                        <img src="{{ asset('frontend_assets/images/Courses/sales-sell-selling-commerce-costs-profit-retail-concept.jpg') }}"
                            class="rounded-circle me-2" width="30" height="30" alt="Author">
                        <span class="text-dark small fw-semibold">
                            {{ ucwords($course->course->instructor->name ?? '') }}
                        </span>
                    </div>
                </div>

                <h6 class="fw-bold mb-1 ps-0 ms-0">
                    {{ ucfirst(Str::limit($course->course->course_title ?? '', 30, '...')) }}
                </h6>

                <div class="d-flex justify-content-between text-muted mt-2 small">
                    <span><i class="bi bi-clock"></i> 5 hrs</span>
                    <span><i class="bi bi-play-circle"></i>
                        {{ $course->course->course_lecture_count }} lessons</span>
                </div>

                <div class="d-flex align-items-center mt-2" style="gap: 0.5rem;">
                    <div class="progress flex-grow-1" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="small text-muted" style="position: relative; top: -8px;">20%</span>
                </div>

                <a href="{{ url('/user/lectures/' . $course->course->id) }}"
                    class="btn btn-learn mt-3 start-learning-btn">Continue Learning →</a>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {!! $studentCourses->links('pagination::bootstrap-5') !!}
</div>
