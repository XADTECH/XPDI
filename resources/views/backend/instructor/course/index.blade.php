@extends('backend.instructor.master')

<style>
    body {
        padding: 3rem;
    }
</style>

@section('content')
    <!-- Courses Section -->

    <!-- Section Title -->

    <div class="container">
        <h4 class="fw-bold mb-3">Courses</h4>
    </div>

    <div class="container p-4 rounded shadow-sm" style="background-color: #F7F7FF;">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Course</li>
                    </ol>
                </nav>
            </div>

        </div>

        <!-- Subheading and Add Button -->
        <div
            class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-1 border-secondary-subtle">
            <h6 class="mb-0 text-uppercase">All Courses</h6>
            <a href="{{ route('instructor.course.create') }}" class="btn btn-primary btn-sm">Add Course</a>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <input type="text" id="searchInput" value="{{ $search }}" placeholder="Search courses..."
                        class="form-control mb-3"
                        style="max-width: 300px; display: inline-block; position: relative; float: right;">

                    <div id="coursesTable">
                        @include('backend.instructor.course.partials.course_table')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@push('scripts')
    <script>
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault();

            let categoryId = $(this).data('id');
            let deleteUrl = "{{ route('instructor.course.destroy', ':id') }}".replace(':id', categoryId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form').attr('action', deleteUrl).submit();
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#sidebarCloseBtn').on('click', function() {
                $('#sidebarWrapper').css('display', 'none');
            });
            $('.bx-menu').on('click', function() {
                $('#sidebarWrapper').css('display', 'block');
            });


            $('ul#menu li').removeClass('mm-active');


        });
    </script>

    <script>
        $(document).ready(function() {
            $('.teacher-courses-table').DataTable({
                columnDefs: [{
                        orderable: false,
                        targets: [1, 5]
                    } // Disable sorting on Thumbnail and Action
                ]
            });
        });
    </script>

    {{--  js for laravel pagination and serach --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearButton = document.getElementById('clearSearch');
            const tableContainer = document.getElementById('coursesTable');

            function fetchCourses(page = 1, search = '') {
                fetch(`{{ route('instructor.course.index') }}?search=${search}&page=${page}`, {
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

            // Clear search
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                fetchCourses(1, '');
            });

            // Handle AJAX pagination clicks (stop full reload)
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



    </script>
@endpush
