<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundit.ae - The Best Place To Find Everything In The UAE</title>
    <!-- <link rel="icon" href="/website/images/favicon.png"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="/website/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/website/css/custom/main.css">
    <link rel="stylesheet" href="/website/css/custom/user-form.css">
    <script src="/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">  
<style>
/* custom input design */

.inputGroup {
  background-color: #fff;
  display: block;
  margin: 10px 0;
  position: relative;
}
.inputGroup label {
  padding: 12px 18px;
  width: 100%;
  display: block;
  text-align: left;
  color: #3C454C;
  cursor: pointer;
  position: relative;
  z-index: 2;
  transition: color 200ms ease-in;
  overflow: hidden;
  box-shadow: 0px 0px 1px 3px rgb(168 168 168 / 8%);
}

.inputGroup label:before {
  width: 100px;
  height: 10px;
  border-radius: 50%;
  content: "";
  background-color: #5562eb;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) scale3d(1, 1, 1);
  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  z-index: -1;
}
.inputGroup label:after {
  width: 32px;
  height: 32px;
  content: "";
  border: 2px solid #D1D7DC;
  background-color: #fff;
  background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
  background-repeat: no-repeat;
  background-position: 2px 3px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  transition: all 200ms ease-in;
}
.inputGroup input:checked ~ label {
  color: #fff;
}
.inputGroup input:checked ~ label:before {
  transform: translate(-50%, -50%) scale3d(56, 56, 1);
  opacity: 1;
}
.inputGroup input:checked ~ label:after {
  background-color: #54E0C7;
  border-color: #54E0C7;
}
.inputGroup input {
  width: 32px;
  height: 32px;
  order: 1;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  visibility: hidden;
}

