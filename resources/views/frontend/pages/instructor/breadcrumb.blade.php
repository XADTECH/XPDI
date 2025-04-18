

<section class="breadcrumb-area py-5 bg-white pattern-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <div class="media media-card align-items-center pb-4">
                <div class="media-img media--img media-img-md rounded-full">
                    <img class="rounded-full" src="{{asset($user->photo)}}" alt="Student thumbnail image">
                </div>
                <div class="media-body">
                    <h2 class="section__title fs-30">{{$user->name}}</h2>
                    <span class="d-block lh-18 pt-1 pb-2">Joined Joined {{ $user->created_at->diffForHumans() }}</span>
                    <p class="lh-18">Web Developer, Designer, and Teacher</p>
                </div>
            </div><!-- end media -->
            <ul class="social-icons social-icons-styled social--icons-styled">
                <li><a href="#"><i class="la la-facebook"></i></a></li>
                <li><a href="#"><i class="la la-twitter"></i></a></li>
                <li><a href="#"><i class="la la-instagram"></i></a></li>
                <li><a href="#"><i class="la la-linkedin"></i></a></li>
                <li><a href="#"><i class="la la-youtube"></i></a></li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->

