@extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/chosen.css">
   <style>
       .col-lg-6.col-xl-3 {
    padding: 20px;
}
   </style>
   @endsection
@section('section')
<div class="ps-main-banner">
        <div class="ps-banner-img3">
            <div class="ps-dark-overlay2">
                <div class="container">
                    <div class="ps-banner-contentv3">
                        <h4>Search Results</h4>
                        <p><a href="/">Home</a> <span><i class="ti-angle-right"></i></span> Search Post</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="ps-main">
        <section class="container-fluid" style="padding-left: 100px;
    padding-right: 100px;">
            <div class="row ps-uniqueGadgets ps-gridList ps-main-section">
                <!-- SIDEBAR START -->
                <div class="col-md-5 col-lg-4 col-xl-3">
                    <div class="ps-gridList__searchArea">
                        <h6>Search Again</h6>
                        <form class="ps-form ps-main-form ps-side-mainForm" method="get">
                        <!-- {{ csrf_field() }} -->
                            <div class="input-group">
                                <input name="title" id="title" type="text" class="form-control" placeholder="Enter Keyword" aria-label="Enter Keyword" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn" type="button" id="button-addon1"><i class="ti-search"></i></button>
                                </div>
                            </div>
                            <div class="ps-geo-location ps-location input-group">
                                <!-- <input name="location" id="location" type="text" class="form-control" placeholder="Location*"> -->
                                <div class="d-flex flex-wrap">
                                    <label class="ps-sort">
                                        <select class="form-control" name="location" id="location">
                                        <option value="location">All Cities</option>
                                        @foreach($city as $row)
                                        <option value="{{$row->id}}">{{$row->city}}</option>
                                        @endforeach
                                        </select>
                                    </label>
                                </div>
                                <!-- <a href="javascript:void(0);" class="ps-location-icon ps-index-icon"><i class="ti-target"></i></a>
                                <a href="javascript:void(0);" class="ps-arrow-icon ps-index-icon"><i class="ti-angle-down"></i></a> -->
                                <!-- <div class="ps-distance">
                                    <div class="ps-distance__description">
                                        <label for="amountfive">Distance:</label>
                                        <input type="text" id="amountfive" readonly="">
                                    </div>                                           
                                    <div id="slider-range-minTwo" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 5.15021%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 5.15021%;"></span></div>
                                </div> -->
                            </div>   

                        <br>
                        <h6>Categories</h6>
                        <div class="ps-gridList__radio">
                            <div class="form-check">
                                <input checked value="0" name="category" type="radio" class="form-check-input category" id="check1">
                                <label class="form-check-label" for="check1">Show All <span>(0)</span></label>
                            </div>
                            @foreach($category_all as $key => $row)
                            <div class="form-check">
                                <input value="{{$row->id}}" name="category" type="radio" class="form-check-input category" id="check{{$key+2}}">
                                <label class="form-check-label" for="check{{$key+2}}">{{$row->category}} <span>(0)</span></label>
                            </div>
                            @endforeach
                        </div>     

                        <!-- <hr>
                        <div class="ps-gridList__filter">
                        
                        </div>  -->
                                     
                        </form>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__filter">
                        <h6><span class="d-block">Click “Apply Filter” to</span>get your desired search result</h6>
                        <button  id="search" class="btn ps-btn">Apply Filter</button>
                        <a href="javascript:void(0);" class="ps-filter__h"><span><i class="ti-reload"></i></span>Reset Filter</a>
                        
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__ad">
                        <a href="javascript:void(0);"><figure><img src="/images/ad-img.jpg" alt="Image Description"></figure></a>
                        <span>Advertisement  255px X 255px</span>
                    </div>
                </div>
                 <!-- SIDEBAR END -->
                 <!-- UNIQUE GADGETS START -->
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="ps-uniqueGadgets">
                        <div class="ps-uniqueGadgets__heading">
                            <p>{{$post_count}} Record Found</p>
                            <h4>Results in “{{$search}}”</h4>
                        </div>
                        <div class="ps-uniqueGadgets__content">
                            <!-- <p>Showing 1 - 30 of {{$post_count}} results</p> -->
                            <p>Showing {{ $post_list->firstItem() }} to {{ $post_list->lastItem() }} of total {{$post_list->total()}} entries</p>
                            <div class="d-flex flex-wrap">
                                <label class="ps-sort">
                                    <select class="form-control">
                                        <option selected="" hidden="">Sort By:</option>
                                        <option>All</option>
                                        <option>Half</option>
                                    </select>
                                </label>
                                <!-- <button class="btn ps-btn ps-outline-btn"><i class="ti-map"></i></button>
                                <button class="btn ps-btn ps-outline-btn"><i class="ti-view-list"></i></button>
                                <button class="btn ps-btn ps-active"><i class="ti-layout-grid2"></i></button> -->
                            </div>
                        </div>
                    </div>
                    @if(count($post_list) > 0)
                    <div class="row ps-featured--cards ps-gridList__cards">
                        @foreach($post_list as $row)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="/upload_image/{{$row->image}}" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <!-- <span class="ps-tag">Featured</span> -->
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>AED {{$row->price}}</h6>
                                    <p class="card-text">{{$row->title}}</p>
                                    <span class="d-block">
                                    <i class="ti-layers"></i> 
                                    <a href="/view-post/{{$row->id}}">
                                    @foreach($category_all as $cat)
                                        @if($cat->id == $row->category)
                                        {{$cat->category}}
                                        @endif
                                    @endforeach
                                    </a>
                                    </span>
                                    <span><i class="ti-time"></i> <span>{{$row->created_at}}</span></span>
                                    <figure><img src="/images/user-icon/img-02.png" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="/view-post/{{$row->id}}">{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</a></span><a href="javascript:void(0);" class="ps-favorite"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-12">
                            {!! $post_list->links('website.pagination') !!}
                            <!-- <div class="ps-page">
                                <div class="ps-button-left">
                                    <button class="btn ps-btn"><span class="lnr lnr-chevron-left"></span></button>
                                </div>
                                <div class="ps-button-num">
                                    <button class="btn ps-btn"><span>1</span></button>
                                    <button class="btn ps-btn ps-active"><span>2</span></button>
                                    <button class="btn ps-btn"><span>3</span></button>
                                    <button class="btn ps-btn"><span>4</span></button>
                                    <button class="btn ps-btn"><span>...</span></button>
                                    <button class="btn ps-btn"><span>50</span></button>
                                </div>
                                <div class="ps-button-right">
                                    <button class="btn ps-btn"><span class="lnr lnr-chevron-right"></span></button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    @else
                    <div>

                        <div clas="ps-no-ads">
                        <br><br>
                            <center><h5 style="text-align:center;">No Results Found Yet :(</h5></center>
                            <!-- <h6>Click “Search Again” button below to search result</h6> -->
                            <!-- <button class="btn ps-btn">Search Again</button> -->
                        </div>
                    </div>
                    @endif

                </div>
                <!-- UNIQUE GADGETS END -->
            </div>
        </section>
    </main>
    <!-- MAIN END -->
   @endsection
@section('js')
<script src="/js/vendor/chosen.jquery.js"></script>
<script>
$(document).on('click','#search', function(){
    var title = $('#title').val();
    var category = $("input[name='category']:checked").val();
    var location = $('#location').val();
    var title1;
    var category1;
    var location1;

    if(title != ""){
        title1 = title;
    }else{
        title1 = 'title';
    }
    if(category != ""){
        category1 = category;
    }else{
        category1 = 'category';
    }
    if(location != ""){
        location1 = location;
    }else{
        location1 = 'location';
    }
    window.location.href = "/search-post/"+title1+'/'+category1+'/'+location1;
});
</script>
@endsection