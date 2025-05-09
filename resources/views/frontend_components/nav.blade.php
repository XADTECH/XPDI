<!-- Main Navbar (always visible) -->
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #0c1a38; padding: 1rem 2rem">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('frontend_assets/images/XPDI - white w trbg-83.png') }}" alt="XPDI Logo" height="60" />
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav & Search Content -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Search box (centered on desktop, full-width on mobile) -->
            {{-- <form class="d-flex mx-auto my-3 my-lg-0" style="width: 50%"> --}}
            <form class="d-flex mx-auto my-3 my-lg-0 w-100" style="max-width: 500px;">
                <div class="input-group w-100"
                    style="border-radius: 10px;
                            overflow: hidden;
                            background-color: white;
                            height: 48px;">

                    <span class="input-group-text border-0 bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" class="form-control border-0 shadow-none" placeholder="Search"
                        aria-label="Search" style="box-shadow: none; outline: none; height: 100%" />
                </div>
            </form>

            <!-- Menu -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase fw-bold">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}"
                        style="border-bottom: 2px solid #00bcd4">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about-us') }}">ABOUT</a>
                </li>

                <!-- Courses Dropdown -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        COURSES
                    </a>
                    <div class="dropdown-menu w-100 shadow p-lg-4 mega-dropdown bg-white mt-2"
                        aria-labelledby="coursesDropdown">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="fw-bold text-warning">
                                    Language & Office Skills
                                </h6>
                                <a class="dropdown-item" href="{{ url('/courses') }}">English Language (Basic &
                                    Advanced)</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Human Resources</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Accounts and Finance</a>
                            </div>
                            <div class="col-md-3">
                                <h6 class="fw-bold">Creative & IT Skills</h6>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Graphic Design</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Web Designing</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Software Development</a>
                            </div>
                            <div class="col-md-3">
                                <h6 class="fw-bold">Business & Customer Skills</h6>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Sales and Marketing</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Customer Care</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Software Development</a>
                            </div>
                            <div class="col-md-3">
                                <h6 class="fw-bold">Vocational & Technical Skills</h6>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Stitching and Embroidery</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Telecommunication</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Construction</a>
                                <a class="dropdown-item" href="{{ url('/courses') }}">Health and Safety</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#!">BLOGS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Scroll Navbar (appears on scroll) - Using Bootstrap navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top scroll-navbar container scroll-navbar-container mt-2"
    id="scrollNav">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend_assets/images/logo-2.png') }}" alt="XPDI Logo" height="40" />
    </a>

    <!-- Search box (visible on md and larger) -->
    <form class="d-none d-md-flex my-2" style="margin-left: 17% !important;width: 35%;">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search"></i>
            </span>
            <input type="search" class="form-control border-start-0" placeholder="Search" aria-label="Search" />
        </div>
    </form>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#scrollNavContent"
        aria-controls="scrollNavContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Content -->
    <div class="collapse navbar-collapse" id="scrollNavContent">
        <!-- Search (visible only on small screens) -->
        <form class="d-md-none my-3">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control border-start-0" placeholder="Search"
                    aria-label="Search" />
            </div>
        </form>

        <!-- Menu -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase fw-bold">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about-us') }}">ABOUT</a>
            </li>
            <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="scrollCoursesDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    COURSES
                </a>
                <div class="dropdown-menu w-100 shadow p-lg-4 mega-dropdown bg-white mt-2"
                    aria-labelledby="scrollCoursesDropdown">
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold text-warning">
                                Language & Office Skills
                            </h6>
                            <a class="dropdown-item" href="{{ url('/courses') }}">English Language (Basic &
                                Advanced)</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Human Resources</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Accounts and Finance</a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="fw-bold">Creative & IT Skills</h6>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Graphic Design</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Web Designing</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Software Development</a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="fw-bold">Business & Customer Skills</h6>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Sales and Marketing</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Customer Care</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Software Development</a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="fw-bold">Vocational & Technical Skills</h6>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Stitching and Embroidery</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Telecommunication</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Construction</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}">Health and Safety</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#!">BLOGS</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Fix the search input focus style and mobile dropdown scrolling -->
