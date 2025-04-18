<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Promotional Template</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="row g-3" method="post" action="{{route('admin.promotion-template.store')}}">
            @csrf
            <div class="col-md-12">
                <label for="description" class="form-label">Information</label>
                <textarea class="form-control editor" name="description" id="description" style="height: 700px !important" required> {!!  $template_info->description !!} </textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    ClassicEditor
    .create(document.querySelector('.editor'), {
        ckfinder: {
            uploadUrl: '/admin/upload-image', // Replace with your route for image upload
        },
        mediaEmbed: {
            previewsInData: true, // Ensures embedded content is stored as HTML
        },
    })
    .catch(error => {
        console.error(error);
    });

  </script>
