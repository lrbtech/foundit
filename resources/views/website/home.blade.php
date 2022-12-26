@extends('website.layout')
@section('section')
<style>
.home-search{
    border-radius: 0px;
    border: none;
    padding: 14.5px 31px;
    width: 100%;
}

.search-sec .form-control{
    margin-right: 5px;
    border-radius: 10px 0px 0px 10px;
}

/* .marcus .form-control {
    width: 95%;
} */

.search-sec{
    background: rgb(216 216 216 / 50%);
    padding: 20px;
    margin: 0 auto;
}

.blog-part{
    padding: 65px 0px 0 0!important;
}

@media screen and (max-width: 678px){
    .marcus .form-control {
    width: 100%;
    margin-bottom: 10px;
}
.search-sec .form-control{
    margin-right: 5px;
    border-radius: 0px 0px 0px 0px;
}
}

.banner-part {
    background: url(/upload_files/{{$settings->header_banner}}) !important;
    background-repeat: no-repeat !important;
    background-position: center !important;
    background-size: cover !important;
    padding: 75px 0px 150px;
    position: relative;
    z-index: 1;
}

.search-sec .form-control{
    color: #777777!important;
    font-size: 15px!important;
}

</style>
<section class="banner-part">
        <div class="container">
            <div class="banner-content">
                <h1>{{$language[138][session()->get('lang')]}}!</h1>
               <!--  <p>The best place to find everything in the UAE | Classifieds | Ads. Currently it says Found iT</p><a href="leftbar-list.html" class="btn btn-outline"><i
                        class="fas fa-eye"></i><span>Show all ads</span></a> -->

