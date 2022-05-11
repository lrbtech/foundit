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
                        <h2>{{$language[131][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[131][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- <div class="col-sm-10 col-md-4 col-lg-4 m-auto">
                            <div class="blog-card">
                                <div class="blog-img"><img src="images/blog/01.jpg" alt="blog">
                                    <div class="blog-overlay"><span class="marketing">Marketing</span></div>
                                </div>
                                <div class="blog-content"><a href="#" class="blog-avatar"><img
                                            src="images/avatar/01.jpg" alt="avatar"></a>
                                    <ul class="blog-meta">
                                        <li><i class="fas fa-user"></i>
                                            <p><a href="#">MironMahmud</a></p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>02 Feb 2021</p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="blog-details.html">Lorem ipsum dolor sit amet eius minus elit cum
                                                quaerat volupt.</a></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad
                                            dolore labore laborum perspiciatis...</p>
                                    </div><a href="blog-details.html" class="blog-read"><span>read more</span><i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div> -->
                        @foreach($blog as $row)
                        <div class="col-sm-10 col-md-4 col-lg-4 m-auto">
                        <div class="blog-card translate">
                            <div class="blog-img">
                                <img src="/upload_files/{{$row->image}}" alt="blog">
                                <!-- <div class="blog-overlay">
                                    <span class="advertise">advertise</span>
                                </div> -->
                            </div>
                            <div class="blog-content">
                                <a href="#" class="blog-avatar">
                                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">
                                </a>
                                <ul class="blog-meta">
                                    <!-- <li><i class="fas fa-user"></i>
                                        <p><a href="#">{{$row->title}}</a></p>
                                    </li> -->
                                    <li><i class="fas fa-clock"></i>
                                        <p>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#">{{ \App\Http\Controllers\HomeController::langchange($row->title) }}</a>
                                    </h4>
                                    <p>{{ \App\Http\Controllers\HomeController::langchange(substr($row->description,0,100)) }}</p>
                                </div>
                                <a href="/view-blog/{{$row->id}}" class="blog-read">
                                    <span>read more</span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $blog->links('website.pagination') !!}
                            <!-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="fas fa-long-arrow-alt-left"></i></a></li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">67</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="fas fa-long-arrow-alt-right"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection