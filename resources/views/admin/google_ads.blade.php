@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
@endsection
@section('section') 
<!-- Right sidebar Ends-->
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6 main-header">
          <h2>Google Ads</h2>
          <h6 class="mb-0">{{$language[1][Auth::guard('admin')->user()->lang]}}</h6>
        </div>
        <!-- <div class="col-lg-6 breadcrumb-right">     
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
            <li class="breadcrumb-item">Apps    </li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active"> Edit Profile</li>
          </ol>
        </div> -->
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-lg-12">
          <form id="form" method="POST" class="card theme-form">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="id" value="{{$google_ads->id}}">
            <!-- <div class="card-header">
              <h4 class="card-title mb-0">View Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div> -->
            <div class="card-body">
              <div class="row">

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Ads Image (728 * 90 Pixel)</label>
                    <input class="form-control" type="file" id="image_728_90" name="image_728_90">
                    <img style="height:90px;" src="/ads_image/{{$google_ads->image_728_90}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Ads Image (160 * 600 Pixel)</label>
                    <input class="form-control" type="file" id="image_160_600" name="image_160_600">
                    <img style="height:200px;" src="/ads_image/{{$google_ads->image_160_600}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Ads Image (300 * 250 Pixel)</label>
                    <input class="form-control" type="file" id="image_300_250" name="image_300_250">
                    <img style="height:200px;" src="/ads_image/{{$google_ads->image_300_250}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Ads Image (300 * 600 Pixel)</label>
                    <input class="form-control" type="file" id="image_300_600" name="image_300_600">
                    <img style="height:200px;" src="/ads_image/{{$google_ads->image_300_600}}">
                  </div>
                </div>

                <div class="col-md-12 text-right">
                  <button onclick="Update()" class="btn btn-primary btn-pill" type="button">Update</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

@endsection
@section('extra-js')
<script src="/assets/app-assets/js/chat-menu.js"></script>

<script>
$('.google-ads').addClass('active');
function Update(){
  var formData = new FormData($('#form')[0]);
  $.ajax({
      url : '/admin/update-google-ads',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {                
        $("#form")[0].reset();
        location.reload();
        toastr.success(data, 'Successfully Save');
      },error: function (data) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
        toastr.error(obj[0]);
    });
  }
  });
}
</script>
@endsection
