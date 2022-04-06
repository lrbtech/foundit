@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/my-ads.css">
@endsection
@section('section')
<section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[124][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[124][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('customers.menu')
    <section class="myads-part">
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
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($post_ads as $row)
                        <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="product-img"
                                        style="background:url(/upload_image/{{$row->image}}) no-repeat center; background-size:cover;">
                                        <a onclick="DeleteAd({{$row->id}})" href="#"><i class="cross-badge fas fa-trash"></i></a>
                                        @if($row->status == 0)
                                        <span class="flat-badge rent">Waiting for Approvel</span>
                                        @else
                                        <span class="flat-badge rent">Approved</span>
                                        @endif
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
                                        <h5><a href="/customer/edit-post-ad/{{$row->id}}">{{$row->title}}</a></h5>
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
                                            <h5>AED  {{$row->price}}</h5><span>/{{$row->price_condition}}</span>
                                        </div>
                                        <!-- <ul class="product-widget">
                                            <li><a href="compare.html" class="tooltip">
                                                <i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $post_ads->links('website.pagination') !!}
                            <!-- <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link active" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">67</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
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
                                    <ul class="product-sidebar-list widget">
                                        @foreach($city as $row)
                                        <li>
                                            <!-- <input type="checkbox" id="cit1"> -->
                                            <label for="cit1">
                                                <a href="/city-post/{{$row->id}}">
                                                <span>{{$row->city}}</span>
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
                                    <ul id="category_view" class="nasted-dropdown">
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
            </div>
        </div>
    </section>
@endsection
@section('extra-js')

<script>
$('.my-ads').addClass('active');

function DeleteAd(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-ad/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Successfully Delete',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/customer/my-ads";
                }
            }) 
        }
      });
    } 
}

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
</script>
@endsection