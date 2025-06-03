   <table class="table table-striped table-bordered" style="width:100%">
       <thead>
           <tr>
               <th>NO</th>
               <th>Thumbnail</th>
               <th>Course Name</th>
               <th>Category</th>
               <th>SubCategory</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($all_courses as $index => $item)
               <tr>
                   <td>{{ ($all_courses->currentPage() - 1) * $all_courses->perPage() + $index + 1 }}</td>
                   <td>
                       @if ($item->course_image)
                           <img src="{{ asset($item->course_image) }}" width="140" height="70" />
                       @else
                           <span>No image found</span>
                       @endif
                   </td>
                   <td>{{ $item->course_name }}</td>
                   <td>{{ $item->category['name'] ?? null }}</td>
                   <td>{{ $item->subCategory['name'] ?? null }}</td>
                   <td>
                       <a href="{{ route('instructor.course.edit', $item->id) }}" class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                               class="bi bi-pencil-square" viewBox="0 0 16 16">
                               <path
                                   d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                               <path fill-rule="evenodd"
                                   d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                           </svg>
                       </a>

                       <a href="javascript:void(0)" class="btn btn-danger delete-category" data-id="{{ $item->id }}"
                           style="margin-left: 10px">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                               class="bi bi-trash3-fill" viewBox="0 0 16 16">
                               <path
                                   d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                           </svg>
                       </a>

                       <form id="delete-form" method="POST" style="display: none;">
                           @csrf
                           @method('DELETE')
                       </form>

                       <a href="{{ route('instructor.course-section.show', $item->id) }}" class="btn btn-success"
                           style="margin-left:10px">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                               class="bi bi-card-list" viewBox="0 0 16 16">
                               <path
                                   d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                               <path
                                   d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                           </svg>
                       </a>




                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>

   <div class="mt-3">
       {!! $all_courses->withQueryString()->links('pagination::bootstrap-5') !!}
   </div>
