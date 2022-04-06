<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\language;
use App\Models\settings;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\report_category;
use App\Models\chat;
use App\Models\trending_today;
use App\Models\User;
use App\Models\city;
use App\Models\favourite_post;
use App\Models\post_count;
use App\Models\search_history;
use App\Models\user_count;
use App\Models\post_feedback;
use App\Models\report_post;
use App\Models\reviews;
use App\Models\blog;
use App\Models\google_ads;
use Stichoza\GoogleTranslate\GoogleTranslate;
//use Statickidz\GoogleTranslate;
use Auth;
use Session;
use DB;
use Mail;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        //session(['lang'=>'english']);
    }
    
    public function updatelanguage($lang){
        Session::put('lang', $lang);
        return response()->json(['message' => 'Successfully update'], 200);
    }
    public function home(){
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();

        $settings = settings::first();

        $blog = blog::where('status',0)->orderBy('id','DESC')->get();

        $popular_ads = post_ad::where('popular_ads',1)->where('admin_status',0)->where('status',1)->get();

        $popular_ads_category = DB::table('post_ads')
        ->where('popular_ads',1)
        ->where('admin_status',0)
        ->where('status',1)
        ->groupBy('category')
        ->select('post_ads.category')
        ->get();

        $language = language::all();
        $google_ads = google_ads::first();
        
        return view('website.home',compact('category','subcategory','city','settings','blog','popular_ads','popular_ads_category','language','google_ads'));

    }


    public function getClientIP():string
    {
        $keys=array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR');
        foreach($keys as $k)
        {
            if (!empty($_SERVER[$k]) && filter_var($_SERVER[$k], FILTER_VALIDATE_IP))
            {
                return $_SERVER[$k];
            }
        }
        return "UNKNOWN";
    }

    public static function langchange($word) {
        $lang='en';
        $tr = new GoogleTranslate();
        if(session()->get('lang') == 'english'){
            $lang='en';
        }
        elseif(session()->get('lang') == 'arabic'){
            $lang='ar';
        }
        //return $tr->setSource('en')->setTarget($lang)->translate($word);
        //return GoogleTranslate::trans($word,$lang);
        return $word;    
    }

    public static function categorypostcount($id) {
        $post_count = post_ad::where('category',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }

    public static function citypostcount($id) {
        $post_count = post_ad::where('city',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }

    public static function subcategorypostcount($id) {
        $post_count = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }

    public static function homenoofpost($id) {
        $post_count = post_ad::where('customer_id',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }

    public static function humanreadtime($time) {
        $dateTime = new Carbon($time, new \DateTimeZone('Asia/Dubai'));
        //$this->languagechange($dateTime->diffForHumans());
        return static::langchange($dateTime->diffForHumans());
    }

    public static function postaveragerating($post_id){
        $reviews_sum = reviews::where('post_id',$post_id)->sum('rating');
        $reviews_count = reviews::where('post_id',$post_id)->count();
        $reviews_average = 0;
        if(!empty($reviews_sum)){
        $reviews_average = $reviews_sum/$reviews_count;
        }
        return $reviews_average.'/'.$reviews_count;  
    }

    public function categorypost($id){
        $category = category::find($id);
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $post_count = post_ad::where('category',$id)->where('admin_status',0)->where('status',1)->count();
        $post_ads = post_ad::where('category',$id)->where('admin_status',0)->where('status',1)->paginate(12);
        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        $search1='0';
        $city1='0';
        $category1=$id;
        $subcategory1='0';
        $sort1='0';
        $google_ads = google_ads::first();
        return view('website.category_view_post',compact('category','post_count','post_ads','category_all','sub_category_all','city','language','search1','city1','category1','subcategory1','sort1','google_ads'));
    }

    public function subcategorypost($id){
        $category = category::find($id);
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $post_count = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',1)->count();
        $post_ads = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',1)->paginate(12);
        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        $search1='0';
        $city1='0';
        $category1=$category->parent_id;
        $subcategory1=$id;
        $sort1='0';
        $google_ads = google_ads::first();
        return view('website.category_view_post',compact('category','post_count','post_ads','category_all','sub_category_all','city','language','search1','city1','category1','subcategory1','sort1','google_ads'));
    }

    public function citypost($id){
        $category = category::find($id);
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $post_count = post_ad::where('city',$id)->where('admin_status',0)->where('status',1)->count();
        $post_ads = post_ad::where('city',$id)->where('admin_status',0)->where('status',1)->paginate(12);
        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        $search1='0';
        $city1=$id;
        $category1='0';
        $subcategory1='0';
        $sort1='0';
        $google_ads = google_ads::first();
        return view('website.category_view_post',compact('category','post_count','post_ads','category_all','sub_category_all','city','language','search1','city1','category1','subcategory1','sort1','google_ads'));
    }

    public static function viewcityname($area,$city) {
        $area_name = city::find($area);
        $city_name = city::find($city);
        return static::langchange($area_name->city) . " , " . static::langchange($city_name->city);
    }

    public static function viewonlycityname($city) {
        $city_name = city::find($city);
        return static::langchange($city_name->city);
    }

    public static function viewcategoryname($category) {
        $category = category::find($category);
        return static::langchange($category->category);
    }

    public function searchpost($search,$city,$category,$subcategory,$sort){
        $i =DB::table('post_ads as p');
        $search1=$search;
        $city1=$city;
        $category1=$category;
        $subcategory1=$subcategory;
        $sort1=$sort;
        if ( $search != '0' )
        {
            $i->where('p.title', 'like', '%' . $search . '%');
        }
        if ( $city != '0' )
        {
            $i->where('p.city', $city);
        }
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        $i->select('p.*');
        $i->where('p.admin_status',0);
        $i->where('p.status',1);
        if ( $sort == '0' ){
            $i->orderBy('p.id','DESC');
        }
        elseif ( $sort == '1' ){
            $i->orderBy('p.price','ASC');
        }
        elseif ( $sort == '2' ){
            $i->orderBy('p.price','DESC');
        }
        $post_ads = $i->paginate(12);

        if(Auth::check()){
            $search_history = new search_history;
            $search_history->date = date('Y-m-d');
            $search_history->customer_id = Auth::user()->id;
            if ( $search != '0' ){
            $search_history->search = $search;
            }
            if ( $city != '0' ){
            $search_history->city = $city;
            }
            if ( $category != '0' ){
            $search_history->category = $category;
            }
            if ( $subcategory != '0' ){
            $search_history->subcategory = $subcategory;
            }
            $search_history->save();
        }

        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();

        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();

        $google_ads = google_ads::first();

        return view('website.category_view_post',compact('post_ads','city','language','search1','city1','category1','subcategory1','sort1','category_all','sub_category_all','google_ads'));
    }


    public function viewuser($id){
        $user = User::find($id);
        $search=$user->first_name .' '. $user->last_name;

        $i =DB::table('post_ads as p');
        $i->where('customer_id',$id);
        $i->select('p.*');
        $i->where('p.admin_status',0);
        $i->where('p.status',1);
        $post_ads = $i->paginate(6);

        $city = city::where('parent_id',0)->where('status',0)->get();

        $get_ip = $this->getClientIP();  

        $today = date('Y-m-d');
        $get_count = user_count::where('date',$today)->where('visitor_ip',$get_ip)->where('user_id',$id)->count();

        if($get_count == 0){
            $user_count = new user_count;
            $user_count->date = date('Y-m-d');
            $user_count->user_id = $user->id;
            $user_count->visitor_ip = $get_ip;
            $user_count->save();

            $user->view_count = $user->view_count + 1;
            $user->save();
        }

        $author_total_ads = post_ad::where('customer_id',$id)->where('admin_status',0)->where('status',1)->count();
        $author_bookmark = favourite_post::where('user_id',$id)->count();
        $author_reviews_count = reviews::where('to_id',$id)->count();
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.view_user',compact('search','post_ads','user','city','author_total_ads','author_bookmark','author_reviews_count','language','google_ads'));
    }


    public function viewpost($id){
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $post_ad = post_ad::find($id);
        $post_image = post_ad_image::where('post_id',$post_ad->id)->get();

        $related_ad = post_ad::where('subcategory',$post_ad->subcategory)->where('admin_status',0)->where('status',1)->get();

        $get_ip = $this->getClientIP();  

        $today = date('Y-m-d');
        $get_count = post_count::where('date',$today)->where('visitor_ip',$get_ip)->where('post_id',$id)->count();

        if($get_count == 0){
            $post_count = new post_count;
            $post_count->date = date('Y-m-d');
            $post_count->post_id = $post_ad->id;
            $post_count->user_id = $post_ad->customer_id;
            $post_count->category = $post_ad->category;
            $post_count->subcategory = $post_ad->subcategory;
            $post_count->visitor_ip = $get_ip;
            $post_count->save();

            $post_ad->view_count = $post_ad->view_count + 1;
            $post_ad->save();
        }

        
        $user = User::find($post_ad->customer_id);

        $favourite=array();
        $post_feedback=array();
        $report_post=array();
        $reviews=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
            $post_feedback = post_feedback::where('user_id',Auth::user()->id)->where('post_id',$id)->where('status',0)->get();
            $report_post = report_post::where('user_id',Auth::user()->id)->where('post_id',$id)->where('status',0)->get();
            $reviews = reviews::where('sender_id',Auth::user()->id)->where('post_id',$id)->where('status',0)->first();
        }

        $report_category = report_category::where('status',0)->get();

        $reviews_count = reviews::where('post_id',$id)->count();
        $favourite_post_count = favourite_post::where('post_id',$id)->count();

        $all_reviews =DB::table('reviews as r')
        ->join('users as u','u.id','=','r.sender_id')
        ->select('r.*','u.profile_image')
        ->where('r.post_id',$id)
        ->orderBy('id','DESC')
        ->paginate(10);

        $author_total_ads = post_ad::where('customer_id',$post_ad->customer_id)->where('admin_status',0)->where('status',1)->count();
        $author_bookmark = favourite_post::where('user_id',$post_ad->customer_id)->count();
        $author_reviews_count = reviews::where('to_id',$post_ad->customer_id)->count();
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.view_post',compact('user','post_ad','category_all','sub_category_all','related_ad','post_image','report_category','favourite','report_post','post_feedback','favourite_post_count','reviews','reviews_count','all_reviews','author_total_ads','author_bookmark','author_reviews_count','language','google_ads'));
    }

    public static function viewfavourite($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        }

        if(empty($favourite)){
            echo '<li><button onclick="SaveFavourite('.$id.')" class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>';
        }
        else{
            echo '<li><button onclick="DeleteFavourite('.$favourite->id.')" class="tooltip"><i class="fas fa-heart"></i><span class="tooltext top">bookmark</span></button></li>';
        }
    }



}
