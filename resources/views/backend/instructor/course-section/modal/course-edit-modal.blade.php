<div class="modal" id="course-edit-{{ $lecture->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Course</h4>
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
                        <label for="video_url" class="form-label">Video Url</label>
                        <input type="url" class="form-control" name="url" id="video_url"
                            value="{{ $lecture->url }}" placeholder="Enter video url">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" class="form-control" name="video" accept="video/mp4"
                            id="video-{{ $lecture->id }}">

                        <video id="videoPreview-{{ $lecture->id }}"
                            src="{{ $lecture->video ? asset($lecture->video) : '' }}" controls
                            style="{{ !$lecture->video ? 'display:none;' : '' }} width: 100%; margin-top: 10px;">
                        </video>


                        <!-- Hidden Input for Video Duration -->
                        <input type="hidden" name="video_duration" id="videoDuration-{{ $lecture->id }}">


                    </div>


                    <div class="col-md-12 mt-3">
                        <label for="content" class="form-label">Content</label>

                        <textarea class="form-control summernote" name="content" required>{{ $lecture->content }}</textarea>
                    </div>


                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
