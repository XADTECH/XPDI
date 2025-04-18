











<section class="client-logo-area section--padding position-relative overflow-hidden text-center">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="section-heading">
            <h2 class="section__title mb-3">Trusted by companies of all sizes</h2>
            <p class="section__desc">Get access to high quality learning wherever you are, with online courses, programs
                <br>and degrees created by leading universities, business schools</p>
        </div><!-- end section-heading -->
        <div class="client-logo-carousel pt-40px">
            @foreach(partner() as $partner)
            <a href="#" class="client-logo-item"><img src="{{asset($partner->image)}}" alt="brand image"></a>

            @endforeach
        </div><!-- end client-logo-carousel -->
    </div><!-- end container -->
</section><!-- end client-logo-area -->
