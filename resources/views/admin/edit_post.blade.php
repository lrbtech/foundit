@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">

<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/fontawesome/fontawesome-all.css">
<link rel="stylesheet" href="/css/linearicons.css">
<link rel="stylesheet" href="/css/themify-icons.css">
<link rel="stylesheet" href="/css/jquery-ui.css">
<link rel="stylesheet" href="/css/transitions.css">

@endsection
@section('section')
    <!-- Right sidebar Ends-->
    <div class="page-body vertical-menu-mt">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>Create <span>Post  </span></h2>
                </div>
                <div class="col-lg-6 breadcrumb-right">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Post Ads</li>
                    <li class="breadcrumb-item active"> </li>
                  </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

<div class="col-lg-12 ps-dashboard-user">
    <div class="ps-posted-ads ps-profile-setting">
        <div class="ps-posted-ads__heading">
            <h5>Post New Ad</h5>
            <p>Click “Publish Ad” to Post Ad</p>
            <button id="post_ad" onclick="Save()" class="btn btn-primary m-r-15">Publish Ad</button>
        </div>
        <div class="ps-profile-setting__content">
<!-- POST NEW AD FORM START -->
<form class="ps-profile-form" action="#" id="form" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<input value="{{$post_ad->id}}" type="hidden" name="id" id="id">
<input value="{{Auth::user()->id}}" type="hidden" name="customer_id" id="customer_id">
  <div class="form-group">
            <label class="col-form-label">Your Ad Title Here*</label>
            <input value="{{$post_ad->title}}" type="text" class="form-control" id="title" name="title" required="" placeholder="Your Ad Title Here*">
        </div>
    <div class="ps-profile-setting__upload">
    <h5>Change Primary Image</h5>
    <div class="ps-url row">
        <div class="ps-url__input col-md-6">
            <input name="profile_image" id="profile_image" type="file" class="form-control" placeholder="Ad Images">
        </div>
        <div class="ps-url__input col-md-6">
            <img style="width: 80px;" src="/upload_image/{{$post_ad->image}}">
        </div>
    </div>
</div>
<div class="ps-profile-setting__upload">
    <h5>Upload Mulitiple Images</h5>
    <!-- <div class="ps-url">
        <div class="ps-url__input">
            <input multiple name="images[]" id="images" type="file" class="form-control" placeholder="Ad Images">
        </div>
    </div> -->
    <div class="input-images"></div>
</div>

    <div class="ps-profile--row">
         <div class="form-group">
            <label class="col-form-label">Select Category(s)*</label>
            <label>
                <select name="category" id="category" class="form-control">
                    <option value="" disabled="" selected="" hidden="">Select Category(s)*</option>
                    @foreach($category as $row)
                    @if($row->id == $post_ad->category)
                    <option selected value="{{$row->id}}">{{$row->category}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->category}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label class="col-form-label">Select Sub Category(s)*</label>
            <label>
                <select name="subcategory" id="subcategory"  class="form-control">
                    <option value="" disabled="" selected="" hidden="">Select Sub Category(s)*</option>
                    @foreach($subcategory as $row)
                    @if($row->id == $post_ad->subcategory)
                    <option selected value="{{$row->id}}">{{$row->category}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->category}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label class="col-form-label"> Ad Type:</label>
            <label>
                <select name="featured_ad" id="featured_ad" class="form-control">
                    <option value="" disabled="" hidden="">Select Your Ad Type:</option>
                    <option {{ ($post_ad->post_type == '0' ? ' selected' : '') }} value="0" value="0">Normal Ad</option>
                    <option {{ ($post_ad->post_type == '1' ? ' selected' : '') }} value="1" value="1">Feature Ad</option>
                    <option {{ ($post_ad->post_type == '2' ? ' selected' : '') }} value="2" value="2">Live Store</option>
                </select>
            </label>
        </div>
       
        <div class="form-group">
            <label class="col-form-label">Item/ Product Price?*</label>
            <input value="{{$post_ad->price}}" type="text" class="form-control" id="price" name="price" required="" placeholder="Item/ Product Price?*">
        </div>
        <div class="form-group">
            <label class="col-form-label">Mobile Number</label>
            <input value="{{$post_ad->mobile}}" type="number" class="form-control" id="mobile" name="mobile" required="" placeholder="Mobile Number*">
        </div>
        <div class="form-group">
            <label class="col-form-label">Email</label>
            <input value="{{$post_ad->email}}" type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        {{-- <div class="form-group">
            <label class="col-form-label">Skype</label>
            <input value="{{$post_ad->skype}}" type="text" class="form-control" id="skype" name="skype" placeholder="Skype">
        </div> --}}
        <!-- ADD FEATURES START -->
    </div>
