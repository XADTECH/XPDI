<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #0c1a38; padding: 1rem 2rem">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
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
            <!-- Updated Search Bar -->
            <!-- Clean Search Box with Unified Look -->
            <form class="d-flex mx-auto my-3 my-lg-0" style="width: 50%">
                <div class="input-group w-100"
                    style="
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
            height: 48px;
          ">
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
                    <div class="dropdown-menu w-100 shadow p-4 mega-dropdown bg-white mt-2"
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
