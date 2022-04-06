@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/blog-details.css">
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
                        <h2>{{$language[168][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[168][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-details-part">
        <div class="container">
            <div class="row translate">
                <div class="col-lg-10 m-auto">
                    <div class="blog-details-title">
                        <h2><a href="#">{{ \App\Http\Controllers\HomeController::langchange($blog->title) }}</a></h2>
                    </div>
                    <ul class="blog-details-meta">
                        <!-- <li><a href="#"><i class="far fa-user"></i>
                                <p>MironMahmud</p>
                            </a></li> -->
                        <li><a href="#"><i class="far fa-calendar-alt"></i>
                                <p>{{ \App\Http\Controllers\HomeController::humanreadtime($blog->created_at) }}</p>
                            </a></li>
                        <!-- <li><a href="#"><i class="far fa-folder-open"></i>
                                <p>advertising</p>
                            </a></li>
                        <li><a href="#"><i class="far fa-comments"></i>
                                <p>37 Comment</p>
                            </a></li>
                        <li><a href="#"><i class="far fa-share-square"></i>
                                <p>21 Share</p>
                            </a></li> -->
                    </ul>
                    <div class="blog-details-image"><img src="/upload_files/{{$blog->image}}" alt="blog-details"></div>
                    <div class="blog-details-content">
                        <div class="description">
                            <p><?php echo html_entity_decode($blog->description); ?></p>
                        </div>
                        <!-- <div class="sub-content">
                            <h3>How to manage your advertise?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos quasi deleniti voluptatem
                                sint incidunt quos corporis recusandae repudiandae aspernatur voluptates omnis illum
                                quaerat quidem veritatis, facilis enim quis quo ipsam ipsa doloribus, nostrum adipisci
                                eligendi <a href="#">consequuntur</a>consequatur. Animi molestias ab ex eius, doloremque
                                corporis sunt alias non deleniti doloribus</p>
                        </div>
                        <div class="quote-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id distinctio nulla velit est
                                quidem repellendus esse non saepe cumque sapiente.</p>
                            <h5><a href="">jaurge anderson</a></h5>
                        </div>
                        <ul class="list-content">
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quaerat tenetur, <a
                                        href="#">aperiam</a>odit, ratione eligendi nulla quae praesentium quo, a
                                    reiciendis inventore facilis veniam voluptates.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad ullam impedit,
                                    architecto porro voluptas sequi ab beatae saepe quo magnam</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Ad ullam impedit architecto
                                    porro.</p>
                            </li>
                        </ul> -->
                    </div>
                    <!-- <div class="blog-details-widget">
                        <ul class="tag-list">
                            <li>
                                <h4>Tags:</h4>
                            </li>
                            <li><a href="#">Crowd</a></li>
                            <li><a href="#">Party</a></li>
                            <li><a href="#">Concert</a></li>
                        </ul>
                        <ul class="share-list">
                            <li>
                                <h4>Share:</h4>
                            </li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    <div class="blog-details-author">
                        <div class="author-intro"><a href="#"><img src="images/avatar/01.jpg" alt="author"></a>
                            <h4><a href="#">MironMahmud</a></h4>
                            <p><a href="#">www.mironmahmud.com</a></p>
                        </div>
                        <div class="author-content">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate temporibus harum
                                laborum quaerat blanditiis iste mollitia aperiam aut voluptates quidem nois aliquam
                                incidunt expedita odit id repellat dicta Odio consectetur modi mollitia nihil Deserunt
                                ab non tenetur quasi libero magni eos tempora iure facere dolores accusantium.</p>
                        </div>
                    </div> -->
                    <div class="row">
                        <!-- <div class="col-md-6 col-lg-6">
                            <div class="blog-card">
                                <div class="blog-img"><img src="images/blog/02.jpg" alt="blog">
                                    <div class="blog-overlay"><span class="advertise">advertise</span></div>
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
                                        <h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                                                volupt.</a></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad
                                            dolore labore laborum perspiciatis...</p>
                                    </div><a href="#" class="blog-read"><span>read more</span><i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="blog-card">
                                <div class="blog-img"><img src="images/blog/03.jpg" alt="blog">
                                    <div class="blog-overlay"><span class="safety">safety</span></div>
                                </div>
                                <div class="blog-content"><a href="#" class="blog-avatar"><img
                                            src="images/avatar/02.jpg" alt="avatar"></a>
                                    <ul class="blog-meta">
                                        <li><i class="fas fa-user"></i>
                                            <p><a href="#">LabonnoKhan</a></p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>02 Feb 2021</p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum quaerat
                                                volupt.</a></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad
                                            dolore labore laborum perspiciatis...</p>
                                    </div><a href="#" class="blog-read"><span>read more</span><i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-12">
                            <div class="blog-details-navigate"><a href="#"><i
                                        class="fas fa-long-arrow-alt-left"></i><span>Previous Post</span></a><a
                                    href="#"><span>Next Post</span><i class="fas fa-long-arrow-alt-right"></i></a></div>
                        </div> -->
                    </div>
                    <!-- <div class="blog-details-comment">
                        <div class="comment-title">
                            <h3>Comments (3)</h3>
                        </div>
                        <ul class="comment-list">
                            <li>
                                <div class="comment">
                                    <div class="comment-author"><a href="#"><img src="images/avatar/01.jpg"
                                                alt="comment"></a><button class="btn btn-inline"><i
                                                class="fas fa-reply-all"></i><span>reply</span></button></div>
                                    <div class="comment-content">
                                        <h4><a href="#">MironMahmud</a><span>02 February 2020</span></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ab aperiam
                                            corrupti maiores animi nisi ratione maxime quae in doloremque corporis
                                            tempore earum ut voluptas exercitationem.</p>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author"><a href="#"><img src="images/avatar/02.jpg"
                                                        alt="comment"></a><button class="btn btn-inline"><i
                                                        class="fas fa-reply-all"></i><span>reply</span></button></div>
                                            <div class="comment-content">
                                                <h4><a href="#">LabonnoKhan</a><span>02 February 2020</span></h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ab
                                                    aperiam corrupti maiores animi nisi ratione maxime quae in
                                                    doloremque corporis tempore earum ut voluptas exercitationem.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author"><a href="#"><img src="images/avatar/03.jpg"
                                                alt="comment"></a><button class="btn btn-inline"><i
                                                class="fas fa-reply-all"></i><span>reply</span></button></div>
                                    <div class="comment-content">
                                        <h4><a href="#">MironMahmud</a><span>02 February 2020</span></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ab aperiam
                                            corrupti maiores animi nisi ratione maxime quae in doloremque corporis
                                            tempore earum ut voluptas exercitationem.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-details-form">
                        <div class="form-title">
                            <h3>Leave Your Comment</h3>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" class="form-control"
                                            placeholder="Your Name"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" class="form-control"
                                            placeholder="Your Email"></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group"><textarea class="form-control"
                                            placeholder="Your Comment"></textarea></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-btn"><button type="submit" class="btn btn-inline"><i
                                                class="fas fa-tint"></i><span>Drop your comment</span></button></div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection