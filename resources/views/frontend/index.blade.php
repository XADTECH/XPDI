@extends('frontend.master')

@section('content')



<!-----Hero--->
@include('frontend.pages.home.hero')
<!----Feature--->
@include('frontend.pages.home.feature')

<!----category first--->
@include('frontend.pages.home.category-first')

<!----category second--->
@include('frontend.pages.home.category-second')

<!---category third --->

@include('frontend.pages.home.category-third')

<!---funfact area--->
@include('frontend.pages.home.funfact-area')
<!---testmonial area--->
@include('frontend.pages.home.testmonial')
<!-----about area--->
<!----register area--->

<!---client logo area--->
@include('frontend.pages.home.client-logo')

<!-----blog-area---->
@include('frontend.pages.home.blog-area')

<!----get started area---->
@include('frontend.pages.home.get-started-area')
<!---Subscribe area--->


@include('frontend.pages.home.subscribe-area')






@endsection
