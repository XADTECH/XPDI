<div class="tab-pane fade active show" id="successhome" role="tabpanel">
    <form class="row g-3" method="post" action="{{route('admin.page-setting.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="about_title" id="meta_title"
                placeholder="Enter the title" value="{{ old('about_title', $page_data->about_title ?? '') }}" >
        </div>

        <div class="col-md-12">
            <label for="about_description" class="form-label">About Description</label>
            <textarea type="text" class="form-control editor" name="about_description" id="about_description" placeholder="Enter the description" rows="3">{{$page_data->about_description ?? ''}}</textarea>
        </div>

        <div class="col-md-12">
            <label for="about_mission" class="form-label">About Mission</label>
            <textarea type="text" class="form-control editor" name="about_mission" id="about_mission" placeholder="Enter the mission" rows="3">{{$page_data->about_mission ?? ''}}</textarea>
        </div>

        <div class="col-md-12">
            <label for="about_instruction" class="form-label">About Instruction</label>
            <textarea type="text" class="form-control editor" name="about_instruction" id="about_instruction" placeholder="Enter the Instruction" rows="3">{{$page_data->about_instruction ?? ''}}</textarea>
        </div>





        <div class="col-md-12">
            <label for="Photo" class="form-label">Image Preview</label>
            <input type="file" class="form-control" name="about_image" id="Photo" />

        </div>



        <div class="col-md-12">
            <img src="{{$page_data && $page_data->about_image ? asset($page_data->about_image) : asset('static/no-photo.png') }}" width="200" height="200" id="photoPreview" class="img-fluid" />
        </div>





        <button type="submit" class="btn btn-primary w-100">Update</button>



    </form>
</div>
