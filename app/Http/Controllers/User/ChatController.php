<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\language;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\chat;
use App\Models\admin_customer;
use App\Models\settings;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function savechatview($id){
        $post = post_ad::find($id);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->msg = 'Hi';
        $chat->sender_id = Auth::user()->id;
        $chat->post_id = $id;
        $chat->to_id = $post->customer_id;
        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!'], 200);
    }

    public function savechatcustomer(Request $request){
        $this->validate($request, [
            'msg'=>'required',
          ],[
            'msg.required' => 'Message Feild is Required',
        ]);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->msg = $request->msg;
        $chat->sender_id = Auth::user()->id;
        $chat->to_id = $request->to_id;
        $chat->post_id = $request->post_id;
        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public function message(){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id"))
        ->groupBy('c.sender_id','c.post_id')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id"))
        ->groupBy('c.to_id','c.post_id')
        ->get();

        $arraydata=array();
        $datas=array();
        foreach($chat_to as $key => $value){
            $arraydata[]=$value->post_id;
            $data = array(
                'id' => $value->to_id,
                'post_id' => $value->post_id,
            );
            $datas[] = $data;
        }
        foreach ($chat_from as $key => $value) {
            if(in_array($value->post_id , $arraydata))
            {
            }else{
                $arraydata[] = $value->sender_id;
                $data = array(
                    'id' => $value->sender_id,
                    'post_id' => $value->post_id,
                );
                $datas[] = $data;
            }
        } 
        $language = language::all();
        
        return view('customers.message',compact('datas','language'));
    }

    public static function chatuserslist($id,$post_id) {
        $user = User::find($id);
        $post = post_ad::find($post_id);

        $getnewchatcount = DB::table('chats')
        ->where([
            ['sender_id',$id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['read_status',0],
        ])
        ->count();
        
        $output='        
        <li id="'.$user->id.''.$post_id.'" value="'.$user->id.''.$post_id.'"  class="chatclass message-item">
            <a onclick="viewChat('.$user->id.','.$post_id.')" href="javascript:void(0);" class="message-link">
                <div class="message-img">';
                if($user->profile_image != ''){
                    $output.='<img src="/upload_profile_image/'.$user->profile_image.'" alt="avatar">';
                }
                else{
                    $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
                }
                $output.='</div>
                <div class="message-text">
                    <h6>'.$user->first_name.' '.$user->last_name.' 
                    <!-- <span>now</span> -->
                    </h6>';
                    if(!empty($post)){
                        $output.='<p>'.$post->title.'</p>';
                    }
                $output.='</div>
                <span class="message-count">'.$getnewchatcount.'</span>
            </a>
        </li>';
        echo $output;
    }

    public function getnewchatcount($user_id,$post_id){
        $getnewchatcount = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['read_status',0],
        ])
        ->count();
        return response()->json($getnewchatcount); 
    }

    public function getchat($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }

        $user = User::find($user_id);
        $post = post_ad::find($post_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
$output='
<div class="inbox-header">
    <div class="inbox-header-profile">
        <a class="inbox-header-img" href="#">';
            if($user->profile_image != ''){
                $output.='<img src="/upload_profile_image/'.$user->profile_image.'" alt="avatar">';
            }
            else{
                $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
            }
        $output.='</a>
        <div class="inbox-header-text">
            <h5><a href="#">'.$user->first_name.' '.$user->last_name.'</a></h5>';
            if(!empty($post)){
                $output.='<span>'.$post->title.'</span>';
            }
            $output.='</div>
    </div>
    <ul class="inbox-header-list">
        <li><a onclick="ChatDelete('.$user->id.','.$post_id.')" href="#" title="Delete" class="fas fa-trash-alt"></a></li>
        <!-- <li><a href="#" title="Report" class="fas fa-flag"></a></li>
        <li><a href="#" title="Block" class="fas fa-shield-alt"></a></li> -->
    </ul>
</div>
<ul id="new_chat" class="inbox-chat-list">';
foreach($chat as $row){
    $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
    if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
    $output.='<li class="inbox-chat-item my-chat">
        <div class="inbox-chat-img">';
        $from_user = User::find(Auth::user()->id);
        if($from_user->profile_image != ''){
            $output.='<img src="/upload_profile_image/'.$from_user->profile_image.'" alt="avatar">';
        }
        else{
            $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
        }
        $output.='</div>
        <div class="inbox-chat-content">
            <div class="inbox-chat-text">';
                if($row->chat_type == 0){
                    $output.='<p>'.$row->msg.'</p>';
                }
                else{
                    // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                    if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                        $output.='<div class="card">
                            <a download href="/chat_files/'.$row->upload_files.'">
                            <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                            </a>
                        </div>';
                    }else{
                        $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                            <span class="circle"><i class="fa fa-download"></i></span>
                            <span class="title">'.substr($row->file_name,0,20).'</span>
                            <span class="title-hover">Click here</span>
                        </a>';
                    }
                }
                $output.='<!-- <div class="inbox-chat-action">
                    <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                    <a href="#" title="Forward" class="fas fa-forward"></a>
                </div> -->
            </div>
            <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
        </div>
    </li>';
    }
    elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
    $output.='<li class="inbox-chat-item">
        <div class="inbox-chat-img">';
        $to_user = User::find($row->sender_id);
        if($to_user->profile_image != ''){
            $output.='<img src="/upload_profile_image/'.$to_user->profile_image.'" alt="avatar">';
        }
        else{
            $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
        }
        $output.='</div>
        <div class="inbox-chat-content">
            <div class="inbox-chat-text">';
                if($row->chat_type == 0){
                    $output.='<p>'.$row->msg.'</p>';
                }
                else{
                    // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                    if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                        $output.='<div class="card">
                            <a download href="/chat_files/'.$row->upload_files.'">
                            <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                            </a>
                        </div>';
                    }else{
                        $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                            <span class="circle"><i class="fa fa-download"></i></span>
                            <span class="title">'.substr($row->file_name,0,20).'</span>
                            <span class="title-hover">Click here</span>
                        </a>';
                    }
                }
                $output.='<!-- <div class="inbox-chat-action">
                    <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                    <a href="#" title="Forward" class="fas fa-forward"></a>
                </div> -->
            </div>
            <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
        </div>
    </li>';
    }
}
$output.='</ul>
<div class="inbox-chat-form">
    <form id="chat_form" action="javascript:void(0);">
    '.csrf_field().'
    <input value="'.$user_id.'" type="hidden" name="to_id" id="to_id">
    <input value="'.$post_id.'" type="hidden" name="post_id" id="post_id">
    <textarea name="msg" placeholder="Type a Message" id="chat-emoji"></textarea>
    <button onclick="DocumentClearHistory()" data-toggle="modal" data-target="#documentmodal" type="button"><i class="attach fas fa-paperclip"></i></button>
    <button onclick="SendChat()" type="button"><i class="fas fa-paper-plane"></i></button>
    </form>
