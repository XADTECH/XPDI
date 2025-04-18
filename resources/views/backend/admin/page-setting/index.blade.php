@extends('backend.master')

@section('content')
    <div class="page-content">

        @include('backend.admin.site-setting.breadcrumb')
        <hr />

        <div class="card">
            <div class="card-title">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-success" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#successhome" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                </div>
                                <div class="tab-title">About Page</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#successprofile" role="tab" aria-selected="false"
                            tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Contact Page</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#faq" role="tab" aria-selected="false"
                            tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-microphone font-18 me-1"></i>
                                </div>
                                <div class="tab-title">FAQ</div>
                            </div>
                        </a>
                    </li>


                </ul>

                <div class="tab-content py-3">

                    @include('backend.admin.page-setting.about-info')

                    @include('backend.admin.page-setting.contact-info')

                    @include('backend.admin.page-setting.faq')




                </div>
            </div>
        </div>




    </div>
@endsection


