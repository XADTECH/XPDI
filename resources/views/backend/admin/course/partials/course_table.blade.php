    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Category</th>
                <th>Price</th>
                <th>Show</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_courses as $index => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @if ($item->course_image)
                            <img src="{{ asset($item->course_image) }}" width="140" height="80" />
                        @else
                            <span>No image found</span>
                        @endif
                    </td>
                    <td>{{ $item->course_name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        @if ($item->discount_price)
                            <span>${{ $item->discount_price }}</span>
                        @else
                            <span>${{ $item->selling_price }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.course.show', $item->id) }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>

                        </a>

                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" style="cursor: pointer" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault{{ $item->id }}" data-course-id="{{ $item->id }}"
                                {{ $item->status == 1 ? 'checked' : '' }}>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {!! $all_courses->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
