<section class="about-area section--padding overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content pb-5">
                    <div class="section-heading">
                        <h2 class="section__title pb-3 lh-50">{{getPageInfo()->about_title}}</h2>
                        <p class="section__desc">
                            {!! getPageInfo()->about_description !!}
                        </p>
                    </div><!-- end section-heading -->

                </div><!-- end about-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="generic-img-box generic-img-box-layout-2">
                    <div class="img__item img__item-1">
                        <img class="lazy" src="{{asset('frontend/images/img-loading.png')}}" data-src="{{asset('frontend/images/img15.jpg')}}" alt="About image">
                        <div class="generic-img-box-content">
                            <h3 class="fs-24 font-weight-semi-bold pb-1">55K</h3>
                            <span>Instructors</span>
                        </div>
                    </div>
                    <div class="img__item img__item-2">
                        <img class="lazy" src="{{asset('frontend/images/img-loading.png')}}" data-src="{{asset('frontend/images/img16.jpg')}}" alt="About image">
                        <div class="generic-img-box-content">
                            <h3 class="fs-24 font-weight-semi-bold pb-1">6,900+</h3>
                            <span>Courses</span>
                        </div>
                    </div>
                    <div class="img__item img__item-3">
                        <img class="lazy" src="{{asset('frontend/images/img-loading.png')}}" data-src="{{asset('frontend/images/img17.jpg')}}" alt="About image">
                        <div class="generic-img-box-content">
                            <h3 class="fs-24 font-weight-semi-bold pb-1">40M</h3>
                            <span>Learners</span>
                        </div>
                    </div>
                </div><!-- end generic-img-box -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
