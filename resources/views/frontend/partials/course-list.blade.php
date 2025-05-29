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
                            <img src="{{ asset($course->course_image) }}" class="rounded-circle me-2" width="30"
                                height="30" alt="Author">
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
@endforeach
