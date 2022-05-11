@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/ad-post.css">
<meta name="_token" content="{{ csrf_token() }}"/>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9SWOYE9g7ftPs7xRubRz02TzwaOy5spA&sensor=false&libraries=places"></script>
<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }

.image-area {
  position: relative;
  width: 100%;
  background: #333;
}
.image-area img{
  max-width: 100%;
  height: auto;
}
.remove-image {
display: none;
position: absolute;
top: -10px;
right: -10px;
border-radius: 10em;
padding: 2px 6px 3px;
text-decoration: none;
font: 700 21px/20px sans-serif;
background: #555;
border: 3px solid #fff;
color: #FFF;
box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
  text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  -webkit-transition: background 0.5s;
  transition: background 0.5s;
}
.remove-image:hover {
 background: #E54E4E;
  padding: 3px 7px 5px;
  top: -11px;
right: -11px;
}
.remove-image:active {
 background: #E54E4E;
  top: -10px;
right: -11px;
}

#form {
    /* text-align: center; */
    position: relative;
    margin-top: 20px
}

#form fieldset {
    background: #ffffff;
    padding: 20px;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
    box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
    transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.form-card {
    text-align: left
}

#form fieldset:not(:first-of-type) {
    display: none
}

#form .custom_input {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    background-color: f7f7f7;
    font-size: 16px;
    letter-spacing: 1px
}
#form textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    background-color: f7f7f7;
    font-size: 16px;
    letter-spacing: 1px
}

#form input:focus,
#form textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#form .action-button {
    width: 300px;
    background: #1a3c5a;
    font-weight: bold;
    color: #ffffff;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
}

#form .action-button:hover,
#form .action-button:focus {
    background-color: #55abe1;
}

#form .action-button-previous {
    width: 50px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 12px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#form .action-button-previous:hover,
#form .action-button-previous:focus {
    background-color: #000000
}

#form .save-btn {
    width: 300px;
    background: #1a3c5a;
    font-weight: bold;
    color: #ffffff;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
}

#form .save-btn:hover,
#form .save-btn:focus {
    background-color: #55abe1;
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.text-danger{
    color:red;
}
.has-error label {
  color: #cc0033;
}
.has-error .form-control {
  /* background-color: #fce4e4; */
  border: 1px solid #cc0033;
  outline: none;
}

.center {
    display:inline;
    margin: 3px;
    padding:5px;
   }

  .form-input {
    width:150px;
    /* padding:3px; */
    background:#fff;
    /* border:2px dashed dodgerblue; */
  }
  .form-input input {
    display:none;
  }
  .form-input label {
    display:block;
    width:150px;
    height: auto;
    max-height: 150px;
    background:#666;
    border-radius:10px;
    cursor:pointer;
  }
  
  .form-input img {
    width:150px;
    height: 150px;
    margin: 2px;
    opacity: .4;
  }

  .imgRemove{
    position: relative;
    bottom: 154px;
    left: 80%;
    background-color: transparent;
    border: none;
    font-size: 50px;
    outline: none;
  }
  .imgRemove::after{
    /* content: ' \21BA'; */
    content: ' \00d7';
    color: #fff;
    font-weight: 900;
    border-radius: 8px;
    cursor: pointer;
  }

.work {
    cursor: pointer;
}
.work .img {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    -webkit-box-shadow: 0px 20px 35px -30px rgb(0 0 0 / 26%);
    -moz-box-shadow: 0px 20px 35px -30px rgba(0, 0, 0, 0.26);
    box-shadow: 0px 20px 35px -30px rgb(0 0 0 / 26%);
    z-index: 0;
}