</div>
<!-- ADD FEATURES START -->
<div class="ps-add-feature">
    <div class="ps-add-feature__heading">
        <h5>Add Features</h5> 
        <a data-toggle="collapse" href="#collapseFeature" role="button" aria-expanded="false" aria-controls="collapseFeature"><i class="ti-angle-down"></i></a>   
    </div>
    <div class="collapse show" id="collapseFeature">
        <ul class="ps-profile-setting__imgs ps-add-feature__content ps-item-mesonry row " style="position: relative; height: 200px;">
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 20px; top: 0px;">
                <h5>Receive Offer:</h5>
                <input {{ ($post_ad->receive_offer == '0' ? ' checked' : '') }} value="0" id="receive_offer1" type="radio" name="receive_offer">
                <label for="receive_offer1">
                    <span> No</span>                          
                </label>
                <input {{ ($post_ad->receive_offer == '1' ? ' checked' : '') }} value="1" id="receive_offer2" type="radio" name="receive_offer">
                <label for="receive_offer2">
                    <span>Yes</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 250px; top: 0px;">
                <h5>Item Conditions:</h5>
                <input {{ ($post_ad->item_conditions == 'New' ? ' checked' : '') }} value="New" id="item_conditions1" type="radio" name="item_conditions">
                <label for="item_conditions1">
                    <span>New</span>
                </label>
                <input {{ ($post_ad->item_conditions == 'Used (Looks New)' ? ' checked' : '') }} value="Used (Looks New)" id="item_conditions2" type="radio" name="item_conditions">
                <label for="item_conditions2">
                    <span>Used (Looks New)</span>
                </label>
                <input {{ ($post_ad->item_conditions == 'Used (Good)' ? ' checked' : '') }} value="Used (Good)" id="item_conditions3" type="radio" name="item_conditions">
                <label for="item_conditions3">
                    <span>Used (Good)</span>
                </label>
                <input {{ ($post_ad->item_conditions == 'Used (Some Damage)' ? ' checked' : '') }} value="Used (Some Damage)" id="item_conditions4" type="radio" name="item_conditions">
                <label for="item_conditions4">
                    <span>Used (Some Damage)</span>
                </label>
            </li>
        </ul>
    </div>
</div>
<!-- ADD FEATURES END -->
  <div class="ps-profile--row" style="padding:20px">
        <div class="form-group ps-fullwidth">
            <label class="col-form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Description*">{{$post_ad->description}}</textarea>
        </div>

        <div class="form-group">
            <label class="col-form-label">Select City*</label>
            <label>
                <select name="city" id="city" class="form-control">
                    <option value="" disabled="" selected="" hidden="">Select city(s)*</option>
                    @foreach($city as $row)
                    @if($row->id == $post_ad->city)
                    <option selected value="{{$row->id}}">{{$row->city}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->city}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label class="col-form-label">Select Area*</label>
            <label>
                <select name="area" id="area"  class="form-control">
                    <option value="" disabled="" selected="" hidden="">Select Area(s)*</option>
                    @foreach($area as $row)
                    @if($row->id == $post_ad->area)
                    <option selected value="{{$row->id}}">{{$row->city}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->city}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>

    </div>


