<div class="modal" id="course-edit-{{ $lecture->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Lecture</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('instructor.lecture.update', $lecture->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="course_id" value="{{ $course->id }}" />
                    <input type="hidden" name="section_id" value="{{ $data->id }}" />
                    <div class="col-md-12">
                        <label for="lecture_title" class="form-label">Lecture
                            Title</label>
                        <input type="text" class="form-control" name="lecture_title" id="lecture-title"
                            value="{{ $lecture->lecture_title }}" placeholder="Enter the lecture title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url" class="form-label">Youtube video Url</label>
                        <input type="url" class="form-control" name="url" id="video_url"
                            value="{{ $lecture->url }}" placeholder="Enter video url">
                    </div>


                    <div class="col-md-12 mt-3">
                        <div id="youtubePreview" style="display: none; margin-top: 10px;">
                            <iframe width="100%" height="315" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url" class="form-label">Video duration in minutes</label>
                        <input type="number" value="{{ $lecture->video_duration }}" min="0" class="form-control"
                            name="video_duration" id="video_duration">
                    </div>


                    <div class="col-md-12 mt-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control summernote" name="content" required>{!! $lecture->content !!}</textarea>
                        <span class="text-danger">Content field required</span>
                    </div>


                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
