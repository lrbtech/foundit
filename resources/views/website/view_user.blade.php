@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/category-details.css">
<link rel="stylesheet" href="/website/css/custom/rightbar-details.css">
<style>
.section-trends{
    padding: 30px 0 55px 0px;
}
</style>
<style>
.single-banner {
    /* background: url(../../images/bg/01.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover; */
    padding: 20px 0px !important;
    /* position: relative;
    z-index: 1; */
}
</style>
@endsection
@section('section')

<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>{{$language[102][session()->get('lang')]}}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/category-list">{{$language[102][session()->get('lang')]}}</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">category details</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="margin-top:-50px;" class="ad-list-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-filter">
                    <div class="product-page-number">
                        <p>Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} results</p>
                    </div>
                    <!-- <select class="product-short-select custom-select">
                        <option selected>Short by Best Sell</option>
                        <option value="1">Short by New Item</option>
                        <option value="2">Short by Popularity</option>
                        <option value="3">Short by Average review</option>
                    </select> -->
                    <ul class="product-card-type">
                        <li class="grid-verti active"><i class="fas fa-grip-vertical"></i></li>
                        <li class="grid-hori"><i class="fas fa-grip-horizontal"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row content-reverse">
            <div class="col-lg-4">
                <div class="ad-details-card">
                    <div class="ad-details-title">
                        <h5>{{$language[86][session()->get('lang')]}}</h5>
                    </div>
                    <div class="ad-details-profile">
                        <div class="author-img">
                            @if($user->profile_image == '')
                            <a href="/view-user/{{$user->id}}"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" ></a>
                            @else 
                            <a href="/view-user/{{$user->id}}"><img src="/upload_profile_image/{{$user->profile_image}}" ></a>
                            <span class="author-status"></span>
                            @endif
                        </div>
                        <div class="author-intro translate">
                            <h4><a href="/view-user/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a></h4>
                            <!-- <h5>new seller</h5>
                            <p>Corporis dolore libero temporibus minus tempora quia voluptas nesciunt.</p> -->
                        </div>
                        <!-- <ul class="author-widget">
                            <li><a href="#"><i class="fas fa-phone-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                        </ul> -->
                        <ul class="author-list">
                            <li>
                                <h6>{{$language[87][session()->get('lang')]}}</h6>
                                <p>{{$author_total_ads}}</p>
                            </li>
                            <li>
                                <h6>{{$language[88][session()->get('lang')]}}</h6>
                                <p>{{$author_reviews_count}}</p>
                            </li>
                            <li>
                                <h6>{{$language[83][session()->get('lang')]}}</h6>
                                <p>{{$author_bookmark}}</p>
                            </li>
                        </ul>
                        <div class="author-details translate">
                            <h6>{{$language[100][session()->get('lang')]}}:{{ \App\Http\Controllers\HomeController::humanreadtime($user->created_at) }}</h6>
                            <!-- <h6>address:{{$user->address}}</h6> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6 col-lg-12">
                        <div class="product-sidebar">
                            <div class="product-sidebar-title">
                                <h6>Filter by type</h6>
                            </div>
                            <div class="product-sidebar-content">
                                <ul class="product-sidebar-list">
                                    <li><input type="checkbox" id="typ1"><label for="typ1">sales</label></li>
                                    <li><input type="checkbox" id="typ2"><label for="typ2">rental</label></li>
                                    <li><input type="checkbox" id="typ3"><label for="typ3">booking</label></li>
                                </ul><button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear
                                        Filter</span></button>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-lg-12">
                        <div class="product-sidebar">
                            <div class="product-sidebar-title">
                                <h6>{{$language[78][session()->get('lang')]}}</h6>
                            </div>
                            <div class="product-sidebar-content">
                                <!-- <div class="product-sidebar-search">
                                    <input type="text" placeholder="Search">
                                </div> -->
                                <ul class="product-sidebar-list widget translate">
                                    @foreach($city as $row)
                                    <li>
                                        <!-- <input type="checkbox" id="cit1"> -->
                                        <label for="cit1">
                                            <a href="/city-post/{{$row->id}}">
                                            <span>{{ \App\Http\Controllers\HomeController::langchange($row->city) }}</span>
                                            </a>
                                            <span>({{ \App\Http\Controllers\HomeController::citypostcount($row->id) }})</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Filter</span></button> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-lg-12">
                        <div class="product-sidebar">
                            <div class="product-sidebar-title">
                                <h6>Filter by tags</h6>
                            </div>
                            <div class="product-sidebar-content">
                                <div class="product-sidebar-search"><input type="text" placeholder="Search"></div>
                                <ul class="product-sidebar-list widget">
                                    <li><input type="checkbox" id="tag1"><label for="tag1"><span>private
                                                car</span><span>(13)</span></label></li>
                                    <li><input type="checkbox" id="tag2"><label
                                            for="tag2"><span>motorbike</span><span>(28)</span></label></li>
                                    <li><input type="checkbox" id="tag3"><label for="tag3"><span>ladies
                                                bag</span><span>(35)</span></label></li>
                                    <li><input type="checkbox" id="tag4"><label for="tag4"><span>jeans
                                                pant</span><span>(47)</span></label></li>
                                    <li><input type="checkbox" id="tag5"><label
                                            for="tag5"><span>shoes</span><span>(59)</span></label></li>
                                    <li><input type="checkbox" id="tag6"><label
                                            for="tag6"><span>wallet</span><span>(64)</span></label></li>
                                    <li><input type="checkbox" id="tag7"><label
                                            for="tag7"><span>microphone</span><span>(19)</span></label></li>
                                </ul><button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear
                                        Filter</span></button>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-lg-12">
                        <div class="product-sidebar">
                            <div class="product-sidebar-title">
                                <h6>{{$language[79][session()->get('lang')]}}</h6>
                            </div>
                            <div class="product-sidebar-content">
                                <!-- <div class="product-sidebar-search"><input type="text" placeholder="Search"></div> -->
                                <ul id="category_view" class="nasted-dropdown translate">
                                    <!-- <li>
                                        <div class="nasted-menu">
                                            <p><span class="fas fa-tags"></span>electronics</p><i
                                                class="fas fa-chevron-down"></i>
                                        </div>
                                        <ul class="nasted-menu-list">
                                            <li><a href="#">Demo item (0)</a></li>
                                            <li><a href="#">Demo item (0)</a></li>
                                            <li><a href="#">Demo item (0)</a></li>
                                        </ul>
                                    </li> -->
                                    {{ \App\Http\Controllers\CategoryController::getsearchcategory() }}
                                </ul>
                                <!-- <button class="product-filter-btn"><i class="fas fa-broom"></i><span>Clear Filter</span></button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($post_ads as $row)
                    <div class="col-sm-6 col-md-6 col-lg-6 card-grid">
                        <div class="product-card translate">
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
                                        <li class="breadcrumb-item"><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->subcategory) }}</li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5><a href="/view-post/{{$row->id}}">{{ \App\Http\Controllers\HomeController::langchange($row->title) }}</a></h5>
                                    <ul class="product-location">
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <p>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <div class="product-price">
                                        <h5>AED  {{$row->price}}</h5><span>/{{ \App\Http\Controllers\HomeController::langchange($row->price_condition) }}</span>
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
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {!! $post_ads->links('website.pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="section-trends recomend-part">
    <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Our Featured <span>Ads</span></h2>
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
                                    <li class="breadcrumb-item"><a href="#">Luxury</a></li>
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
                                    <li class="breadcrumb-item"><a href="#">Stationary</a></li>
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
                                    <li class="breadcrumb-item"><a href="#">automobile</a></li>
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
                                    <li class="breadcrumb-item"><a href="#">animals</a></li>
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
                                    <li class="breadcrumb-item"><a href="#">fashion</a></li>
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
    </div>
</section> -->

@endsection
@section('extra-js')
<script type="text/javascript">
// homepagecategory();
// function homepagecategory()
// {
//   $.ajax({
//     url : '/get-search-category',
//     type: "GET",
//     success: function(data)
//     {
//         $('#category_view').html(data);
//     }
//   });
// }

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
</script>
@endsection