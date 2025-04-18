

<div class="bg-gray py-5">
    <div class="container">
        <ul class="nav nav-tabs generic-tab justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="about-me-tab" data-toggle="tab" href="#about-me"
                    role="tab" aria-controls="about-me" aria-selected="false">
                    About Me
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab"
                    aria-controls="experience" aria-selected="false">
                    Experience
                </a>
            </li>
        </ul>
        <div class="tab-content pt-40px" id="myTabContent">
            <div class="tab-pane fade show active" id="about-me" role="tabpanel"
                aria-labelledby="about-me-tab">
                <div class="card card-item">
                    <div class="card-body">

                        {{$user->bio}}
                    </div>
                </div>
            </div><!-- end tab-pane -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="card card-item">
                    <div class="card-body">
                        <p>
                           {{$user->experience}}
                        </p>

                    </div>
                </div>
            </div><!-- end tab-pane -->
        </div><!-- end tab-content -->
    </div><!-- end container -->
</div>

