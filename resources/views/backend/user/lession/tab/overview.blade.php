<div class="tab-pane fade show active" id="overview" role="tabpanel"
aria-labelledby="overview-tab">
<div class="lecture-overview-wrap">
    <div class="lecture-overview-item">
        <h3 class="fs-24 font-weight-semi-bold pb-2">{{ $course->course_title }}
        </h3>

    </div><!-- end lecture-overview-item -->
    <div class="section-block"></div>
    <div class="lecture-overview-item">
        <div class="lecture-overview-stats-wrap d-flex">
            <div class="lecture-overview-stats-item">
                <h3 class="fs-16 font-weight-semi-bold pb-2">By the numbers</h3>
            </div><!-- end lecture-overview-stats-item -->
            <div class="lecture-overview-stats-item">
                <ul class="generic-list-item">
                    <li><span>Skill level:</span>All Levels</li>
                    <li><span>Students:</span>83950</li>
                    <li><span>Languages:</span>English</li>

                </ul>
            </div><!-- end lecture-overview-stats-item -->
            <div class="lecture-overview-stats-item">
                <ul class="generic-list-item">
                    <li><span>Lectures:</span>{{ $totalLectures }}</li>
                    <li><span>Video
                            length:</span>{{ round($total_duration / 60, 2) }} total
                        hours</li>
                    <li><span>Certificate:</span><span
                            style="text-transform: uppercase">{{ $course->certificate }}</span>
                    </li>
                </ul>
            </div><!-- end lecture-overview-stats-item -->
        </div><!-- end lecture-overview-stats-wrap -->
    </div><!-- end lecture-overview-item -->
    <div class="section-block"></div>
    <div class="lecture-overview-item">
        <div class="lecture-overview-stats-wrap d-flex">
            <div class="lecture-overview-stats-item">
                <h3 class="fs-16 font-weight-semi-bold pb-2">Certificates</h3>
            </div><!-- end lecture-overview-stats-item -->
            <div
                class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                <p class="pb-3">Get Aduca certificate by completing entire course
                </p>
                <a href="#"
                    class="btn theme-btn theme-btn-transparent">Aduca
                    Certificate</a>
            </div><!-- end lecture-overview-stats-item -->
        </div><!-- end lecture-overview-stats-wrap -->
    </div><!-- end lecture-overview-item -->
    <div class="section-block"></div>
    <div class="lecture-overview-item">
        <div class="lecture-overview-stats-wrap d-flex">
            <div class="lecture-overview-stats-item">
                <h3 class="fs-16 font-weight-semi-bold pb-2">Features</h3>
            </div><!-- end lecture-overview-stats-item -->
            <div class="lecture-overview-stats-item">
                <p>Available on <a href="#"
                        class="text-color hover-underline">IOS</a> and <a
                        href="#"
                        class="text-color hover-underline">Android</a></p>
            </div><!-- end lecture-overview-stats-item -->
        </div><!-- end lecture-overview-stats-wrap -->
    </div><!-- end lecture-overview-item -->
    <div class="section-block"></div>
    <div class="lecture-overview-item">
        <div class="lecture-overview-stats-wrap d-flex">
            <div class="lecture-overview-stats-item">
                <h3 class="fs-16 font-weight-semi-bold pb-2">Description</h3>
            </div><!-- end lecture-overview-stats-item -->
            <div
                class="lecture-overview-stats-item lecture-overview-stats-wide-item lecture-description">

                <!-- Truncated Description -->
                <div id="bioContent" class="bio-collapsible">
                    {!! substr($course->description, 0, 300) !!} <!-- Show first 200 characters -->
                    <span class="bio-full-text"
                        style="display:none;">{!! substr($course->description, 300) !!}</span>
                    <!-- Hidden full text -->
                </div>

                <!-- Toggle Button -->
                <button id="toggleBio" style="color: white"
                    class="mt-2 btn btn-danger btn-sm collapse-btn collapse--btn fs-15">
                    Show more
                </button>







            </div><!-- end lecture-overview-stats-item -->
        </div><!-- end lecture-overview-stats-wrap -->
    </div><!-- end lecture-overview-item -->
    <div class="section-block"></div>
    <div class="lecture-overview-item">
        <div class="lecture-overview-stats-wrap d-flex ">
            <div class="lecture-overview-stats-item">
                <h3 class="fs-16 font-weight-semi-bold pb-2">Instructor</h3>
            </div><!-- end lecture-overview-stats-item -->
            <div
                class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                <div class="media media-card align-items-center">
                    <a href="teacher-detail.html"
                        class="media-img d-block rounded-full avatar-md">
                        <img src="{{ $course->user->photo }}"
                            alt="Instructor avatar" class="rounded-full">
                    </a>
                    <div class="media-body">
                        <h5><a
                                href="teacher-detail.html">{{ $course->user->name }}</a>
                        </h5>
                        <span class="d-block lh-18 pt-2">Java Python Android and C#
                            Expert Developer</span>
                    </div>
                </div>
                <div class="lecture-owner-profile pt-4">
                    <ul class="social-icons social-icons-styled">
                        <li><a href="#" class="facebook-bg"><i
                                    class="la la-facebook"></i></a></li>
                        <li><a href="#" class="twitter-bg"><i
                                    class="la la-twitter"></i></a></li>
                        <li><a href="#" class="instagram-bg"><i
                                    class="la la-instagram"></i></a></li>
                        <li><a href="#" class="linkedin-bg"><i
                                    class="la la-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="lecture-owner-decription pt-4">
                    {!! $course->user->bio !!}
                </div>
            </div><!-- end lecture-overview-stats-item -->
        </div><!-- end lecture-overview-stats-wrap -->
    </div><!-- end lecture-overview-item -->
</div><!-- end lecture-overview-wrap -->
</div><!-- end tab-pane -->
