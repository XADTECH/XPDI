<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/register.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')

<body>
    <div class="form-container">
        <div id="step1">
            <h4 class="text-center fw-bold mb-4">Register your account</h4>

            <div class="mb-3">
                <label>Profile name</label>
                <input type="text" class="form-control" placeholder="Enter profile name">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3 input-wrapper">
                <label>Password</label>
                <input type="password" class="form-control" id="password">
                <i class="bi bi-eye-slash toggle-password" toggle="#password"></i>
                <small class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols</small>
            </div>
            <div class="mb-3 input-wrapper">
                <label>Confirm password</label>
                <input type="password" class="form-control" id="confirmPassword">
                <i class="bi bi-eye-slash toggle-password" toggle="#confirmPassword"></i>
                <small class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols</small>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">
                    By creating an account, you agree to the <a href="#">Terms of use</a> and <a
                        href="#">Privacy Policy.</a>
                </label>
            </div>
            <button class="btn btn-custom" onclick="goToStep2()">NEXT</button>
            <p class="text-center mt-3">Already have an account? <a href="#">Log in</a></p>
        </div>

        <div id="step2" style="display: none;">
            <h4 class="text-center fw-bold mb-4">Register your account</h4>
            <div class="mb-3">
                <label>Full name</label>
                <input type="text" class="form-control" placeholder="Enter your full name">
            </div>

            <div class="mb-3">
                <label>Phone number</label>
                <input id="phone" type="tel" class="form-control">
            </div>

            <div class="mb-3">
                <label>What’s your gender? <span class="text-muted">(optional)</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="nonbinary" value="nonbinary">
                    <label class="form-check-label" for="nonbinary">Non-binary</label>
                </div>
            </div>
            <button class="btn btn-custom btn-primary">COMPLETE SIGN UP</button>
        </div>
    </div>

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

        // Move to next step
        function goToStep2() {
            document.getElementById("step1").style.display = "none";
            document.getElementById("step2").style.display = "block";
        }

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

</html>
