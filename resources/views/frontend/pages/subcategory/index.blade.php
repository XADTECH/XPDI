@extends('frontend.master')

@section('content')

@include('frontend.section.breadcrumb', ['title' => $subcategory_name])


    <section class="course-area section--padding">
        <div class="container">
            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <p class="fs-14">We found <span class="text-black">{{$course_data->count()}}</span> courses available for you</p>
                    <div class="d-flex flex-wrap align-items-center">
                        <ul class="filter-nav mr-3">
                            <li><a href="/all-courses/grid-view" data-toggle="tooltip" data-placement="top" title="Grid View"
                                    class="active"><span class="la la-th-large"></span></a></li>
                            <li><a href="/all-courses/list-view" data-toggle="tooltip" data-placement="top"
                                    title="List View"><span class="la la-list"></span></a></li>
                        </ul>

                    </div>
                </div><!-- end filter-bar-inner -->
            </div><!-- end filter-bar -->
            <div class="row">

                <div class="col-lg-4">

                    @include('frontend.pages.subcategory.left-sidebar')

                </div><!-- end col-lg-4 -->


                <div class="col-lg-8 course-main-content">


                </div><!-- end col-lg-8 -->


            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end courses-area -->
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            getCourse();



            function getCourse() {

                var category = "{{ $category_name }}";
                var subcategory = "{{ $subcategory_name }}"
                console.log(category, subcategory);

                var url = `/course/${category}/${subcategory}`;

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
