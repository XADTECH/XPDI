<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/register.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')

<body>

    <form id="registerForm" method="post">
        @csrf
        <div class="form-container">
            <!-- Step 1 -->
            <div id="step1">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Register your account</h4>
                </div>

                <div class="mb-3">
                    <label>Profile name</label>
                    <input type="text" class="form-control" name="profile_name" placeholder="Enter profile name">
                    <div class="invalid-feedback">Profile name is required</div>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3 input-wrapper">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <i class="bi bi-eye-slash toggle-password" toggle="#password"></i>
                    <small class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols</small>
                    <div class="invalid-feedback">Password must be at least 8 characters</div>
                </div>

                <div class="mb-3 input-wrapper">
                    <label>Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmPassword">
                    <i class="bi bi-eye-slash toggle-password" toggle="#confirmPassword"></i>
                    <small class="text-muted">Re-enter the password</small>
                    <div class="invalid-feedback">Passwords do not match</div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms">
                    <label class="form-check-label" for="terms">
                        By creating an account, you agree to the <a href="#">Terms of use</a> and <a
                            href="#">Privacy Policy.</a>
                    </label>
                    <div class="invalid-feedback">You must accept the Terms and Conditions.</div>
                </div>

                <button type="button" class="btn btn-primary btn-custom" onclick="goToStep2(event)">NEXT</button>

                <p class="text-center mt-3">Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
            </div>

            <!-- Step 2 -->
            <div id="step2" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Register your account</h4>
                    <button type="button" class="btn btn-secondary" onclick="goToStep1()">BACK</button>
                </div>


                <div class="mb-3">
                    <label>Full name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter your full name">
                    <div class="invalid-feedback">Full name is required</div>
                </div>

                <div class="mb-3">
                    <label>Phone number</label>
                    <input id="phone" type="tel" class="form-control" name="phone">
                    <div class="invalid-feedback">Phone number is required</div>
                </div>

                <div class="mb-3">
                    <label>What’s your gender? <span class="text-danger">*</span></label><br>
                    <div id="genderGroup">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="nonbinary"
                                value="nonbinary">
                            <label class="form-check-label" for="nonbinary">Non-binary</label>
                        </div>
                        <div class="invalid-feedback d-block" id="genderError" style="display: none;">Please select
                            your
                            gender</div>
                    </div>
                </div>

                <div id="formErrors" class="alert alert-danger" style="display: none;"></div>

                <!-- Back and Submit buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-custom btn-primary" id="btn-submit">COMPLETE SIGN
                        UP</button>
                </div>


            </div>
        </div>
    </form>

    <!-- JavaScript Validation -->
    <script>
        function goToStep1() {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        }


        function goToStep2(event) {
            event.preventDefault();

            let isValid = true;

            const profileNameInput = document.querySelector('input[name="profile_name"]');
            const passwordInput = document.querySelector('input[name="password"]');
            const confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
            const termsCheckbox = document.querySelector(
                'input[name="terms"]'); // Assuming you add 'name="terms"' to checkbox

            // Clear old errors
            [profileNameInput, passwordInput, confirmPasswordInput].forEach(input => {
                input.classList.remove('is-invalid');
            });

            if (termsCheckbox) {
                termsCheckbox.classList.remove('is-invalid');
            }

            // Validate profile name
            if (profileNameInput.value.trim() === "") {
                profileNameInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate password
            if (passwordInput.value.length < 8) {
                passwordInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate confirm password
            if (confirmPasswordInput.value !== passwordInput.value || confirmPasswordInput.value === "") {
                confirmPasswordInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Terms and Conditions checkbox
            if (termsCheckbox && !termsCheckbox.checked) {
                termsCheckbox.classList.add('is-invalid');
                isValid = false;
            }

            if (isValid) {
                document.getElementById("step1").style.display = "none";
                document.getElementById("step2").style.display = "block";
            }
        }


        function validateStep2() {
            let isValid = true;

            // Declare everything at the top
            const fullNameInput = document.querySelector('input[name="full_name"]');
            const phoneInput = document.querySelector('input[name="phone"]');
            const genderInputs = document.querySelectorAll('input[name="gender"]');
            const genderError = document.getElementById('genderError');

            // Now safe to reset error
            genderError.style.display = 'none';

            // Clear old errors
            [fullNameInput, phoneInput].forEach(input => {
                input.classList.remove('is-invalid');
            });

            if (fullNameInput.value.trim() === "") {
                fullNameInput.classList.add('is-invalid');
                isValid = false;
            }

            if (phoneInput.value.trim() === "") {
                phoneInput.classList.add('is-invalid');
                isValid = false;
            }

            // Gender validation
            let genderSelected = false;
            genderInputs.forEach(input => {
                if (input.checked) {
                    genderSelected = true;
                }
            });

            if (!genderSelected) {
                genderError.style.display = 'block';
                isValid = false;
            }

            return isValid; // only submit if valid
        }

        //    form submit
        document.querySelector('#btn-submit').addEventListener('click', function(e) {
            e.preventDefault();

            // Step 2 validation first
            if (!validateStep2()) {
                return;
            }

            const form = document.getElementById('registerForm');
            const formErrors = document.getElementById('formErrors');

            // Clear old errors
            formErrors.style.display = 'none';
            formErrors.innerHTML = '';

            const formData = new FormData(form);

            fetch('{{ url('/register-user') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(async res => {
                    const data = await res.json();

                    if (res.ok && data.success) {
                        // Success, redirect
                        window.location.href = data.redirect;
                    } else if (data.errors) {
                        // Display all validation errors together
                        formErrors.style.display = 'block';
                        formErrors.innerHTML = '<ul class="mb-0">' +
                            Object.values(data.errors).map(messages =>
                                `<li>${messages[0]}</li>`).join('') +
                            '</ul>';
                    }
                })
                .catch(error => {
                    console.error('Unexpected Error:', error);
                    formErrors.style.display = 'block';
                    formErrors.innerText = 'Something went wrong. Please try again.';
                });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/js/intlTelInput.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll(".toggle-password").forEach(icon => {
            icon.addEventListener("click", function() {
                const input = document.querySelector(this.getAttribute("toggle"));
                const isPassword = input.getAttribute("type") === "password";
                input.setAttribute("type", isPassword ? "text" : "password");
                this.classList.toggle("bi-eye");
                this.classList.toggle("bi-eye-slash");
            });
        });

        // Initialize intl-tel-input
        const phoneInput = document.querySelector("#phone");
        window.intlTelInput(phoneInput, {
            initialCountry: "auto",
            geoIpLookup: callback => {
                fetch('https://ipapi.co/json')
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/js/utils.js"
        });
    </script>

</body>

@include('frontend_components.footer')
