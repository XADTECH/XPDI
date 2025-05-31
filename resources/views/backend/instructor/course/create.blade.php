@extends('backend.instructor.master')


@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <!-- Button to trigger modal -->
        <!-- Modal -->
        <div class="modal fade modal-lg" tabindex="-1" role="dialog" id="guide-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Following is the example as guide for which url you need to copy and paste
                            <br>
                            <p>For the given example we need to copy </p>
                            <b>https://www.youtube.com/embed/ENqRPOuHpm8?si=eNs5nA1pgiIb-ePW</b> <br> without double quotes
                            ("")
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('backend-assets/images/instuctor/instructor_guide.png') }}" class="w-100"
                            alt="Guide-image">
                    </div>
                </div>
            </div>
        </div>



        <div class="card col-md-12">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Add Course</h5>
                        <a href="{{ route('instructor.course.index') }}" class="btn btn-primary">Back</a>

                    </div>

                    <form class="row g-3" method="post" action="{{ route('instructor.course.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}" />



                        <div class="col-md-6">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="course_name" id="name"
                                placeholder="Enter the course name" value="{{ old('course_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="course_name_slug" id="slug"
                                placeholder="Enter the slug" value="{{ old('course_name_slug') }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="course_title" class="form-label">Course Title</label>
                            <input type="text" class="form-control" name="course_title" id="course_title"
                                placeholder="Enter the course title" value="{{ old('course_title') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">Choose Category</label>
                            <select class="form-select" name="category_id" id="category"
                                data-placeholder="Choose a category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($all_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="subcategory" class="form-label">Select SubCategory</label>
                            <select class="form-select" name="subcategory_id" id="subcategory"
                                data-placeholder="Choose a subcategory" required>
                                <option value="" disabled selected>Select a subcategory</option>
                            </select>
                        </div>


                        <div class="col-md-12">
                            <label for="image" class="form-label">Image (Course Thumbnail)</label>
                            <input type="file" class="form-control" name="course_image" id="Photo" accept="image/*">
                        </div>
                        <div class="col-md-2">

                            <img src="" id="photoPreview" width="60" height="60"
                                style="margin-top: 15px; display: none;" />
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control editor" name="description" id="description" required> {{ old('description') }} </textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="youtubeLink" class="form-label"><b>Attach YouTube video course link</b></label>
                            <br>
                            <span style="color: blue;">After uploading video to youtube please click on share option and
                                then select embed
                                option and copy the url start from http in src and paste it in the below input field. <a
                                    href="#!" id="view-guide-image">Click here to get
                                    example screen shot of how to copy url </a>
                            </span>
                            <input type="url" class="form-control" name="video" id="youtubeLink"
                                placeholder="https://www.youtube.com/embed/ENqRPOuHpm8?si">

                            <!-- Preview area -->
                            <div id="youtubePreview" style="display: none; margin-top: 10px;">
                                <iframe width="100%" height="315" frameborder="0" allowfullscreen></iframe>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label for="label" class="form-label">Course Label</label>
                            <select class="form-select" name="label" id="label"
                                data-placeholder="Choose one thing">

                                <option selected disabled>select</option>

                                <option value="beginer">Beginer</option>
                                <option value="medium">Medium</option>
                                <option value="advance">Advance</option>

                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="certificate" class="form-label">Certificate</label>
                            <select class="form-select" name="certificate" id="certificate"
                                data-placeholder="Choose one thing">

                                <option selected disabled>select</option>

                                <option value="yes">Yes</option>
                                <option value="no">No</option>


                            </select>
                        </div>


                        <div class="col-md-6">
                            <label for="duration" class="form-label">Course Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration"
                                value="{{ old('duration') }}">
                        </div>

                        <div class="col-md-12">
                            <label for="resources" class="form-label">Resources</label>
                            <input class="form-control" type="number" name="resources" id="resources"
                                value="{{ old('resources') }}" />
                        </div>


                        <div class="col-md-12">
                            <label for="prerequisites" class="form-label">Course Prerequisites</label>
                            <textarea class="form-control editor" name="prerequisites" id="prerequisites"> {{ old('prerequisites') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="course_goal" class="form-label">Course Goals</label>
                            <div id="goalContainer">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <input type="text" class="form-control" name="course_goals[]"
                                        placeholder="Enter Course Goal" />
                                    <button type="button" id="addGoalInput" class="btn btn-primary">+</button>
                                </div>
                            </div>
                        </div>





                        <div class="d-flex align-items-center gap-3 mt-3 ">
                            <div class="form-check form-check-success">
                                <input class="form-check-input" type="checkbox" value="bestseller" id="flexCheckSuccess"
                                    style="cursor: pointer">
                                <label class="form-check-label" for="flexCheckSuccess">
                                    bestseller
                                </label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input class="form-check-input" type="checkbox" value="featured" id="flexCheckDanger"
                                    style="cursor: pointer">
                                <label class="form-check-label" for="flexCheckDanger">
                                    featured
                                </label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input class="form-check-input" type="checkbox" value="highestrated"
                                    id="flexCheckWarning" style="cursor: pointer">
                                <label class="form-check-label" for="flexCheckWarning">
                                    highestrated
                                </label>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4 w-100">Create</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>





    </div>
@endsection

@push('scripts')
    <script src="{{ asset('customjs/instructor/course.js') }}"></script>


    <script>
        document.getElementById('youtubeLink').addEventListener('input', function() {
            const url = this.value;
            const match = url.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]{11})/);

            const previewDiv = document.getElementById('youtubePreview');
            const iframe = previewDiv.querySelector('iframe');

            if (match && match[1]) {
                const videoId = match[1];
                iframe.src = `https://www.youtube.com/embed/${videoId}`;
                previewDiv.style.display = 'block';
            } else {
                iframe.src = '';
                previewDiv.style.display = 'none';
            }
        });
    </script>


    {{-- <script>
        document.getElementById('view-guide-image').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('guide-modal'));
            myModal.show();
        });
        document.getElementById('close-guide-modal').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('guide-modal'));
            myModal.hide();
        });
    </script> --}}

    <script>
        document.getElementById('view-guide-image').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('guide-modal'));
            myModal.show();
        });
    </script>
@endpush
