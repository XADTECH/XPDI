

    @extends('frontend.master')

    @section('content')



   @include('frontend.section.breadcrumb' ,['title' => 'Contact Us'])

    <section class="contact-area section--padding position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>
        <div class="container">

           @include('frontend.pages.contact-us.contact-first')

            @include('frontend.pages.contact-us.contact-main')

            <div class="row pt-30px">
                <div class="col-lg-12">
                    <div class="map-container">

                        <div>
                            {!! getPageInfo()->map_link !!}
                        </div>



                    </div><!-- end map-container -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->



    @endsection
