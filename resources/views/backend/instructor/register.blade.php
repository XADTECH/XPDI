<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Aduca - Education HTML Template</title>

    @include('frontend.section.link')

</head>

<body>

    @include('frontend.section.preloader')

    @include('frontend.section.header')

    @include('frontend.section.breadcrumb', ['title' => 'Register'])

    @include('backend.instructor.register.feature')

    @include('backend.instructor.register.funfact')


    <div class="section-block"></div>

    @include('backend.instructor.register.main')


    @include('frontend.section.preloader')


    @include('frontend.section.footer')


@include('frontend.section.script')

</body>

</html>
