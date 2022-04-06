@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/rightbar-details.css">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9SWOYE9g7ftPs7xRubRz02TzwaOy5spA&sensor=false&libraries=places"></script>
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
                        <h2>{{$language[80][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[80][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="left-ad" style="float:left;margin-top:200px;padding-left:20px;">
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
</div>

    <section class="ad-details-part">
    <div style="margin-top:-90px;margin-bottom:30px;" class="row center_image">
        <div class="col-lg-12">
            @if($google_ads->image_728_90 != '')
            <div class="center-20"><img class="ad_728_image" src="/ads_image/{{$google_ads->image_728_90}}"></div>
            @else
            <div class="center-20"><img class="ad_728_image" src="https://via.placeholder.com/728x90"></div>
            @endif
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ad-details-card">
                        <div class="ad-details-breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li><span class="flat-badge sale">for sales</span></li> -->
                                <li class="breadcrumb-item translate"><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($post_ad->category) }}</a></li>
                                <li class="breadcrumb-item active translate" aria-current="page">{{ \App\Http\Controllers\HomeController::viewcategoryname($post_ad->subcategory) }}</li>
                            </ol>
                        </div>
                        <div class="ad-details-heading translate">
                            <h2><a href="#">{{ \App\Http\Controllers\HomeController::langchange($post_ad->title) }}</a></h2>
                        </div>
                        <ul class="ad-details-meta">
                            <li>
                                <a href="#">
                                <i class="fas fa-eye"></i>
                                <p>{{$language[81][session()->get('lang')]}}<span>({{$post_ad->view_count}})</span></p>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#"><i class="fas fa-mouse"></i>
                                    <p>click<span>(76)</span></p>
                                </a>
                            </li> -->
                            <li>
                                <a href="#"><i class="fas fa-star"></i>
                                    <p>{{$language[82][session()->get('lang')]}}<span>({{$reviews_count}})</span></p>
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-heart"></i>
                                    <p>{{$language[83][session()->get('lang')]}}<span>({{$favourite_post_count}})</span></p>
                                </a>
                            </li>
                        </ul>
                        <div class="ad-details-slider slider-arrow">
                            <div>
                                <img src="/upload_image/{{$post_ad->image}}" alt="details">
                            </div>
                            @if(count($post_image) >1)
                            @foreach($post_image as $row)
                            <div>
                                <img src="/upload_image/{{$row->image}}" alt="details">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="ad-thumb-slider">
                            <div>
                                <img style="height:90px;" src="/upload_image/{{$post_ad->image}}" alt="details">
                            </div>
                            @if(count($post_image) >1)
                            @foreach($post_image as $row)
                            <div>
                                <img style="height:90px;" src="/upload_image/{{$row->image}}" alt="details">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="ad-details-action">
                            <ul>
                                <li>
                                    <!-- <button type="button"><i class="fas fa-heart-o"></i><span>bookmark</span></button> -->
                                    @if(Auth::check())
                                        @if(empty($favourite))
                                        <button type="button" onclick="SaveFavourite({{$post_ad->id}})"><i class="far fa-heart" aria-hidden="true"></i><span>{{$language[83][session()->get('lang')]}}</span></button>
                                        @else 
                                        <button type="button" onclick="DeleteFavourite({{$favourite->id}})"><i class="fas fa-heart"></i><span>{{$language[83][session()->get('lang')]}}</span></button>
                                        @endif
                                    @endif
                                </li>
                                <!-- <li>
                                    <button type="button"><i class="fas fa-exclamation-triangle"></i><span>{{$language[90][session()->get('lang')]}}</span></button>
                                </li> -->
                                <li>
                                    <button type="button"><i class="fas fa-share-alt"></i><span>{{$language[91][session()->get('lang')]}}</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>{{$language[89][session()->get('lang')]}}</h5>
                        </div>
                        <div class="ad-details-specific translate">
                            <ul>
                                <li>
                                    <h6>{{$language[93][session()->get('lang')]}}:</h6>
                                    <p>AED {{$post_ad->price}}</p>
                                </li>
                                <li>
                                    <h6>{{$language[94][session()->get('lang')]}}:</h6>
                                    <p>
                                        @if($user->business_type == 0)
                                        personal
                                        @else
                                        business 
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <h6>{{$language[95][session()->get('lang')]}}:</h6>
                                    <p>{{ \App\Http\Controllers\HomeController::humanreadtime($post_ad->created_at) }}</p>
                                </li>
                                <li>
                                    <h6>{{$language[92][session()->get('lang')]}}:</h6>
                                    <p>{{ \App\Http\Controllers\HomeController::viewcityname($post_ad->area,$post_ad->city) }}</p>
                                </li>
                                <li>
                                    <h6>{{$language[11][session()->get('lang')]}}:</h6>
                                    <p>{{ \App\Http\Controllers\HomeController::viewcategoryname($post_ad->category) }}</p>
                                </li>
                                <li>
                                    <h6>{{$language[96][session()->get('lang')]}}:</h6>
                                    <p>{{ \App\Http\Controllers\HomeController::langchange($post_ad->item_condition) }}</p>
                                </li>
                                <li>
                                    <h6>{{$language[97][session()->get('lang')]}}:</h6>
                                    <p>{{ \App\Http\Controllers\HomeController::langchange($post_ad->price_condition) }}</p>
                                </li>
                                <!-- <li>
                                    <h6>ad type:</h6>
                                    <p>sales</p>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>{{$language[98][session()->get('lang')]}}</h5>
                        </div>
                        <div class="ad-details-descrip translate">
                            <p>
                            {{ \App\Http\Controllers\HomeController::langchange($post_ad->description) }}
                            </p>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>{{$language[82][session()->get('lang')]}} ({{$reviews_count}})</h5>
                        </div>
                        <div class="ad-details-review">
                            <ul class="review-list">
                                <!-- <li class="review-item">
                                    <div class="review">
                                        <div class="review-head">
                                            <div class="review-author">
                                                <div class="review-avatar"><a href="#"><img src="/website/images/avatar/02.jpg"
                                                            alt="review"></a></div>
                                                <div class="review-meta">
                                                    <h6><a href="#">labonno khan -</a><span>June 02, 2020</span></h6>
                                                    <ul>
                                                        <li><i class="fas fa-star active"></i></li>
                                                        <li><i class="fas fa-star active"></i></li>
                                                        <li><i class="fas fa-star active"></i></li>
                                                        <li><i class="fas fa-star active"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li>
                                                            <h5>- for product quality</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam
                                                harum ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review-head">
                                            <div class="review-author">
                                                <div class="review-avatar"><a href="#"><img src="/website/images/avatar/04.jpg"
                                                            alt="review"></a></div>
                                                <div class="review-meta">
                                                    <h6><a href="#">Miron Mahmud</a></h6>
                                                    <h6>Author - <span>June 02, 2020</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam
                                                harum ipsum dolor cumque quas magni voluptatibus cupiditate minima.</p>
                                        </div>
                                    </div>
                                </li> -->
                                @foreach($all_reviews as $row)
                                <li class="review-item">
                                    <div class="review">
                                        <div class="review-head">
                                            <div class="review-author">
                                                <div class="review-avatar">
                                                    @if($row->profile_image == '')
                                                    <a href="#"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="{{$row->name}}"></a>
                                                    @else 
                                                    <a href="#"><img src="/upload_profile_image/{{$row->profile_image}}" alt="{{$row->name}}"></a>
                                                    @endif
                                                </div>
                                                <div class="review-meta translate">
                                                    <h6><a href="#">{{ \App\Http\Controllers\HomeController::langchange($row->name) }}</a>- <span>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</span></h6>
                                                    <ul>
                                                        <?php
                                                        for($i=1;$i<=5;$i++){
                                                            if($row->rating >= $i)
                                                            {
                                                            echo '<li><i class="fas fa-star active"></i></li>';
                                                            }
                                                            else{
                                                            echo '<li><i class="fas fa-star"></i></li>';
                                                            }
                                                        }
                                                        ?>
                                                    
                                                        <li>
                                                            <h5>- {{ \App\Http\Controllers\HomeController::langchange($row->quote) }}</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-content translate">
                                            <p>{{ \App\Http\Controllers\HomeController::langchange($row->message) }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            {!! $all_reviews->links('website.pagination') !!}
                            @if(Auth::check())
                            @if(!empty($reviews))
                            <form class="ad-review-form" id="review_form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input value="{{$reviews->id}}" type="hidden" name="review_id">
                                <input value="{{$post_ad->id}}" type="hidden" name="review_post_id">
                                <div class="star-rating">
                                    <input value="5" type="radio" name="rating" id="star-1"  {{ ($reviews->rating == '5' ? ' checked' : '') }}>
                                    <label for="star-1"></label>
                                    <input {{ ($reviews->rating == '4' ? ' checked' : '') }} value="4" type="radio" name="rating" id="star-2">
                                    <label for="star-2"></label>
                                    <input {{ ($reviews->rating == '3' ? ' checked' : '') }} value="3" type="radio" name="rating" id="star-3">
                                    <label for="star-3"></label>
                                    <input {{ ($reviews->rating == '2' ? ' checked' : '') }} value="2" type="radio" name="rating" id="star-4">
                                    <label for="star-4"></label>
                                    <input {{ ($reviews->rating == '1' ? ' checked' : '') }} value="1" type="radio" name="rating" id="star-5">
                                    <label for="star-5"></label>
                                </div>
                                <div class="ad-review-form-grid translate">
                                    <div class="form-group">
                                        <input readonly value="{{$reviews->name}}" name="name" type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input readonly value="{{$reviews->email}}" name="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <select name="quote" class="form-control custom-select">
                                            <option value="">{{ \App\Http\Controllers\HomeController::langchange('Quote') }}</option>
                                            <option {{ ($reviews->quote == 'Delivery System' ? ' selected' : '') }} value="Delivery System">{{ \App\Http\Controllers\HomeController::langchange('Delivery System') }}</option>
                                            <option {{ ($reviews->quote == 'Product Quality' ? ' selected' : '') }} value="Product Quality">{{ \App\Http\Controllers\HomeController::langchange('Product Quality') }}</option>
                                            <option {{ ($reviews->quote == 'Payment Issue' ? ' selected' : '') }} value="Payment Issue">{{ \App\Http\Controllers\HomeController::langchange('Payment Issue') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group translate">
                                    <textarea name="message" class="form-control" placeholder="Describe">{{$reviews->message}}</textarea>
                                </div>
                                <button id="savereview" type="button" onclick="UpdateReview()" class="btn btn-inline translate"><i class="fas fa-tint"></i><span>{{ \App\Http\Controllers\HomeController::langchange('update your review') }}</span></button>
                            </form>
                            @else
                            <form class="ad-review-form translate" id="review_form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input value="{{$post_ad->id}}" type="hidden" name="review_post_id">
                                <div class="star-rating">
                                    <input value="5" type="radio" name="rating" id="star-1">
                                    <label for="star-1"></label>
                                    <input value="4" type="radio" name="rating" id="star-2">
                                    <label for="star-2"></label>
                                    <input value="3" type="radio" name="rating" id="star-3">
                                    <label for="star-3"></label>
                                    <input value="2" type="radio" name="rating" id="star-4">
                                    <label for="star-4"></label>
                                    <input value="1" type="radio" name="rating" id="star-5">
                                    <label for="star-5"></label>
                                </div>
                                <div class="ad-review-form-grid">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <select name="quote" class="form-control custom-select">
                                            <option value="">{{ \App\Http\Controllers\HomeController::langchange('Quote') }}</option>
                                            <option value="Delivery System">{{ \App\Http\Controllers\HomeController::langchange('Delivery System') }}</option>
                                            <option value="Product Quality">{{ \App\Http\Controllers\HomeController::langchange('Product Quality') }}</option>
                                            <option value="Payment Issue">{{ \App\Http\Controllers\HomeController::langchange('Payment Issue') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Describe"></textarea>
                                </div>
                                <button id="savereview" type="button" onclick="SaveReview()" class="btn btn-inline"><i class="fas fa-tint"></i><span>{{ \App\Http\Controllers\HomeController::langchange('drop your review') }}</span></button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div style="" class="ad-details-price translate">
                        <h5>AED  {{ \App\Http\Controllers\HomeController::langchange($post_ad->price) }}</h5>
                        <span>/ {{ \App\Http\Controllers\HomeController::langchange($post_ad->price_condition) }}</span>
                        <i class="flaticon-bargain"></i>
                    </div>
                    @if(Auth::check())
                    <button style="width:100%;" class="ad-details-number">
                        <i class="fas fa-phone-alt"></i>
                        <span style="font-size:36px;">{{ \App\Http\Controllers\HomeController::langchange($post_ad->mobile) }}</span>
                    </button>
                    @else 
                    <button style="width:100%;" onclick="Login()" class="ad-details-number">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{$language[84][session()->get('lang')]}}</span>
                    </button>
                    @endif
                    @if(Auth::check())
                        @if(Auth::user()->id != $post_ad->customer_id)
                        <button style="width:100%;" onclick="SaveChat({{$post_ad->id}})" class="ad-details-price">
                            <h5>{{$language[85][session()->get('lang')]}}</h5>
                            <!-- <span></span> -->
                            <i class="flaticon-chat"></i>
                        </button>
                        @else
                        <button style="width:100%;" onclick="YourPost()" class="ad-details-price">
                            <h5>{{$language[85][session()->get('lang')]}}</h5>
                            <!-- <span></span> -->
                            <i class="flaticon-chat"></i>
                        </button>
                        @endif
                    @else 
                    <button style="width:100%;" onclick="Login()" class="ad-details-price">
                        <h5>{{$language[85][session()->get('lang')]}}</h5>
                        <!-- <span></span> -->
                        <i class="flaticon-chat"></i>
                    </button>
                    @endif
                    <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>{{$language[86][session()->get('lang')]}}</h5>
                        </div>
                        <div class="ad-details-profile">
                            <div class="author-img">
                                @if($user->profile_image == '')
                                <a href="/view-user/{{$user->id}}"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="{{$post_ad->name}}"></a>
                                @else 
                                <a href="/view-user/{{$user->id}}"><img src="/upload_profile_image/{{$user->profile_image}}" alt="{{$post_ad->name}}"></a>
                                <span class="author-status"></span>
                                @endif
                            </div>
                            <div class="author-intro translate">
                                <h4><a href="/view-user/{{$user->id}}">{{ \App\Http\Controllers\HomeController::langchange($post_ad->name) }}</a></h4>
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
                                <h6>address:
                                {{ \App\Http\Controllers\HomeController::langchange($post_ad->address) }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>{{$language[92][session()->get('lang')]}}</h5>
                        </div>
                        <div class="ad-details-location">
                            <div class="map" id="map" style="width:100%;height:300px;"></div>
                            <!-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.3406974350205!2d90.48469931445422!3d23.663771197998262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b0d5983f048d%3A0x754f30c82bcad3cd!2sJalkuri%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1610539261654!5m2!1sen!2sbd"></iframe> -->
                        </div>
                    </div>
                    <!-- <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>safety tips</h5>
                        </div>
                        <div class="ad-details-safety">
                            <ul>
                                <li><i class="fas fa-dot-circle"></i>
                                    <p>Check the item before you buy</p>
                                </li>
                                <li><i class="fas fa-dot-circle"></i>
                                    <p>Pay only after collecting item</p>
                                </li>
                                <li><i class="fas fa-dot-circle"></i>
                                    <p>Beware of unrealistic offers</p>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="ad-details-card">
                        <div class="ad-details-title">
                            <h5>featured ads</h5>
                        </div>
                        <div class="ad-details-feature slider-arrow">
                            <div class="feature-card">
                                <div class="feature-img"><a href="#"><img src="/website/images/product/10.jpg" alt="feature"></a>
                                </div>
                                <div class="feature-badge">
                                    <p>Featured</p>
                                </div>
                                <div class="feature-bookmark"><button type="button"><i
                                            class="fas fa-heart"></i></button></div>
                                <div class="feature-content">
                                    <ol class="breadcrumb">
                                        <li><span class="feature-cate rent">Rent</span></li>
                                        <li class="breadcrumb-item"><a href="#">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Private Car</li>
                                    </ol>
                                    <div class="feature-title">
                                        <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum
                                                dolor sit amet.</a></h3>
                                    </div>
                                    <ul class="feature-meta">
                                        <li><span>AED  1200 <small>/Monthly</small></span></li>
                                        <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-img"><a href="#"><img src="/website/images/product/01.jpg" alt="feature"></a>
                                </div>
                                <div class="feature-badge">
                                    <p>Featured</p>
                                </div>
                                <div class="feature-bookmark"><button type="button"><i
                                            class="fas fa-heart"></i></button></div>
                                <div class="feature-content">
                                    <ol class="breadcrumb">
                                        <li><span class="feature-cate booking">Booking</span></li>
                                        <li class="breadcrumb-item"><a href="#">Property</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">House</li>
                                    </ol>
                                    <div class="feature-title">
                                        <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum
                                                dolor sit amet.</a></h3>
                                    </div>
                                    <ul class="feature-meta">
                                        <li><span>AED  800 <small>/Per Day</small></span></li>
                                        <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-img"><a href="#"><img src="/website/images/product/08.jpg" alt="feature"></a>
                                </div>
                                <div class="feature-badge">
                                    <p>Featured</p>
                                </div>
                                <div class="feature-bookmark"><button type="button"><i
                                            class="fas fa-heart"></i></button></div>
                                <div class="feature-content">
                                    <ol class="breadcrumb">
                                        <li><span class="feature-cate sale">sale</span></li>
                                        <li class="breadcrumb-item"><a href="#">Gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Iphone</li>
                                    </ol>
                                    <div class="feature-title">
                                        <h3><a href="#">Unde eveniet ducimus nostrum maiores soluta temporibus ipsum
                                                dolor sit amet.</a></h3>
                                    </div>
                                    <ul class="feature-meta">
                                        <li><span>AED  1150 <small>/Negotiable</small></span></li>
                                        <li><i class="fas fa-clock"></i><span>56 minute ago!</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="related-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>{{$language[99][session()->get('lang')]}}</h2>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p> -->
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12 translate">
                    <div class="related-slider slider-arrow">
                        @foreach($related_ad as $row)
                        <div class="product-card">
                            <div class="product-head">
                                <div class="product-img"
                                    style="background:url(/upload_image/{{$row->image}}) no-repeat center; background-size:cover;">
                                    <!-- <i class="cross-badge fas fa-bolt"></i>
                                    <span class="flat-badge booking">booking</span> -->
                                    <!-- <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>264</p>
                                        </li>
                                        <li><i class="fas fa-mouse"></i>
                                            <p>134</p>
                                        </li>
                                        <li><i class="fas fa-star"></i>
                                            <p>4.5/7</p>
                                        </li>
                                    </ul> -->
                                    <ul class="product-meta">
                                        <li><i class="fas fa-eye"></i>
                                            <p>{{$row->view_count}}</p>
                                        </li>
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
                                    <!-- <ul class="product-widget">
                                        <li>
                                            <a href="#" class="tooltip">
                                                <i class="fas fa-compress"></i>
                                                <span class="tooltext top">compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button class="tooltip">
                                                <i class="far fa-heart"></i>
                                                <span  class="tooltext top">bookmark</span>
                                            </button>
                                        </li>
                                    </ul> -->
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
                        <a href="#" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all related</span></a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
@endsection
@section('extra-js')
<script>
/* script */
// function initialize() {
//    var latlng = new google.maps.LatLng(<?php //echo $post_ad->latitude; ?>,<?php //echo $post_ad->longitude; ?>);
//     var map = new google.maps.Map(document.getElementById('map'), {
//       center: latlng,
//       zoom: 13
//     });
//     var marker = new google.maps.Marker({
//       map: map,
//       position: latlng,
//       //draggable: true,
//       anchorPoint: new google.maps.Point(0, -29)
//    });
// }

// google.maps.event.addDomListener(window, 'load', initialize);

$.ajax({
    url : '/get-city-name/'+<?php echo $post_ad->city; ?>+'/'+<?php echo $post_ad->area; ?>,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
});

function Login(){
    window.location ="/login";
}

function YourPost(){
    Swal.fire({
        text: 'This Ad Created by You',
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
        }).then((result) => {
        if (result.isConfirmed) {
            //location.reload();
        }
    }) 
}

function SaveReview(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/save-review',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Save',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}

function UpdateReview(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/update-review',
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
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}

function SaveChat(id){
    $.ajax({
        url : '/customer/save-chat-view/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Message Send Successfully',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location ="/customer/message";
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