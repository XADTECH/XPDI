<div class="modal" id="course-{{ $data->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Course</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('instructor.lecture.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}" />
                    <input type="hidden" name="section_id" value="{{ $data->id }}" />
                    <div class="col-md-12">
                        <label for="lecture_title" class="form-label">Lecture Title</label>
                        <input type="text" class="form-control" name="lecture_title"
                            id="lecture-title" placeholder="Enter the lecture title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url" class="form-label">Video Url</label>
                        <input type="url" class="form-control" name="url" id="video_url"
                            placeholder="Enter video url">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" class="form-control" id="video" name="video"
                            accept="video/mp4">

                            <video id="videoPreview-{{ $data->id }}" controls style="display: none; width: 100%; margin-top: 10px;"></video>

                         <!-- Hidden Input for Video Duration -->
                        <input type="hidden" name="video_duration" id="videoDuration-{{ $data->id }}">

                    </div>


                    <div class="col-md-12 mt-3">
                        <label for="content" class="form-label">Content</label>

                        <textarea class="form-control summernote" name="content" required></textarea>
                    </div>


                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
