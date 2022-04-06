<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mironcoder">
    <meta name="email" content="mironcoder@gmail.com">
    <meta name="profile" content="https://themeforest.net/user/mironcoder">
    <meta name="name" content="Classicads">
    <meta name="type" content="Classified Advertising">
    <meta name="title" content="Foundit - Login">
    <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,"> -->
    <title>Foundit - User Form</title>
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
  width: 10px;
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
</style>

</head>

<body>
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content"><a href="#"><img src="/website/images/logo.png" alt="logo"></a>
                <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                <p>Biggest Online Advertising Marketplace in the World.</p>
            </div>
        </div>
        <div class="user-form-category">
            <div class="user-form-header"><a href="#"><img src="/website/images/logo.png" alt="logo"></a><a href="/"><i
                        class="fas fa-arrow-left"></i></a></div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
                </ul>
            </div>
            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Email ID">
                                <small class="form-alert">Please follow this example -  mail@mail.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input required autocomplete="off" name="password" type="password" class="form-control" placeholder="Password">
                                <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="remember_me"><label class="custom-control-label" for="remember_me">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-right"><a href="{{ route('password.request') }}" class="form-forgot">Forgot password?</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><button type="submit" class="btn btn-inline"><i class="fas fa-unlock"></i><span>Enter your account</span></button></div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Don't have an account? click on the <span>( sign up )</span>button above.</p>
                </div>
            </div>
            <div class="tab-pane" id="register-tab">
                <form method="POST" id="signup_form">
                {{csrf_field()}}
                <div class="user-form-title">
                    <h2>Register</h2>
                    <p>Setup a new account in a minute.</p>
                </div>
                <p class="text-center" style=" color: #323539; font-weight: 800; letter-spacing: 2px;">Select Before Sign up</p>
                <div class="inputGroup">
                    <input checked id="business_type1" name="business_type" type="radio"/>
                    <label for="business_type1">I'm Individual</label>
                </div>
                <div class="inputGroup">
                    <input id="business_type2" name="business_type" type="radio"/>
                    <label for="business_type2">I'm Business</label>
                </div>
                <ul class="user-form-option">
                    <li><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i><span>twitter</span></a></li>
                    <li><a href="#"><i class="fab fa-google"></i><span>google</span></a></li>
                </ul>
                <div class="user-form-devider">
                    <p>or</p>
                </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="email" id="email" type="email" class="form-control" placeholder="Email ID">
                                <small class="form-alert">Please follow this example - mail@mail.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="mobile" id="mobile" type="number" class="form-control" placeholder="Mobile number">
                                <small class="form-alert">Please follow this example - 1XXXXXXXX</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input autocomplete="off" name="password" id="password" type="password" class="form-control" placeholder="Password">
                                <button class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input name="password_confirmation" id="password_confirmation" autocomplete="off" type="password" class="form-control" placeholder="Repeat Password">
                                <button class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="terms_and_condition" type="checkbox" class="custom-control-input" id="signup-check">
                                    <label class="custom-control-label" for="signup-check">I agree to the all <a href="#">terms & conditions</a>of bebostha.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button id="save" onclick="Save()" type="button" class="btn btn-inline"><i class="fas fa-user-check"></i><span>Create new account</span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Already have an account? click on the <span>( sign in )</span>button above.</p>
                </div>
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