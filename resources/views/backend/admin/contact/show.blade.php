@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Contact</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View COntact</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-8">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Shows Mail Data</h5>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Back</a>

                    </div>

                    <form class="row g-3" action="#">

                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="" id="name"  value="{{$contact->name}}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="name"  value="{{$contact->email}}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="name" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="name"  value="{{$contact->subject}}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="name" class="form-label">Message</label>
                            <textarea type="text" class="form-control" rows="8">{{$contact->message}}</textarea>
                        </div>




                    </form>
                </div>

            </div>

        </div>





    </div>
@endsection


