<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\language;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;
use Hash;

class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function savefavouritepost($id){
        $favourite=favourite_post::where('post_id',$id)->where('user_id',Auth::user()->id)->get();
        if (count($favourite) == 0) {
            $favourite_post = new favourite_post;
            $favourite_post->date = date('Y-m-d');
            $favourite_post->post_id = $id;
            $favourite_post->user_id = Auth::user()->id;
            $favourite_post->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
    }

    public function deletefavouritepost($id){
        $favourite=favourite_post::find($id);
        $favourite->delete();
        return response()->json(['message' => 'Stored Successfully!'], 200);
    }

    public function bookmark(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	//$post_ads = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->orderBy('id','DESC')->paginate(10);

        $post_ads = DB::table("favourite_posts")
        ->where("favourite_posts.user_id",Auth::user()->id)
        ->join('post_ads', 'post_ads.id', '=', 'favourite_posts.post_id')
        ->where("post_ads.admin_status",0)
        ->orderBy('favourite_posts.id','DESC')
        ->select('post_ads.*','favourite_posts.id as f_id')
        ->paginate(10);
        $language = language::all();

        return view('customers.bookmark',compact('category','subcategory','post_ads','language'));
    }
}
