<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Orders</p>
                        <h4 class="my-1 text-info">{{$total_order}}</h4>
                        <p class="mb-0 font-13">+{{ number_format($order_growth, 1) }}% from last week</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                            class='bx bxs-cart'></i>
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
                        <p class="mb-0 text-secondary">Total Earn</p>
                        <h4 class="my-1 text-danger">${{$total_earn}}</h4>
                        <p class="mb-0 font-13">+{{ number_format($earn_growth, 1) }}% from last week</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                        <i class='bx bxs-wallet'></i>
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
                        <p class="mb-0 text-secondary">Total Students</p>
                        <h4 class="my-1 text-success">{{$total_students}}</h4>
                        <p class="mb-0 font-13">+{{ number_format($student_growth, 1) }}% from last week</p>
                    </div>
                    <div
                        class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                        <i class='bx bxs-bar-chart-alt-2'></i>
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
                        <h4 class="my-1 text-warning">{{$total_instructor}}</h4>
                        <p class="mb-0 font-13">+{{ number_format($instructor_growth, 1) }} from last week</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                        <i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
