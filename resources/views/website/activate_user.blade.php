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
                        <h2>Packages</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="intro-part" style="margin:0px">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-center-heading">
               <h2>Amazing!, Your Account is Activated.</h2>
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                  voluptatum repudiandae veniam maxime tenetur.
               </p>
               <a href="ad-post.html"
                  class="btn btn-outline"><i class="fas fa-plus-circle"></i><span>post your ad</span></a> -->
            </div>
         </div>
      </div>
   </div>
</section>
<section class="price-part">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-center-heading">
               <h2>Choose your Package</h2>
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                  voluptatum repudiandae veniam maxime tenetur.
               </p> -->
            </div>
         </div>
      </div>
      <div class="row">
      @foreach($package as $row)
         <div class="col-md-6 col-lg-4">
            <div class="price-card">
               <div class="price-head">
                  <i class="flaticon-bicycle"></i>
                  <h3>AED {{$row->price}}</h3>
                  <h4 class="translate">{{$row->package_name}}</h4>
               </div>
               <ul class="price-list">
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>{{$row->duration}} / 
                     @if($row->duration_period == 1)
                     Months
                     @else 
                     Days
                     @endif</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>No of Ads {{$row->no_of_ads}}</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>Popular Ads {{$row->popular_ads}}</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>Top Search {{$row->top_search}}</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p class="translate">{{$row->support}}</p>
                  </li>
               </ul>
               <div class="price-btn">
                  <a href="#" onclick="ApplyPackage({{$user->id}},{{$row->id}})" class="btn btn-inline"><i
                  class="fas fa-sign-in-alt"></i><span>Register Now</span></a>
               </div>
            </div>
         </div>
         @endforeach
         <!-- <div class="col-md-6 col-lg-4">
            <div class="price-card price-active">
               <div class="price-head">
                  <i class="flaticon-car-wash"></i>
                  <h3>AED  23</h3>
                  <h4>Standard Plan</h4>
               </div>
               <ul class="price-list">
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>1 Recom Ad for 30 days</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>No Featured Ad Available</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>No Ad will be bumped up</p>
                  </li>
                  <li>
                     <i class="fas fa-times"></i>
                     <p>No Top Ad Available</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>Basic Support</p>
                  </li>
               </ul>
               <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                  class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
            </div>
         </div>
         <div class="col-md-6 col-lg-4">
            <div class="price-card">
               <div class="price-head">
                  <i class="flaticon-airplane"></i>
                  <h3>AED  49</h3>
                  <h4>Premium Plan</h4>
               </div>
               <ul class="price-list">
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>1 Featured Ad for 60 days</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>Access to All features</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>With Recommended</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>Ad Top Category</p>
                  </li>
                  <li>
                     <i class="fas fa-plus"></i>
                     <p>Priority Support</p>
                  </li>
               </ul>
               <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                  class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
            </div>
         </div> -->
      </div>
   </div>
</section>
<script type="text/javascript">
function ApplyPackage(customer_id,package_id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/activate-plan/'+customer_id+'/'+package_id,
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
               window.location.href="/login";
            });
        }
      });
    } 
}
</script>
@endsection