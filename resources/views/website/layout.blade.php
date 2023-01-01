<!DOCTYPE html>
<!-- <html id="html_open" lang="en" dir="ltr"> -->
@if(session()->get('lang') == 'english')
<html dir="ltr">
@elseif(session()->get('lang') == 'arabic')
<html dir="rtl">
@else 
<html dir="ltr">
@endif
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="LrbInfotech">
    <meta name="title" content="FoundIT - Classified">
    <meta name="keywords" content="The best place to find everything in the UAE | Classifieds | Ads. Currently it says Found iT"> -->
    <title>Foundit.ae - The Best Place To Find Everything In The UAE</title>
    <link rel="icon" href="/website/images/favicon.png">
    <link rel="stylesheet" href="/website/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="/website/css/vendor/slick.min.css">
    <link rel="stylesheet" href="/website/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">

@if(session()->get('lang') == 'english')
<link rel="stylesheet" href="/website/css/custom/main.css">
<link rel="stylesheet" href="/website/css/custom/index.css">
@elseif(session()->get('lang') == 'arabic')
<link rel="stylesheet" href="/website/css/custom/main-rtl.css">
<link rel="stylesheet" href="/website/css/custom/index-rtl.css">
@else 
<link rel="stylesheet" href="/website/css/custom/main.css">
<link rel="stylesheet" href="/website/css/custom/index.css">
@endif
    <script src="/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
    @yield('extra-css')
<style>
/* #google_translate_element{
    color: var(--white) !important;
    background: var(--primary) !important;
    border-color: var(--primary) !important;
} */

