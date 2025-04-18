@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Setting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pusher Setting</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="card col-md-8">

            <div class="card-body">

                <div class="card-body p-4">

                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">Configure SMTP (Mail)</h5>




                    </div>

                    <form class="row g-3" method="post" action="{{ route('admin.pusher.settings.update') }}">
                        @csrf

                         <!-- Validation Error Message -->
                         @if ($errors->any())
                         <div class="alert alert-danger">
                             <strong>Whoops! Something went wrong.</strong>
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>

                                 @endforeach
                             </ul>
                         </div>
                     @endif

                        <div class="col-md-6">
                            <label for="app_id" class="form-label">App ID</label>
                            <input type="text" class="form-control" name="app_id" id="app_id" required placeholder="Pusher App Id" value="{{ old('app_id', $pusherSettings->app_id ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="app_key" class="form-label">App Key</label>
                            <input type="text" class="form-control" name="app_key" id="app_key"
                                placeholder="Enter App Key" required  value="{{ old('app_key', $pusherSettings->app_key ?? '') }}">
                        </div>


                        <div class="col-md-6">
                            <label for="app_secret" class="form-label">App Secret</label>
                            <input type="text" class="form-control" required name="app_secret" id="app_secret" placeholder="Enter App Secret"  value="{{ old('app_secret', $pusherSettings->app_secret ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="port" class="form-label">Port</label>
                            <input type="text" class="form-control" name="port" id="port"
                                placeholder="Enter Port" required  value="{{ old('post', $pusherSettings->port ?? '') }}" >
                        </div>


                        <div class="col-md-6">
                            <label for="cluster" class="form-label">App Cluster</label>
                            <input type="text" class="form-control" name="app_cluster" id="cluster"
                                placeholder="Enter Pusher Cluster" required  value="{{ old('app_cluster', $pusherSettings->app_cluster ?? '') }}" >
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

