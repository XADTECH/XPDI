@extends('backend.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All User</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">All Users</h6>


        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>User Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_user as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <img src="{{asset($item->photo)}}" width="80" height="80" />
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                   {{$item->phone}}
                                </td>
                                <td>{{$item->address}}</td>

                                <td>
                                    @if($item->isOnline())
                                        <span class="badge bg-success">Online</span>
                                    @else

                                        <small class="badge bg-danger">{{ $item->lastLoginDiff() }}</small>
                                    @endif
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
    $(document).on('click', '.delete-category', function (e) {
        e.preventDefault();

        let categoryId = $(this).data('id');
        let deleteUrl = "{{ route('admin.subcategory.destroy', ':id') }}".replace(':id', categoryId);

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
