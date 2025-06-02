<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Courses</p>
                        <h4 class="my-1 text-primary">{{ $total_courses }}</h4>
                        <p class="mb-0 font-13">All active courses</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                            class='bx bxs-cart'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Enrolled Students</p>
                        <h4 class="my-1 text-success">{{ $total_enrolled_students }}</h4>
                        <p class="mb-0 font-13">Across all courses</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                        <i class='bx bxs-wallet'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Instructors</p>
                        <h4 class="my-1 text-warning">{{ $total_instructors }}</h4>
                        <p class="mb-0 font-13">Active teaching staff</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Enrollment Requests</p>
                        <h4 class="my-1 text-danger">{{ $total_enrollment_requests }}</h4>
                        <p class="mb-0 font-13">Pending approvals</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                        <i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