<section class="search-sec col-lg-10 offset-1 col-sm-10">
    <div class="container">
        <form action="#" method="get" novalidate="novalidate">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- <div class="col-lg-10 col-md-3 col-sm-12 p-0 marcus">
                            <input type="text" class="form-control search-slt" placeholder="Search for anything">
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 text-left marcus">
                            <button type="button" class="btn btn-inline home-search">Search</button>
                        </div> -->

                <!-- <form class="banner-search"> -->
                    <div class="banner-main-search">
                        <div class="col-lg-10 col-md-9 col-sm-12 p-0 marcus">
                            <input autocomplete="off" name="search" id="search" type="text" class="form-control" placeholder="{{$language[139][session()->get('lang')]}}">
                            <!-- {{$language[139][session()->get('lang')]}} -->
                            <button type="button" class="banner-option-btn tooltip">
                            <i class="fas fa-sliders-h"></i>
                            <span class="tooltext left">FilterOption</span></button>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 p-0 text-left marcus">
                        <button onclick="SearchPost1()" type="button" class="btn btn-inline home-search">{{$language[121][session()->get('lang')]}}</button>
                    </div>

                    <div class="banner-search-option" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="city" id="city" class="form-control custom-select">
                                        <option value="">{{$language[118][session()->get('lang')]}}*</option>
                                        @foreach($city as $row)
                                        <option value="{{$row->id}}">{{$row->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="category" id="category" class="form-control custom-select">
                                        <option value="">{{$language[119][session()->get('lang')]}}(s)*</option>
                                        @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="subcategory" id="subcategory" class="form-control custom-select">
                                        <option value="">{{$language[120][session()->get('lang')]}}(s)*</option>
                                        @foreach($subcategory as $row)
                                        <option value="{{$row->id}}">{{$row->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-btn">
                                    <button onclick="SearchPost1()" type="button" class="btn btn-inline"><i class="fas fa-search"></i><span>{{$language[121][session()->get('lang')]}}</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->


                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

            </div>
        </div>
    </section>

    <section class="suggest-part">
        <div class="container">
            <div class="suggest-slider slider-arrow">
                @foreach($category as $row)
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/upload_files/{{$row->image}}" alt="{{$row->category}}"></div>
                    <div class="suggest-meta">
                        <h6><a class="translate" href="/category-post/{{$row->id}}">{{ \App\Http\Controllers\HomeController::langchange($row->category) }}</a></h6>
                        <p>({{ \App\Http\Controllers\HomeController::categorypostcount($row->id) }}) {{$language[57][session()->get('lang')]}}</p>
                    </div>
                </div>
                @endforeach
                <!-- <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/furniture.png" alt="furniture"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">furniture</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/properties.png" alt="house"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">properties</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/fashion.png" alt="food"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">fashion</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/electronics.png" alt="cycle"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">electronics</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/hospitality.png" alt="clothes"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">hospitality</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/gadgets.png" alt="computer"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">gadgets</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/education.png" alt="phone"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">education</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/software.png" alt="scooter"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">software</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/food.png" alt="television"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">food</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/services.png" alt="truck"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">services</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div>
                <div class="suggest-card">
                    <div class="suggest-img"><img src="/website/images/suggest/animals.png" alt="pet"></div>
                    <div class="suggest-meta">
                        <h6><a href="javascript:void(0)">animals</a></h6>
                        <p>(4,521) ads</p>
                    </div>
                </div> -->
            </div>

<div class="row">
   <div class="col-lg-12">
      <div class="center-20"><a href="/category-list" class="btn btn-inline"><i class="fas fa-eye"></i><span>{{$language[140][session()->get('lang')]}}</span></a>
      </div>
   </div>
</div>
        </div>
    </section>

<div class="left-ad" style="float:left;margin-top:900px;padding-left:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif                       
</div>
<div class="right-ad" style="float:right;margin-top:900px;padding-right:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif
</div>
    @if(count($popular_ads) > 0)
    <section class="translate section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>{{$language[141][session()->get('lang')]}}</h2>
                        <p>{{$language[142][session()->get('lang')]}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        <!-- <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/01.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        @foreach($popular_ads as $row)
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/upload_image/{{$row->image}}) no-repeat center; background-size:cover;">
                                    <!-- <i class="cross-badge fas fa-bolt"></i> -->
                                    <!-- <span class="flat-badge rent">rent</span> -->
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>{{$row->view_count}}</p>
                                        </li>
                                        <!-- <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li> -->
                                        <li><i class="fas fa-star"></i>
                                            <p>{{ \App\Http\Controllers\HomeController::postaveragerating($row->id) }}</</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->subcategory) }}</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="/view-post/{{$row->id}}">{{ \App\Http\Controllers\HomeController::langchange($row->title) }}</a></h5>
                                    <ul class="product-location">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i>
                                            <p>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  {{$row->price}}</h5><span> / {{ \App\Http\Controllers\HomeController::langchange($row->price_condition) }}</span>
                                    </div>
                                    <ul class="product-widget">
                                        <!-- <li><a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li> -->
                                        <!-- <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li> -->
                                        {{ \App\Http\Controllers\HomeController::viewfavourite($row->id) }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="center-50">
                        <a href="leftbar-list.html" class="btn btn-inline">
                        <i class="fas fa-eye"></i><span>view all recommend</span></a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    @endif

    <!-- <div style="margin-top:30px;margin-bottom:-30px;" class="col-md-12">
        @if($google_ads->image_728_90 != '')
        <center><img src="/ads_image/{{$google_ads->image_728_90}}"></center>
        @else
        <center><img src="https://via.placeholder.com/728x90"></center>
        @endif
    </div> -->

<!-- <div class="left-ad" style="float:left;margin-top:200px;padding-left:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif                       
</div>
<div class="right-ad" style="float:right;margin-top:200px;padding-right:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif
</div> -->
    @if(count($popular_ads_category) > 0)
    <section class="translate section trend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>{{$language[143][session()->get('lang')]}} 
                            <!-- <span>Ads</span> -->
                        </h2>
                        <p>{{$language[144][session()->get('lang')]}}</p>
                    </div>
                </div>
            </div>
            
            @foreach($popular_ads_category as $row)
            <div class="row">
                <div class="col-lg-12">
                <h3 class="sub-heads">Popular in <span>{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</span></h3>
                    <div class="recomend-slider slider-arrow">
                        {{ \App\Http\Controllers\CategoryController::popular_ads($row->category) }}
                        <!-- <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/01.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-title">
                                    <h5>
                                        <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect elit</a>
                                    </h5>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li>
                                            <a href="compare.html" class="tooltip"><i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span></a>
                                        </li>
                                        <li>
                                            <button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="emty-spc"></div>
            <!-- <div style="margin-top:0px;margin-bottom:0px;" class="col-md-12">
                @if($google_ads->image_728_90 != '')
                <center><img src="/ads_image/{{$google_ads->image_728_90}}"></center>
                @else
                <center><img src="https://via.placeholder.com/728x90"></center>
                @endif
            </div> -->
            @endforeach

        </div>

    </section>
    @endif

    <!-- <section class="section trend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Popular <span>Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/01.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">Cars</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Cars</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/per day</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/02.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Property</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/03.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Electronics</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/04.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/05.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/06.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Education</a></li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/per hour</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20"><a href="leftbar-list.html" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all Popular</span></a></div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="section feature-part">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <div class="section-side-heading">
                        <h2>Find your needs in our best <span>Featured Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur fugiat eaque alias nobis doloremque culpa nam.
                        </p><a href="leftbar-list.html" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all
                                featured</span></a>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7">
                    <div class="feature-item-slider slider-arrow">
                        <div class="feature-card">
                            <div class="feature-img"><a href="javascript:void(0)"><img src="/website/images/product/10.jpg" alt="feature"></a>
                            </div>
                            <div class="feature-badge">
                                <p>Featured</p>
                            </div>
                            <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button>
                            </div>
                            <div class="feature-content">
                                <ol class="breadcrumb">
                                    <li><span class="feature-cate rent">Rent</span></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Private Car</li>
                                </ol>
                                <div class="feature-title">
                                    <h3><a href="javascript:void(0)">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor
                                            sit amet.</a></h3>
                                </div>
                                <ul class="feature-meta">
                                    <li><span>AED  1200 <small>/Monthly</small></span></li>
                                    <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-img"><a href="javascript:void(0)"><img src="/website/images/product/01.jpg" alt="feature"></a>
                            </div>
                            <div class="feature-badge">
                                <p>Featured</p>
                            </div>
                            <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button>
                            </div>
                            <div class="feature-content">
                                <ol class="breadcrumb">
                                    <li><span class="feature-cate booking">Booking</span></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Property</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">House</li>
                                </ol>
                                <div class="feature-title">
                                    <h3><a href="javascript:void(0)">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor
                                            sit amet.</a></h3>
                                </div>
                                <ul class="feature-meta">
                                    <li><span>AED  800 <small>/Per Day</small></span></li>
                                    <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-img"><a href="javascript:void(0)"><img src="/website/images/product/08.jpg" alt="feature"></a>
                            </div>
                            <div class="feature-badge">
                                <p>Featured</p>
                            </div>
                            <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button>
                            </div>
                            <div class="feature-content">
                                <ol class="breadcrumb">
                                    <li><span class="feature-cate sale">sale</span></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Iphone</li>
                                </ol>
                                <div class="feature-title">
                                    <h3><a href="javascript:void(0)">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor
                                            sit amet.</a></h3>
                                </div>
                                <ul class="feature-meta">
                                    <li><span>AED  1150 <small>/Negotiable</small></span></li>
                                    <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-img"><a href="javascript:void(0)"><img src="/website/images/product/06.jpg" alt="feature"></a>
                            </div>
                            <div class="feature-badge">
                                <p>Featured</p>
                            </div>
                            <div class="feature-bookmark"><button type="button"><i class="fas fa-heart"></i></button>
                            </div>
                            <div class="feature-content">
                                <ol class="breadcrumb">
                                    <li><span class="feature-cate sale">Sale</span></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cycle</li>
                                </ol>
                                <div class="feature-title">
                                    <h3><a href="javascript:void(0)">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum dolor
                                            sit amet.</a></h3>
                                </div>
                                <ul class="feature-meta">
                                    <li><span>AED  455 <small>/Fixed</small></span></li>
                                    <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="feature-thumb-slider">
                        <div><img src="/website/images/product/10.jpg" alt="feature"></div>
                        <div><img src="/website/images/product/01.jpg" alt="feature"></div>
                        <div><img src="/website/images/product/08.jpg" alt="feature"></div>
                        <div><img src="/website/images/product/06.jpg" alt="feature"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Wow <span>Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/01.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/03.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Stationary</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">books</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  470</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/10.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">private car</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  3300</h5><span>/per month</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/09.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">animals</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">cat</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  900</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/02.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">fashion</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">shoes</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  460</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50"><a href="leftbar-list.html" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all recommend</span></a></div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section trend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Popular Trending <span>Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/01.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">booking</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">property</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">house</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/per day</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/02.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">fashion</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shoes</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/03.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">stationary</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">book</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/04.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">electronics</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">television</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/05.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">headphone</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                style="background:url(/website/images/product/06.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li><i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li><i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li><i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cycle</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                        elit</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>AED  970</h5><span>/per hour</span>
                                </div>
                                <ul class="product-widget">
                                    <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                class="tooltext top">compare</span></a></li>
                                    <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                class="tooltext top">bookmark</span></button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20"><a href="leftbar-list.html" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all trend</span></a></div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section niche-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Browse Our Top <span>Niche</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="niche-nav">
                        <ul class="nav nav-tabs">
                            <li><a href="#ratings" class="nav-link active" data-toggle="tab">top ratings</a></li>
                            <li><a href="#advertiser" class="nav-link" data-toggle="tab">top advertiser</a></li>
                            <li><a href="#engaged" class="nav-link" data-toggle="tab">top engaged</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="ratings">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/07.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">resort</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/08.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">mobile</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/09.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">animal</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">cat</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/10.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">private car</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per month</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/11.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/13.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">electronics</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">laptop</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/14.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">bike</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per hour</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/15.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">camera</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="advertiser">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/08.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">mobile</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/07.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">resort</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/10.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">private car</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per month</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i>
                                        <span class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i>
                                        <span class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/09.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">animal</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">cat</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/13.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">electronics</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">laptop</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/11.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/15.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">camera</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/14.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">bike</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per hour</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="engaged">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/09.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">animal</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">cat</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/08.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">mobile</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/07.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">resort</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per Day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/11.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span
                                        class="flat-badge booking">booking</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Luxury</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per day</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/10.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">private car</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per month</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/15.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">camera</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Negotiable</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/13.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">sale</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">electronics</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">laptop</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/fixed</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/website/images/product/14.jpg) no-repeat center; background-size:cover;">
                                    <i class="cross-badge fas fa-bolt"></i><span class="flat-badge rent">rent</span>
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag"><i class="fas fa-tags"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">bike</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing
                                            elit</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>Uttara, Dhaka</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>30 min ago!</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  1500</h5><span>/Per hour</span>
                                    </div>
                                    <ul class="product-widget">
                                        <li><a href="compare.html" class="tooltip"><i class="fas fa-compress"></i><span
                                                    class="tooltext top">compare</span></a></li>
                                        <li><button class="tooltip"><i class="far fa-heart"></i><span
                                                    class="tooltext top">bookmark</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20"><a href="leftbar-list.html" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all ads</span></a></div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section city-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Top Cities by <span>Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="city-card"
                        style="background:url(https://lp-cms-production.imgix.net/2020-09/shutterstockRF_1322064746.jpg?auto=format&fit=crop&sharp=10&vib=20&ixlib=react-8.6.4&w=850) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Abu Dhabi</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="city-card"
                        style="background:url(/website/images/cities/01.jpg) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Dubai</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <div class="city-card"
                        style="background:url(http://www.gulftoday.ae/-/media/gulf-today/images/articles/opinion/2019/11/3/sharjah-city.ashx?h=450&w=750&hash=A6564D1B97BAC18949E2B70C5596A392) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Sharjah</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <div class="city-card"
                        style="background:url(https://radissonhotels.iceportal.com/image/radisson-blu-resort-fujairah/exteriorview/16256-114236-f62766362_3xl.jpg) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Fujairah</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="city-card"
                        style="background:url(https://blog.dubizzle.com/uae/wp-content/uploads/sites/15/2017/11/Untitled-design-42.jpg) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Ajman</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="city-card"
                        style="background:url(https://images.khaleejtimes.com/storyimage/KT/20190515/ARTICLE/190519510/AR/0/AR-190519510.jpg&MaxW=780&imageVersion=16by9&NCS_modified=20190515183257) no-repeat center; background-size:cover">
                        <h5><a href="leftbar-list.html">Ra's al-Khaimah</a></h5>
                        <p>(25) ads</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section category-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Top Categories by <span>Ads</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/electronics.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>electronics</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>television</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>Generetor</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>Washing machine</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>air condition</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>iron</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/gadgets.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>gadgets</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>computer</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>mobile</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>camera</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dron</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>airphone</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/furnitures.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>furnitures</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/animals.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>animals</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/fashions.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>fashions</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>jeans</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>underware</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>shirt</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>jacket</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>shorts</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/motorbikes.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>motorbikes</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/properties.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>properties</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/automobiles.jpg) no-repeat center; background-size:cover">
                            <a href="javascript:void(0)">
                                <h4>automobiles</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list">
                            <li><a href="javascript:void(0)">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="javascript:void(0)">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20"><a href="/" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all categories</span></a></div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="intro-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Do you have something to advertise?</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p><a href="ad-post.html"
                            class="btn btn-outline"><i class="fas fa-plus-circle"></i><span>post your ad</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="price-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Best Reliable Pricing Plans</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div class="price-head"><i class="flaticon-bicycle"></i>
                            <h3>AED  00</h3>
                            <h4>Free Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>1 Regular Ad for 7 days</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Credit card required</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Top or Featured Ad</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Ad will be bumped up</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Limited Support</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head"><i class="flaticon-car-wash"></i>
                            <h3>AED  23</h3>
                            <h4>Standard Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>1 Recom Ad for 30 days</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Featured Ad Available</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Ad will be bumped up</p>
                            </li>
                            <li><i class="fas fa-times"></i>
                                <p>No Top Ad Available</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Basic Support</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div class="price-head"><i class="flaticon-airplane"></i>
                            <h3>AED  49</h3>
                            <h4>Premium Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>1 Featured Ad for 60 days</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to All features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>With Recommended</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Ad Top Category</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Priority Support</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- <div class="left-ad" style="float:left;margin-top:200px;padding-left:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif                       
</div>
<div class="right-ad" style="float:right;margin-top:200px;padding-right:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif
</div> -->

    <section class="blog-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>{{$language[145][session()->get('lang')]}}</h2>
                        <p>{{$language[146][session()->get('lang')]}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="translate blog-slider slider-arrow">
                        <!-- <div class="blog-card">
                            <div class="blog-img"><img src="/website/images/blog/01.jpg" alt="blog">
                                <div class="blog-overlay"><span class="marketing">Marketing</span></div>
                            </div>
                            <div class="blog-content"><a href="javascript:void(0)" class="blog-avatar"><img src="/website/images/avatar/01.jpg"
                                        alt="avatar"></a>
                                <ul class="blog-meta">
                                    <li><i class="fas fa-user"></i>
                                        <p><a href="javascript:void(0)">MironMahmud</a></p>
                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>02 Feb 2021</p>
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    <h4><a href="javascript:void(0)">Lorem ipsum dolor sit amet eius minus elit cum quaerat volupt.</a>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad
                                        dolore labore laborum perspiciatis...</p>
                                </div><a href="javascript:void(0)" class="blog-read"><span>read more</span><i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div> -->
                        @foreach($blog as $row)
                        <div class="blog-card">
                            <div class="blog-img">
                                <img src="/upload_files/{{$row->image}}" alt="blog">
                                <!-- <div class="blog-overlay">
                                    <span class="advertise">advertise</span>
                                </div> -->
                            </div>
                            <div class="blog-content">
                                <!-- <a href="javascript:void(0)" class="blog-avatar">
                                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">
                                </a> -->
                                <ul class="blog-meta">
                                    <!-- <li><i class="fas fa-user"></i>
                                        <p><a href="javascript:void(0)">{{$row->title}}</a></p>
                                    </li> -->
                                    <li><i class="fas fa-clock"></i>
                                        <p>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    <h4>
                                        <a href="javascript:void(0)">{{ \App\Http\Controllers\HomeController::langchange($row->title) }}</a>
                                    </h4>
                                    <p>{{ \App\Http\Controllers\HomeController::langchange(substr($row->description,0,100)) }}</p>
                                </div>
                                <a href="/view-blog/{{$row->id}}" class="blog-read">
                                    <span>{{ \App\Http\Controllers\HomeController::langchange('read more') }}</span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="blog-btn"><a href="blog-list.html" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all blogs</span></a></div>
                </div>
            </div> -->
        </div>
    </section>
    <div style="margin-top:30px;margin-bottom:0px;" class="row center_image">
        <div class="col-lg-12">
            @if($google_ads->image_728_90 != '')
            <div class="center-20"><img class="ad_728_image" src="/ads_image/{{$google_ads->image_728_90}}"></div>
            @else
            <div class="center-20"><img class="ad_728_image" src="https://via.placeholder.com/728x90"></div>
            @endif
        </div>
    </div>
@endsection
@section('extra-js')
<script>
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

function SaveFavourite(id){
    $.ajax({
        url : '/customer/save-favourite-post/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Bookmark Saved',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    location.reload();
                }
            }) 
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                //toastr.error(obj[0]);
                Swal.fire({
                    text: obj[0],
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(data);
                        location.reload();
                    }
                }) 
            });
        }
    });
}

function DeleteFavourite(id){
    $.ajax({
        url : '/customer/delete-favourite-post/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Bookmark Deleted',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    location.reload();
                }
            }) 
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                //toastr.error(obj[0]);
                Swal.fire({
                    text: obj[0],
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(data);
                        location.reload();
                    }
                }) 
            });
        }
    });
}

function SearchPost1(){
    var search = $('#search').val();
    var category = $('#category').val();
    var subcategory = $('#subcategory').val();
    var city = $('#city').val();
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
@endsection