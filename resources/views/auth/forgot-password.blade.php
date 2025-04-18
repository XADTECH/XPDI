{{--


<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


--}}



@extends("frontend.master")

@section('content')

@include('frontend.section.breadcrumb', ['title' => 'Forgot Password'])

<section class="contact-area section--padding position-relative">
    <span class="ring-shape ring-shape-1"></span>
    <span class="ring-shape ring-shape-2"></span>
    <span class="ring-shape ring-shape-3"></span>
    <span class="ring-shape ring-shape-4"></span>
    <span class="ring-shape ring-shape-5"></span>
    <span class="ring-shape ring-shape-6"></span>
    <span class="ring-shape ring-shape-7"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title fs-24 lh-35 pb-2">Reset Password!</h3>
                        <p class="fs-15 lh-24 pb-3">Enter the email of your account to reset password. Then you will
                            receive a link to email to reset the password.If you have any issue about reset password <a href="/contact-us" class="text-color hover-underline">contact us</a></p>
                        <div class="section-block"></div>
                         <!-- Session Status -->
                        <x-auth-session-status class="mb-4" style="color:blueviolet !important" :status="session('status')" />
                        <form  class="pt-4" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-box">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="email" name="email" value="{{old('email')}}" required placeholder="Enter email Address">
                                    <span class="la la-user input-icon"></span>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div><!-- end input-box -->
                            <div class="btn-box">
                                <button class="btn theme-btn" type="submit">Email Password Reset Link <i class="la la-arrow-right icon ml-1"></i></button>

                                <div class="d-flex align-items-center justify-content-between fs-14 pt-2">
                                    <a href="/login" class="text-color hover-underline">Login</a>

                                </div>

                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
