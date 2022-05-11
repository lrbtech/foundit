@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/chartist.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/prism.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/tour.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/ionic-icon.css">
<style>
.round_img{
  width: 45px;
  height: 45px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  color: #fff;
  margin-right: 0px;
  border-radius: 100%;
}

.owl-item.cloned {
  width:350px !important;
}

.owl-item {
  width:350px !important;
}

.card .card-header {
padding: 50px;
}
.card .card-body {
padding: 50px;
}
</style>
@endsection
@section('section')
<!-- Right sidebar Ends-->
<div class="page-body vertical-menu-mt">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6 main-header">
          <h2>{{$language[25][Auth::guard('admin')->user()->lang]}}</h2>
        </div>
        <div class="col-lg-6 breadcrumb-right">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="pe-7s-home"></i></a></li>
            <li class="breadcrumb-item active">{{$language[25][Auth::guard('admin')->user()->lang]}}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-primary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="database"></i> -->
              <i data-feather="shopping-bag"></i>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[26][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$total_today_posts}}</h4>
              <!-- <i class="icon-bg" data-feather="database"></i> -->
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-secondary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <i data-feather="shopping-bag"></i>
            </div>
            <div class="media-body"><span class="m-0">{{$language[27][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$current_month_posts}}</h4>
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-warning o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="shopping-bag"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[28][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_posts}}</h4>
              <!-- <i class="icon-bg" data-feather="message-circle"></i> -->
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-info o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[25][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_today_customers}}</h4>
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-primary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="database"></i> -->
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[30][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$current_month_customers}}</h4>
              <!-- <i class="icon-bg" data-feather="database"></i> -->
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-secondary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="shopping-bag"></i> -->
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0">{{$language[31][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$total_customers}}</h4>
              <!-- <i class="icon-bg" data-feather="shopping-bag"></i> -->
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-warning o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[32][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_today_visitor}}</h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-info o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[33][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$current_month_visitor}}</h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-info o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="message-circle"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[34][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$new_message}}</h4><i class="icon-bg" data-feather="message-circle"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="col-xl-11">
      <div class="owl-carousel owl-theme crypto-slider owl-loaded owl-drag">
        <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(-1792px, 0px, 0px); transition: all 0.25s ease 0s; width: 4480px;">
            
            @foreach($category as $row)
            <div class="owl-item" style="margin-right: 30px;">
              <div class="item">
                <div style="padding:10px !important;" class="card o-hidden">
                  <div class="card-body crypto-graph-card coin-card">
                    <div class="media">
                      <div class="media-body d-flex align-items-center">
                        <div class="rounded-icon bck-gradient-secondary">
        
                        <img class="round_img" src="/upload_files/{{$row->image}}" alt="" srcset="">
                    
                        </div>
                        <div class="bitcoin-graph-content">
                          <h5 class="f-w-700 mb-0">{{$row->category}}</h5>
                        </div>
                      </div>
                      <div class="right-setting d-flex align-items-center">
                        <h6 style="margin-top:15px !important;" class="font-secondary f-w-700 mb-0">{{ \App\Http\Controllers\Admin\CategoryController::categorypostcount($row->id) }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

        <div class="owl-nav">
          <button type="button" role="presentation" class="owl-prev">
          <span aria-label="Previous">‹</span>
          </button>
          <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
        </div>
        <div class="owl-dots">
          <button role="button" class="owl-dot active"><span></span></button>
          <button role="button" class="owl-dot"><span></span></button>
        </div>

      </div>
    </div>

    <div class="col-sm-12 col-xl-6 box-col-12">
      <div class="card">
        <div class="card-header">
          <h5>Post Analytics (Last 12 Months)</h5>
        </div>
        <div class="card-body chart-block">
          <div class="flot-chart-container">
            <div class="flot-chart-placeholder" id="chat-view1"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-xl-6 box-col-12">
      <div class="card">
        <div class="card-header">
          <h5>Customer Analytics (Last 7 Days)</h5>
        </div>
        <div class="card-body chart-block">
          <div class="flot-chart-container">
            <div class="flot-chart-placeholder" id="chat-view2"></div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

</div>
@endsection
@section('extra-js')
    

    <!-- Plugins JS start-->
    <script src="/assets/app-assets/js/chart/flot-chart/excanvas.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.time.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.categories.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.stack.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.pie.js"></script>
    <script src="/assets/app-assets/js/chart/flot-chart/jquery.flot.symbol.js"></script>
    <!-- <script src="/assets/app-assets/js/chart/flot-chart/flot-script.js"></script> -->
    <script src="/assets/app-assets/js/owlcarousel/owl.carousel.js"></script>

    <!-- Plugins JS Ends-->

    <!-- <script src="/assets/app-assets/js/theme-customizer/customizer.js"></script>  -->
    <!-- login js-->
<script>
var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

var owl_carousel_custom = {
    init: function() {
        $('.crypto-slider').owlCarousel({
            loop:true,
            margin:30,
            dots: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                768:{
                    items:2,
                    dots: true            
                },
                1600:{
                    items:3,
                    dots: true            
                }
            }
        })
    }
};

(function($) {
    "use strict";
    owl_carousel_custom.init();
})(jQuery);

if ($("#chat-view1").length > 0) {
    var a = {
        color: "#06b5dh",
        data: [
        <?php foreach($postdata as $row){ ?>
          ["<?php echo $row['month'] .' - '.$row['year']; ?>",<?php echo $row['month_count']; ?>],
        <?php } ?>
        // ["Jan", 95],
        // ["Feb", 8],
        // ["Mar", 45],
        // ["Apr", 30],
        // ["May", 17],
        // ["Jun", 9],
        // ["Jul", 50],
        // ["Aug", 11],
        // ["Sep", 72],
        // ["Oct", 89],
        // ["Nov", 26],
        // ["Dec", 60],
        ]
    };
    $.plot("#chat-view1", [a], {
        series: {
            bars: {
                show: !0,
                barWidth: .8,
                align: "center",
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                }
            }
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        },
        grid: {
            borderWidth: 0
        }
    })
}

if ($("#chat-view2").length > 0) {
    var a = {
        color: "#06budd",
        // data: [
        // ["Jan", 100],
        // ["Feb", 8],
        // ["Mar", 40],
        // ["Apr", 13],
        // ["May", 7],
        // ["Jun", 80],
        // ["Jul", 5],
        // ["Aug", 11],
        // ["Sep", 17],
        // ["Oct", 85],
        // ["Nov", 26],
        // ["Dec", 60],
        // ]
        data: [
        <?php foreach($customerdata as $row){ ?>
          ["<?php echo $row['week_day']; ?>",<?php echo $row['week_day_count']; ?>],
        <?php } ?>
        //["Sunday", 100],
        // ["Monday", 80],
        // ["Tuesday", 40],
        // ["Wednesday", 68],
        // ["Thursday", 75],
        // ["Friday", 80],
        // ["Saturday", 58],
        ]
    };
    $.plot("#chat-view2", [a], {
        series: {
            bars: {
                show: !0,
                barWidth: .5,
                align: "center",
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                }
            }
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        },
        grid: {
            borderWidth: 0
        }
    })
}
</script>
@endsection