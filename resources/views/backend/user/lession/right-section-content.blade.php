<div class="course-dashboard-sidebar-column">
    <button class="sidebar-open" type="button"><i class="la la-angle-left"></i> Course
        content</button>
    <div class="course-dashboard-sidebar-wrap custom-scrollbar-styled">
        <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
            <h3 class="fs-18 font-weight-semi-bold">Course content</h3>
            <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
        </div><!-- end course-dashboard-side-heading -->
        <div class="course-dashboard-side-content">
            <div class="accordion generic-accordion generic--accordion" id="accordionCourseExample">



                @foreach ($course['course_section'] as $index => $item)
                    <div class="card">

                        <div class="card-header" id="heading{{ $index }}">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $index }}" aria-expanded="true"
                                aria-controls="collapse{{ $index }}">
                                <i class="la la-angle-down"></i>
                                <i class="la la-angle-up"></i>
                                <span class="fs-15"> Section {{ $index + 1 }}:
                                    {{ $item->section_title }}</span>
                                <span class="course-duration">
                                    <span>1/{{ $item['lecture']->count() }}</span>
                                    <span>{{ $total_duration }}min</span>
                                </span>
                            </button>
                        </div><!-- end card-header -->
                        <div id="collapse{{ $index }}"
                            class="collapse {{ $index == 0 ? 'show' : '' }}"
                            aria-labelledby="heading{{ $index }}"
                            data-parent="#accordionCourseExample">
                            <div class="card-body p-0">
                                <ul class="curriculum-sidebar-list">

                                    @if (!empty($item['lecture']))
                                        @foreach ($item['lecture'] as $key => $lecture)
                                            <li class="course-item-link active">
                                                <div class="course-item-content-wrap">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input"
                                                            id="courseCheckbox{{ $key }}"
                                                            required>
                                                        <label
                                                            class="custom-control-label custom--control-label"
                                                            for="courseCheckbox{{ $key }}"></label>
                                                    </div><!-- end custom-control -->
                                                    <div class="course-item-content">

                                                        <h4 class="fs-15 lecture-item"
                                                            data-video={{ $lecture['video'] }}>
                                                            {{ $key + 1 }}.
                                                            {{ $lecture['lecture_title'] }}
                                                        </h4>

                                                        <div class="courser-item-meta-wrap">
                                                            <p class="course-item-meta"><i
                                                                    class="la la-play-circle"></i>{{ $lecture['video_duration'] }}min
                                                            </p>
                                                        </div>
                                                    </div><!-- end course-item-content -->
                                                </div><!-- end course-item-content-wrap -->
                                            </li>
                                        @endforeach
                                    @else
                                        <p>No lectures available.</p>
                                    @endif



                                </ul>
                            </div><!-- end card-body -->
                        </div><!-- end collapse -->
                    </div><!-- end card -->
                @endforeach










            </div><!-- end accordion-->
        </div><!-- end course-dashboard-side-content -->
    </div><!-- end course-dashboard-sidebar-wrap -->
</div><!-- end course-dashboard-sidebar-column -->
