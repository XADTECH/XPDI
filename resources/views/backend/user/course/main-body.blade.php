<div class="card-body">
    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3" style="text-transform:capitalize">
        {{ $item->course->label }}
    </h6>

    <h5 class="card-title"><a
            href="{{ route('user.course.show', $item->course->course_name_slug) }}">{{ $item->course->course_name }}</a>
    </h5>


    <p class="card-text">
        <a href="{{ route('instructor', [$item->course['user']['name'], $item->course['user']['id']]) }}">
            {{ $item->course['user']['name'] }}
        </a>
    </p>



    <div class="rating-wrap d-flex align-items-center py-2">
        <div class="review-stars">

            @php

                $count_ratings = \App\Models\Review::where('status', 1)
                    ->where('course_id', $item->course->id)
                    ->count();
                $unique_student = \App\Models\Review::where('status', 1)
                    ->where('course_id', $item->course->id)
                    ->distinct()
                    ->pluck('user_id')
                    ->count();

                $averageRating = \App\Models\Review::where(
                    'course_id',
                    $item->course->id,
                )
                    ->where('status', 1)
                    ->avg('rating');

                $purchase_course_student_number = \App\Models\Order::where('course_id', $item->course->id)->count();

            @endphp



            <span
                class="rating-number">{{ number_format($averageRating, 1) }}</span>

            @php
                $fullStars = floor($averageRating); // পূর্ণ তারকার সংখ্যা
                $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0; // অর্ধেক তারকা (যদি থাকে)
                $emptyStars = 5 - $fullStars - $halfStar; // খালি তারকার সংখ্যা
            @endphp

            {{-- পূর্ণ তারকা --}}
            @for ($i = 0; $i < $fullStars; $i++)
                <span class="la la-star"></span>
            @endfor

            {{-- অর্ধেক তারকা --}}
            @if ($halfStar)
                <span class="la la-star-half"></span>
            @endif

            {{-- খালি তারকা --}}
            @for ($i = 0; $i < $emptyStars; $i++)
                <span class="la la-star-o"></span>
            @endfor



        </div>
        <span class="rating-total pl-1">({{ $count_ratings }} ratings)</span>
        <span class="student-total pl-2">{{ $unique_student }} students</span>

    </div><!-- end rating-wrap -->


    <ul class="card-duration d-flex align-items-center fs-15 pb-2">
        <li class="mr-2">
            <span class="text-black">Status:</span>
            @if ($item->course->status == 1)
                <span class="badge badge-success text-white">Published</span>
            @else
                <span class="badge badge-danger text-white">UnPublished</span>
            @endif
        </li>
        <li class="mr-2">
            <span class="text-black">Duration:</span>
            @php
             $total_lecture_duration = \App\Models\CourseLecture::where('course_id', $item->course->id)->sum('video_duration');
            @endphp
            <span>{{ number_format($total_lecture_duration / 60, 2) }} Hours</span>
        </li>
        <li class="mr-2">
            <span class="text-black">Students:</span>
            <span>{{$purchase_course_student_number}}</span>
        </li>
    </ul>

</div><!-- end card-body -->