.form {
  padding: 0 16px;
  max-width: 550px;
  margin: 50px auto;
  font-size: 18px;
  font-weight: 600;
  line-height: 36px;
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

@media (max-width: 575px){

.user-form-banner {
    display: block!important;
    width: 100%;
    height: auto;
    margin-top: 70px;
}

.user-form-content h1 {
    color: var(--white);
    font-size: 23px;
    line-height: 28px;
    margin-bottom: 15px;
    font-weight: 800;
}

.user-form-content p {
    color: var(--white);
    font-size: 18px;
    line-height: 25px;
}

.user-form-part {
    display: block!important;
}

.user-form-category {
    height: auto;
    background: #fbfbfb;
    overflow-y: inherit;
    overflow-x: inherit;
    padding: 0;
}

.user-form-content {
    position: relative;
    top: 0;
    left: 0;
    -webkit-transform: inherit;
    transform: inherit;
    text-align: center;
    width: 100%;
    padding: 20px 20px;
}

.user-form-category-btn {
    margin-top: 3px;
}

}

</style>

</head>

<body>
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content"><a href="#"><img src="/website/images/logo.png" alt="logo"></a>
                <!-- <h1>Advertise your assets <span>Buy what are you needs.</span></h1> -->
                <h1>{{$language[175][session()->get('lang')]}}</h1>
                <!-- <h1 style="color:#00a7ff">{{$language[170][session()->get('lang')]}}!<span>{{$language[171][session()->get('lang')]}}!</span></h1> -->
                <p>{{$language[176][session()->get('lang')]}}</p>
            </div>
        </div>
        <div class="user-form-category">
            <div class="user-form-header"><a href="#"><img src="/website/images/logo.png" alt="logo"></a><a href="/"><i
                        class="fas fa-arrow-left"></i></a></div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">{{$language[177][session()->get('lang')]}}</a></li>
                    <li><a href="#register-tab" class="nav-link" data-toggle="tab">{{$language[178][session()->get('lang')]}}</a></li>
                </ul>
            </div>
            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>{{$language[179][session()->get('lang')]}}</h2>
                    <p>{{$language[180][session()->get('lang')]}}</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{$language[181][session()->get('lang')]}}">
                                <!-- <small class="form-alert">Please follow this example -  mail@mail.com</small> -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input required autocomplete="off" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{$language[182][session()->get('lang')]}}">
                                <button onclick="if (password.type == 'text') password.type = 'password'; else password.type = 'text';" type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <!-- <small class="form-alert">Password must be 6 characters</small> -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}class="custom-control-input"><label class="custom-control-label" for="remember">{{$language[183][session()->get('lang')]}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-right"><a href="{{ route('password.request') }}" class="form-forgot">{{$language[184][session()->get('lang')]}}</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><button type="submit" class="btn btn-inline"><i class="fas fa-unlock"></i><span>{{$language[185][session()->get('lang')]}}</span></button></div>
                        </div>
                    </div>
                </form>
                <!-- <div class="user-form-direction">
                    <p>{{$language[182][session()->get('lang')]}}</p>
                </div> -->
            </div>
            <div class="tab-pane" id="register-tab">
                <form method="POST" id="signup_form">
                {{csrf_field()}}
                <div class="user-form-title">
                    <h2>{{$language[186][session()->get('lang')]}}</h2>
                    <p>{{$language[187][session()->get('lang')]}}.</p>
                </div>
                
                <p class="text-center" style="color: #323539; font-weight: 800; letter-spacing: 2px;">{{$language[188][session()->get('lang')]}}</p>
                <div style="width:100%;" class="inputGroup">
                    <input style="width:100%;" value="0" checked id="business_type1" name="business_type" type="radio"/>
                    <label style="width:100%;" for="business_type1">{{$language[189][session()->get('lang')]}}</label>
                </div>
                <div style="width:100%;" class="inputGroup">
                    <input style="width:100%;" value="1" id="business_type2" name="business_type" type="radio"/>
                    <label style="width:100%;" for="business_type2">{{$language[190][session()->get('lang')]}}</label>
                </div>
                <!-- <ul class="user-form-option">
                    <li><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i><span>twitter</span></a></li>
                    <li><a href="#"><i class="fab fa-google"></i><span>google</span></a></li>
                </ul> -->
                <!-- <div class="user-form-devider">
                    <p>or</p>
                </div> -->
                    <div class="row">
                        <br>
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="email" id="email" type="email" class="form-control" placeholder="{{$language[191][session()->get('lang')]}}">
                                <!-- <small class="form-alert">Please follow this example - mail@mail.com</small> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="mobile" id="mobile" type="number" class="form-control" placeholder="{{$language[192][session()->get('lang')]}}">
                                <!-- <small class="form-alert">Please follow this example - 1XXXXXXXX</small> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="password" id="password" type="password" class="form-control" placeholder="{{$language[193][session()->get('lang')]}}">
                                <button onclick="if (password.type == 'text') password.type = 'password'; else password.type = 'text';" type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <!-- <small class="form-alert">Password must be 6 characters</small> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input name="password_confirmation" id="password_confirmation" autocomplete="off" type="password" class="form-control" placeholder="{{$language[194][session()->get('lang')]}}">
                                <button onclick="if (password_confirmation.type == 'text') password_confirmation.type = 'password'; else password_confirmation.type = 'text';" type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <!-- <small class="form-alert">Password must be 6 characters</small> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="terms_and_condition" type="checkbox" class="custom-control-input" id="terms_and_condition">
                                    <label class="custom-control-label" for="terms_and_condition"><a href="#">{{$language[195][session()->get('lang')]}}.</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button id="save" onclick="Save()" type="button" class="btn btn-inline"><i class="fas fa-user-check"></i><span>{{$language[196][session()->get('lang')]}}</span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="user-form-direction">
                    <p>{{$language[192][session()->get('lang')]}}.</p>
                </div> -->
            </div>
        </div>
    </section>
    <script src="/website/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/website/js/vendor/popper.min.js"></script>
    <script src="/website/js/vendor/bootstrap.min.js"></script>
    <script src="/website/js/custom/main.js"></script>
<script type="text/javascript">
function Save(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#signup_form')[0]);
    $.ajax({
        url : '/save-user-register',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {             
            Swal.fire({
                text: "Thanks for the Registration please Verify your Email",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#signup_form")[0].reset();
                    window.location.href = '/login';
                    $("#save").attr("disabled", false);
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
</body>

</html>