@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Blog Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-8">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Update Blog Category</h5>
                        <a href="{{route('admin.blog-category.index')}}" class="btn btn-primary">Back</a>

                    </div>

                    <form class="row g-3" method="post" action="{{route('admin.blog-category.update', $blog_data->id)}}">
                        @csrf

                        @method('PUT')
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="category_name" id="name" placeholder="Enter the category name" value="{{$blog_data->category_name}}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="category_slug" id="slug" placeholder="Enter the slug" value="{{$blog_data->category_slug}}" required>
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

<script src="{{asset('customjs/admin/category.js')}}"></script>

@endpush
