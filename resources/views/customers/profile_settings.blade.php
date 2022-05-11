@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/setting.css">
@endsection
@section('section')
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[97][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[97][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.menu')
    <div class="setting-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[98][session()->get('lang')]}}</h3><button data-dismiss="alert">close</button>
                        </div>
                        <form class="setting-form" action="#" id="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input value="{{$user->id}}" type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[99][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="first_name" id="first_name" value="{{$user->first_name}}" type="text" class="form-control" placeholder="{{$language[99][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[100][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="last_name" id="last_name" value="{{$user->last_name}}" type="text" class="form-control" placeholder="{{$language[100][session()->get('lang')]}}"></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[101][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="company" id="company" value="{{$user->company}}" type="text" class="form-control" placeholder="{{$language[101][session()->get('lang')]}}"></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[102][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="address" id="address" value="{{$user->address}}" type="text" class="form-control" placeholder="{{$language[102][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[103][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="city" id="city" value="{{$user->city}}" type="text" class="form-control" placeholder="{{$language[103][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[104][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="state" id="state" value="{{$user->state}}" type="text" class="form-control" placeholder="{{$language[104][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[105][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="postal_code" id="postal_code" value="{{$user->postal_code}}" type="text" class="form-control" placeholder="{{$language[105][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[106][session()->get('lang')]}}</label>
                                        <input autocomplete="off" readonly name="email" id="email" value="{{$user->email}}" type="email" class="form-control" placeholder="{{$language[106][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[107][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="website" id="website" value="{{$user->website}}" type="text" class="form-control" placeholder="{{$language[107][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[108][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="mobile" id="mobile" value="{{$user->mobile}}" type="text" class="form-control" placeholder="{{$language[109][session()->get('lang')]}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[110][session()->get('lang')]}}</label>
                                        <input autocomplete="off" name="dob" id="dob" value="{{$user->dob}}" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[111][session()->get('lang')]}}</label>
                                        <select name="gender" id="gender" class="form-control custom-select">
                                            <option {{ ($user->gender == 'male' ? ' selected' : '') }} value="male">male</option>
                                            <option {{ ($user->gender == 'female' ? ' selected' : '') }} value="female">female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[112][session()->get('lang')]}}</label>
                                        <input name="profile_image" id="profile_image" type="file" class="form-control">
                                        <img style="width: 150px;" src="/upload_profile_image/{{$user->profile_image}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">{{$language[113][session()->get('lang')]}}</label>
                                        <input name="banner_image" id="banner_image" type="file" class="form-control">
                                        <img style="width: 150px;" src="/upload_profile_image/{{$user->banner_image}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" onclick="Save()" class="btn btn-inline">
                                        <i class="fas fa-user-check"></i><span>Update Profile</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')

<script>
$('.settings').addClass('active');

function Save(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/update-profile-settings',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {           
            Swal.fire({
                text: 'Successfully Update',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#save").attr("disabled", false);
                    location.reload();
                }
            })  
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
</script>
@endsection