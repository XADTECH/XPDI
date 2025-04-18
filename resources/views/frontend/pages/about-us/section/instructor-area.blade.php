<section class="team-member-area section--padding">
    <div class="container">
        <div class="team-member-heading-content text-center">
            <div class="section-heading">
                <h2 class="section__title lh-50">Meet Our Instructor</h2>
            </div><!-- end section-heading -->
        </div><!-- end team-member-heading-content -->
        <div class="row pt-60px">

            @foreach (getInstructorInfo() as $instructor)
            <div class="col-lg-3 responsive-column-half">
                <div class="card card-item member-card text-center">
                    <div class="card-image">
                        <img class="card-img-top" src="{{asset($instructor->photo)}}" alt="team member">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="/instructor/{{$instructor->name}}/{{$instructor->id}}">{{$instructor->name}}</a></h5>
                        <p class="card-text">Founder And CEO</p>
                        <ul class="social-icons social-icons-styled social--icons-styled pt-4">
                            <li><a href="#"><i class="la la-facebook"></i></a></li>
                            <li><a href="#"><i class="la la-twitter"></i></a></li>
                            <li><a href="#"><i class="la la-instagram"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card -->
            </div><!-- end col-lg-3 -->
            @endforeach


        </div><!-- end row -->
    </div><!-- end container -->
</section>