</div>
<script src="/website/js/vendor/emojionearea.min.js"></script>
<script src="/website/js/vendor/nicescroll.min.js"></script>
<script src="/website/js/custom/nicescroll.js"></script>
<script src="/website/js/custom/emojionearea.js"></script>
'; 
        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


    public function reloadchat($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }

        $user = User::find($user_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='';
        foreach($chat as $row){
            $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
            if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
            $output.='<li class="inbox-chat-item my-chat">
                <div class="inbox-chat-img">';
                $from_user = User::find(Auth::user()->id);
                if($from_user->profile_image != ''){
                    $output.='<img src="/upload_profile_image/'.$from_user->profile_image.'" alt="avatar">';
                }
                else{
                    $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
                }
                $output.='</div>
                <div class="inbox-chat-content">
                    <div class="inbox-chat-text">';
                        if($row->chat_type == 0){
                            $output.='<p>'.$row->msg.'</p>';
                        }
                        else{
                            // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                            if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                                $output.='<div class="card">
                                    <a download href="/chat_files/'.$row->upload_files.'">
                                    <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                                    </a>
                                </div>';
                            }else{
                                $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                                    <span class="circle"><i class="fa fa-download"></i></span>
                                    <span class="title">'.substr($row->file_name,0,20).'</span>
                                    <span class="title-hover">Click here</span>
                                </a>';
                            }
                        }
                        $output.='<!-- <div class="inbox-chat-action">
                            <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                            <a href="#" title="Forward" class="fas fa-forward"></a>
                        </div> -->
                    </div>
                    <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
                </div>
            </li>';
            }
            elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
            $output.='<li class="inbox-chat-item">
                <div class="inbox-chat-img">';
                $to_user = User::find($row->sender_id);
                if($to_user->profile_image != ''){
                    $output.='<img src="/upload_profile_image/'.$to_user->profile_image.'" alt="avatar">';
                }
                else{
                    $output.='<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="avatar">';
                }
                $output.='</div>
                <div class="inbox-chat-content">
                    <div class="inbox-chat-text">';
                        if($row->chat_type == 0){
                            $output.='<p>'.$row->msg.'</p>';
                        }
                        else{
                            // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                            if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                                $output.='<div class="card">
                                    <a download href="/chat_files/'.$row->upload_files.'">
                                    <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                                    </a>
                                </div>';
                            }else{
                                $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                                    <span class="circle"><i class="fa fa-download"></i></span>
                                    <span class="title">'.substr($row->file_name,0,20).'</span>
                                    <span class="title-hover">Click here</span>
                                </a>';
                            }
                        }
                        $output.='<!-- <div class="inbox-chat-action">
                            <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                            <a href="#" title="Forward" class="fas fa-forward"></a>
                        </div> -->
                    </div>
                    <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
                </div>
            </li>';
            }
        }
        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }

    public function chatdelete($user_id,$post_id){
        $chat = chat::where('post_id',$post_id)->where('sender_id',$user_id)->where('to_id',Auth::user()->id)->delete();

        $chat1 = chat::where('post_id',$post_id)->where('sender_id',Auth::user()->id)->where('to_id',$user_id)->delete();

        return response()->json(['message' => 'Chat Deleted Successfully!'], 200);
    }

    public function chatbulkdelete(Request $request)
    {
        $arraydata=array();
        foreach($request->id as $row){
            foreach(explode(',',$row) as $user1){
            $arraydata[]=$user1;
            }
        }
       
        // $chat = chat::where('post_id',$post_id)->where('sender_id',$user_id)->where('to_id',Auth::user()->id)->delete();

        // $chat1 = chat::where('post_id',$post_id)->where('sender_id',Auth::user()->id)->where('to_id',$user_id)->delete();

        return response()->json(["Successfully Delete"], 200);
    }
    public function chatuploaddocument(Request $request){
        $this->validate($request, [
            //'upload_files'=>'required|max:1000',
            'upload_files' => 'required',
            'upload_files.*' => 'required'
          ],[
            //'upload_files.mimes' => 'Only jpeg,jpg,png,pdf,docx files are allowed',
            'upload_files.required' => 'Upload File is Required',
            //'upload_files.max' => 'Sorry! Maximum allowed size for an files is 1MB',
        ]);

        if ($request->hasFile('upload_files')) {
            $files = $request->file('upload_files'); // will get all files
        
            foreach ($files as $file) {
                $original_file_name = $file->getClientOriginalName();
                $new_file_name = rand().time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('chat_files/'), $new_file_name);

                $chat = new chat;
                $chat->date = date('Y-m-d');
                $chat->sender_id = Auth::user()->id;
                $chat->to_id = $request->to_id;
                $chat->post_id = $request->post_id;
                $chat->chat_type = 1;
                //$chat->chat_offer = 0;
                $chat->file_extension = $file->getClientOriginalExtension();
                $chat->file_name = $original_file_name;
                $chat->upload_files = $new_file_name;
                $chat->save();
            }
        }

        return response()->json(['message' => 'Save Chat Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public function chatadmin(){
        $chat_admin = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
        ])
        ->get();
        $language = language::all();
        return view('customers.chat_admin',compact('chat_admin','language'));
    }

    public function savechatadmin(Request $request){
        $request->validate([
            'message'=>'required',
        ]);
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $admin_customer = new admin_customer;
        $admin_customer->message = $request->message;
        $admin_customer->customer_id = Auth::user()->id;
        $admin_customer->date = date('Y-m-d');
        $admin_customer->time = date('h:i A');
        $admin_customer->message_from = 0;
        $admin_customer->save();
        $dateTime = new Carbon($admin_customer->created_at, new \DateTimeZone('Asia/Dubai'));

        // $settings = settings::first();
        // $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        // $from_email = Auth::user()->email;

        // Mail::send('mail.admin_chat',compact('admin_customer','settings','from_name'),function($message) use($settings,$from_name,$from_email){
        //     $message->to($settings->admin_receive_email)->subject('EZY Offer - Message From Customer');
        //     $message->from($from_email,$from_name);
        // });
  
        return response()->json(Auth::user()->id); 
    }

    public function getnewchatadmincount(){
        $getnewchatcount = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
            ['message_from',1],
        ])
        ->count();
        return response()->json($getnewchatcount); 
    }

    public function reloadchatadmin(){
        $get_chat = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
            ['message_from',1],
        ])
        ->get();

        foreach($get_chat as $row){
            $upchat = admin_customer::find($row->id);
            $upchat->read_status = 1;
            $upchat->save();
        }

        $chat = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
        ])
        ->get();

  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='';
        foreach($chat as $row){
            $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
            if($row->message_from == 0){
            $output.='<li class="inbox-chat-item my-chat">
                <div class="inbox-chat-content">
                    <div class="inbox-chat-text">
                        <p>'.$row->message.'</p>
                        <!-- <div class="inbox-chat-action">
                            <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                            <a href="#" title="Forward" class="fas fa-forward"></a>
                        </div> -->
                    </div>
                    <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
                </div>
            </li>';
            }
            else{
            $output.='<li class="inbox-chat-item">
                <div class="inbox-chat-content">
                    <div class="inbox-chat-text">
                        <p>'.$row->message.'</p>
                        <!-- <div class="inbox-chat-action">
                            <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                            <a href="#" title="Forward" class="fas fa-forward"></a>
                        </div> -->
                    </div>
                    <small class="inbox-chat-time">'.$dateTime->diffForHumans().'!</small>
                </div>
            </li>';
            }
        }

        return response()->json(['html'=>$output],200); 
    }



}
