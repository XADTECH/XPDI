<div class="tab-pane fade" id="successprofile" role="tabpanel">
    <form class="row g-3" method="post" action="{{route('admin.page-setting.store')}}" enctype="multipart/form-data">
        @csrf


        <div class="col-md-12">
            <label for="map_link" class="form-label">Map Link</label>
            <textarea type="text" class="form-control" name="map_link" id="map_link" placeholder="Enter your location map link" rows="3">{{$page_data->map_link ?? ''}}</textarea>
        </div>


        <button type="submit" class="btn btn-primary w-100">Update</button>



    </form>
</div>
