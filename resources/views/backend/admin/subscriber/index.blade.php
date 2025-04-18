@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Subcribers</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Subscribers</li>
                    </ol>
                </nav>
            </div>

        </div>


        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">All Subscriber List</h6>

            <div style="display: flex; gap: 15px">



                <button class="btn btn-primary" id="sendMailButton">Send Mail</button>

                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">

                    Create Promotion Template

                </button>

            </div>





        </div>


        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAllCheckbox"
                                            style="cursor: pointer">
                                        <label class="form-check-label" for="selectAllCheckbox">
                                            All Select
                                        </label>
                                    </div>
                                </th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_subscribers as $index => $item)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input individual-checkbox" type="checkbox"
                                                value="{{ $item->id }}" style="cursor: pointer">
                                            <label class="form-check-label">
                                                {{ $index + 1 }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-danger delete-category"
                                            data-id="{{ $item->id }}" style="margin-left: 10px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        @include('backend.admin.subscriber.promotion-modal')



    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault();

            let categoryId = $(this).data('id');
            let deleteUrl = "{{ route('admin.blog.destroy', ':id') }}".replace(':id', categoryId);

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

    <script>
        document.getElementById('selectAllCheckbox').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.individual-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Optional: Deselect the "All Select" checkbox if any individual checkbox is unchecked
        const individualCheckboxes = document.querySelectorAll('.individual-checkbox');
        individualCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    document.getElementById('selectAllCheckbox').checked = false;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#sendMailButton').on('click', function() {
                // Collect selected subscriber IDs
                let subscriberIds = [];
                $('.individual-checkbox:checked').each(function() {
                    subscriberIds.push($(this).val());
                });

                console.log(subscriberIds);

                // Check if any subscriber is selected
                if (subscriberIds.length === 0) {
                    alert('Please select at least one subscriber to send mail.');
                    return;
                }

                // Confirm sending mail
                if (!confirm('Are you sure you want to send mail to selected subscribers?')) {
                    return;
                }

                // Send AJAX request to send mail
                $.ajax({
                    url: '{{ route('admin.subscriber.store') }}', // Define this route in Laravel
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        subscriber_ids: subscriberIds
                    },
                    success: function(response) {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('An error occurred while sending mail. Please try again.');
                    }
                });
            });
        });
    </script>
@endpush
