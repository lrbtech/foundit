<!DOCTYPE html>
  @if(Auth::guard('admin')->user()->lang == 'english')
  <html lang="en" dir="ltr">
  @else
  <html lang="en" dir="rtl">
  @endif
  <head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap"> -->
    <link rel="icon" href="/website/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/website/images/favicon.png" type="image/x-icon">
    <title>Foundit Admin Dashboard</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/animate.css">
    <!-- Plugins css start-->
    <link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    @yield('extra-css')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/style.css">
    <link id="color" rel="stylesheet" href="/assets/app-assets/css/color-2.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/toastr/toastr.css')}}">

    
    
    <style>
    /* .hide{
      display:none
    }
    span.badge.badge-pill.badge-warning {
      position: absolute;
      top: 10px;
      right: 50px !important;
    } */
    .page-wrapper .page-body-wrapper .iconsidebar-menu .iconMenu-bar {
    width: 100px;
    }
    .page-wrapper .page-body-wrapper .page-header {
      padding-top: 5px !important;
      padding-bottom: 5px !important;
    }
    /* .card .card-header {
    padding: 10px;
    }
    .card .card-body {
    padding: 10px;
    } */
    </style>
  </head>
  @if(Auth::guard('admin')->user()->lang == 'english')
  <body main-theme-layout="ltr">
  @else
  <body main-theme-layout="rtl">
  @endif
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="typewriter">
        {{-- <h1>{{$language[243][Auth::guard('admin')->user()->lang]}} {{$language[244][Auth::guard('admin')->user()->lang]}}..</h1>
          --}}
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right">
          <div class="main-header-left text-center">
            <div class="logo-wrapper"><a href="/admin/dashboard"><img src="/images/logo.png" alt=""></a></div>
          </div>
          <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
              <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
            </div>
          </div>
          <div class="vertical-mobile-sidebar">
            <i class="fa fa-bars sidebar-bar"></i>
          </div>
          <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
              <li>
              <form class="form-inline">
                <div class="form-group">
                  <div class="u-posRelative">
                    <select style="top:0px !important;" class="Typeahead-input form-control-plaintext" id="languages" name="languages">
                    <option value="english" <?php if(Auth::guard('admin')->user()->lang == 'english') { ?> selected="selected"<?php } ?>>English</option>
                    <option value="arabic" <?php if(Auth::guard('admin')->user()->lang == 'arabic') { ?> selected="selected"<?php } ?>>Arabic</option>
                    </select>
                  </div>
                </div>
              </form>
              </li>

              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

              <li class="onhover-dropdown"> 
                <span class="media user-header">
                  <img class="img-fluid" src="/assets/app-assets/images/dashboard/user.png" alt="">
                </span>
                <ul class="onhover-show-div profile-dropdown">
                  <li class="gradient-primary">
                    <h5 class="f-w-600 mb-0">
                    {{ Auth::guard('admin')->user()->name }}
                    </h5>
                    <!-- <span>Web Designer</span> -->
                  </li>
                  <li><a href="/admin/change-password"><i data-feather="user"> </i>ChangePassword</a></li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i data-feather="settings"> </i>Log Out</li> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </ul>
              </li>

            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
          </div>
        </div>
      </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="iconsidebar-menu">
          <div class="sidebar">
            <ul class="iconMenu-bar custom-scrollbar">
              
              <li>
                <a class="bar-icons" href="/admin/dashboard"><i class="pe-7s-home"></i><span>{{$language[3][Auth::guard('admin')->user()->lang]}}</span></a>
                <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Dashboard</li>
                  <li class="dashboard"><a class="dashboard" href="/admin/dashboard">Dashboard</a></li>
                </ul> -->
              </li>

              <li>
                <a class="bar-icons" href="/admin/all-customer"><i class="pe-7s-id"></i><span>{{$language[4][Auth::guard('admin')->user()->lang]}}</span></a>
                <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">{{$language[4][Auth::guard('admin')->user()->lang]}}</li>

                  <li class="all-customer"><a class="all-customer" href="/admin/all-customer">{{$language[28][Auth::guard('admin')->user()->lang]}}</a></li>
                  
                </ul> -->
              </li>


              <li>
                <a class="bar-icons" href="/admin/post-ads"><i class="pe-7s-id"></i><span>{{$language[5][Auth::guard('admin')->user()->lang]}}</span></a>
                <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">{{$language[5][Auth::guard('admin')->user()->lang]}}</li>

                  <li class="post-ads"><a class="post-ads" href="/admin/post-ads">{{$language[7][Auth::guard('admin')->user()->lang]}}</a></li>
                 
                </ul> -->
              </li>

              <li>
                <a class="bar-icons" href="/admin/chat-customer"><i style="font-size:22px; vertical-align:middle;color:#242934;font-weight:600;" data-feather="message-circle"></i><span>Chat Customer</span></a>
              </li>
            
              <li>              
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-graph3"></i><span>{{$language[42][Auth::guard('admin')->user()->lang]}} </span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">{{$language[42][Auth::guard('admin')->user()->lang]}}</li>

                  <!-- <li class="package-report"><a class="package-report" href="/admin/package-report">{{$language[30][Auth::guard('admin')->user()->lang]}} </a></li>  -->

                  <li class="visitor-logs"><a class="visitor-logs" href="/admin/visitor-logs">{{$language[31][Auth::guard('admin')->user()->lang]}} </a></li> 

                  <li class="user-logs"><a class="user-logs" href="/admin/user-logs">{{$language[32][Auth::guard('admin')->user()->lang]}} </a></li> 
                  
                </ul>
              </li>

              <li>
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-config"></i><span>{{$language[9][Auth::guard('admin')->user()->lang]}}</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">{{$language[9][Auth::guard('admin')->user()->lang]}}</li>

                  <!-- <li class="trending-today"><a class="trending-today" href="/admin/trending-today">{{$language[10][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <li class="category"><a class="category" href="/admin/category">{{$language[11][Auth::guard('admin')->user()->lang]}}</a></li>

                  <!-- <li class="report-category"><a class="report-category" href="/admin/report-category">{{$language[12][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <!-- <li class="package"><a class="package" href="/admin/package">{{$language[13][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <li class="city"><a class="city" href="/admin/city">{{$language[14][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="settings"><a class="settings" href="/admin/settings">{{$language[9][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="google-ads"><a class="google-ads" href="/admin/google-ads">Ads Image</a></li>

                  <li class="sms-api"><a class="sms-api" href="/admin/sms-api">SMS Gateway Details</a></li>

                  <li class="blog"><a class="blog" href="/admin/blog">{{$language[33][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="newsletter"><a class="newsletter" href="/admin/newsletter">{{$language[34][Auth::guard('admin')->user()->lang]}}</a></li>

                  <!-- <li class="homepage-seo"><a class="homepage-seo" href="/admin/homepage-seo">SEO Metatag</a></li> -->

                  <li class="languages"><a class="languages" href="/admin/languages">{{$language[15][Auth::guard('admin')->user()->lang]}}</a></li>

                </ul>
              </li>

              <li>
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-config"></i><span>{{$language[16][Auth::guard('admin')->user()->lang]}}</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">{{$language[16][Auth::guard('admin')->user()->lang]}}</li>

                  <!-- <li class="about-us"><a class="about-us" href="/admin/about-us">{{$language[17][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <li class="terms-and-conditions"><a class="terms-and-conditions" href="/admin/terms-and-conditions">{{$language[18][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="how-it-works"><a class="how-it-works" href="/admin/how-it-works">{{$language[19][Auth::guard('admin')->user()->lang]}}</a></li>

                  <!-- <li class="privacy-policy"><a class="privacy-policy" href="/admin/privacy-policy">{{$language[20][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <li class="our-story"><a class="our-story" href="/admin/our-story">{{$language[21][Auth::guard('admin')->user()->lang]}}</a></li>

                  <!-- <li class="careers"><a class="careers" href="/admin/careers">{{$language[22][Auth::guard('admin')->user()->lang]}}</a></li> -->

                  <li class="auto-dealerships"><a class="auto-dealerships" href="/admin/auto-dealerships">{{$language[23][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="trust-saftey"><a class="trust-saftey" href="/admin/trust-saftey">{{$language[24][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="community"><a class="community" href="/admin/community">{{$language[25][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="faq"><a class="faq" href="/admin/faq">{{$language[36][Auth::guard('admin')->user()->lang]}}</a></li>

                  <!-- <li class="press"><a class="press" href="/admin/press">{{$language[26][Auth::guard('admin')->user()->lang]}}</a></li>

                  <li class="help"><a class="help" href="/admin/help">{{$language[27][Auth::guard('admin')->user()->lang]}}</a></li> -->

                </ul>
              </li>
              
              
            </ul>
          </div>
        </div>
        @yield('section')
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <!-- <p class="mb-0">.</p> -->
              </div>
              <div class="col-md-6">
                All Copyrights Reserved © 2021 Designed By LRB INFO TECH
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="/assets/app-assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/assets/app-assets/js/bootstrap/popper.min.js"></script>
    <script src="/assets/app-assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="/assets/app-assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/assets/app-assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="/assets/app-assets/js/sidebar-menu.js"></script>
    <script src="/assets/app-assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
   
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/assets/app-assets/js/script.js"></script>
   
    <script src="{{ asset('assets/toastr/toastr.min.js')}}" type="text/javascript"></script>
 @yield('extra-js')
    
    <!-- login js-->
    <!-- Plugin used-->
    <script>
  $('#languages').change(function(){
    var language = $('#languages').val();
    $.ajax({
      url : '/admin/change-language/'+language,
      type: "GET",
      success: function(data)
      {
          location.reload();
      }
    });
  });
    </script>
  </body>
</html>