@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/about.css">
@endsection
@section('section')
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
<style>

.panel-default>.panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #e4e5e7;
  padding: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.panel-default>.panel-heading a {
    display: block;
    padding: 10px 15px;
    background-color: #112271;
    color: #fff;
    font-weight: 400;
}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  /* background-color: #eee; */
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.panel-default{
    margin-bottom: 20px;
}

.panel-collapse{
    border-left: 2px solid #eee;
    border-right: 2px solid #eee;
    border-bottom: 2px solid #eee;
    padding-left: 15px;
    padding-bottom: 10px;
}
</style>    
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[133][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[133][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section style="padding: 70px 0 30px 0;">
<div class="translate container">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      @foreach($faq as $key => $row)
      @if($key == 0)
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{ \App\Http\Controllers\HomeController::langchange($row->question) }}
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          {{ \App\Http\Controllers\HomeController::langchange($row->answer) }}
        </div>
      </div>
    </div>
    @else 
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading{{$row->id}}">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">
        {{ \App\Http\Controllers\HomeController::langchange($row->question) }}
        </a>
      </h4>
      </div>
      <div id="collapse{{$key+1}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$row->id}}">
        <div class="panel-body">
          {{ \App\Http\Controllers\HomeController::langchange($row->answer) }}
        </div>
      </div>
    </div>
    @endif 
    @endforeach
  </div>
</div>
</section>

    
    @endsection    