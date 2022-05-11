@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<style>
.chat_count {
    position: relative;
    top: 30px;
    left: 25px;
    width: 25px;
    height: 25px;
    color:#fff;
    background-color: #011645;
    border-radius: 13px;
    border: 0px solid #FAFAFA;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
}

.notification .badge {
    position: absolute;
    top: 30px;
    left: 25px;
    /* width: 25px;
    height: 25px; */
    color:#fff;
    text-align:center !important;
    background-color: #011645;
    border-radius: 13px;
    border: 0px solid #FAFAFA;
    font-size: 10px;
    font-weight: bold;
}

</style>
@endsection
@section('section')   
<!-- Right sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
    <div class="page-header">
        <div class="row">
        <div class="col-lg-6 main-header">
            <h2>{{$language[37][Auth::guard('admin')->user()->lang]}}</h2>
            <h6 class="mb-0">{{$language[0][Auth::guard('admin')->user()->lang]}}</h6>
        </div>
        <div class="col-lg-6 breadcrumb-right">     
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="pe-7s-home"></i></a></li>
            <li class="breadcrumb-item active">Chat with Customer</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <div class="col call-chat-sidebar col-sm-12">
        <div class="card">
            <div class="card-body chat-body">
            <div class="chat-box">
                <!-- Chat left side Start-->
                <div class="chat-left-aside">
                <!-- <div class="media"><img class="rounded-circle user-image" src="/assets/images/user/12.png" alt="">
                    <div class="about">
                    <div class="name f-w-600">Mark Jecno</div>
                    <div class="status">Status...</div>
                    </div>
                </div> -->
                <div style="height:650px;" class="people-list" id="people-list">
                    <div class="search">
                    <form class="theme-form">
                        <div class="form-group">
                        <input autocomplete="off" id="search_input" class="form-control" type="text" placeholder="search"><i class="fa fa-search"></i>
                        </div>
                    </form>
                    </div>
                    <ul style="max-height:550px;overflow: scroll;" class="list">
                        @foreach($customer as $row)
                        <li class="clearfix list_customer">
                            <a class="notification" href="javascript:;" onclick="viewChat({{$row->id}})">
                            <img class="rounded-circle user-image" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
                            <!-- <div class="status-circle online chat_count">
                                1000000
                            </div> -->
                            <span class="badge">
                                <center>{{ \App\Http\Controllers\Admin\ChatController::viewmsgcount($row->id) }}</center>
                            </span>
                            
                            <div class="about">
                                <div class="name">{{$row->first_name}} {{$row->last_name}}</div>
                                <div class="status">{{$row->mobile}}</div>
                                <!-- <div class="status">New Message : 100</div> -->
                            </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                </div>
                <!-- Chat left side Ends-->
            </div>
            </div>
        </div>
        </div>
        <div class="col call-chat-body">
        <div class="card">
            <div class="card-body p-0">
            <div class="row chat-box">
                <!-- Chat right side start-->
                <div class="col pr-0 chat-right-aside">
                <!-- chat start-->

                <div id="full_view" class="chat">
                    {{--<!-- chat-header start-->
                    <div class="chat-header clearfix"><img class="rounded-circle" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
                    <div class="about">
                        <div class="name">Kori Thomas  
                            <!-- <span class="font-primary f-12">Typing...</span> -->
                        </div>
                        <div class="status digits">Last Seen 3:55 PM</div>
                    </div>
                    </div>
                    <!-- chat-header end-->
                    <div class="chat-history chat-msg-box custom-scrollbar">
                    <ul>
                        <li>
                        <div class="message my-message"><img class="rounded-circle float-left chat-user-img img-30" src="/assets/images/user/3.png" alt="">
                            <div class="message-data text-right"><span class="message-data-time">10:12 am</span></div>                                                            Are we meeting today? Project has been already finished and I have results to show you.
                        </div>
                        </li>
                        <li class="clearfix">
                        <div class="message other-message pull-right"><img class="rounded-circle float-right chat-user-img img-30" src="/assets/images/user/12.png" alt="">
                            <div class="message-data"><span class="message-data-time">10:14 am</span></div>                                                            Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so?
                        </div>
                        </li>
                        <li class="clearfix">
                        <div class="message other-message pull-right"><img class="rounded-circle float-right chat-user-img img-30" src="/assets/images/user/12.png" alt="">
                            <div class="message-data"><span class="message-data-time">10:14 am</span></div>                                                            Well I am not sure. The rest of the team
                        </div>
                        </li>
                        <li>
                        <div class="message my-message mb-0"><img class="rounded-circle float-left chat-user-img img-30" src="/assets/images/user/3.png" alt="">
                            <div class="message-data text-right"><span class="message-data-time">10:20 am</span></div>                                                            Actually everything was fine. I'm very excited to show this to our team.
                        </div>
                        </li>
                    </ul>
                    </div>
                    <!-- end chat-history-->
                    <div class="chat-message clearfix">
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                        <div class="input-group text-box">
                            <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">SEND</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>--}}
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
@section('extra-js')
<script src="/assets/app-assets/js/chat-menu.js"></script>

<script type="text/javascript">
$('.chat-customer').addClass('active');

var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

var user_id=0;

function viewChat(id)
{
    $.ajax({
    url : '/admin/get-customer-chat/'+id,
    type: "GET",
    success: function(data)
    {
        $('#full_view').html(data.html);
        user_id = data.channel_name;
        var element = document.getElementById("chat_view");
        element.scrollTop = element.scrollHeight;
    }
  });
}

setInterval(function(){
    $.ajax({
        url : '/admin/view-customer-chat-count/'+user_id,
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                viewchatpartial(user_id);
            }
        }
    });
},1000);

function viewchatpartial(id)
{
    $.ajax({
    url : '/admin/view-customer-chat/'+id,
    type: "GET",
    success: function(data)
    {
        $('#chat_view').html(data.html);
        var element = document.getElementById("chat_view");
        element.scrollTop = element.scrollHeight;
    }
  });
}

document.onkeyup = function (e) {
	e = e || window.event;//Get event

	if (e.which == 13) {
	  e.preventDefault();
	  SaveChat();
 	} 
};

function SaveChat(){
  //alert($("#service_id").val());
  var formData = new FormData($('#chat_form')[0]);
  $.ajax({
      url : '/admin/save-customer-chat',
      type: "POST",
      data: {'message':$('#message').val(),'customer_id':$('#customer_id').val(),'_token': $('input[name=_token]').val()},
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);                
        // $("#chat_form")[0].reset();
        //toastr.success('Chat Send Successfully');
        $("#message").val('');
        viewchatpartial(data);

      },
      error: function (data, errorThrown) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
        });
      }
  });
}

$("#search_input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".list_customer").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
@endsection