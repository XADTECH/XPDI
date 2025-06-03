@extends('backend.master')

<style>
    .form-check-input {
        width: 2.5rem;
        /* Adjust the width */
        height: 1.5rem;
        /* Adjust the height */
        transform: scale(1.3);
        /* Scale the entire switch */
    }
</style>

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">All Course</h6>

        </div>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <input type="text" id="searchInput" value="{{ $search }}" placeholder="Search courses..."
                        class="form-control mb-3"
                        style="max-width: 300px; display: inline-block; position: relative; float: right;">

                    <div id="coursesTable">
                        @include('backend.admin.course.partials.course_table')
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        // ✅ Delegated binding for toggle switch
        $(document).on('change', '.form-check-input', function() {
            const courseId = $(this).data('course-id');
            const status = $(this).is(':checked') ? 1 : 0;
            const row = $(this).closest('tr');

            $.ajax({
                url: '{{ route('admin.course.status') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    course_id: courseId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error: ' + response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'An error occurred while updating the status.',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        });

        // ✅ Search + pagination AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('coursesTable');

            function fetchCourses(page = 1, search = '') {
                fetch(`{{ route('admin.course.index') }}?search=${search}&page=${page}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        tableContainer.innerHTML = html;
                    });
            }

            // Live search on keyup
            searchInput.addEventListener('keyup', function() {
                const value = searchInput.value.trim();
                fetchCourses(1, value);
            });

            // Handle AJAX pagination clicks
            document.addEventListener('click', function(e) {
                const link = e.target.closest('.pagination a');
                if (link) {
                    e.preventDefault();
                    const url = new URL(link.href);
                    const page = url.searchParams.get('page');
                    const search = searchInput.value.trim();
                    fetchCourses(page, search);
                }
            });
        });
    </script>
@endpush
