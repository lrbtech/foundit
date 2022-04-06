@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/profile.css">
@endsection
@section('section')
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[122][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[122][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.menu')
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>{{$language[107][session()->get('lang')]}}</h3><a href="/customer/packages">Edit</a>
                        </div>
                        <ul class="account-card-list">
                            <li>
                                <h5>{{$language[108][session()->get('lang')]}}</h5>
                                <p>{{$used_package->package_name}}</p>
                            </li>
                            <li>
                                <h5>{{$language[109][session()->get('lang')]}}</h5>
                                <p>{{$used_package->apply_date}}</p>
                            </li>
                            <li>
                                <h5>{{$language[110][session()->get('lang')]}}</h5>
                                <p>{{$used_package->expire_date}}</p>
                            </li>
                            <li>
                                <h5>{{$language[111][session()->get('lang')]}}</h5>
                                <p>AED {{$package_spent}}</p>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>{{$language[117][session()->get('lang')]}}</h3><a href="/customer/settings">Edit</a>
                        </div>
                        <ul class="account-card-list">
                            <li>
                                <h5>{{$language[118][session()->get('lang')]}}:</h5>
                                <p>{{$user->website}}</p>
                            </li>
                            <li>
                                <h5>{{$language[119][session()->get('lang')]}}:</h5>
                                <p>{{$user->email}}</p>
                            </li>
                            <li>
                                <h5>{{$language[120][session()->get('lang')]}}:</h5>
                                <p>{{$user->mobile}}</p>
                            </li>
                            <li>
                                <h5>{{$language[121][session()->get('lang')]}}:</h5>
                                <p>{{$user->company}}</p>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="account-card">
                        <div class="account-title">
                            <h3>Billing Address</h3><a href="setting.html">Edite</a>
                        </div>
                        <ul class="account-card-list">
                            <li>
                                <h5>Post Code:</h5>
                                <p>1420</p>
                            </li>
                            <li>
                                <h5>State:</h5>
                                <p>West Jalkuri</p>
                            </li>
                            <li>
                                <h5>City:</h5>
                                <p>Narayanganj</p>
                            </li>
                            <li>
                                <h5>Country:</h5>
                                <p>UAE</p>
                            </li>
                        </ul>
                    </div>
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Shipping Address</h3><a href="setting.html">Edite</a>
                        </div>
                        <ul class="account-card-list">
                            <li>
                                <h5>Post Code:</h5>
                                <p>1100</p>
                            </li>
                            <li>
                                <h5>State:</h5>
                                <p>Kawran Bazar</p>
                            </li>
                            <li>
                                <h5>City:</h5>
                                <p>Dhaka</p>
                            </li>
                            <li>
                                <h5>Country:</h5>
                                <p>Bangladesh</p>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('extra-js')

<script>
$('.profile').addClass('active');
</script>
@endsection