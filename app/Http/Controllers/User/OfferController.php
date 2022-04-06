<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\chat;
use App\Models\language;
use Auth;
use App\Http\Controllers\LogsController;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use App\Events\MessageSent;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function offers(){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.to_id','c.post_id','c.chat_offer')
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
        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();

        return view('customers.offers',compact('category','subcategory','datas','language'));
    }

    public function offersnotification($user_id,$post_id){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.to_id','c.post_id','c.chat_offer')
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

        $get_offers = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->get();

        foreach($get_offers as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }
        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();

        return view('customers.offers_notification',compact('category','subcategory','datas','user_id','post_id','language'));
    }

    public function saveoffercustomer(Request $request){
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
        //$chat->chat_offer = $request->chat_offer;
        $chat->chat_offer = 1;
        $chat->save();

        return response()->json(['message' => 'Save Offer Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public static function offeruserslist($id,$post_id) {
        $user = User::find($id);
        $post = post_ad::find($post_id);
        //ps-dot

        $getnewofferscount = DB::table('chats')
        ->where([
            ['sender_id',$id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->count();
        
        $output='<li>';
            $output.='<a class="offerclass" id="'.$user->id.''.$post_id.'" value="'.$user->id.''.$post_id.'" onclick="viewOffer('.$user->id.','.$post_id.')" href="javascript:void(0);">';  
            $output.='<img style="width:41px;height:41px;" src="/upload_profile_image/'.$user->profile_image.'" class="mCS_img_loaded">
            <span style="margin-left:-20px;" class="badge badge-pill badge-danger badge-up">'.$getnewofferscount.'</span>
            <span class="ps-messages__text">
            <span>'.$user->first_name.' '.$user->last_name.'</span>';
                // <!-- <em>Jun 27, 2019</em> -->
                if(!empty($post)){
                    $output.='<em>'.$post->title.'</em>';
                }
                $output.='</span>
            </a>
        </li>';
        echo $output;
    }

    public function getnewofferscount($user_id,$post_id){
        $getnewofferscount = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->count();
        return response()->json($getnewofferscount); 
    }

    public function getoffer($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
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
<div class="ps-messages__user__heading">
    <a href="javascript:void(0);"><i class="ti-arrow-left"></i></a>
    <img style="width:41px;height:41px;" src="/upload_profile_image/'.$user->profile_image.'">
    <span class="ps-messages__text">
        <span>'.$user->first_name.' '.$user->last_name.'</span>
        <!-- <em>Last Online: Aug 08, 2019</em> -->';
        if(!empty($post)){
            $output.='<em>'.$post->title.'</em>';
        }
        $output.='</span>
    <!-- <a href="javascript:void(0);"><i class="ti-trash"></i></a> -->
</div>

<div class="ps-messages__area ps-y-axis mCustomScrollbar _mCS_3">
    <div style="max-height: 400px;overflow: scroll;" id="mCSB_3" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0">
        <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">';
        foreach($chat as $row){
            $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
            if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
            $output.='<div class="ps-messages__area__right general-message-cls">
                <p>'.$row->msg.'</p>
                <span>'.$dateTime->diffForHumans().'</span> 
            </div>';
            }
            elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
            $output.='<div class="ps-messages__area__left general-message-cls">
                <p>'.$row->msg.'</p>
                <span>'.$dateTime->diffForHumans().'</span>
            </div>';
            }
        }
        $output.='<div id="endChatPoint"></div></div>
        <div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
            <div class="mCSB_draggerContainer">
                <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 210px; max-height: 391px; top: 0px;">
                    <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                </div>
                <div class="mCSB_draggerRail"></div>
            </div>
        </div>
    </div>
</div>

<div class="ps-text__area">
    <form id="chat_form" action="javascript:void(0);">
    '.csrf_field().'
    <input value="'.$user_id.'" type="hidden" name="to_id" id="to_id">
    <input value="'.$post_id.'" type="hidden" name="post_id" id="post_id">
    <textarea name="msg" id="msg" class="form-control" placeholder="Type Message Here"></textarea>
    <div class="ps-emoji">
        <a href="javascript:void(0);">
            <img src="/images/messages/img-01.png" alt="Image Description">
            <span><i class="fas fa-angle-right"></i></span>
        </a>
        <button onclick="SendChat()" class="btn ps-btn">Send</button>
    </div>
    </form>
</div> 
'; 
  
$output.='
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
<script src="/js/vendor/masonry.pkgd.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/vendor/linkify.min.js"></script>
<script src="/js/vendor/linkify-jquery.min.js"></script>

<script>
setTimeout(function() { $( "#mCSB_3").scrollTop(10000000000000); });
</script>
';
// mCustomScrollbar.scrollTop($(".mCustomScrollBox > #mCSB_3_container").height());
        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


    public function reloadoffer($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
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
$output='
        <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">';
        foreach($chat as $row){
            $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Dubai'));
            if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
            $output.='<div class="ps-messages__area__right general-message-cls">
                <p>'.$row->msg.'</p>
                <span>'.$dateTime->diffForHumans().'</span> 
            </div>';
            }
            elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
            $output.='<div class="ps-messages__area__left general-message-cls">
                <p>'.$row->msg.'</p>
                <span>'.$dateTime->diffForHumans().'</span>
            </div>';
            }
        }
        $output.='<div id="endChatPoint"></div></div>
        <div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
            <div class="mCSB_draggerContainer">
                <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 210px; max-height: 391px; top: 0px;">
                    <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                </div>
                <div class="mCSB_draggerRail"></div>
            </div>
        </div>

'; 
  
$output.='
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
<script src="/js/vendor/masonry.pkgd.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/vendor/linkify.min.js"></script>
<script src="/js/vendor/linkify-jquery.min.js"></script>

<script>
setTimeout(function() { $( "#mCSB_3").scrollTop(10000000000000); });
</script>
';
// mCustomScrollbar.scrollTop($(".mCustomScrollBox > #mCSB_3_container").height());
        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


}