.ct-topbar__list {
  margin-bottom: 0px;
}
.ct-language__dropdown{
	padding-top: 8px;
	max-height: 0;
	overflow: hidden;
	position: absolute;
	top: 110%;
	left: -3px;
	-webkit-transition: all 0.25s ease-in-out;
	transition: all 0.25s ease-in-out;
	width: 100px;
	text-align: center;
	padding-top: 0;
    z-index:200;
}
.ct-language__dropdown li{
	background: #ffffff;
	padding: 5px;
}
.ct-language__dropdown li a{
	display: block;
}
.ct-language__dropdown li:first-child{
	padding-top: 10px;
	border-radius: 3px 3px 0 0;
}
.ct-language__dropdown li:last-child{
	padding-bottom: 10px;
	border-radius: 0 0 3px 3px;
}
.ct-language__dropdown li:hover{
	background: #444;
}
/* .ct-language__dropdown:before{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	margin: auto;
	width: 8px;
	height: 0;
	border: 0 solid transparent;
	border-right-width: 8px;
	border-left-width: 8px;
	border-bottom: 8px solid #222;
} */
.ct-language{
	position: relative;
    /* background: #00aced; */
    background: var(--primary) !important;
    color: #fff;
    padding: 10px 0;
}
.ct-language:hover .ct-language__dropdown{
	max-height: 200px;
	padding-top: 8px;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
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

.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
@media screen and (max-width: 520px){
    .news-content h2 {
    margin-bottom: 15px;
    font-size: 16px;
    margin-top: 10px;
}

.news-form input {
    width: 100%;
    height: 50px;
}
.news-form .btn{
    height: 40px;
    top: 5px;
}

.news-form input::-webkit-input-placeholder{
  font-size: 12px;
}

.wrap-footer {
    padding-bottom: 15px;
}

.footer-part {
    padding: 35px 0px 50px;
}

.footer-part .text-danger{
    font-size: 12px;
    padding-left: 2px;
}

}

.new-language span{
    margin-right: 8px;
}

.new-language{
    position: relative;
    background: #0d3a69!important;
    color: #fff;
    padding: 11px 0px;
    border-radius: 6px;
    outline: none;
    border: none;
}

/* .single-banner {
    background: url(/upload_files/{{$settings->header_banner}}) !important;
} */

.img-box-design{
    text-align: center;
}

.img-box-design img{
    width: unset!important;
}

@media only screen and (max-width: 1024px) {
  .left-ad {
    display:none;
  }
  .right-ad {
    display:none;
  }
  /* .center_image{
    display:none;
  } */
}
@media only screen and (max-width: 768px) {
  .ad_728_image{
    width:100% !important;
  }
}
</style>

</head>

<body class="notranslate">
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <ul class="header-widget">
                        <li><button type="button" class="header-menu"><i class="fas fa-align-left"></i></button></li>
                        <li><a href="/" class="header-logo"><img src="/website/images/logo.png" alt="logo"></a></li>
                        @if(Auth::check())
                        <li><a href="/customer/dashboard" class="header-user"><i class="fas fa-user"></i><span>{{$language[115][session()->get('lang')]}}</span></a></li>
                        @else 
                        <li><a href="/login" class="header-user"><i class="fas fa-user"></i><span>{{$language[116][session()->get('lang')]}}</span></a></li>
                        @endif
                        <li><button type="button" class="header-src"><i class="fas fa-search"></i></button></li>
                    </ul>
                </div>
                <form id="search-form" action="#" method="get" class="header-search">
                {{ csrf_field() }}
                    <div class="header-main-search">
                        <button onclick="SearchPost()" type="button" class="header-search-btn"><i class="fas fa-search"></i></button>
                        <input autocomplete="off" name="search" id="headersearch" type="text" class="form-control" placeholder="{{$language[117][session()->get('lang')]}}">
                        <button type="button" class="header-option-btn tooltip"><i class="fas fa-sliders-h"></i><span class="tooltext left">FilterOption</span></button>
                    </div>
                    <div class="header-search-option">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="city" id="headercity" class="form-control custom-select">
                                        <option value="">{{$language[118][session()->get('lang')]}}*</option>
                                        @foreach($city as $row)
                                        <option value="{{$row->id}}">{{$row->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="category" id="headercategory" class="form-control custom-select">
                                        <option value="">{{$language[119][session()->get('lang')]}}*</option>
                                        @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="subcategory" id="headersubcategory" class="form-control custom-select">
                                        <option value="">{{$language[120][session()->get('lang')]}}*</option>
                                        @foreach($subcategory as $row)
                                        <option value="{{$row->id}}">{{$row->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-btn"><button onclick="SearchPost()" type="button" class="btn btn-inline"><i class="fas fa-search"></i><span>{{$language[121][session()->get('lang')]}}</span></button></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header-right">
                    <ul class="header-widget">
                        
                        @if(Auth::check())
                        <li>
                            <a href="/customer/bookmark"><button class="header-favourite"><i class="fas fa-heart"></i><sup>0</sup></button></a>
                        </li>
                        @else 
                        <li>
                            <a href="/login"><button class="header-favourite"><i class="fas fa-heart"></i><sup>0</sup></button></a>
                        </li>
                        @endif
                        <!-- <li><button class="header-notify"><i class="fas fa-bell"></i><sup>0</sup></button></li> -->
                        @if(Auth::check())
                        <li>
                            <a href="/customer/message"><button class="header-message"><i class="fas fa-envelope"></i><sup>0</sup></button></a>
                        </li>
                        @endif
                    </ul>

                    @if(Auth::check())
                    <a href="/customer/create-post-ad" class="btn btn-inline"><i class="fas fa-plus-circle"></i><span>{{$language[122][session()->get('lang')]}}</span></a>
                    @else 
                    <a href="/login" class="btn btn-inline"><i class="fas fa-plus-circle"></i><span>{{$language[122][session()->get('lang')]}}</span></a>
                    @endif

                    <div id="google_translate_element" style="display: none;"></div>

                    @if(session()->get('lang') == 'english')
                    <a onclick="translateLanguage('Arabic');" href="javascript:void(0)" class="btn btn-inline new-language"><i class="flag-icon flag-icon-ae"></i><span>عربي</span></a>
                    @else 
                    <a onclick="translateLanguage('English');" href="javascript:void(0)" class="btn btn-inline new-language"><i class="flag-icon flag-icon-us"></i><span>English</span></a>
                    @endif

                    <!-- <ul style="width:120px !important;margin-left:5px;" class="list-unstyled list-inline ct-topbar__list">
                        <li style="padding-left:5px;" class="ct-language new-language"><a><i class="fas fa-globe"></i> Language <i class="fa fa-caret-down"></a></i>
                            <ul class="list-unstyled ct-language__dropdown">
                            <li><a onclick="translateLanguage('English');" href="javascript:void(0)" class="lang-en lang-select" data-lang="en"><span class="flag-icon flag-icon-us"></span> English</a></li>
                            <li><a onclick="translateLanguage('Arabic');" href="javascript:void(0)" class="lang-ar lang-select" data-lang="ar"><span class="flag-icon flag-icon-ae"></span> Arabic</a></li>
                            </ul>
                        </li>
                    </ul> -->

                    <!-- <ul style="width:120px !important;margin-left:5px;" class="list-unstyled list-inline ct-topbar__list">
                        <li style="padding-left:5px;" class="ct-language"><a><i class="fas fa-globe"></i> {{$language[1][session()->get('lang')]}} <i class="fa fa-arrow-down"></a></i>
                            <ul class="list-unstyled ct-language__dropdown">
                            <li><a onclick="updateLanguage('english');" href="javascript:void(0)" class="lang-en lang-select" data-lang="en"><span class="flag-icon flag-icon-us"></span> English</a></li>
                            <li><a onclick="updateLanguage('arabic');" href="javascript:void(0)" class="lang-ar lang-select" data-lang="ar"><span class="flag-icon flag-icon-ae"></span> Arabic</a></li>
                            </ul>
                        </li>
                    </ul> -->
                    
                </div>
            </div>
        </div>
    </header>


    <div class="sidebar-part">
        <div class="sidebar-body">
            <div class="sidebar-header"><a href="/" class="sidebar-logo"><img src="/website/images/logo.png" alt="logo"></a><button class="sidebar-cross"><i class="fas fa-times"></i></button></div>
            <div class="sidebar-content">
                <div class="sidebar-menu">
                    <div class="tab-pane active" id="main-menu">
                        <ul class="navbar-list">
                            <li class="navbar-item"><a class="navbar-link" href="/">{{$language[123][session()->get('lang')]}}</a></li>
                            <li class="navbar-item navbar-dropdown">
                                <a class="navbar-link" href="javascript:void(0)"><span>{{$language[124][session()->get('lang')]}}</span><i class="fas fa-plus"></i></a>
                                <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="/how-it-works">{{$language[125][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/our-story">{{$language[126][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/auto-dealerships">{{$language[127][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/trust-saftey">{{$language[128][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/terms">{{$language[129][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/community">{{$language[130][session()->get('lang')]}}</a></li>
                                <li><a class="dropdown-link" href="/blog">{{$language[131][session()->get('lang')]}}</a></li>
                                </ul>
                            </li>
                            <li class="navbar-item"><a class="navbar-link" href="/category-list">{{$language[132][session()->get('lang')]}}</a></li>
                            <!-- <li class="navbar-item"><a class="navbar-link" href="/packages">{{$language[13][session()->get('lang')]}}</a></li> -->
                            <li class="navbar-item"><a class="navbar-link" href="/faq">{{$language[133][session()->get('lang')]}}</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="/contact">{{$language[134][session()->get('lang')]}}</a></li>

                            @if(session()->get('lang') == 'english')
                            <li class="navbar-item"><a class="navbar-link" onclick="updateLanguage('arabic');" href="javascript:void(0)">عربي</a></li>
                            @else 
                            <li class="navbar-item"><a class="navbar-link" onclick="updateLanguage('english');" href="javascript:void(0)">English</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btmbar-part">
        <div class="container">
            <ul class="btmbar-widget">
                <li><a href="/"><i class="fas fa-home"></i></a></li>
                @if(Auth::check())
                <li><a href="/customer/dashboard"><i class="fas fa-user"></i></a></li>
                @else 
                <li><a href="/login"><i class="fas fa-user"></i></a></li>
                @endif
                <!-- <li><a href="/category-view"><i class="fas fa-star"></i><sup>0</sup></a></li> -->
                @if(Auth::check())
                <li><a class="plus-btn" href="/customer/create-post-ad"><i class="fas fa-plus"></i><span>{{$language[122][session()->get('lang')]}}</span></a>
                </li>
                @else 
                <li><a class="plus-btn" href="/login"><i class="fas fa-plus"></i><span>{{$language[122][session()->get('lang')]}}</span></a>
                </li>
                @endif
                @if(Auth::check())
                <li><a href="/customer/bookmark"><i class="fas fa-heart"></i><sup>0</sup></a></li>
                @else 
                <li><a href="/login"><i class="fas fa-heart"></i><sup>0</sup></a></li>
                @endif
                @if(Auth::check())
                <li><a href="/customer/message"><i class="fas fa-envelope"></i><sup>0</sup></a></li>
                @else 
                <li><a href="/login"><i class="fas fa-envelope"></i><sup>0</sup></a></li>
                @endif
            </ul>
        </div>
    </div>
    @yield('section')
    <style>
        .footer-part {
            background: #ffffff !important;
            color:#000 !important;
        }
        .social-transparent li a i {
            color: #fff !important;
        }
        .newsletter {
            margin-bottom: 0px !important;
        }
    </style>
    <footer class="footer-part">
        <div class="container wrap-footer">
            <div class="row newsletter">
                <!-- <div class="col-6 col-lg-6 col-md-12">
                    <div class="news-content">
                        <h2 style="color:#fff;">{{$language[51][session()->get('lang')]}}</h2>
                        <p style="color:#000;">{{$settings->footer_description}}</p>
                    </div>
                </div> -->
                <div style="color:#000;" class="col-12 col-lg-8 col-md-8 offset-md-2 offset-lg-2">
                    <form method="post" id="news-form" class="news-form">
                    {{csrf_field()}}
                        <input name="news_letter_email" type="email" placeholder="{{$language[135][session()->get('lang')]}}">
                        <button type="button" onclick="SaveEmail()" class="btn btn-inline"><i class="fas fa-envelope"></i><span>{{$language[136][session()->get('lang')]}}</span></button>
                    </form>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-content">
                        <h3>Contact Us</h3>
                        <ul class="footer-address">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p>1420 West hamadan street, <span>Abudhabi, UAE.</span></p>
                            </li>
                            <li><i class="fas fa-envelope"></i>
                                <p>support@lrbinfotech.com <span>info@lrbinfotech.com</span></p>
                            </li>
                            <li><i class="fas fa-phone-alt"></i>
                                <p>+8801838288389 <span>+8801941101915</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-content">
                        <h3>Quick Links</h3>
                        <ul class="footer-widget">
                            <li><a href="/category-view">How it works</a></li>
                            <li><a href="/category-view">About</a></li>
                            <li><a href="/category-view">Press</a></li>
                            <li><a href="/category-view">Carrers</a></li>
                            <li><a href="/category-view">Faq</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-content">
                        <h3>Information</h3>
                        <ul class="footer-widget">
                            <li><a href="/category-view">Contact Us</a></li>
                            <li><a href="/category-view">Trust & Safety</a></li>
                            <li><a href="/category-view">Community</a></li>
                            <li><a href="/category-view">Help</a></li>
                            <li><a href="/category-view">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-info"><a href="/category-view"><img src="/website/images/logo.png" alt="logo"></a>
                        <ul class="footer-count">
                            <li>
                                <h5>929,238</h5>
                                <p>Registered Users</p>
                            </li>
                            <li>
                                <h5>242,789</h5>
                                <p>Community Ads</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="footer-card-content">
                        <div class="footer-payment"><a href="/category-view"><img src="/website/images/pay-card/01.jpg" alt="01"></a><a
                                href="/category-view"><img src="/website/images/pay-card/02.jpg" alt="02"></a><a href="/category-view"><img src="/website/images/pay-card/03.jpg" alt="03"></a><a href="/category-view"><img
                                    src="/website/images/pay-card/04.jpg" alt="04"></a></div>
                        <div class="footer-option"></div>
                        <div class="footer-app"><a href="/category-view"><img src="/website/images/play-store.png" alt="play-store"></a><a
                                href="/category-view"><img src="/website/images/app-store.png" alt="app-store"></a></div>
                    </div>
                </div>
            </div> -->
        </div>
        <div style="background: linear-gradient(to right, rgb(52 70 89 / 70%), rgb(0 0 0 / 70%))!important;color:#000 !important;" class="footer-end">
            <div class="container">
                <div class="footer-end-content">
                    <p style="color:#fff;">{{$language[137][session()->get('lang')]}}</p>
                    <ul class="social-transparent footer-social">
                        <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a target="_blank" href="{{$settings->google_plus}}"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a target="_blank" href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                        <!-- <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-pinterest-p"></i></a></li> -->
                        <li><a target="_blank" href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                        <!-- <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-dribbble"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="/website/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/website/js/vendor/popper.min.js"></script>
    <script src="/website/js/vendor/bootstrap.min.js"></script>
    <script src="/website/js/vendor/slick.min.js"></script>
    <!-- <script src="/website/js/custom/slick.js"></script> -->
    <script src="/website/js/custom/main.js"></script>
    <!-- <script>
$( document ).ready(function() {
    var viewMode = getCookie("view-mode");
if(viewMode == "desktop"){
    console.log("desktop");
    viewport.setAttribute('content', 'width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no');
}else if (viewMode == "mobile"){
    viewport.setAttribute('content', 'width=1300');
    console.log("mobile");
}
});
</script> -->
    <script>
    $('#headercategory').change(function(){
        var id = $('#headercategory').val();
        $.ajax({
            url : '/get-sub-category/'+id,
            type: "GET",
            success: function(data)
            {
                $('#headersubcategory').html(data);
            }
        });
    });
    </script>
@yield('extra-js')
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
// $( document ).ready(function() {
// $('#:2.container').hide();
// });
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'ar,en',}, 'google_translate_element');
    // }
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({pageLanguage:'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    // }
    // function googleTranslateElementInit() {
    //   new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    // }

	// function triggerHtmlEvent(element, eventName) {
	//   var event;
	//   if (document.createEvent) {
	// 	event = document.createEvent('HTMLEvents');
	// 	event.initEvent(eventName, true, true);
	// 	element.dispatchEvent(event);
	//   } else {
	// 	event = document.createEventObject();
	// 	event.eventType = eventName;
	// 	element.fireEvent('on' + event.eventType, event);
	//   }
	// }

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
    }

    function translateLanguage(lang) {
        // googleTranslateElementInit();
        // if(lang == 'Arabic'){
        //     $("html").children().css("direction","rtl");
        // }
        // else{
        //     $("html").children().css("direction","ltr");
        //     location.reload();
        // }
        var lang1;
        if(lang == 'English'){
            lang1='english';
        }
        else{
            lang1='arabic';
        }
        $.ajax({
            url : '/update-language/'+lang1,
            type: "GET",
            success: function(data)
            {
                googleTranslateElementInit();
                location.reload();
            }
        });
        var $frame = $('.goog-te-menu-frame:first');
        if (!$frame.size()) {
            alert("Error: Could not find Google translate frame.");
            return false;
        }
        $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
        return false;
    }

    function updateLanguage(lang) {
        $.ajax({
            url : '/update-language/'+lang,
            type: "GET",
            success: function(data)
            {
                location.reload();
            }
        });
    }

	// jQuery('.lang-select').click(function() {
	//   var theLang = jQuery(this).attr('data-lang');
	//   jQuery('.goog-te-combo').val(theLang);

	//   //alert(jQuery(this).attr('href'));
    // //   if(jQuery(this).attr('href') == '#googtrans(en|ar)'){
    // //     $("html").children().css("direction","rtl");
    // //   }
    // //   else{
    // //     $("html").children().css("direction","ltr");
    // //   }
	//   window.location = jQuery(this).attr('href');
	//   location.reload();

	// });

function SaveEmail(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#news-form')[0]);
    $.ajax({
        url : '/save-newsletter-mail',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Your Email Id Stored Successfully',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#news-form")[0].reset();
                    location.reload();
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
        }
    });
}
function SearchPost(){
    var search = $('#headersearch').val();
    var category = $('#headercategory').val();
    var subcategory = $('#headersubcategory').val();
    var city = $('#headercity').val();
    var search1;
    var category1;
    var subcategory1;
    var city1;

    if(search!=""){
        search1 = search;
    }else{
        search1 = '0';
    }
    if(category!=""){
        category1 = category;
    }else{
        category1 = '0';
    }
    if(subcategory!=""){
        subcategory1 = subcategory;
    }else{
        subcategory1 = '0';
    }
    if(city!=""){
        city1 = city;
    }else{
        city1 = '0';
    }
    window.location.href = "/search-post/"+search1+'/'+city1+'/'+category1+'/'+subcategory1+'/0';
}
</script>


@if(session()->get('dir') == 'rtl')
<script>
$( document ).ready(function(){
console.log("ready!");
$(".suggest-slider").slick({rtl:true});
$(".feature-slider").slick({rtl:true});
$(".recomend-slider").slick({rtl:true});
$(".blog-slider").slick({rtl:true});
$(".feature-item-slider").slick({rtl:true});
$(".ad-details-slider").slick({rtl:true});
$(".ad-thumb-slider").slick({rtl:true});
});
</script>
@endif


@if(session()->get('lang') == 'english')
<script>
$( document ).ready(function(){
console.log("ready!");
$(".suggest-slider").slick({dots:!1,infinite:!0,autoplay:!0,arrows:!0,speed:1e3,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',slidesToShow:6,slidesToScroll:3,responsive:[{breakpoint:1200,settings:{slidesToShow:5,slidesToScroll:5}},{breakpoint:992,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:3,arrows:!1}},{breakpoint:451,settings:{slidesToShow:2,slidesToScroll:2,arrows:!1}}]}),
$(".feature-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!1,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1199,settings:{slidesToShow:3,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1}}]}),
$(".recomend-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".blog-slider").slick({dots:!1,infinite:!0,speed:800,autoplay:!0,arrows:!0,fade:!1,slidesToShow:3,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".feature-item-slider").slick({slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,asNavFor:".feature-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".feature-thumb-slider").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".feature-item-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),
$(".ad-details-slider").slick({slidesToShow:1,slidesToScroll:1,autoplay:!0,arrows:!0,fade:!0,asNavFor:".ad-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),
$(".ad-thumb-slider").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".ad-details-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),$(".ad-details-feature").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:1,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".related-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]});
});
</script>
@elseif(session()->get('lang') == 'arabic')
<script>
$( document ).ready(function() {
console.log( "ready!" );
$(".suggest-slider").slick({rtl:true,dots:!1,infinite:!0,autoplay:!0,arrows:!0,speed:1e3,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',slidesToShow:6,slidesToScroll:3,responsive:[{breakpoint:1200,settings:{slidesToShow:5,slidesToScroll:5}},{breakpoint:992,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:3,arrows:!1}},{breakpoint:451,settings:{slidesToShow:2,slidesToScroll:2,arrows:!1}}]}),
$(".feature-slider").slick({rtl:true,dots:!1,infinite:!0,speed:1e3,autoplay:!1,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1199,settings:{slidesToShow:3,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1}}]}),
$(".recomend-slider").slick({rtl:true,dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".blog-slider").slick({rtl:true,dots:!1,infinite:!0,speed:800,autoplay:!0,arrows:!0,fade:!1,slidesToShow:3,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".feature-item-slider").slick({rtl:true,slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,asNavFor:".feature-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".feature-thumb-slider").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".feature-item-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),
$(".ad-details-slider").slick({rtl:true,slidesToShow:1,slidesToScroll:1,autoplay:!0,arrows:!0,fade:!0,asNavFor:".ad-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),
$(".ad-thumb-slider").slick({rtl:true,slidesToShow:3,slidesToScroll:1,asNavFor:".ad-details-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),$(".ad-details-feature").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:1,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".related-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]});

});
</script>
@else 
<script>
$( document ).ready(function(){
console.log("ready!");
$(".suggest-slider").slick({dots:!1,infinite:!0,autoplay:!0,arrows:!0,speed:1e3,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',slidesToShow:6,slidesToScroll:3,responsive:[{breakpoint:1200,settings:{slidesToShow:5,slidesToScroll:5}},{breakpoint:992,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:3,arrows:!1}},{breakpoint:451,settings:{slidesToShow:2,slidesToScroll:2,arrows:!1}}]}),
$(".feature-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!1,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1199,settings:{slidesToShow:3,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1,infinite:!0,dots:!0}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1}}]}),
$(".recomend-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".blog-slider").slick({dots:!1,infinite:!0,speed:800,autoplay:!0,arrows:!0,fade:!1,slidesToShow:3,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!0}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]}),
$(".feature-item-slider").slick({slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,asNavFor:".feature-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".feature-thumb-slider").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".feature-item-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),
$(".ad-details-slider").slick({slidesToShow:1,slidesToScroll:1,autoplay:!0,arrows:!0,fade:!0,asNavFor:".ad-thumb-slider",prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),
$(".ad-thumb-slider").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".ad-details-slider",dots:!1,arrows:!1,autoplay:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:576,settings:{slidesToShow:3,slidesToScroll:1,arrows:!1}},{breakpoint:400,settings:{slidesToShow:2,slidesToScroll:1,arrows:!1}}]}),$(".ad-details-feature").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:1,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,arrows:!1}}]}),$(".related-slider").slick({dots:!1,infinite:!0,speed:1e3,autoplay:!0,arrows:!0,fade:!1,slidesToShow:4,slidesToScroll:1,prevArrow:'<i class="fas fa-long-arrow-alt-right dandik"></i>',nextArrow:'<i class="fas fa-long-arrow-alt-left bamdik"></i>',responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,variableWidth:!0,arrows:!1}}]});
});
</script>
@endif
<script>
$('input').keydown( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if(key == 13) {
        e.preventDefault();
    }
});
$('#headersearch').keydown( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if(key == 13) {
        //e.preventDefault();
        SearchPost();
    }
});
$('#search').keydown( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if(key == 13) {
        //e.preventDefault();
        SearchPost();
    }
});
</script>
</body>
</html>