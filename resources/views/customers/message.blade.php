@extends('customers.layout')
@section('extra-css')
<link rel="stylesheet" href="/website/css/custom/message.css">
<link rel="stylesheet" href="/website/css/custom/chat-main.css">
<link rel="stylesheet" href="/website/css/vendor/nice-select.min.css">
<link rel="stylesheet" href="/website/css/vendor/emojionearea.min.css">
<link rel="stylesheet" href="/website/fonts/font-awesome/fontawesome.css">
<style>
.emojionearea .emojionearea-button {
    right:100px;
}
.attach {
    width: 46px;
    height: 46px;
    margin-right: 40px;
    font-size: 15px;
    line-height: 46px;
    border-radius: 10px !important;
    text-align: center;
    color: #000 !important;
    background: #fff !important;
}
.progress {
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
    box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
}
.progress-bar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    overflow: hidden;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    background-color: #28a745;
    transition: width .6s ease;
    font-size: 16px;
    text-align: center;
}
#uploadStatus {
    padding: 10px 20px;
    margin-top: 10px;
    font-size: 18px;
    text-align: center;
}

.buttonDownload {
	display: inline-block;
	position: relative;
	padding: 10px 25px;
  
	background-color: #4CC713;
	color: white;
  
	font-family: sans-serif;
	text-decoration: none;
	font-size: 0.9em;
	text-align: center;
	text-indent: 15px;
}

.buttonDownload:hover {
	background-color: #333;
	color: white;
}

.buttonDownload:before, .buttonDownload:after {
	content: ' ';
	display: block;
	position: absolute;
	left: 15px;
	top: 52%;
}

/* Download box shape  */
.buttonDownload:before {
	width: 10px;
	height: 2px;
	border-style: solid;
	border-width: 0 2px 2px;
}

/* Download arrow shape */
.buttonDownload:after {
	width: 0;
	height: 0;
	margin-left: 3px;
	margin-top: -7px;
  
	border-style: solid;
	border-width: 4px 4px 0 4px;
	border-color: transparent;
	border-top-color: inherit;
	
	animation: downloadArrow 2s linear infinite;
	animation-play-state: paused;
}

.buttonDownload:hover:before {
	border-color: #4CC713;
}

.buttonDownload:hover:after {
	border-top-color: #4CC713;
	animation-play-state: running;
}

/* keyframes for the download icon anim */
@keyframes downloadArrow {
	/* 0% and 0.001% keyframes used as a hackish way of having the button frozen on a nice looking frame by default */
	0% {
		margin-top: -7px;
		opacity: 1;
	}
	
	0.001% {
		margin-top: -15px;
		opacity: 0;
	}
	
	50% {
		opacity: 1;
	}
	
	100% {
		margin-top: 0;
		opacity: 0;
	}
}


.btn-slide, .btn-slide2 {
    position: relative;
    display: inline-block;
    height: 50px;
    width: 250px;
    line-height: 50px;
    padding: 0;
    border-radius: 50px;
    background: #fdfdfd;
    border: 2px solid #0099cc;
    margin: 10px;
    transition: .5s;
}

.btn-slide2 {
    border: 2px solid #efa666;
}

.btn-slide:hover {
    background-color: #0099cc;
}

.btn-slide2:hover {
    background-color: #efa666;
}

.btn-slide:hover span.circle, .btn-slide2:hover span.circle2 {
    left: 100%;
    margin-left: -45px;
    background-color: #fdfdfd;
    color: #0099cc;
}

.btn-slide2:hover span.circle2 {
    color: #efa666;
}

.btn-slide:hover span.title, .btn-slide2:hover span.title2 {
    left: 40px;
    opacity: 0;
}

.btn-slide:hover span.title-hover, .btn-slide2:hover span.title-hover2 {
    opacity: 1;
    left: 40px;
}

.btn-slide span.circle, .btn-slide2 span.circle2 {
    display: block;
    background-color: #0099cc;
    color: #fff;
    position: absolute;
    float: left;
    margin: 5px;
    line-height: 42px;
    height: 40px;
    width: 40px;
    top: 0;
    left: 0;
    transition: .5s;
    border-radius: 50%;
}

.btn-slide2 span.circle2 {
    background-color: #efa666;
}

.btn-slide span.title,
  .btn-slide span.title-hover, .btn-slide2 span.title2,
  .btn-slide2 span.title-hover2 {
    position: absolute;
    left: 45px;
    text-align: center;
    margin: 0 auto;
    font-size: 16px;
    font-weight: bold;
    color: #30abd5;
    transition: .5s;
}

.btn-slide2 span.title2,
  .btn-slide2 span.title-hover2 {
    color: #efa666;
    left: 45px;
  }

.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
    left: 80px;
    opacity: 0;
}

