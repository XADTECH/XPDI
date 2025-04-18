<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{getSiteInfo()->meta_title}}</title>

	<meta name="description" content="{{getSiteInfo()->meta_description}}" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- inject:css -->

    @include('frontend.section.link')

    <!-- end inject -->
</head>

<body>

    @include('frontend.section.preloader')

    <!--======================================
        START HEADER AREA
    ======================================-->
    @include('frontend.section.header')

    @yield('content')





     @include('frontend.section.footer')



    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

    @include('frontend.component.tooltip')


    <!-- template js files -->
   @include('frontend.section.script')




</body>

</html>
