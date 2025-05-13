@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/home.css') }}">

<body>
    <div class="d-flex">
        <!-- Sidebar (collapsed on <lg) -->
        @include('backend-components.users.sidebar')

        <!-- Page area -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Top bar with toggle button -->
            @include('backend-components.users.header')

            <!-- Main content -->
            <main class="content-wrapper p-4">
                <h2 class="fw-bold mb-4">Dashboard</h2>
                <div class="row gy-4">
                    <div class="col-12 col-md-4">
                        <div class="stat-card">
                            <div class="icon-tile"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <div class="label">Enrolled Courses</div>
                                <div class="number">4</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="stat-card">
                            <div class="icon-tile"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <div class="label">Completed courses</div>
                                <div class="number">4</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="stat-card">
                            <div class="icon-tile"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <div class="label">Wishlist Courses</div>
                                <div class="number">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('backend-components.users.footer')
