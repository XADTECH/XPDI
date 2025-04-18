<section class="footer-area pt-100px {{ request()->is('/') ? '' : 'bg-gray' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <a href="index.html">
                        <img src="{{asset(getSiteInfo()->logo)}}" alt="footer logo" class="footer__logo" style="height: 100px">
                    </a>
                    <ul class="generic-list-item pt-4">
                        <li><a href="tel:+1631237884">{{getSiteInfo()->phone}}</a></li>
                        <li><a href="mailto:support@wbsite.com">{{getSiteInfo()->mail}}</a></li>
                        <li>{{getSiteInfo()->address}}</li>
                    </ul>
                    <h3 class="fs-20 font-weight-semi-bold pt-4 pb-2">We are on</h3>
                    <ul class="social-icons social-icons-styled">
                        <li class="mr-1"><a href="{{getSiteInfo()->facebook}}" class="facebook-bg"><i
                                    class="la la-facebook"></i></a></li>
                        <li class="mr-1"><a href="{{getSiteInfo()->twitter}}" class="twitter-bg"><i
                                    class="la la-twitter"></i></a></li>
                        <li class="mr-1"><a href="{{getSiteInfo()->instagram}}" class="instagram-bg"><i
                                    class="la la-instagram"></i></a></li>
                        <li class="mr-1"><a href="{{getSiteInfo()->linkedin}}" class="linkedin-bg"><i
                                    class="la la-linkedin"></i></a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Company</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        <li><a href="{{route('aboutUs')}}">About us</a></li>
                        <li><a href="{{route('contactUs')}}">Contact us</a></li>
                        <li><a href="{{route('instructor.register')}}" target="_blank">Become a Instructor</a></li>

                        <li><a href="{{route('faq')}}">FAQs</a></li>
                        <li><a href="{{route('allBlog')}}">Blog</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Courses</h3>
                    <span class="section-divider section--divider"></span>

                    @php

$course_category = \App\Models\Category::inRandomOrder()->take(5)->get();


                    @endphp


                    <ul class="generic-list-item">

                        @foreach($course_category as $item)
                        <li><a href="{{route('course-category', $item->slug)}}">{{$item->name}}</a></li>
                        @endforeach



                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Download App</h3>
                    <span class="section-divider section--divider"></span>
                    <div class="mobile-app">
                        <p class="pb-3 lh-24">Download our mobile app and learn on the go.</p>
                        <a href="#" class="d-block mb-2 hover-s"><img src="{{asset('frontend/images/appstore.png')}}"
                                alt="App store" class="img-fluid"></a>
                        <a href="#" class="d-block hover-s"><img src="{{asset('frontend/images/googleplay.png')}}"
                                alt="Google play store" class="img-fluid"></a>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="copyright-content py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copy-desc">&copy; 2025 XPDI. All Rights Reserve
                    </p>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="mr-3"><a href="">Terms & Conditions</a></li>
                            <li class="mr-3"><a href="">Privacy Policy</a></li>
                        </ul>
                        <div class="select-container select-container-sm">
                            <select class="select-container-select">
                                <option value="1">English</option>
                                <option value="2">Deutsch</option>
                                <option value="3">Español</option>
                                <option value="4">Français</option>
                                <option value="5">Bahasa Indonesia</option>
                                <option value="6">Bangla</option>
                                <option value="7">日本語</option>
                                <option value="8">한국어</option>
                                <option value="9">Nederlands</option>
                                <option value="10">Polski</option>
                                <option value="11">Português</option>
                                <option value="12">Română</option>
                                <option value="13">Русский</option>
                                <option value="14">ภาษาไทย</option>
                                <option value="15">Türkçe</option>
                                <option value="16">中文(简体)</option>
                                <option value="17">中文(繁體)</option>
                                <option value="17">Hindi</option>
                            </select>
                        </div>
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section><!-- end footer-area -->
