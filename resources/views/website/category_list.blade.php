@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/category-list.css">
<style>
.single-banner {
    /* background: url(../../images/bg/01.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover; */
    padding: 40px 0px !important;
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
                        <h2>{{$language[75][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[76][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="left-ad" style="float:left;margin-top:150px;padding-left:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif                       
</div>
<div class="right-ad" style="float:right;margin-top:150px;padding-right:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600">   
    @endif
</div>

    <section style="margin-top:-30px;" class="translate category-part">
    <div style="margin-top:-60px;margin-bottom:30px;" class="row center_image">
        <div class="col-lg-12">
            @if($google_ads->image_728_90 != '')
            <div class="center-20"><img class="ad_728_image" src="/ads_image/{{$google_ads->image_728_90}}"></div>
            @else
            <div class="center-20"><img class="ad_728_image" src="https://via.placeholder.com/728x90"></div>
            @endif
        </div>
    </div>
        <div class="container">
            <div id="category_view" class="row">
                <!-- <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/electronics.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>electronics</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>television</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>Generetor</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>Washing machine</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>air condition</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>iron</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/gadgets.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>gadgets</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>computer</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>mobile</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>camera</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dron</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>airphone</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/furnitures.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>furnitures</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/animals.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>animals</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/fashions.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>fashions</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>jeans</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>underware</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>shirt</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>jacket</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>shorts</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/motorbikes.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>motorbikes</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/properties.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>properties</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/automobiles.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>automobiles</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/hospitality.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>hospitality</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/agriculture.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>agriculture</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/bussiness.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>bussiness</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head"
                            style="background:url(/website/images/category/education.jpg) no-repeat center; background-size:cover">
                            <a href="/category-view">
                                <h4>education</h4>
                                <p>(3678)</p>
                            </a></div>
                        <ul class="category-list">
                            <li><a href="/category-view">
                                    <h6>dyning table</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>chair</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>sofa</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>tea table</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="/category-view">
                                    <h6>dressing table</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="center-20"><a href="/category-view" class="btn btn-inline"><i class="fas fa-eye"></i><span>show more
                                categories</span></a></div>
                </div>
            </div> -->
        </div>
    </section>
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
    </section> -->
    <!-- <section class="price-part">
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
                            <h3>$00</h3>
                            <h4>Basic Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable"><i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable"><i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head"><i class="flaticon-car-wash"></i>
                            <h3>$23</h3>
                            <h4>Standard Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable"><i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div class="price-head"><i class="flaticon-airplane"></i>
                            <h3>$49</h3>
                            <h4>Premium Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li><i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                    class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endsection
@section('extra-js')
<script type="text/javascript">
homepagecategory();
function homepagecategory()
{
  $.ajax({
    url : '/get-all-category',
    type: "GET",
    success: function(data)
    {
        $('#category_view').html(data);
    }
  });
}
</script>
@endsection