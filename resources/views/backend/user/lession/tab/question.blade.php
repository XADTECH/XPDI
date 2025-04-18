<div class="tab-pane fade" id="question-and-ans" role="tabpanel"
aria-labelledby="question-and-ans-tab">
<div class="lecture-overview-wrap lecture-quest-wrap">
    <div class="new-question-wrap">
        <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i
                class="la la-reply mr-1"></i>Back to all questions</button>
        <div class="new-question-body pt-40px">
            <h3 class="fs-20 font-weight-semi-bold">My question relates to</h3>
            <form action="{{route('user.course.store')}}" class="pt-4" method="post">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}" />
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                <input type="hidden" name="instructor_id" value="{{$course->user->id}}" />
                <div class="custom-control-wrap">
                    <div class="form-group">
                       <input type="text" name="subject" class="form-control form--control" placeholder="Enter your subject" required />
                    </div>
                    <div class="custom-control custom-radio mb-3 pl-0">
                       <textarea class='form-control form--control' name="question" placeholder="Enter your question" rows="5" required></textarea>
                    </div>
                </div>
                <div class="btn-box text-center">
                    <button class="btn theme-btn w-100">Submit Question <i
                            class="la la-arrow-right icon ml-1"></i></button>
                </div>
            </form>
        </div>
    </div><!-- end new-question-wrap -->








    <div class="question-overview-result-wrap">

        <div class="lecture-overview-item">
            <div
                class="question-overview-result-header d-flex align-items-center justify-content-between">
                <h3 class="fs-17 font-weight-semi-bold">30 questions in this course
                </h3>
                <button
                    class="btn theme-btn theme-btn-sm theme-btn-transparent ask-new-question-btn">Ask
                    a new question</button>
            </div>
        </div><!-- end lecture-overview-item -->
        <div class="section-block"></div>

        <div class="lecture-overview-item mt-0">

            @foreach($all_question as $item)

            <div class="question-list-item">
                <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                    <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                        <img class="rounded-full" src="{{asset($item->user->photo)}}"
                            alt="User image">
                    </div>
                    <div class="media-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="question-meta-content">
                                <a href="javascript:void(0)" class="d-block">
                                    <h5 class="fs-16 pb-1">{{$item->subject}}</h5>
                                    <p class="text-truncate fs-15 text-gray">
                                        {{$item->question}}
                                    </p>
                                </a>
                            </div><!-- end question-meta-content -->

                        </div>
                        <p class="meta-tags pt-1 fs-13">
                            <a href="#">{{$item->user->name}}</a>

                            <span>{{ $item->created_at->diffForHumans() }}</span>

                        </p>
                    </div><!-- end media-body -->
                </div><!-- end media -->

            </div>

            @foreach($item['replay'] as $replay)

            <div class="question-list-item" style="background: gainsboro">
                <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                    <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                        <img class="rounded-full" src="{{asset($item->instructor->photo)}}"
                            alt="User image">
                    </div>
                    <div class="media-body">
                        <div
                            class="d-flex align-items-center justify-content-between">
                            <div class="question-meta-content">
                                <a href="javascript:void(0)" class="d-block">
                                    <h5 class="fs-16 pb-1">{{$item->subject}}</h5>
                                    <p class="text-truncate fs-15 text-gray">
                                        {{$replay->answer}}
                                    </p>
                                </a>
                            </div><!-- end question-meta-content -->

                        </div>
                        <p class="meta-tags pt-1 fs-13">
                            <a href="#">{{$item->instructor->name}}</a>
                            <span>{{ $replay->created_at->diffForHumans() }}</span>

                        </p>
                    </div><!-- end media-body -->
                </div><!-- end media -->

            </div>
            @endforeach

            @endforeach



        </div><!-- end lecture-overview-item -->
    </div>







</div>
</div><!-- end tab-pane -->
