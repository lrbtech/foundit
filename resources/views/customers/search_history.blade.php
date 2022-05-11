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
                        <h2>{{$language[61][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[61][session()->get('lang')]}}</li>
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
                <div class="col-lg-12">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>{{$language[61][session()->get('lang')]}}</h3><button data-dismiss="alert">close</button>
                        </div>
                        <ul class="review-list">
                            @foreach($search_history as $row)
                            <li class="review-item">
                                <div class="review">
                                    <div class="review-head">
                                        <div class="review-author">
                                            <div class="review-meta">
                                                <h6>
                                                    <a href="#">{{$row->search}}</a>- <span>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</span>
                                                </h6>
                                                    @if($row->city != '')
                                                    <a href="/#">{{ \App\Http\Controllers\HomeController::viewonlycityname($row->city) }}</a> -
                                                    @endif
                                                    @if($row->subcategory != '') 
                                                    <a href="/#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a> -
                                                    @endif
                                                    @if($row->subcategory != '')
                                                    <a href="/#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->subcategory) }}</a>
                                                    @endif
                                                </h6>
                                                
                                            </div>
                                        </div>
                                        <div class="review-widget">
                                            <button class="review-dots-btn"><i class="fas fa-ellipsis-v"></i></button>
                                            <ul class="review-widget-list">
                                                <li><a onclick="Delete({{$row->id}})" href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                                <!-- <li><a href="#"><i class="fas fa-flag"></i>Report</a></li>
                                                <li><a href="#"><i class="fas fa-shield-alt"></i>Block</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <form class="review-form">
                                        <input type="text" class="form-control" placeholder="Write Your Quote...">
                                        <button type="submit"><i class="fas fa-reply-all"></i>Reply</button>
                                    </form> -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {!! $search_history->links('website.pagination') !!}
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
    </section>
@endsection
@section('extra-js')

<script>
$('.search-history').addClass('active');

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/search-history-delete/'+id,
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