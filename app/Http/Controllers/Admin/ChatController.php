<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin_customer;
use App\Models\language;
use Hash;
use Auth;
use DB;
use Validator;
use Mail;
use Carbon\Carbon;
use StdClass;
use Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function chatcustomer(){
        $customer = User::all();
        $language = language::all();
        return view('admin.chat_customer',compact('customer','language'));
    }

    public function savecustomerchat(Request $request){
        $request->validate([
            'message'=>'required',
        ]);
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $admin_customer = new admin_customer;
        $admin_customer->message = $request->message;
        $admin_customer->customer_id = $request->customer_id;
        $admin_customer->date = date('Y-m-d');
        $admin_customer->time = date('h:i A');
        $admin_customer->message_from = 1;
        $admin_customer->save();
        $dateTime = new Carbon($admin_customer->created_at, new \DateTimeZone('Asia/Dubai'));
  
        return response()->json($request->customer_id); 
    }

    public function viewcustomerchatcount($id){
        $chat_count = admin_customer::where('customer_id',$id)->where('message_from',0)->where('read_status',0)->count();
        return response()->json($chat_count); 
    }

    public static function viewmsgcount($id) {        
        $chat_count = admin_customer::where('customer_id',$id)->where('message_from',0)->where('read_status',0)->count();
        return $chat_count; 
    }

    public function getcustomerchat($id){
        $customer = User::find($id);
        $chat = admin_customer::where('customer_id',$id)->get();

        $chat_count=admin_customer::where('customer_id',$id)->where('read_status',0)->get();
        foreach($chat_count as $row){
            $chat_up = admin_customer::find($row->id);
            $chat_up->read_status = 1;
            $chat_up->save();
        }

        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $time = date("h:i A"); 
        $date = date('Y-m-d'); 

//$output='';
$output='
<div class="chat-header clearfix"><img class="rounded-circle" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
<div class="about">
    <div class="name">'.$customer->first_name.' '.$customer->last_name.'  
        <!-- <span class="font-primary f-12">Typing...</span> -->
    </div>
    <div class="status digits">'.$customer->mobile.'</div>
</div>
<ul class="list-inline float-left float-sm-right chat-menu-icons">
    <li class="list-inline-item">
    <input autocomplete="off" id="search_text" class="form-control" type="text" placeholder="search">
    </li>
</ul>
</div>
<div id="chat_view" class="chat-history chat-msg-box custom-scrollbar">
<ul>';
foreach($chat as $row){
    $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
    if($row->message_from == '1'){
    $output.='<li class="clearfix">
    <div class="message other-message pull-right">
        <img class="rounded-circle float-right chat-user-img img-30" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
        <div class="message-data"><span class="message-data-time">'.$dateTime->diffForHumans().'</span>
        </div>                                                            
        '.$row->message.' 
    </div>
    </li>';
    }
    else{
    $output.='<li>
    <div class="message my-message">
        <img class="rounded-circle float-left chat-user-img img-30" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
        <div class="message-data text-right">
        <span class="message-data-time">'.$dateTime->diffForHumans().'</span>
        </div>                                                            
        '.$row->message.' 
    </div>
    </li>';
    }
}
$output.='</ul>
</div>
<div class="chat-message clearfix">
'.csrf_field().'
<div class="row">
    <div class="col-xl-12 d-flex">
    <div class="input-group text-box">
        <input type="hidden" value="'.$customer->id.'" name="customer_id" id="customer_id">
        <input id="message" name="message" class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
        <div class="input-group-append">
        <button onclick="SaveChat()" class="btn btn-primary" type="button">SEND</button>
        </div>
    </div>
    </div>
</div>
</div>
<script type="text/javascript">
$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
';
         
        return response()->json(['html'=>$output,'channel_name'=>$customer->id],200); 
    }


    public function viewcustomerchat($id){
        $customer = User::find($id);
        $chat = admin_customer::where('customer_id',$id)->get();

        $chat_count=admin_customer::where('customer_id',$id)->where('message_from',0)->where('read_status',0)->get();
        foreach($chat_count as $row){
            $chat_up = admin_customer::find($row->id);
            $chat_up->read_status = 1;
            $chat_up->save();
        }

        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $time = date("h:i A"); 
        $date = date('Y-m-d'); 

$output='';
$output.='<ul>';
foreach($chat as $row){
    $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
    if($row->message_from == '1'){
    $output.='<li class="clearfix">
    <div class="message other-message pull-right">
        <img class="rounded-circle float-right chat-user-img img-30" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
        <div class="message-data"><span class="message-data-time">'.$dateTime->diffForHumans().'</span>
        </div>                                                            
        '.$row->message.' 
    </div>
    </li>';
    }
    else{
    $output.='<li>
    <div class="message my-message">
        <img class="rounded-circle float-left chat-user-img img-30" src="https://admin.pixelstrap.com/poco/assets/images/user/1.jpg" alt="">
        <div class="message-data text-right">
        <span class="message-data-time">'.$dateTime->diffForHumans().'</span>
        </div>                                                            
        '.$row->message.' 
    </div>
    </li>';
    }
}
$output.='</ul>';
         
        return response()->json(['html'=>$output,'channel_name'=>$customer->id],200); 
    }

}
