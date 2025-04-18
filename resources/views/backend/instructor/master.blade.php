<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backend.section.link')


    <title>Learning Management System</title>
</head>



<body>
    <!--wrapper-->
    <div class="wrapper">
        @include('backend.instructor.section.sidebar')

        @include('backend.instructor.section.header')

        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('content')

        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        @include('backend.instructor.section.footer')

    </div>
    <!--end wrapper-->


    @include('backend.section.script')

</body>

</html>
