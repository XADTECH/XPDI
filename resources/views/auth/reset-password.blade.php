{{--


<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
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
                        <h3 class="card-title fs-24 lh-35 pb-2">Change Password</h3>

                        <div class="section-block"></div>
                        

                        <form  class="pt-4" method="POST" action="{{ route('password.store') }}" >

                            <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            @csrf
                            <div class="input-box">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="email" name="email" value="{{old('email', $request->email)}}" required placeholder="Enter email Address">
                                    <span class="la la-user input-icon"></span>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div><!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="password" name="password" required placeholder="Enter email Address">
                                    <span class="la la-user input-icon"></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div><!-- end input-box -->

                            <!-- Confirm Password -->

                            <div class="input-box">
                                <label class="label-text">Password Confirmation</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="password"  name="password_confirmation" required placeholder="Enter email Address">
                                    <span class="la la-user input-icon"></span>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div><!-- end input-box -->



                            <div class="btn-box">
                                <button class="btn theme-btn" type="submit">Reset Password <i class="la la-arrow-right icon ml-1"></i></button>

                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
