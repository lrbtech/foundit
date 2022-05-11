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
          <h2>{{$language[42][Auth::guard('admin')->user()->lang]}}</h2>
          <h6 class="mb-0">{{$language[0][Auth::guard('admin')->user()->lang]}}</h6>
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
          <input type="hidden" name="id" id="id" value="{{$settings->id}}">
            <!-- <div class="card-header">
              <h4 class="card-title mb-0">View Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div> -->
            <div class="card-body">
              <div class="row">

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Mobile Number</label>
                    <input class="form-control" type="text" id="mobile" name="mobile" value="{{$settings->mobile}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Landline</label>
                    <input class="form-control" type="text" id="landline" name="landline" value="{{$settings->landline}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Email Id</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{$settings->email}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Second Email Id</label>
                    <input class="form-control" type="text" id="other_email" name="other_email" value="{{$settings->other_email}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Contact us form Receive Email</label>
                    <input class="form-control" type="text" id="admin_email" name="admin_email" value="{{$settings->admin_email}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Iframe Map</label>
                    <input class="form-control" type="text" id="iframe_map" name="iframe_map" value="{{$settings->iframe_map}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" type="text" id="address" name="address">{{$settings->address}}</textarea>
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Footer Description</label>
                    <textarea class="form-control" type="text" id="footer_description" name="footer_description">{{$settings->footer_description}}</textarea>
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Facebook Url</label>
                    <input class="form-control" type="text" id="facebook" name="facebook" value="{{$settings->facebook}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Twitter Url</label>
                    <input class="form-control" type="text" id="twitter" name="twitter" value="{{$settings->twitter}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Instagram Url</label>
                    <input class="form-control" type="text" id="instagram" name="instagram" value="{{$settings->instagram}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Linkedin Url</label>
                    <input class="form-control" type="text" id="linkedin" name="linkedin" value="{{$settings->linkedin}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Youtube Url</label>
                    <input class="form-control" type="text" id="youtube" name="youtube" value="{{$settings->youtube}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Google Plus Url</label>
                    <input class="form-control" type="text" id="google_plus" name="google_plus" value="{{$settings->google_plus}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Upload Logo</label>
                    <input class="form-control" type="file" id="logo" name="logo">
                    <img style="width:200px;" src="/upload_files/{{$settings->logo}}">
                  </div>
                </div>

                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Header Banner</label>
                    <input class="form-control" type="file" id="header_banner" name="header_banner">
                    <img style="width:200px;" src="/upload_files/{{$settings->header_banner}}">
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
$('.settings').addClass('active');
function Update(){
  var formData = new FormData($('#form')[0]);
  $.ajax({
      url : '/admin/update-settings',
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
