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
                        <li class="breadcrumb-item active" aria-current="page">Update Course</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-12">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Add Course</h5>
                        <a href="{{ route('instructor.course.index') }}" class="btn btn-primary">Back</a>

                    </div>

                    <form class="row g-3" method="post" action="{{ route('instructor.course.update', $course->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="instructor_id" value="{{auth()->user()->id}}" />



                        <div class="col-md-6">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="course_name" id="name"
                                placeholder="Enter the course name" value="{{ old('course_name', $course->course_name) }}" >
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="course_name_slug" id="slug"
                                placeholder="Enter the slug"  value="{{ old('course_name_slug', $course->course_name_slug) }}"  >
                        </div>

                        <div class="col-md-12">
                            <label for="course_title" class="form-label">Course Title</label>
                            <input type="text" class="form-control" name="course_title" id="course_title"
                                placeholder="Enter the course title" value="{{ old('course_title', $course->course_title) }}" >
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">Choose Category</label>
                            <select class="form-select" name="category_id" id="category"
                                data-placeholder="Choose a category">
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($all_categories as $item)
                                    <option value="{{ $item->id }}"  {{$item->id == $course->category_id ? 'selected' : ''}}   >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="subcategory" class="form-label">Select SubCategory</label>
                            <select class="form-select" name="subcategory_id" id="subcategory"
                                data-placeholder="Choose a subcategory">
                                <option value="{{$course->subcategory_id}}"  selected>{{$course->subCategory['name']}}</option>
                            </select>
                        </div>


                        <div class="col-md-10">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="Photo" accept="image/*">
                        </div>
                        <div class="col-md-2">

                            <img src="{{ asset($course->course_image) }}" id="photoPreview" width="60" height="60"
                            style="margin-top: 15px; {{ $course->course_image ? '' : 'display: none;' }}">

                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control editor" name="description" id="description"> {{ old('description', $course->description) }} </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="video" class="form-label">Upload Video</label>
                            <input type="file" class="form-control" name="video" id="video" accept="video/*">
                            <video id="videoPreview" src="{{ $course->video ? asset($course->video) : '' }}" controls style="{{!$course->video ? 'display:none;' : '' }}  width: 100%; margin-top: 10px;">

                            </video>
                        </div>


                        <div class="col-md-6">
                            <label for="label" class="form-label">Course Label</label>
                            <select class="form-select" name="label" id="label"
                                data-placeholder="Choose one thing">

                                <option selected disabled>select</option>

                                <option value="beginer" {{ $course->label== 'beginer' ? 'selected' : '' }}      >Beginer</option>
                                <option value="medium"  {{ $course->label== 'medium' ? 'selected' : '' }}  >Medium</option>
                                <option value="advance"  {{ $course->label== 'advance' ? 'selected' : '' }}    >Advance</option>

                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="certificate" class="form-label">Certificate</label>
                            <select class="form-select" name="certificate" id="certificate"
                                data-placeholder="Choose one thing">

                                <option selected disabled>select</option>

                                <option value="yes" {{ $course->certificate == 'yes' ? 'selected' : '' }} >Yes</option>
                                <option value="no" {{ $course->certificate == 'no' ? 'selected' : '' }} >No</option>


                            </select>
                        </div>


                        <div class="col-md-6">
                            <label for="duration" class="form-label">Course Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration', $course->duration) }}" >
                        </div>

                        <div class="col-md-12">
                            <label for="resources" class="form-label">Resources</label>
                            <input class="form-control" type="number" name="resources" id="resources" value="{{ old('resources', $course->resources) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="selling_price" class="form-label">Selling Price</label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price"
                                placeholder="Enter selling price" value="{{ old('selling_price', $course->selling_price) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="discount_price" class="form-label">Discount Price</label>
                            <input type="number" class="form-control" name="discount_price" id="discount_price"
                                placeholder="Enter discount price" value="{{ old('discount_price', $course->discount_price) }}"  />
                        </div>

                        <div class="col-md-12">
                            <label for="prerequisites" class="form-label">Course Prerequisites</label>
                            <textarea class="form-control summernote" name="prerequisites" id="prerequisites"> {{ old('prerequisites', $course->prerequisites) }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="course_goal" class="form-label" style="display: flex; align-items:center; justify-content:space-between">
                                Course Goals
                                <button type="button" id="addGoalInput" class="btn btn-primary">+</button>
                            </label>
                            <div id="goalContainer">

                                @foreach($course_goals as $data)
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">

                                    <input type="text" class="form-control" name="course_goals[]"
                                        placeholder="Enter Course Goal" value="{{$data->goal_name}}" />
                                    <button type="button" class="btn btn-danger removeGoalInput">-</button>


                                </div>
                                @endforeach
                            </div>
                        </div>





                        <div class="d-flex align-items-center gap-3 mt-3">
                            <div class="form-check form-check-success">
                                <input type="hidden" name="bestseller" value="no"> <!-- Hidden field for default value -->
                                <input class="form-check-input" name="bestseller" type="checkbox" id="flexCheckSuccess"
                                    style="cursor: pointer" value="yes" {{ $course->bestseller == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckSuccess">bestseller</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input type="hidden" name="featured" value="no"> <!-- Hidden field for default value -->
                                <input class="form-check-input" name="featured" type="checkbox" id="flexCheckDanger"
                                    style="cursor: pointer" value="yes" {{ $course->featured == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDanger">featured</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input type="hidden" name="highestrated" value="no"> <!-- Hidden field for default value -->
                                <input class="form-check-input" type="checkbox" name="highestrated" id="flexCheckWarning"
                                    style="cursor: pointer" value="yes" {{ $course->highestrated == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckWarning">highestrated</label>
                            </div>
                        </div>






                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4 w-100">Update</button>
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
@endpush
