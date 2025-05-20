@include('backend-components.users.head')
<link rel="stylesheet" href="{{ asset('backend-assets/users/my-courses.css') }}">

<body>
    <div class="d-flex">
        @include('backend-components.users.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend-components.users.header')

            <main class="content-wrapper p-4">
                <h2 class="fw-bold mb-4">Courses</h2>

                <!-- Tabs -->
                <div class="courses-tabs mb-4">
                    <div class="tabs-inner d-flex">
                        <button class="btn btn-tab" id="tab-my-active-btn" data-bs-toggle="tab"
                            data-bs-target="#tab-my-active" type="button" role="tab" aria-controls="tab-my-active"
                            aria-selected="false">Active Courses</button>
                        <button class="btn btn-tab active" id="tab-my-completed-btn" data-bs-toggle="tab"
                            data-bs-target="#tab-my-completed" type="button" role="tab"
                            aria-controls="tab-my-completed" aria-selected="true">Completed Courses</button>
                    </div>
                </div>

                <!-- Tab content -->
                <div class="tab-content">

                    <!-- Completed Courses -->
                    <div class="tab-pane fade show active" id="tab-my-completed" role="tabpanel"
                        aria-labelledby="tab-my-completed-btn">

                        <div id="course-list">
                            @include('backend.user.course-cards', ['studentCourses' => $studentCourses])
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('backend-components.users.footer')

    <!-- JavaScript to manage tab active class -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabEls = document.querySelectorAll('button[data-bs-toggle="tab"]');
            tabEls.forEach(tabEl => {
                tabEl.addEventListener('click', function(event) {
                    tabEls.forEach(tab => tab.classList.remove('active'));
                    event.target.classList.add('active');
                });
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).on('click', '#course-list .pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#course-list').html($(response).find('#course-list').html());
                },
                error: function() {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    </script>
