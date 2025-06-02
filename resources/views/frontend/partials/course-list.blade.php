 <meta name="csrf-token" content="{{ csrf_token() }}">


 <style>
     .wishlist-btn i {
         transition: transform 0.2s ease;
         font-size: 1.5rem;
     }

     .wishlist-btn:hover i {
         transform: scale(1.2);
     }
 </style>


 @foreach ($courses->chunk(2) as $chunk)
     <div class="row">
         @foreach ($chunk as $key => $course)
             <div class="col-md-6 mb-4 {{ $key % 2 === 0 ? 'pe-lg-5' : 'ps-lg-5' }}">
                 <div class="course-card p-3">

                     <div class="course-img-wrapper position-relative">
                         <img src="{{ asset($course->course_image) }}" alt="Course image" class="img-fluid rounded w-100">

                         <!-- Heart icon (wishlist) -->

                         @if (Auth::check() && Auth::user()->role === 'user')
                             <button class="wishlist-btn position-absolute top-0 start-0 m-2 p-0 border-0 bg-transparent"
                                 data-course-id="{{ $course->id }}"
                                 data-wishlist-id="{{ $course->wishlist_id ?? '' }}"
                                 data-is-liked="{{ $course->is_wished ? '1' : '0' }}">
                                 @if ($course->is_wished)
                                     <i class="bi bi-heart-fill text-danger"></i>
                                 @else
                                     <i class="bi bi-heart" style="color: red; border-radius: 50%;"></i>
                                 @endif
                             </button>
                         @endif

                         <!-- Category badge -->
                         <div class="position-absolute top-0 end-0 m-2 badge bg-primary text-white small">
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
                         {!! Str::limit(strip_tags($course->description), 100, '...') !!}

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

 <script>
     document.querySelectorAll('.wishlist-btn').forEach(btn => {
         btn.addEventListener('click', function(e) {
             e.preventDefault();

             const courseId = this.getAttribute('data-course-id');
             let wishlistId = this.getAttribute('data-wishlist-id');
             const isLiked = this.getAttribute('data-is-liked') === '1';
             const heartIcon = this.querySelector('i');

             const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

             if (isLiked) {
                 // DELETE request
                 fetch("{{ url('/user/remove/wishlist') }}/" + wishlistId, {
                         method: 'DELETE',
                         headers: {
                             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                 .content
                         }
                     })
                     .then(res => res.json())
                     .then(data => {
                         if (data.status === 'success') {
                             heartIcon.classList.remove('bi-heart-fill', 'text-danger');
                             heartIcon.classList.add('bi-heart');
                             heartIcon.style.color = 'red';
                             heartIcon.style.borderRadius = '50%';

                             btn.setAttribute('data-is-liked', '0');
                             btn.setAttribute('data-wishlist-id', '');
                         }
                     })
                     .catch(err => console.error('Error:', err));
             } else {
                 // POST request
                 fetch("{{ url('/wishlist/add') }}", {
                         method: 'POST',
                         headers: {
                             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                 .content,
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

                             btn.setAttribute('data-is-liked', '1');
                             btn.setAttribute('data-wishlist-id', data
                                 .wishlist_id); // ✅ update this line
                         }
                     })
                     .catch(err => console.error('Error:', err));
             }

         });
     });
 </script>
