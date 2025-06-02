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
<div class="row gap-5">
    @foreach ($studentCourses as $course)
        <div class="col-md-6 col-lg-3">
            <div class="course-card p-3">


                @if (Auth::check() && Auth::user()->role === 'user')
                    <button class="wishlist-btn position-absolute top-0 start-0 m-2 p-0 border-0 bg-transparent"
                        data-course-id="{{ $course->course->id }}"
                        data-wishlist-id="{{ $course->course->wishlist_id ?? '' }}"
                        data-is-liked="{{ $course->course->is_wished ? '1' : '0' }}">
                        @if ($course->course->is_wished)
                            <i class="bi bi-heart-fill text-danger fs-4"></i>
                        @else
                            <i class="bi bi-heart fs-4" style="color: red;"></i>
                        @endif
                    </button>
                @endif


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

{{-- ///// js for add and remove to and from wishlist in popular coruses section --}}

<script>
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const courseId = this.getAttribute('data-course-id');
            let wishlistId = this.getAttribute('data-wishlist-id');
            const isLiked = this.getAttribute('data-is-liked') === '1';
            const heartIcon = this.querySelector('i');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const baseUrl = "{{ url('/') }}";

            if (isLiked) {
                // DELETE request
                fetch(`${baseUrl}/user/remove/wishlist/${wishlistId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            heartIcon.classList.remove('bi-heart-fill', 'text-danger');
                            heartIcon.classList.add('bi-heart');
                            heartIcon.style.color = 'red';
                            heartIcon.style.borderRadius = '50%';

                            this.setAttribute('data-is-liked', '0');
                            this.setAttribute('data-wishlist-id', '');
                        }
                    })
                    .catch(err => console.error('Error:', err));
            } else {
                // POST request
                fetch(`${baseUrl}/wishlist/add`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            course_id: courseId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            heartIcon.classList.remove('bi-heart');
                            heartIcon.classList.add('bi-heart-fill', 'text-danger');
                            heartIcon.style.border = 'none';

                            this.setAttribute('data-is-liked', '1');
                            this.setAttribute('data-wishlist-id', data.wishlist_id);
                        }
                    })
                    .catch(err => console.error('Error:', err));
            }
        });
    });
</script>
