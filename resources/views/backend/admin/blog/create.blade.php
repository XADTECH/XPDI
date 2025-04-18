@extends('backend.master')


@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-12">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Add Blog</h5>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">Back</a>

                    </div>

                    <form class="row g-3" method="post" action="{{ route('admin.blog.store') }}"
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





                        <div class="col-md-6">
                            <label for="name" class="form-label">Post Title</label>
                            <input type="text" class="form-control" name="post_title" id="name"
                                placeholder="Enter the course name" value="{{ old('post_title') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="post_slug" id="slug"
                                placeholder="Enter the slug"  value="{{ old('post_slug') }}" required >
                        </div>



                        <div class="col-md-12">
                            <label for="category" class="form-label">Choose Category</label>
                            <select class="form-select" name="blogcat_id" id="category"
                                data-placeholder="Choose a category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($all_blogCategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>




                        <div class="col-md-12">
                            <label for="image" class="form-label">Post Image</label>
                            <input type="file" class="form-control" name="post_image" id="Photo" accept="image/*">
                        </div>
                        <div class="col-md-12">

                            <img src="" id="photoPreview"
                                style="margin-top: 15px; display: none;" />
                        </div>

                        <div class="mb-4 col-md-12">
                            <label for="multiple-select-field" class="form-label">Tags</label>
                            <select class="form-select" name="post_tags[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                <option value="business" selected>Business</option>
                                <option value="event" selected>Event</option>
                                <option value="video" >Video</option>
                                <option value="audio">Audio</option>
                                <option value="software">Software</option>
                                <option value="conference">Conference</option>
                                <option value="marketing">Marketing</option>
                                <option value="freelance">Freelance</option>
                                <option value="tips">Tips</option>
                                <option value="technology" selected>Technology</option>
                                <option value="entreprenur">Entreprenur</option>

                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Long Description</label>
                            <textarea class="form-control editor" name="long_descp" id="description" required> {{ old('long_description') }} </textarea>
                        </div>


                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4 w-100">Create Post</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>





    </div>
@endsection

@push('scripts')


    <script src="{{ asset('customjs/admin/blog.js') }}"></script>
@endpush
