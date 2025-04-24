@extends('frontend.master')

@section('content')
    @include('frontend.section.breadcrumb', ['title' => 'FAQ'])

    <section class="faq-topic-area section--padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-heading-content-wrap text-center">
                        <div class="section-heading">
                            <h2 class="section__title pb-3">Select a Topic for Help</h2>
                            <p class="section__desc">We’ll then ask you to tell us your current level of English or
                                invite you to take our quick 20 minute <br>
                                placement test so we can make sure you start learning English.</p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->

            @include('frontend.pages.faq.faq-topics')


        </div><!-- end container -->
    </section><!-- end faq-topic-area -->



    <section class="faq-area section--padding">
        <div class="container">
            <div class="row">


                @include('frontend.pages.faq.faq')

                @include('frontend.pages.faq.contact-form')


            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end faq-area -->
@endsection
