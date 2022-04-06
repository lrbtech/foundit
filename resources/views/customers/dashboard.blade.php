@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/dashboard.css">
@endsection
@section('section')
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{$language[3][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{$language[60][session()->get('lang')]}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[3][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customers.menu')
    <section class="dashboard-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Newsletter</h3><button data-dismiss="alert">close</button>
                        </div>
                        <div class="dash-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore enim illum quos sed
                                dolore iusto necessitatibus ut voluptatibus repellat Eaque molestiae cum laborum nobis
                                quidem vel modi ab quam ipsum eligendi excepturi reiciendis aspernatur veniam ex.
                                Debitis excepturi atque. Ducimus dignissimos. Illo ut dolorem in vel blanditiis facere
                                aliquid ipsum.</p>
                        </div>
                    </div> -->
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[106][session()->get('lang')]}}</h3><button data-dismiss="alert">close</button>
                        </div>
                        <div class="dash-review-widget">
                            <h4>({{$reviews_count}}) {{$language[106][session()->get('lang')]}}</h4>
                            <!-- <select class="custom-select">
                                <option selected>Unread Review</option>
                                <option value="1">All Review</option>
                                <option value="2">5 Star Review</option>
                                <option value="3">4 Star Review</option>
                                <option value="3">3 Star Review</option>
                                <option value="3">2 Star Review</option>
                                <option value="3">1 Star Review</option>
                            </select> -->
                        </div>
                        <ul class="review-list">
                            <!-- <li class="review-item">
                                <div class="review">
                                    <div class="review-head">
                                        <div class="review-author">
                                            <div class="review-avatar"><a href="#"><img src="/website/images/avatar/02.jpg"
                                                        alt="review"></a></div>
                                            <div class="review-meta">
                                                <h6><a href="#">labonno khan -</a><span>June 02, 2020</span></h6>
                                                <ul>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li>
                                                        <h5>- for product quality</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review-widget"><button class="review-dots-btn"><i
                                                    class="fas fa-ellipsis-v"></i></button>
                                            <ul class="review-widget-list">
                                                <li><a href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                                <li><a href="#"><i class="fas fa-flag"></i>Report</a></li>
                                                <li><a href="#"><i class="fas fa-shield-alt"></i>Block</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum
                                            ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.</p>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="review-head">
                                        <div class="review-author">
                                            <div class="review-avatar"><a href="#"><img src="/website/images/avatar/04.jpg"
                                                        alt="review"></a></div>
                                            <div class="review-meta">
                                                <h6><a href="#">Miron Mahmud</a></h6>
                                                <h6>Author - <span>June 02, 2020</span></h6>
                                            </div>
                                        </div>
                                        <div class="review-widget"><button class="review-dots-btn"><i
                                                    class="fas fa-ellipsis-v"></i></button>
                                            <ul class="review-widget-list">
                                                <li><a href="#"><i class="fas fa-edit"></i>Edit</a></li>
                                                <li><a href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum
                                            ipsum dolor cumque quas magni voluptatibus cupiditate minima.</p>
                                    </div>
                                    <form class="review-form"><input type="text" class="form-control"
                                            placeholder="Write Your Quote..."><button type="submit"><i
                                                class="fas fa-reply-all"></i>Reply</button></form>
                                </div>
                            </li> -->
                            @foreach($all_reviews as $row)
                            <li class="review-item">
                                <div class="review">
                                    <div class="review-head">
                                        <div class="review-author">
                                            <div class="review-avatar">
                                                @if($row->profile_image == '')
                                                <a href="#"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="{{$row->name}}"></a>
                                                @else 
                                                <a href="#"><img src="/upload_profile_image/{{$row->profile_image}}" alt="{{$row->name}}"></a>
                                                @endif
                                            </div>
                                            <div class="review-meta">
                                                <h6>
                                                    <a href="#">{{$row->name}}</a>- <span>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</span></h6>
                                                    <a href="/customer/edit-post-ad/{{$row->post_id}}">{{$row->title}}</a></h6>
                                                <ul>
                                                    <?php
                                                    for($i=1;$i<=5;$i++){
                                                        if($row->rating >= $i)
                                                        {
                                                        echo '<li><i class="fas fa-star active"></i></li>';
                                                        }
                                                        else{
                                                        echo '<li><i class="fas fa-star"></i></li>';
                                                        }
                                                    }
                                                    ?>
                                                
                                                    <li>
                                                        <h5>- {{$row->quote}}</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review-widget">
                                            <button class="review-dots-btn"><i class="fas fa-ellipsis-v"></i></button>
                                            <ul class="review-widget-list">
                                                <li><a onclick="DeleteReview({{$row->id}})" href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                                <!-- <li><a href="#"><i class="fas fa-flag"></i>Report</a></li>
                                                <li><a href="#"><i class="fas fa-shield-alt"></i>Block</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>{{$row->message}}</p>
                                    </div>
                                    <!-- <form class="review-form">
                                        <input type="text" class="form-control" placeholder="Write Your Quote...">
                                        <button type="submit"><i class="fas fa-reply-all"></i>Reply</button>
                                    </form> -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {!! $all_reviews->links('website.pagination') !!}
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
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[107][session()->get('lang')]}}</h3>
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
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[112][session()->get('lang')]}}</h3>
                        </div>
                        <ul class="account-card-list">
                            <li>
                                <h5>{{$language[113][session()->get('lang')]}}</h5>
                                <h6>{{$total_ads}}</h6>
                            </li>
                            <li>
                                <h5>{{$language[114][session()->get('lang')]}}</h5>
                                <h6>2</h6>
                            </li>
                            <li>
                                <h5>{{$language[115][session()->get('lang')]}}</h5>
                                <h6>0</h6>
                            </li>
                            <li>
                                <h5>{{$language[116][session()->get('lang')]}}</h5>
                                <h6>0</h6>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Fun fact</h3>
                        </div>
                        <div class="account-card-content">
                            <p>Your last ad running was 3 days ago and only have 5 hours left until your last ad
                                expires.</p>
                        </div>
                    </div> -->
                    <!-- <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Resources</h3><button data-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-link">
                            <li><a href="#"><i class="fas fa-dot-circle"></i><span>Asset Use Guidelines</span></a></li>
                            <li><a href="#"><i class="fas fa-dot-circle"></i><span>Authoring Tutorial</span></a></li>
                            <li><a href="#"><i class="fas fa-dot-circle"></i><span>Knowledgebase</span></a></li>
                            <li><a href="#"><i class="fas fa-dot-circle"></i><span>Watermarks</span></a></li>
                            <li><a href="#"><i class="fas fa-dot-circle"></i><span>Selling Tips</span></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-js')

<script>
$('.dashboard').addClass('active');

function DeleteReview(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/review-delete/'+id,
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
                    location.reload();
                }
            }) 
        }
      });
    } 
}
</script>
@endsection