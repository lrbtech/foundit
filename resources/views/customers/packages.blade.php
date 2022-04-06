@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/setting.css">
@endsection
@section('section')
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[125][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[125][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.menu')
    <div class="setting-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[130][session()->get('lang')]}}</h3><button data-dismiss="alert">close</button>
                        </div>
                        

<div class="row">
@foreach($package as $row)
    @if(!empty($used_package))
    @if($used_package->package_id == $row->id)
        @if(Auth::user()->package_status == 0)
        <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div class="price-head">
                <i class="flaticon-bicycle"></i>
                <h3>AED {{$row->price}}</h3>
                <h4>{{$row->package_name}}</h4>
            </div>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->duration}} / 
                    @if($row->duration_period == 1)
                    {{$language[67][session()->get('lang')]}}
                    @else 
                    {{$language[68][session()->get('lang')]}}
                    @endif</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[69][session()->get('lang')]}} {{$row->no_of_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[49][session()->get('lang')]}} {{$row->popular_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[70][session()->get('lang')]}} {{$row->top_search}}</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->support}}</p>
                </li>
            </ul>
            <div class="price-btn">
                <a href="#" class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>{{$language[132][session()->get('lang')]}}</span></a>
            </div>
        </div>
        </div>
        @else 
        <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div class="price-head">
                <i class="flaticon-bicycle"></i>
                <h3>AED {{$row->price}}</h3>
                <h4>{{$row->package_name}}</h4>
            </div>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->duration}} / 
                    @if($row->duration_period == 1)
                    {{$language[67][session()->get('lang')]}}
                    @else 
                    {{$language[68][session()->get('lang')]}}
                    @endif</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[69][session()->get('lang')]}} {{$row->no_of_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[49][session()->get('lang')]}} {{$row->popular_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[70][session()->get('lang')]}} {{$row->top_search}}</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->support}}</p>
                </li>
            </ul>
            <div class="price-btn">
                <a onclick="ActivatePlan('{{$row->id}}')" href="#" class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>RENEW NOW</span></a>
            </div>
        </div>
        </div>
        @endif
    @else
        @if($row->price >= $used_package->price)
        <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div class="price-head">
                <i class="flaticon-bicycle"></i>
                <h3>AED {{$row->price}}</h3>
                <h4>{{$row->package_name}}</h4>
            </div>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->duration}} / 
                    @if($row->duration_period == 1)
                    {{$language[67][session()->get('lang')]}}
                    @else 
                    {{$language[68][session()->get('lang')]}}
                    @endif</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[69][session()->get('lang')]}} {{$row->no_of_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[49][session()->get('lang')]}} {{$row->popular_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[70][session()->get('lang')]}} {{$row->top_search}}</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->support}}</p>
                </li>
            </ul>
            <div class="price-btn">
                <a onclick="ActivatePlan('{{$row->id}}')" href="#" class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>{{$language[131][session()->get('lang')]}}</span></a>
            </div>
        </div>
        </div>
        @else 
        <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div class="price-head">
                <i class="flaticon-bicycle"></i>
                <h3>AED {{$row->price}}</h3>
                <h4>{{$row->package_name}}</h4>
            </div>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->duration}} / 
                    @if($row->duration_period == 1)
                    {{$language[67][session()->get('lang')]}}
                    @else 
                    {{$language[68][session()->get('lang')]}}
                    @endif</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[69][session()->get('lang')]}} {{$row->no_of_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[49][session()->get('lang')]}} {{$row->popular_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[70][session()->get('lang')]}} {{$row->top_search}}</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->support}}</p>
                </li>
            </ul>
            <div class="price-btn">
                <a href="#" class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>{{$language[131][session()->get('lang')]}}</span></a>
            </div>
        </div>
        </div>
        @endif
    @endif
    @else
        <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div class="price-head">
                <i class="flaticon-bicycle"></i>
                <h3>AED {{$row->price}}</h3>
                <h4>{{$row->package_name}}</h4>
            </div>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->duration}} / 
                    @if($row->duration_period == 1)
                    {{$language[67][session()->get('lang')]}}
                    @else 
                    {{$language[68][session()->get('lang')]}}
                    @endif</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[69][session()->get('lang')]}} {{$row->no_of_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[49][session()->get('lang')]}} {{$row->popular_ads}}</p>
                </li>
                <li>
                    <i class="fas fa-times"></i>
                    <p>{{$language[70][session()->get('lang')]}} {{$row->top_search}}</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>{{$row->support}}</p>
                </li>
            </ul>
            <div class="price-btn">
                <a onclick="ActivatePlan('{{$row->id}}')" href="#" class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>{{$language[131][session()->get('lang')]}}</span></a>
            </div>
        </div>
        </div>
    @endif
@endforeach
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')

<script>
$('.packages').addClass('active');

function ActivatePlan(package_id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/apply-package/'+package_id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                title: "Your Package",
                text: 'Successfully Activated',
                icon: "success",
                confirmButtonClass: 'btn btn-inline',
                buttonsStyling: false,
            }).then(function() {
                location.reload();
            });
        }
      });
    } 
}
</script>
@endsection