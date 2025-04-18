@extends('backend.instructor.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Review</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Review</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">All Reviews</h6>


        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Course Name</th>
                                <th>User Name</th>
                                <th>Comment</th>
                                <th>Ratings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_reviews as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <a href="{{route('course-details', $item->course->course_name_slug)}}" target="_blank">
                                        {{$item->course->course_name}}
                                    </a>

                                </td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->comment}}</td>
                                <td>

                                    @php
                                        $fullStars = floor($item->rating); // Full stars
                                        $emptyStars = 5 - $fullStars; // Remaining stars (empty)
                                    @endphp

                                    {{-- Display full stars --}}
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <i class="bx bxs-star text-warning"></i>
                                    @endfor

                                    {{-- Display empty stars --}}
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <i class="bx bxs-star text-secondary"></i>
                                    @endfor
                                </td>


                                <td>
                                    <div class="form-check form-switch" >
                                        <input class="form-check-input" style="cursor: pointer" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault{{ $item->id }}"
                                            data-review-id="{{ $item->id }}"
                                            {{ $item->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('change', function() {
                const reviewId = $(this).data('review-id'); // Get user ID
                const status = $(this).is(':checked') ? 1 : 0; // Get status (1: Active, 0: Inactive)
                const row = $(this).closest('tr'); // Find the parent row of the checkbox

                $.ajax({
                    url: '{{ route('instructor.review.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        review_id: reviewId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the status badge dynamically
                            const statusBadge = row.find('td:nth-child(6) .badge');
                            if (status === 1) {
                                statusBadge
                                    .removeClass('bg-danger')
                                    .addClass('bg-primary')
                                    .text('Active');
                            } else {
                                statusBadge
                                    .removeClass('bg-primary')
                                    .addClass('bg-danger')
                                    .text('Inactive');
                            }

                            // Show SweetAlert Toast Notification
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
        });
    </script>
@endpush
