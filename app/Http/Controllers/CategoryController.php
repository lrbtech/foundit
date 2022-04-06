<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\language;
use App\Models\google_ads;
use Auth;
use DB;
use Mail;

class CategoryController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }
    public function category(){
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.category_list',compact('language','google_ads'));
    }

    public function getallcategory()
    {
        $category = category::where('parent_id',0)->where('status',0)->get();
        $output = '';
           foreach ($category as $value) {
                $sub_category = category::where('parent_id',$value->id)->get();
                $post_category_count = post_ad::where('category',$value->id)->where('admin_status',0)->where('status',1)->count();  
                $output .='
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-head" style="background:url(/upload_files/'.$value->banner_image.') no-repeat center; background-size:cover">
                            <a href="/category-post/'.$value->id.'">
                                <h4>'. \App\Http\Controllers\HomeController::langchange($value->category) .'</h4>
                                <p>('.$post_category_count.')</p>
                            </a>
                        </div>
                        <ul class="category-list">';
                            foreach ($sub_category as $row) {
                            $post_count = post_ad::where('subcategory',$row->id)->where('admin_status',0)->where('status',1)->count();                            
                            $output .='<li>
                                <a href="/sub-category-post/'.$row->id.'">
                                    <h6>'. \App\Http\Controllers\HomeController::langchange($row->category) .'</h6>
                                    <p>('.$post_count.')</p>
                                </a>
                            </li>';
                            }
                        $output.='</ul>
                    </div>
                </div>
                ';
           }

        echo $output;
    }

    public static function getsearchcategory()
    {
        $category = category::where('parent_id',0)->where('status',0)->get();
        $output = '';
           foreach ($category as $value) {
                $sub_category = category::where('parent_id',$value->id)->get();
                $post_category_count = post_ad::where('category',$value->id)->where('admin_status',0)->where('status',1)->count();  
                $output .='
                <li>
                    <div class="nasted-menu">
                        <p><span class="fas fa-tags"></span>'. \App\Http\Controllers\HomeController::langchange($value->category) .'</p><i
                            class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="nasted-menu-list">';
                        foreach ($sub_category as $row) {
                        $post_count = post_ad::where('subcategory',$row->id)->where('admin_status',0)->where('status',1)->count(); 
                        $output .='<li><a href="/sub-category-post/'.$row->id.'">'. \App\Http\Controllers\HomeController::langchange($row->category) .' ('.$post_count.')</a></li>';
                        }
                    $output .='</ul>
                </li>
                ';
           }
        echo $output;
    }

    public static function popular_ads($category)
    {
        $post_ads = post_ad::where('category',$category)->where('popular_ads',1)->where('admin_status',0)->where('status',1)->orderBy('view_count','DESC')->get();

        $output = '';
        foreach ($post_ads as $row) {
$output.='
<div class="product-card">
    <div class="product-head">
        <div class="product-img"
            style="background:url(/upload_image/'.$row->image.') no-repeat center; background-size:cover;">
            <ul class="product-meta">
                <li><i class="fas fa-eye"></i>
                    <p>'.$row->view_count.'</p>
                </li>
                <li><i class="fas fa-star"></i>
                    <p>'. \App\Http\Controllers\HomeController::postaveragerating($row->id) .'</</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="product-info">
        <div class="product-tag"><i class="fas fa-tags"></i>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</a></li>
                <li class="breadcrumb-item active" aria-current="page">'. \App\Http\Controllers\HomeController::viewcategoryname($row->subcategory) .'</li>
            </ol>
        </div>
        <div class="product-title">
            <h5><a href="/view-post/'.$row->id.'">'. \App\Http\Controllers\HomeController::langchange($row->title) .'</a></h5>
            <ul class="product-location">
                <li><i class="fas fa-map-marker-alt"></i>
                    <p>'. \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) .'</p>
                </li>
                <li><i class="fas fa-clock"></i>
                    <p>'. \App\Http\Controllers\HomeController::humanreadtime($row->created_at) .'</p>
                </li>
            </ul>
        </div>
        <div class="product-details">
            <div class="product-price">
                <h5>AED  '.$row->price.'</h5><span>/'. \App\Http\Controllers\HomeController::langchange($row->price_condition) .'</span>
            </div>
            <ul class="product-widget">';
            $favourite=array();
            if(Auth::check()){
                $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$row->id)->first();
            }
    
            if(empty($favourite)){
                $output.='<li><button onclick="SaveFavourite('.$row->id.')" class="tooltip"><i class="far fa-heart"></i><span class="tooltext top">bookmark</span></button></li>';
            }
            else{
                $output.='<li><button onclick="DeleteFavourite('.$favourite->id.')" class="tooltip"><i class="fas fa-heart"></i><span class="tooltext top">bookmark</span></button></li>';
            }
            $output.='</ul>
        </div>
    </div>
</div>
';
        }
        echo $output;
    }


}