.create-story {
    vertical-align: middle;
    padding: 15px;
    padding-top: 0;
    position: absolute;
    top: 50%;
    text-align: center;
    margin-top: -50px;
}
.story-line {
    color: #ffffff;
    margin: 10px 0;
}
</style>
@endsection
@section('section')
<section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[74][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[74][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.menu')
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                
            
<div class="col-lg-12">
    <form class="adpost-form" action="#" id="form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input value="{{$post_ad->id}}" type="hidden" name="id" id="id">
    <input value="{{Auth::user()->id}}" type="hidden" name="customer_id" id="customer_id">
        <fieldset>
            <center><h3>{{$language[75][session()->get('lang')]}}</h3></center>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">{{$language[76][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->title}}" name="title" id="title" type="text" class="form-control" placeholder="Type your product title here">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[77][session()->get('lang')]}}</label>
                        <select disabled name="post_type" id="post_type" class="form-control custom-select">
                            <option {{ ($post_ad->post_type == '0' ? ' selected' : '') }} value="0">Normal Post</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[78][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->price}}" name="price" id="price" type="number" class="form-control" placeholder="Enter your pricing amount">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[79][session()->get('lang')]}}</label>
                        <select name="category" id="category" class="form-control custom-select">
                            <option value="">Select Category(s)*</option>
                            @foreach($category as $row)
                            @if($row->id == $post_ad->category)
                            <option selected value="{{$row->id}}">{{$row->category}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->category}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[80][session()->get('lang')]}}</label>
                        <select name="subcategory" id="subcategory" class="form-control custom-select">
                            <option value="">Select Sub Category(s)*</option>
                            @foreach($subcategory as $row)
                            @if($row->parent_id == $post_ad->category)
                            @if($row->id == $post_ad->subcategory)
                            <option selected value="{{$row->id}}">{{$row->category}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->category}}</option>
                            @endif
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="form-group">
                        <ul class="form-check-list">
                            <li>
                                <label class="form-label">{{$language[81][session()->get('lang')]}}</label>
                            </li>
                            <li>
                                <input value="fixed" type="radio" class="form-check" id="price_condition1" name="price_condition" {{ ($post_ad->price_condition == 'fixed' ? ' checked' : '') }}>
                                <label for="price_condition1" class="form-check-text">fixed</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->price_condition == 'negotiable' ? ' checked' : '') }} value="negotiable" type="radio" class="form-check" id="price_condition2" name="price_condition">
                                <label for="price_condition2" class="form-check-text">negotiable</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->price_condition == 'daily' ? ' checked' : '') }} value="daily" type="radio" class="form-check" id="price_condition3" name="price_condition">
                                <label for="price_condition3" class="form-check-text">daily</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->price_condition == 'weekly' ? ' checked' : '') }} value="weekly" type="radio" class="form-check" id="price_condition4" name="price_condition">
                                <label for="price_condition4" class="form-check-text">weekly</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->price_condition == 'monthly' ? ' checked' : '') }} value="monthly" type="radio" class="form-check" id="price_condition5" name="price_condition">
                                <label for="price_condition5" class="form-check-text">monthly</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->price_condition == 'yearly' ? ' checked' : '') }} value="yearly" type="radio" class="form-check" id="price_condition6" name="price_condition">
                                <label for="price_condition6" class="form-check-text">yearly</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="form-group">
                        <ul class="form-check-list">
                            <li>
                                <label class="form-label">{{$language[82][session()->get('lang')]}}</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->item_condition == 'used' ? ' checked' : '') }} value="used" type="radio" class="form-check" id="item_condition1" name="item_condition">
                                <label for="item_condition1" class="form-check-text">used</label>
                            </li>
                            <li>
                                <input {{ ($post_ad->item_condition == 'new' ? ' checked' : '') }} value="new" type="radio" class="form-check" id="item_condition2" name="item_condition">
                                <label for="item_condition2" class="form-check-text">new</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="form-group">
                        <ul class="form-check-list">
                            <li>
                                <label class="form-label">{{$language[83][session()->get('lang')]}}</label>
                            </li>
                            <li>
                                <input disabled value="1" type="checkbox" class="form-check" id="popular_ads1" name="popular_ads" {{ ($post_ad->popular_ads == '1' ? ' checked' : '') }}>
                                <label for="popular_ads1" class="form-check-text">Popular Ads</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="form-group">
                        <ul class="form-check-list">
                            <li>
                                <label class="form-label">{{$language[84][session()->get('lang')]}}</label>
                            </li>
                            <li>
                                <input disabled value="1" type="checkbox" class="form-check" id="top_search1" name="top_search" {{ ($post_ad->top_search == '1' ? ' checked' : '') }}>
                                <label for="top_search1" class="form-check-text">Top Search</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <input type="button" name="next" class="custom_input next action-button" value="Next" />
        </fieldset>	
        <fieldset>
            <center><h3>{{$language[85][session()->get('lang')]}}</h3></center>
            <div id="image_view" class="row">
                <div value="1" class="center form-input panel_image">
                <label for="file-ip-1">
                <img id="file-ip-1-preview" src="/upload_image/{{$post_ad->image}}">
                <!-- <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button> -->
                </label>
                <input type="file" name="profile_image" id="file-ip-1" accept=".png,.jpg,.jpeg" onchange="showPreview(event, 1);">
                </div>
                @foreach($post_ad_image as $key => $row)
                <div value="{{$key+2}}" class="center form-input panel_image">
                <label for="file-ip-{{$key+2}}">
                <img id="file-ip-{{$key+2}}-preview" src="/upload_image/{{$row->image}}">
                <button type="button" class="imgRemove" onclick="Delete({{$row->id}})"></button>
                </label>
                <input type="hidden" name="image_id[]" value="{{$row->id}}">
                <input type="file" name="images[]" id="file-ip-{{$key+2}}" accept=".png,.jpg,.jpeg" onchange="showPreview(event, {{$key+2}});">
                </div>
                @endforeach
                <div class="work center form-input">
                    <div class="img" style="height:150px !important;background-color:#091a3a !important;">
                        <a onclick="AddImages()" class="create-story" href="javascript:void(0)">
                            <div class="fas fa-plus"></div>
                            <h4 class="story-line">Add More Images</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><i class="fa fa-upload" aria-hidden="true"></i> {{$language[155][session()->get('lang')]}}</label>
                        <input name="profile_image" id="profile_image" type="file" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <img style="width: 150px;" src="/upload_image/{{$post_ad->image}}">
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">{{$language[156][session()->get('lang')]}}</label>
                        <div class="input-images"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                    @foreach($post_ad_image as $row)
                    <div class="col-lg-3">
                        <div class="image-area">
                            <img src="/upload_image/{{$row->image}}" alt="Preview">
                            <a onclick="Delete({{$row->id}})" class="remove-image" href="#" style="display: inline;">&#215;</a>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <br>
                </div> -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">{{$language[86][session()->get('lang')]}}</label>
                        <textarea autocomplete="off" name="decription" id="description" class="form-control" placeholder="Describe your message"></textarea>
                    </div>
                </div>
            </div>
            <input type="button" name="next" class="custom_input next action-button" value="Next" />
            <button style="float:left;" type="button" class="previous action-button-previous"><i class="fa fa-chevron-left"></i></button>
        </fieldset>	
        <!-- <fieldset>
            <h3>Author Information</h3>
            <div class="row">
                <input type="text" class="form-control wizard-required" id="bname">
                <label for="bname" class="wizard-form-text-label">Bank Name*</label>
                <div class="wizard-form-error"></div>
            </div>
            <div class="form-group clearfix">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
            </div>
        </fieldset>	 -->
        <fieldset>
            <center><h3>{{$language[87][session()->get('lang')]}}</h3></center>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[88][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->name}}" autocomplete="off" name="name" id="name" type="text" class="form-control" placeholder="Your Name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[89][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->email}}" autocomplete="off" name="email" id="email" type="email" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[90][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->mobile}}" autocomplete="off" name="mobile" id="mobile" type="number" class="form-control" placeholder="Your Number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[91][session()->get('lang')]}}</label>
                        <input value="{{$post_ad->address}}" autocomplete="off" name="address" id="address" type="text" class="form-control" placeholder="Address">
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[92][session()->get('lang')]}}*</label>
                        <select name="city" id="city" class="form-control custom-select">
                            <option value="">Select City*</option>
                            @foreach($city as $row)
                            @if($row->id == $post_ad->city)
                            <option selected value="{{$row->id}}">{{$row->city}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->city}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">{{$language[93][session()->get('lang')]}}*</label>
                        <select name="area" id="area" class="form-control custom-select">
                            <option value="">Select Area*</option>
                            @foreach($area as $row)
                            @if($row->id == $post_ad->area)
                            <option selected value="{{$row->id}}">{{$row->city}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->city}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input value="{{$post_ad->latitude}}" type="hidden" name="latitude" id="latitude">
                        <input value="{{$post_ad->longitude}}" type="hidden" name="longitude" id="longitude">
                    </div>
                </div>
                <div class="col-lg-12">
                    <iframe id="map" src="http://maps.google.com/maps?q=abu dhabi&z=16&output=embed" style="width: 100%; height: 300px;border:0;" frameborder="0" allowfullscreen></iframe>
                    <br>
                </div>
            </div>
            <input id="save" onclick="Save()" type="button" class="custom_input action-button" value="Update your Ad" />
            <button style="float:left;" type="button" class="previous action-button-previous"><i class="fa fa-chevron-left"></i></button>
        </fieldset>	
    </form>
