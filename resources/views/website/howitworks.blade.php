@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/about.css">
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
                        <h2>{{$language[19][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[19][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="translate about-content">
                    <?php echo \App\Http\Controllers\HomeController::langchange(html_entity_decode($settings->how_it_works)); ?>
                    </div>
                    <!-- <div class="about-quote">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse aliquid assumenda tempore
                            voluptatem!</p>
                        <h5>Founder & CEO - <span>FoundIT</span></h5>
                    </div> -->
                </div>
                <!-- <div class="col-lg-6">
                    <div class="row about-image">
                        <div class="col-6 col-lg-6"><img src="/website/images/about/01.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/02.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/03.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/04.jpg" alt="about"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    @endsection