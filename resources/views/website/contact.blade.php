@extends('website.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/contact.css">
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
                        <h2>{{$language[134][session()->get('lang')]}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$language[134][session()->get('lang')]}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top:-30px;" class="contact-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info"><i class="fas fa-map-marker-alt"></i>
                        <h3>{{$language[147][session()->get('lang')]}}</h3>
                        <p>{{$settings->address}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info"><i class="fas fa-phone-alt"></i>
                        <h3>{{$language[148][session()->get('lang')]}}</h3>
                        <p>{{$settings->landline}} <span>{{$settings->mobile}}</span></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info"><i class="fas fa-envelope"></i>
                        <h3>{{$language[149][session()->get('lang')]}}</h3>
                        <p>{{$settings->email}} <span>{{$settings->other_email}}</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                    <?php echo html_entity_decode($settings->iframe_map); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form method="post" id="form" class="contact-form translate">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control"placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="number" name="mobile" id="mobile" class="form-control"placeholder="Your mobile">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input name="subject" id="subject"  type="text" class="form-control" placeholder="Your Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="message" id="message"  class="form-control" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="button" id="send" onclick="Send()" class="btn btn-inline"><i class="fas fa-paper-plane"></i><span>send message</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
@section('extra-js')
<script>
function Send(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/contact-send-mail',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Send',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#form")[0].reset();
                    location.reload();
                    $("#send").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                if(i == 'message'){
                    $('textarea[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                    $('textarea[name='+i+']').closest('.form-group').addClass('has-error');
                }else{
                    $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                    $('input[name='+i+']').closest('.form-group').addClass('has-error');
                }
            });
            $("#send").attr("disabled", false);
        }
    });
}
</script>
@endsection