<style>
    .scroll-navbar .input-group .form-control:focus {
        box-shadow: none;
        outline: none;
        border-color: #ced4da;
        /* Use the default border color to match the icon */
    }

    .scroll-navbar .input-group .form-control:focus+.input-group-text,
    .scroll-navbar .input-group .input-group-text+.form-control:focus {
        border-color: #ced4da;
    }

    /* Fix the search input and icon group to stay connected */
    .scroll-navbar .input-group {
        border-radius: 5px;
        overflow: hidden;
    }

    /* Equal spacing for search box */
    .scroll-navbar form {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    /* Right-align the navigation menu */
    #scrollNavContent .navbar-nav {
        margin-left: auto !important;
    }

    /* Remove flex value that was centering menu items */
    .scroll-navbar .navbar-brand,
    .scroll-navbar .navbar-nav {
        /* flex: 1; - removed to allow natural alignment */
    }

    @media (max-width: 991px) {
        .dropdown-menu.mega-dropdown {
            max-height: 20vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            position: relative;
            padding-right: 15px;
            /* Add some space for scrollbar */
            box-sizing: border-box;
        }

        /* Optional: Hide scrollbars on Webkit browsers (Chrome, Safari) */
        .dropdown-menu.mega-dropdown::-webkit-scrollbar {
            width: 8px;
        }

        .dropdown-menu.mega-dropdown::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }

        .dropdown-menu.mega-dropdown::-webkit-scrollbar-track {
            background: transparent;
        }
    }
</style>

<style>
    /* Styles for the scroll navbar based on Screenshots */
    .scroll-navbar {
        transform: translateY(-150%);
        /* Start completely hidden */
        transition: transform 0.3s ease;
        padding: 0;
        z-index: 1030;
        opacity: 0;
        /* Start invisible */
        pointer-events: none;
        /* Disable interactions when hidden */
    }

    .scroll-navbar.show {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
        /* Enable interactions when visible */
    }

    .scroll-navbar-container {
        max-width: 1290px;
        border-radius: 100px;
        padding-right: 30px;
        padding-top: 30px;
        padding-bottom: 30px;
        padding-left: 50px;
        /* Reduced padding */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .scroll-navbar .navbar-nav .nav-link {
        padding: 5px 0;
        margin: 0 15px;
        color: #333;
        /* Darker text color for better contrast */
        font-weight: 600;
    }

    .scroll-navbar .navbar-nav .nav-link.active {
        border-bottom: 2px solid #00bcd4;
        color: #00bcd4;
    }

    /* Dropdown styles */
    .scroll-navbar .dropdown-menu {
        margin-top: 10px !important;
        border-radius: 15px;
    }

    /* Responsive adjustments */
    @media (max-width: 1399px) {
        .scroll-navbar-container {
            max-width: 95%;
        }
    }

    @media (max-width: 991px) {
        .scroll-navbar-container {
            height: auto;
            border-radius: 50px;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }
    }

    @media (max-width: 767px) {
        .scroll-navbar-container {
            border-radius: 40px;
            padding-left: 25px !important;
            padding-right: 25px !important;
        }
    }

    @media (max-width: 575px) {
        .scroll-navbar-container {
            border-radius: 30px;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollNav = document.getElementById('scrollNav');
        let scrollThreshold = 200; // Show navbar after 200px scroll
        let isScrollNavVisible = false;

        // Initially hide the scroll navbar
        scrollNav.classList.remove('show');

        // Handle scroll for navbar appearance
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > scrollThreshold && !isScrollNavVisible) {
                scrollNav.classList.add('show');
                isScrollNavVisible = true;
            } else if (window.pageYOffset <= scrollThreshold && isScrollNavVisible) {
                scrollNav.classList.remove('show');
                isScrollNavVisible = false;

                // If using Bootstrap 5, this will close any open collapse
                const navbarCollapse = scrollNav.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            }
        });

        // Force initial state check
        if (window.pageYOffset > scrollThreshold) {
            scrollNav.classList.add('show');
            isScrollNavVisible = true;
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle dropdown toggle for mobile
        const dropdownToggle = document.querySelectorAll('.dropdown-toggle');

        dropdownToggle.forEach(toggle => {
            toggle.addEventListener('click', function() {
                // Add/remove class to body when dropdown opens/closes on mobile
                if (window.innerWidth <= 991) {
                    if (this.getAttribute('aria-expanded') === 'false') {
                        document.body.classList.add('dropdown-open');
                    } else {
                        document.body.classList.remove('dropdown-open');
                    }
                }
            });
        });

        // Remove body class when clicking outside dropdown
        document.addEventListener('click', function(e) {
            const dropdowns = document.querySelectorAll('.dropdown-menu.show');
            if (dropdowns.length === 0) {
                document.body.classList.remove('dropdown-open');
            }
        });
    });
</script>