</div>            
            
            
            </div>
        </div>
    </section>
    @endsection
    @section('extra-js')
<link type="text/css" rel="stylesheet" href="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css">
<script type="text/javascript" src="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js"></script>


<script>

function validate1(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    var result = false;
    $.ajax({
        url : '/customer/editpost-validate-first',
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        async: false,
        success: function(data)
        {
            result=true;
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<span class="text-danger">'+obj[0]+'</span>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
            result=false;
        }
    });
    return result;
}


function validate2(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    var result = false;
    $.ajax({
        url : '/customer/editpost-validate-second',
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        async: false,
        success: function(data)
        {
            if(data.status == 2){
                alert(data.message);
            }  
            else{
                result=true;
            }
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                // $("#"+i).after('<span class="text-danger">'+obj[0]+'</span>');
                // $('#'+i).closest('.form-group').addClass('has-error');
                alert(obj[0]);
            });
            result=false;
        }
    });
    return result;
}

$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){
    if(current == 1){
        if(validate1() == true){
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        }
    }
    else if(current == 2){
        if(validate2() == true){
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        }
    }
    else{
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
    }
});

    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
    }

    $(".submit").click(function(){
        return false;
    })

});

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

$('.post-ad').addClass('active');

$('.input-images').imageUploader();

function Save(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/update-post-ad',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {           
            if(data.status == 1){
                Swal.fire({
                    text: data.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#save").attr("disabled", false);
                    }
                })  
            }  
            else{                
                Swal.fire({
                    text: data.message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(data);
                        $("#form")[0].reset();
                        window.location = "/customer/my-ads";
                        $("#save").attr("disabled", false);
                    }
                })  
            }   
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
            $("#save").attr("disabled", false);
        }
    });
}

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-image/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Successfully Delete',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            }) 
        }
      });
    } 
}

