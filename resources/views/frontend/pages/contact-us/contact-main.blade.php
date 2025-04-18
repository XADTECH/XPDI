<div class="row align-items-center pt-30px">
    <div class="col-lg-5">
        <div class="contact-content pb-5">
            <div class="section-heading">
                <h2 class="section__title pb-3">We'd love to hear from you</h2>
                <p class="section__desc">Lorem ipsum is simply free text dolor sit amett quie adipiscing
                    elit. When an unknown printer took a galley. quiaies lipsum dolor sit atur adip scing
                </p>
            </div><!-- end section-heading -->
            <ul class="social-icons social-icons-styled social--icons-styled pt-30px">
                <li><a href="#"><i class="la la-facebook"></i></a></li>
                <li><a href="#"><i class="la la-twitter"></i></a></li>
                <li><a href="#"><i class="la la-instagram"></i></a></li>
                <li><a href="#"><i class="la la-youtube"></i></a></li>
            </ul>
        </div>
    </div><!-- end col-lg-5 -->
    <div class="col-lg-7">
        <div class="card card-item">
            <div class="card-body">
                <form method="post" action="{{route('contact')}}" >
                    @csrf

                    <div class="input-box">
                        <label class="label-text">Your Name</label>
                        <div class="form-group">
                            <input id="name" class="form-control form--control" type="text"
                                name="name" placeholder="Your name" required>
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box">
                        <label class="label-text">Email Address</label>
                        <div class="form-group">
                            <input id="email" class="form-control form--control" type="email"
                                name="email" placeholder="Enter email address" request>
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box">
                        <label class="label-text">Message</label>
                        <div class="form-group">
                            <textarea id="message" class="form-control form--control pl-4" name="message" rows="5"
                                placeholder="Write message"></textarea>
                        </div>
                    </div><!-- end input-box -->
                    <div class="btn-box">
                        <button  class="btn theme-btn" type="submit">Send
                            Message</button>
                    </div><!-- end btn-box -->
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-lg-7 -->
</div><!-- end row -->
