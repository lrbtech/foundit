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
                        <h2>{{$language[60][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[60][session()->get('lang')]}}</li>
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
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($post_ads as $row)
                        <div class="col-sm-6 col-md-3 col-lg-3 card-grid">
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="product-img"
                                        style="background:url(/upload_image/{{$row->image}}) no-repeat center; background-size:cover;">
                                        <!-- <i class="cross-badge fas fa-bolt"></i> -->
                                        <!-- <span class="flat-badge rent">rent</span> -->
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
                                        <h5><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h5>
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
                                        <ul class="product-widget">
                                            <!-- <li><a href="compare.html" class="tooltip">
                                                <i class="fas fa-compress"></i><span class="tooltext top">compare</span></a></li>
                                            <li><button class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li> -->
                                            <li>
                                                <button type="button" onclick="Delete({{$row->f_id}})" class="tooltip"><i class="fas fa-trash-alt"></i><span class="tooltext top">Delete</span></button>
                                            </li>
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
            </div>
        </div>
    </section>
@endsection
@section('extra-js')
<script>
$('.bookmark').addClass('active');

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
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
}
</script>
@endsection