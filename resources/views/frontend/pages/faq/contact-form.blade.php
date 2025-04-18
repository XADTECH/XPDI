<div class="col-lg-5">
    <div class="card card-item">
        <div class="card-body">
            <h3 class="fs-24 font-weight-semi-bold pb-2">Still have question?</h3>
            <div class="divider"><span></span></div>
            <form method="post" action="{{route('contact')}}">

                @csrf
                <div class="input-box">
                    <label class="label-text">Your Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="name"
                            placeholder="Your name">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box">
                    <label class="label-text">Your email</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="email" name="email"
                            placeholder="Your email">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box">
                    <label class="label-text">Subject</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="subject"
                            placeholder="Reason for contact">
                        <span class="la la-book input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box">
                    <label class="label-text">Message</label>
                    <div class="form-group">
                        <textarea class="form-control form--control pl-4" name="message" rows="6" placeholder="Write message"></textarea>
                    </div>
                </div><!-- end input-box -->
                <div class="btn-box pt-2">
                    <button class="btn theme-btn" type="submit">Send Message <i
                            class="la la-arrow-right icon ml-1"></i></button>
                </div><!-- end btn-box -->
            </form>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div><!-- end col-lg-5 -->
