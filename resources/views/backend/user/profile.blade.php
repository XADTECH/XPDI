@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/home.css') }}">

<!-- ########  intl-tel-input CSS ######## -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/css/intlTelInput.css" />

<body>
    <div class="d-flex">
        @include('backend-components.users.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend-components.users.header')

            <style>
                body {
                    background: #eceae6;
                }

                /* avatar + upload button (unchanged) */
                .avatar {
                    width: 96px;
                    height: 96px;
                    border-radius: 50%;
                    background: #cdd1d6;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 2rem;
                    color: #6c757d;
                }

                .upload-btn {
                    font-size: .875rem;
                    border: 1px dashed #6c757d;
                    background: #fff;
                }

                .upload-btn i {
                    margin-right: .35rem;
                }

                /* primary button colour & radius */
                .btn-primary {
                    background: #006c8c;
                    border-color: #006c8c;
                    border-radius: 12px;
                    font-weight: 600;
                }

                .btn-primary:hover {
                    background: #005674;
                    border-color: #005674;
                }

                /* Figma-spec inputs */
                input.form-control:not(.iti__tel-input),
                textarea.form-control {
                    border-radius: 12px;
                    background: #fff;
                }

                input.form-control:focus,
                textarea.form-control:focus {
                    outline: none;
                    box-shadow: none;
                }

                /* intl-tel-input tweaks to keep the same look */
                .iti {
                    width: 100%;
                }

                .iti--separate-dial-code .iti__selected-flag {
                    border-right: 0;
                    border-radius: 12px 0 0 12px;
                    background: #fff;
                    padding-left: .75rem;
                }

                .iti--separate-dial-code .iti__tel-input {
                    height: 3rem;
                    border: .5px solid #707070;
                    border-left: 0;
                    border-radius: 0 12px 12px 0;
                    padding-left: .75rem;
                }

                @media(max-width:767.98px) {
                    .iti--separate-dial-code .iti__selected-flag {
                        border-radius: 12px 12px 0 0;
                    }

                    .iti--separate-dial-code .iti__tel-input {
                        border-radius: 0 0 12px 12px;
                    }
                }

                input {
                    border: none;
                    height: 3rem;
                }
            </style>

            <main class="container py-4 ps-4">
                <form class="mx-auto">

                    {{-- avatar --}}
                    <div class="mb-4">
                        <div class="d-flex flex-column align-items-start gap-2">
                            <div class="avatar"><i class="bi bi-person-fill"></i></div>
                            <label class="btn upload-btn px-3 py-1 mb-0">
                                <i class="bi bi-upload"></i> Upload a photo
                                <input type="file" class="d-none">
                            </label>
                        </div>
                    </div>

                    {{-- grid --}}
                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <label class="form-label small">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label small">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label small">Email Address</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label small">Phone number</label>
                            <input id="phone" type="tel" class="form-control w-100">
                        </div>

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <label class="form-label small">Bio</label>
                            <textarea rows="10" class="form-control" placeholder="Write your bio"></textarea>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary rounded-pill px-4 py-2">Save Changes</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    @include('backend-components.users.footer')

    <!-- ########  intl-tel-input JS ######## -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/js/utils.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                intlTelInput(phoneInput, {
                    separateDialCode: true,
                    initialCountry: "pk", // ✅ default to Pakistan
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/js/utils.js"
                });
            }
        });
    </script>
</body>
