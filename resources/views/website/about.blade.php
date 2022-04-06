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
                        <h2>about us</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="translate about-content">
                        <h2>Our Motive is to Provide Best for Those Who Deserve</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit enim minima cumque saepe fuga
                            itaque consectetur aperiam asperiores placeat at modi voluptates atque labore quia, dolore
                            neque dolorum necessitatibus rem aliquid praesentium? Soluta libero rem sunt, quos omnis
                            dolorum reprehenderit.</p>
                    </div>
                    <div class="about-quote">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse aliquid assumenda tempore
                            voluptatem!</p>
                        <h5>Founder & CEO - <span>FoundIT</span></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row about-image">
                        <div class="col-6 col-lg-6"><img src="/website/images/about/01.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/02.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/03.jpg" alt="about"></div>
                        <div class="col-6 col-lg-6"><img src="/website/images/about/04.jpg" alt="about"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="best-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>How We Best for Advertising?</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-boxes"></i></div>
                        <div class="best-content">
                            <h4>eye catching feature</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi
                            debitis earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-lock"></i></div>
                        <div class="best-content">
                            <h4>strong data sequrity</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi
                            debitis earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="best-content">
                            <h4>Commercial Support</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi
                            debitis earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-bell"></i></div>
                        <div class="best-content">
                            <h4>Deadline Reminders</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi
                            debitis earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-dollar-sign"></i></div>
                        <div class="best-content">
                            <h4>easy get payment</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi debitis
                            earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="best-card">
                        <div class="best-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="best-content">
                            <h4>Verified Ad posting</h4>Lorem ipsum dolor sit amet elit Ea fuga velit itaque animi
                            debitis earum temporibus iusto dolore delectus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Behind The Classicads Team</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                            voluptatum repudiandae veniam maxime tenetur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/01.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/02.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/03.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/04.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/05.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/06.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="team-card"><img src="/website/images/team/07.jpg" alt="team">
                        <h5><a href="#">Jhonson Hononr</a></h5>
                        <p>Founder & CEO</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="counter-part">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="counter-card">
                        <div class="counter-image"><img src="/website/images/counter/user.png" alt="user"></div>
                        <div class="counter-content">
                            <h2><span class="counter-number">6795</span>+</h2>
                            <p>Registered Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="counter-card">
                        <div class="counter-image"><img src="/website/images/counter/ads.png" alt="user"></div>
                        <div class="counter-content">
                            <h2><span class="counter-number">8977</span>+</h2>
                            <p>community ads</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="counter-card">
                        <div class="counter-image"><img src="/website/images/counter/review.png" alt="user"></div>
                        <div class="counter-content">
                            <h2><span class="counter-number">3455</span>+</h2>
                            <p>satisfied feedback</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection