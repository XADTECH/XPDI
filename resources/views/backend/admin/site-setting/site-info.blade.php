<div class="tab-pane fade active show" id="successhome" role="tabpanel">
    <form class="row g-3" method="post" action="{{route('admin.site-setting.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" id="meta_title"
                placeholder="Enter the title" value="{{ old('meta_title', $site_data->meta_title) }}" >
        </div>

        <div class="col-md-6">
            <label for="copyright" class="form-label">Copyright</label>
            <input type="text" class="form-control" name="copyright" id="copyright"
                placeholder="Enter the copyright" value="{{ old('copyright', $site_data->copyright) }}" >
        </div>

        <div class="col-md-12">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter the description" rows="3">{{$site_data->meta_description}}</textarea>
        </div>

        <div class="col-md-6">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" id="Photo" />

        </div>

        <div class="col-md-6">
            <label for="fav" class="form-label">Favicon</label>
            <input type="file" class="form-control" name="favicon" id="fav"  />
        </div>

        <div class="col-md-6">
            <img src="{{ $site_data->logo ?  asset($site_data->logo) : 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.istockphoto.com%2Fphotos%2Fno-symbol&psig=AOvVaw2bBxETwI6G0zjgSalQas4r&ust=1736650336712000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIiM--TU7IoDFQAAAAAdAAAAABAE'}}" id="photoPreview" class="img-fluid" />

        </div>

        <div class="col-md-6">
            <img id="favPreview" src="{{$site_data->favicon ?   asset($site_data->favicon) : 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.istockphoto.com%2Fphotos%2Fno-symbol&psig=AOvVaw2bBxETwI6G0zjgSalQas4r&ust=1736650336712000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIiM--TU7IoDFQAAAAAdAAAAABAE'}}" class="img-fluid" />

        </div>

        <button type="submit" class="btn btn-primary w-100">Update</button>



    </form>
</div>