function DeleteAd(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-ad/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Successfully Delete',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/customer/my-ads";
                }
            }) 
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

function showPreview(event, number){
   if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      let preview = document.getElementById("file-ip-"+number+"-preview");
      preview.src = src;
      preview.style.display = "block";
   } 
}
// function myImgRemove(number) {
//    document.getElementById("file-ip-"+number+"-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
//    document.getElementById("file-ip-"+number).value = null;
// }


function AddImages() {

var tableLength = $("#image_view .panel_image").length;
var count;
if(tableLength > 0) {		
   count = $("#image_view .panel_image:last").attr('value');
   count = Number(count) + 1;
} else {
   count = 1;
}
var tr =
'<div value="'+count+'" id="imagerows'+count+'" class="center form-input panel_image">'+
   '<label for="file-ip-'+count+'">'+
   '<img id="file-ip-'+count+'-preview" src="https://i.ibb.co/ZVFsg37/default.png">'+
   '<button type="button" class="imgRemove" onclick="removeImageRows('+count+')"></button>'+
   '</label>'+
   '<input type="hidden" name="image_id[]">'+
   '<input type="file" name="images[]" id="file-ip-'+count+'" accept=".png,.jpg,.jpeg" onchange="showPreview(event, '+count+');">'+
'</div>';

if(tableLength > 0) {	
   $("#image_view .panel_image:last").after(tr);
} else {	
   $("#image_view .panel_image").append(tr);
}	 

} // /add row


function removeImageRows(row)
{
   if(confirm('Are you sure delete this row?'))
   {
      $("#imagerows"+row).remove();
   }
}
</script>
@endsection