<!-- POST NEW AD FORM END -->
<div class="ps-profile-map ps-fullwidth">
    <div class="col-sm-12">
        <div class="form-group">
            <!-- <label>Enter a location</label>
            <input id="searchInput" class="input-controls form-control" type="text" placeholder="Enter a location"> -->
            <input value="{{$post_ad->address}}" type="hidden" name="address" id="address">
            <input value="{{$post_ad->latitude}}" type="hidden" name="latitude" id="latitude">
            <input value="{{$post_ad->longitude}}" type="hidden" name="longitude" id="longitude">
        </div>
    </div>
    <div class="col-sm-12">
        <!-- <div class="map" id="map" style="width: 100%; height: 300px;">
        </div> -->
        <iframe id="map" src="http://maps.google.com/maps?q=abu dhabi&z=16&output=embed" style="width: 100%; height: 300px;border:0;" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<!-- ADD FEATURES END -->
<div class="ps-url">
    <br>
    <label class="col-form-label">Youtube Embedded Code</label>
    <div class="ps-url__input">
        <input value="{{$post_ad->video_link}}" name="video_link" id="video_link" type="text" class="form-control" placeholder="Ad Video Link(URL)">
    </div>
</div>
</form>

<div class="ps-profile-setting__upload">
<h5>View Images</h5>
<form class="ps-profile-setting__imgs ps-x-axis mCustomScrollbar _mCS_1">
	<div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 758px;" dir="ltr">
		@foreach($post_ad_image as $row)
	        <label>
	            <span>
	                <img style="width: 150px !important;" src="/upload_image/{{$row->image}}" class="mCS_img_loaded">
	                <a onclick="Delete({{$row->id}})" href="javascript:void(0);" class="ps-trash">
	                	<span><i class="ti-trash"></i></span>
	                </a>
	                <!-- <span class="ps-tick"><span>
	                	<i class="fas fa-check"></i></span>
	                </span> -->
	            </span>
	        </label>
	    @endforeach
	    </div>
	</div>
 </form>
</div>
                                
            <div class="ps-profile-setting__save">
                <button id="save" onclick="Save()" class="btn btn-primary m-r-15">Save Changes</button>
                <p>Click “Save Changes” to update</p>
            </div>
        </div>
    </div>
</div>              
                

                </div>
              </div>
          <!-- Container-fluid Ends-->
        </div>
    
@endsection
@section('extra-js')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css">
<script type="text/javascript" src="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js"></script>
<script>
/* script */
$('.input-images').imageUploader();
var city = $('#city').val();
var area = $('#area').val();
$.ajax({
    url : '/get-city-name/'+city+'/'+area,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
});

$('#city').change(function(){
  var id = $('#city').val();
  $.ajax({
    url : '/get-area/'+id,
    type: "GET",
    success: function(data)
    {
        $('#area').html(data);
    }
  });
});

$('#area').change(function(){
  var city = $('#city').val();
  var area = $('#area').val();
  $.ajax({
    url : '/get-city-name/'+city+'/'+area,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
  });
});
</script>

<script>
$('.new-post-ads').addClass('active');

function Save(){
    var formData = new FormData($('#form')[0]);
    // var description = tinyMCE.get('description').getContent();
    // formData.append('description', description);
    $.ajax({
        url : '/admin/update-post-ads',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            if(data.status == 1){
                toastr.error(data.message);
            }  
            else{
                $("#form")[0].reset();
                toastr.success(data.message);
                window.location = "/admin/post-ads";
            }
        },error: function (data) {
          var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
          });
        }
    });
}

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-post-image/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          location.reload();
        }
      });
    } 
}

$('#category').change(function(){
  var id = $('#category').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
        $('#subcategory').html(data);
    }
  });
});
</script>
@endsection