<section class="about-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content pb-5">
                    <div class="section-heading">
                        <h2 class="section__title pb-3 lh-50">A great place to grow</h2>
                        <p class="section__desc pb-3">

                           {!! getPageInfo()->about_mission !!}
                        </p>

                    </div><!-- end section-heading -->
                    <div class="btn-box pt-35px">
                        <a href="/instructor/register" class="btn theme-btn">Join with our team <i class="la la-arrow-right icon ml-1"></i></a>
                    </div>
                </div><!-- end about-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="generic-img-box generic-img-box-layout-3">
                    <img src="{{asset('frontend/images/img-loading.png')}}" data-src="{{asset('frontend/images/img13.jpg')}}" alt="About image" class="img__item lazy img__item-1">
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
