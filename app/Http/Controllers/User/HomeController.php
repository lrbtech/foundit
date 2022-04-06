<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\package;
use App\Models\used_package;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\search_history;
use App\Models\chat;
use App\Models\reviews;
use App\Models\language;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function changelanguage($language)
    {
        $user = User::find(Auth::user()->id);
        $user->lang = $language;
        $user->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function reviewdelete($id){
        $reviews = reviews::find($id);
        $reviews->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function dashboard(){
        // if(Auth::user()->package_id != 0){  
            $all_reviews =DB::table('reviews as r')
            ->join('users as u','u.id','=','r.sender_id')
            ->join('post_ads as p','p.id','=','r.post_id')
            ->select('r.*','u.profile_image','p.title','p.id as post_id')
            ->where('to_id',Auth::user()->id)
            ->orderBy('id','DESC')
            ->paginate(10);
            $reviews_count = reviews::where('to_id',Auth::user()->id)->count();
            $used_package = used_package::find(Auth::user()->package_id);
            $package_spent = used_package::where('customer_id',Auth::user()->id)->sum('price');

            $total_ads = post_ad::where('customer_id',Auth::user()->id)->count();
            $normal_ads = post_ad::where('customer_id',Auth::user()->id)->where('post_type',0)->count();
            $language = language::all();
            
            return view('customers.dashboard',compact('all_reviews','reviews_count','used_package','package_spent','total_ads','normal_ads','language'));
        // }
        // else{
        //     $package = package::where('status',0)->get();
        //     $used_package = used_package::find(Auth::user()->package_id);
        //     $language = language::all();
        //     return view('customers.packages',compact('package','used_package','language'));
        // }
    }

    public function searchhistory(){
        $search_history = search_history::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        $language = language::all();
        return view('customers.search_history',compact('search_history','language'));
    }

    public function searchhistorydelete($id){
        $search_history = search_history::find($id);
        $search_history->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
    
    public function packages(){
        $package = package::where('status',0)->get();
        $used_package = used_package::find(Auth::user()->package_id);
        $language = language::all();
        return view('customers.packages',compact('package','used_package','language'));
    }

    public function applypackage($id){
        $package = package::find($id);

        $post_ads = post_ad::where('customer_id',Auth::user()->id)->where('package_status',0)->get();
        foreach($post_ads as $row){
            $post_ad = post_ad::find($row->id);
            $post_ad->package_status = 1;
            $post_ad->save();
        }

        $used_package = new used_package;
        $used_package->customer_id = Auth::user()->id;
        $used_package->package_id = $package->id;
        $used_package->package_name = $package->package_name;
        $used_package->price = $package->price;
        $used_package->duration_period = $package->duration_period;
        $used_package->duration = $package->duration;
        $used_package->no_of_ads = $package->no_of_ads;
        $used_package->popular_ads = $package->popular_ads;
        $used_package->top_search = $package->top_search;
        $used_package->support = $package->support;

        $days=0;
        if($package->duration_period == 1){
            $days = $package->duration * 28;
        }
        elseif($row->duration_period == 2){
            $days = $package->duration;
        }
        $today = date('Y-m-d');
        $used_package->apply_date = $today;
        $used_package->expire_date = date('Y-m-d', strtotime($today . '+'.$days.'days'));
        $used_package->no_of_days = $days;

        $used_package->save();

        $user = User::find(Auth::user()->id);
        $user->package_id = $used_package->id;
        $user->package_status = 0;
        $user->save();

        return response()->json('successfully save'); 
    }


}
