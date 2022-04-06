<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\language;
use App\Models\post_count;
use App\Models\user_count;
use App\Models\admin_customer;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    // public function dashboard(){
    //     $language = language::all();
    //     $total_posts = post_ad::count();
    //     $total_customers = User::count();
    //     $today = date('Y-m-d');
    //     $cfdate = date('Y-m-d',strtotime('first day of this month'));
    //     $cldate = date('Y-m-d',strtotime('last day of this month'));

    //     $total_today_posts = post_ad::where('date',$today)->count();
    //     $total_today_customers = User::where('date',$today)->count();

    //     $current_month_posts = post_ad::whereBetween('date', [$cfdate, $cldate])->count();
    //     $current_month_customers = User::whereBetween('date', [$cfdate, $cldate])->count();

    //     $category = category::where('parent_id',0)->get();

    //     return view('admin.dashboard',compact('total_customers','total_posts','total_today_posts','total_today_customers','current_month_posts','current_month_customers','language','category'));
    // }

    public function dashboard(){
        $language = language::all();
        $total_posts = post_ad::count();
        $total_customers = User::count();
        $today = date('Y-m-d');
        $cfdate = date('Y-m-d',strtotime('first day of this month'));
        $cldate = date('Y-m-d',strtotime('last day of this month'));

        $total_today_posts = post_ad::where('date',$today)->count();
        $total_today_customers = User::where('date',$today)->count();

        $current_month_posts = post_ad::whereBetween('date', [$cfdate, $cldate])->count();
        $current_month_customers = User::whereBetween('date', [$cfdate, $cldate])->count();

        $current_month_visitor = post_count::whereBetween('date', [$cfdate, $cldate])->count();
        $total_today_visitor = post_count::where('date',$today)->count();

        $category = category::where('parent_id',0)->get();
        $customerdata = [];
        $postdata = [];
        for ($i=1;$i<=7;$i++){
            $last6days =  date('Y-m-d',strtotime('-7 days'));
            $week_day = date('Y-m-d', strtotime('+'.$i.' day', strtotime($last6days)));
            $week_day_count = User::where('date',$week_day)->count();
            if(date("l") == date('l', strtotime($week_day))){
                $customerdata[] = array(
                    'week_day_count' => $week_day_count,
                    'week_day' => 'Today',
                );
            }
            else{
                $customerdata[] = array(
                    'week_day_count' => $week_day_count,
                    'week_day' => date('l', strtotime($week_day)),
                );
            }
        }

        // if (Carbon::today()->subDays(6)->day < Carbon::today()->day){
        //     for ($i = Carbon::today()->subDays(6)->day; $i <= Carbon::today()->day; $i++){
        //         $data[] = $i;
        //         $week_day = date('Y-m-'.$i);
        //         $week_day_count = post_ad::where('date',$week_day)->count();
        //         if(date("l") == date('l', strtotime($week_day))){
        //             $postdata[] = array(
        //                 'week_day_count' => $week_day_count,
        //                 'week_day' => 'Today',
        //             );
        //         }
        //         else{
        //             $postdata[] = array(
        //                 'week_day_count' => $week_day_count,
        //                 'week_day' => date('l', strtotime($week_day)),
        //             );
        //         }
        //     }
        // }

        $period = now()->subMonths(11)->monthsUntil(now());

        //$data = [];
        foreach ($period as $date)
        {
            $month = date('m', strtotime($date->shortMonthName));
            $month_count = post_ad::whereMonth('created_at', $month)
            ->whereYear('created_at', $date->year)->count();
            $postdata[] = array(
                'month_count' => $month_count,
                'month' => $date->shortMonthName,
                'year' => $date->year,
            );
        }

        $new_message = admin_customer::where('read_status',0)->count();

        return view('admin.dashboard',compact('total_customers','total_posts','total_today_posts','total_today_customers','current_month_posts','current_month_customers','language','category','total_today_visitor','current_month_visitor','postdata','customerdata','new_message'));
    }
}
