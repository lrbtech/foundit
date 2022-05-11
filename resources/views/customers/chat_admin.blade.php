@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/message.css">
<link rel="stylesheet" href="/website/css/custom/chat-main.css">
<link rel="stylesheet" href="/website/css/vendor/nice-select.min.css">
<link rel="stylesheet" href="/website/css/vendor/emojionearea.min.css">
<link rel="stylesheet" href="/website/fonts/font-awesome/fontawesome.css">
@endsection
@section('section')
<section class="message-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div id="viewchat" class="message-inbox">

<div class="inbox-header">
    <div class="inbox-header-profile">
        <a class="inbox-header-img" href="#">
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">
        </a>
        <div class="inbox-header-text">
            <h5>{{$language[114][session()->get('lang')]}}</h5>
        </div>
    </div>
    <!-- <ul class="inbox-header-list">
        <li><a href="#" title="Delete" class="fas fa-trash-alt"></a></li>
        <li><a href="#" title="Report" class="fas fa-flag"></a></li>
        <li><a href="#" title="Block" class="fas fa-shield-alt"></a></li>
    </ul> -->
</div>
<ul id="new_chat" class="inbox-chat-list">';
@foreach($chat_admin as $row)
    @if($row->message_from == 0)
    <li class="inbox-chat-item my-chat">
        <div class="inbox-chat-content">
            <div class="inbox-chat-text">
                <p>{{$row->message}}</p>
                <!-- <div class="inbox-chat-action">
                    <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                    <a href="#" title="Forward" class="fas fa-forward"></a>
                </div> -->
            </div>
            <small class="inbox-chat-time">{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}!</small>
        </div>
    </li>
    @else
    <li class="inbox-chat-item">
        <div class="inbox-chat-content">
            <div class="inbox-chat-text">
                <p>{{$row->message}}</p>
                <!-- <div class="inbox-chat-action">
                    <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                    <a href="#" title="Forward" class="fas fa-forward"></a>
                </div> -->
            </div>
            <small class="inbox-chat-time">{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}!</small>
        </div>
    </li>
    @endif 
@endforeach
</ul>
<div class="inbox-chat-form">
    <form id="chat_form" action="javascript:void(0);">
    {{csrf_field()}}
    <textarea name="message" placeholder="Type a Message" id="chat-emoji"></textarea>
    <button onclick="SendChat()" type="button"><i class="fas fa-paper-plane"></i></button>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra-js')
<script src="/website/js/vendor/nice-select.min.js"></script>
<script src="/website/js/vendor/emojionearea.min.js"></script>
<script src="/website/js/vendor/nicescroll.min.js"></script>
<script src="/website/js/custom/nice-select.js"></script>
<script src="/website/js/custom/nicescroll.js"></script>
<script src="/website/js/custom/emojionearea.js"></script>
<script src="/website/js/custom/chat-main.js"></script>
<script>
$('.chat_admin').addClass('active');

var user=<?php echo Auth::user()->id; ?>;
var element = document.getElementById("new_chat");
element.scrollTop = element.scrollHeight;

setInterval(function(){
    $.ajax({
        url : '/customer/get-new-chat-admin-count',
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                reloadChat();
            }
        }
    });
},1000);

function reloadChat()
{
    $.ajax({
        url : '/customer/reload-chat-admin',
        type: "GET",
        success: function(data)
        {
            $('#new_chat').html(data.html);
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

document.onkeyup = function (e) {
	e = e || window.event;//Get event

	if (e.which == 13) {
	  e.preventDefault();
	  SendChat();
 	} 
};
function SendChat(){
    $.ajax({
        url : '/customer/save-chat-admin',
        type: "POST",
        data: {'message':$('#chat-emoji').val(),'_token': $('input[name=_token]').val()},
        dataType: "JSON",
        success: function(data)
        {        
            // Swal.fire({
            //     title: "Chat Send Successfully",
            //     icon: "success",
            // }).then(function() {
            //     $("#message").val('');
            //     viewChat(data.user_id,data.post_id);   
            // });   
            $("#chat-emoji").val('');
            reloadChat(); 
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

// $("#search_text").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $(".message").filter(function() {
//         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//     $(".time").filter(function() {
//         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
// });
</script>
@endsection