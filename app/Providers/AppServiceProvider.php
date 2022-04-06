<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use App\Models\ad_banner;
use App\Models\post_ad;
use Illuminate\Support\ServiceProvider;
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
use App\Models\user_count;
use App\Models\post_feedback;
use App\Models\report_post;
use App\Models\reviews;
use App\Models\google_ads;
use Auth;
use DB;
use Mail;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringLength(191);
        view()->composer('admin.layouts', function($view) {
            $language = language::all();
            $google_ads = google_ads::find(1);
            $view->with(compact('language','google_ads'));
        });
        view()->composer('customers.menu', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $user = User::find(Auth::user()->id);
            $bookmark_count = favourite_post::where('user_id',Auth::user()->id)->count();
            $reviews_count = reviews::where('to_id',Auth::user()->id)->count();
            $post_ads_count = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->count();
            $google_ads = google_ads::find(1);
            
            $view->with(compact('settings','language','user','post_ads_count','reviews_count','bookmark_count','google_ads'));
        });
        view()->composer('website.layout', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $category = category::where('parent_id',0)->where('status',0)->get();
            $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
            $city = city::where('parent_id',0)->where('status',0)->get();
            $google_ads = google_ads::find(1);
            $view->with(compact('settings','language','category','subcategory','city','google_ads'));
        });
        view()->composer('customers.layout', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $category = category::where('parent_id',0)->where('status',0)->get();
            $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
            $city = city::where('parent_id',0)->where('status',0)->get();
            $google_ads = google_ads::find(1);
            $view->with(compact('settings','language','category','subcategory','city','google_ads'));
        });
        view()->composer('auth.login', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $google_ads = google_ads::find(1);
            $view->with(compact('settings','language','google_ads'));
        });

    }
}
