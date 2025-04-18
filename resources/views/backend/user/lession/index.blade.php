<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Aduca - Professional LMS</title>

    @include('frontend.section.link')
    <!-- end inject -->
</head>

<body>

    <!-- start cssload-loader -->
    @include('backend.user.lession.preloader')
    <!-- end cssload-loader -->


    @include('backend.user.lession.header')

    <!-- end header-menu-area -->


    <section class="course-dashboard">
        <div class="course-dashboard-wrap">
            <div class="course-dashboard-container d-flex">
                <div class="course-dashboard-column">

                    @include('backend.user.lession.video')


                    <div class="lecture-video-detail">
                        <div class="lecture-tab-body bg-gray p-4">
                            <ul class="nav nav-tabs generic-tab" id="myTab" role="tablist">


                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">
                                        Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="question-and-ans-tab" data-toggle="tab"
                                        href="#question-and-ans" role="tab" aria-controls="question-and-ans"
                                        aria-selected="false">
                                        Question & Ans
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="lecture-video-detail-body">
                            <div class="tab-content" id="myTabContent">

                                @include('backend.user.lession.tab.overview')

                                @include('backend.user.lession.tab.question')

                            </div><!-- end tab-content -->

                        </div><!-- end lecture-video-detail-body -->
                    </div><!-- end lecture-video-detail -->

                    <div class="cta-area py-4 bg-gray">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="cta-content-wrap">
                                        <h3 class="fs-18 font-weight-semi-bold">Top companies choose <a
                                                href="for-business.html" class="text-color hover-underline">Aduca
                                                for Business</a> to build in-demand career skills.</h3>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="client-logo-wrap text-right">
                                        <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img
                                                src="{{ asset('frontend/images/sponsor-img.png') }}"
                                                alt="brand image"></a>
                                        <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img
                                                src="{{ asset('frontend/images/sponsor-img2.png') }}"
                                                alt="brand image"></a>
                                        <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img
                                                src="{{ asset('frontend/images/sponsor-img3.png') }}"
                                                alt="brand image"></a>
                                    </div><!-- end client-logo-wrap -->
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                        </div><!-- end container-fluid -->
                    </div><!-- end cta-area -->


                    @include('backend.user.lession.footer')


                </div><!-- end course-dashboard-column -->





                @include('backend.user.lession.right-section-content')






            </div><!-- end course-dashboard-container -->
        </div><!-- end course-dashboard-wrap -->
    </section><!-- end course-dashboard -->
    <!--======================================
        END COURSE-DASHBOARD
======================================-->

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->



    @include('backend.user.lession.modal.rating-modal')

    @include('backend.user.lession.modal.share-modal')




    @include('frontend.section.script')

    <script>
        $(document).ready(function() {
            // লেকচারের ক্লাস থেকে ভিডিও লোড করা
            $('.lecture-item').on('click', function() {
                // `data-video` থেকে ভিডিও URL সংগ্রহ করুন
                const videoUrl = $(this).data('video');

                if (videoUrl) {
                    // ভিডিও প্লেয়ার এবং সোর্স আপডেট করুন
                    $('#video-source-1').attr('src', videoUrl); // প্রথম সোর্স আপডেট
                    $('#player')[0].load(); // নতুন ভিডিও লোড
                    $('#player')[0].play(); // ভিডিও প্লে
                } else {
                    alert('No video available in this lecture');
                }
            });
        });
    </script>

    <script>
        // Function to set the current URL in the modal input
        function setShareModalURL() {
            const currentURL = window.location.href; // Get the current page URL
            const shareInput = document.getElementById('shareModalInput');
            shareInput.value = currentURL; // Set the URL in the input field
        }

        // Function to copy the input value to the clipboard
        function copyToClipboard() {
            const shareInput = document.getElementById('shareModalInput');
            shareInput.select(); // Select the input text
            document.execCommand('copy'); // Copy to clipboard
            // Show a success message

        }
    </script>







</body>

</html>
