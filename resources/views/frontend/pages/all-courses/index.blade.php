@extends('frontend.master')

@section('content')

    @include('frontend.section.breadcrumb', ['title' => 'All Courses'])

    <section class="course-area section--padding">
        <div class="container">

            @include('frontend.pages.all-courses.filter-area')



            <div class="row">



                <div class="col-lg-4">

                    @include('frontend.pages.all-courses.left-sidebar')

                </div>

                <div class="col-lg-8 course-main-content" id="">

                    <!----Javascript load here--->

                </div><!-- end col-lg-8 -->




            </div><!-- end row -->





        </div><!-- end container -->
    </section><!-- end courses-area -->

    <div class="filter-main-content"></div>
@endsection



@push('scripts')

    <script>
        $(document).ready(function() {

            getCourse();


            function getCourse() {

                var url = '/course/all';

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {

                        _token: $('meta[name="csrf-token"]').attr('content')


                    },
                    success: function(response) {

                        if (response.status === 'success') {
                            // #wishlist-course ডিভে HTML আপডেট করা
                            $('.course-main-content').html(response.html);

                            // Reattach event listeners for pagination

                        }


                    },
                    error: function(xhr) {

                        let message = 'Something went wrong!';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }
                        console.error(message);


                    }
                });

            }


        });
    </script>

    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1]; // URL থেকে পেজ নাম্বার বের করুন
            fetchCourses(page);
        });

        function fetchCourses(page) {
            $.ajax({
                url: "/courses?page=" + page, // AJAX কলের URL
                type: "GET",
                success: function(response) {
                    if (response.status === "success") {
                        $('.course-main-content').html(response.html); // নতুন HTML রেন্ডার করুন
                    }
                },
                error: function() {
                    alert('Could not load data.'); // যদি কোনো সমস্যা হয়
                }
            });
        }
    </script>


@endpush
