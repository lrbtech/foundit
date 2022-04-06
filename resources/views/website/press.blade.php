@extends('website.layout')
@section('section')
  <!-- BANNER START -->
    <div class="ps-main-banner">
        <div class="ps-banner-img3">
            <div class="ps-dark-overlay2">
                <div class="container">
                    <div class="ps-banner-contentv3">
                        <h4>Press</h4>
                        <p><a href="/about">About</a> <span><i class="ti-angle-right"></i></span> Press</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="ps-main3">
        <div class="container">
            <div class="row ps-main-section">
                @include('website.sidebar')
                <!-- TERMS & CONDITIONS START -->
                <div class="col-md-8 col-lg-9">
                    <div class="ps-privacy-content">
                    <?php echo \App\Http\Controllers\HomeController::langchange(html_entity_decode($settings->press)); ?>
                    </div>
                </div>
                <!-- TERMS & CONDITIONS END -->
            </div>
        </div>
    </main>
    <!-- MAIN END -->

@endsection
@section('js')

@endsection