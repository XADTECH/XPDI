<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/register.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')

<body>
    {{-- id="loginForm" --}}
    <form action="{{ url('/login') }}" method="post">
        @csrf
        <div class="form-container">
            <!-- Step 1 -->
            <div id="step1">
                <h4 class="text-center fw-bold mb-4">Login to your account</h4>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3 input-wrapper">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <i class="bi bi-eye-slash toggle-password" toggle="#password"></i>
                    <div class="invalid-feedback">Password must be at least 8 characters</div>
                </div>


                <button id="btn-login" class="btn btn-custom btn-primary">Login</button>

                <p class="text-center mt-3">Don't have an account? <a href="{{ url('/register') }}">Sign up</a></p>
            </div>
        </div>
    </form>

    <!-- Password Toggle Script -->
    <script>
        document.querySelectorAll(".toggle-password").forEach(icon => {
            icon.addEventListener("click", function() {
                const input = document.querySelector(this.getAttribute("toggle"));
                const isPassword = input.getAttribute("type") === "password";
                input.setAttribute("type", isPassword ? "text" : "password");
                this.classList.toggle("bi-eye");
                this.classList.toggle("bi-eye-slash");
            });
        });
    </script>

    <!-- SweetAlert2 Error Popup -->
    <script src="{{ asset('frontend_assets/js/sweetalert2.all.min.js') }}"></script>

    <!-- SweetAlert2 Popup after loading the library -->
    <script>
        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: '{{ session('error') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#e3342f',
                color: '#ffffff',
                iconColor: '#ffffff',
            });
        @endif
    </script>

</body>

@include('frontend_components.footer')