.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
    color: #fff;
}
</style>
@endsection
@section('section')
<section class="message-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4">
                <div class="message-filter">
                    <div class="message-filter-group">
                        <select class="select">
                            <option value="">Chat List</option>
                            <!-- <option value="">read message</option>
                            <option value="">unread message</option> -->
                        </select>
                        <button class="message-filter-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <form class="message-filter-src">
                    <input id="search_input" type="text" placeholder="Search for Username"></form>
                    <ul style="height:500px !important;" class="message-list">
                        @if(count($datas) > 0)
                        @foreach($datas as $row)
                            {{ \App\Http\Controllers\User\ChatController::chatuserslist($row['id'],$row['post_id']) }}
                        @endforeach
                        @endif
                        <!-- <li class="message-item unread">
                            <a href="message.html" class="message-link">
                                <div class="message-img active"><img src="/website/images/avatar/01.jpg" alt="avatar"></div>
                                <div class="message-text">
                                    <h6>miron mahmud <span>now</span></h6>
                                    <p>How are you my best frie...</p>
                                </div>
                                <span class="message-count">4</span>
                            </a>
                        </li> -->
                        <!-- <li class="message-item unread">
                            <a href="message.html" class="message-link">
                                <div class="message-img"><img src="/website/images/avatar/02.jpg" alt="avatar"></div>
                                <div class="message-text">
                                    <h6>tahmina bonny <span>2h</span></h6>
                                    <p>How are you my best frie...</p>
                                </div><span class="message-count">12</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8">
                <div id="viewchat" class="message-inbox">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<div id="documentmodal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div style="max-width:500px !important;" class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="float:left;" class="modal-title">Upload Document</h4>
        <button style="float:right;" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 col-md-12 col-sm-12 column">
            <form method="POST" id="upload_form" class="message-seller-pop" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label>Upload Files (Support Files .jpeg,.jpg,.png,.pdf,.docx)</label><br>
                    <input multiple accept=".jpeg,.jpg,.png,.pdf,.docx" type="file" name="upload_files[]" id="upload_files">
                </div> 
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div id="uploadStatus"></div>
            </form>
        </div>
      </div>
      <div style="display:block;" class="modal-footer">
        <button onclick="UploadDocument()" style="float:right;" type="button" class="btn btn-inline">Upload</button>
        <button id="modal-close-btn" style="float:left;" type="button" class="btn btn-inline" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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
$('.message').addClass('active');

var user=0;
var post=0;
function viewChat(user_id,post_id)
{
    $('.chatclass').removeClass('unread');
    $('#'+user_id+post_id).addClass('unread');
    $.ajax({
        url : '/customer/get-chat/'+user_id+'/'+post_id,
        type: "GET",
        success: function(data)
        {
            $('#viewchat').html(data.html);
            user = user_id;
            post = post_id;
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

setInterval(function(){
    $.ajax({
        url : '/customer/get-new-chat-count/'+user+'/'+post,
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                reloadChat(user,post);
            }
        }
    });
},1000);

function reloadChat(user_id,post_id)
{
    $.ajax({
        url : '/customer/reload-chat/'+user_id+'/'+post_id,
        type: "GET",
        success: function(data)
        {
            $('#new_chat').html(data.html);
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

function SendChat(){
    var formData = new FormData($('#chat_form')[0]);
    $.ajax({
        url : '/customer/save-chat-customer',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);                
            $("#chat_form")[0].reset();
            Swal.fire({
                //title: "Please Check Your Email",
                text: 'Successfully Send',
                icon: "success",
                confirmButtonClass: 'btn btn-inline',
                buttonsStyling: false,
            }).then(function() {
                $('textarea[name=msg]').val('');
                $(".emojionearea-editor").html('');
                reloadChat(data.user_id,data.post_id); 
            });
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                //toastr.error();
                Swal.fire({
                    //title: "Please Check Your Email",
                    text: obj[0],
                    icon: "error",
                    confirmButtonClass: 'btn btn-inline',
                    buttonsStyling: false,
                });
            });
        }
    });
}

function DocumentClearHistory() {  
    //$('#documentmodal').modal('show');
    $(".progress-bar").width('0%');
    $("#upload_form")[0].reset();
    $('#uploadStatus').html('');
}

function closepopup(){
    $('#modal-close-btn').click();
}


function UploadDocument()
{
    // e.preventDefault();
    var formData = new FormData($('#upload_form')[0]);
    var to_id = $('#to_id').val();
    var post_id = $('#post_id').val();
    formData.append('to_id', to_id);
    formData.append('post_id', post_id);
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = ((evt.loaded / evt.total) * 100);
                    $(".progress-bar").width(percentComplete + '%');
                    $(".progress-bar").html(percentComplete+'%');
                }
            }, false);
            return xhr;
        },
        type: 'POST',
        url: '/customer/chat-upload-document',
        data: formData,
        contentType: false,
        cache: false,
        processData:false,
        dataType:'JSON',
        beforeSend: function(){
            $(".progress-bar").width('0%');
            $('#uploadStatus').html('<img style="width:60px;" src="/images/loading.gif"/>');
        },
        // error:function(){
        //     $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
        // },
        success: function(data)
        {
            $('#upload_form')[0].reset();
            $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
            viewChat(data.user_id,data.post_id); 
            setTimeout(closepopup, 3000);
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                // $('#uploadStatus').html(obj[0]);
                $('#uploadStatus').html('<p style="color:#EA4335;">'+obj[0]+'</p>');
            });
        }
    });
}

function ChatDelete(user_id,post_id)
{
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url : '/customer/chat-delete/'+user_id+'/'+post_id,
            type: "GET",
            success: function(data)
            {
                Swal.fire({
                    title: "Chat Deleted Successfully",
                    icon: "success",
                }).then(function() {
                    location.reload();
                });
            }
        });
    }
}

$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message1").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $(".time").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$("#search_input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message-item").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
@endsection