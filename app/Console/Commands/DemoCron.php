<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\post_ad;
use App\Models\used_package;
use Auth;
use DB;
use Mail;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //\Log::info("Cron is working fine!");
        $today = date('Y-m-d');
        $user_package = User::where('package_status',0)->get();
        if(count($user_package) > 0){
            foreach($user_package as $row){
                $package = used_package::find($row->package_id);
                if( strtotime($today) > strtotime($package->expire_date) ){
                    $user = User::find($row->id);
                    $user->package_status = 1;
                    $user->save();
                    $post_ad = post_ad::where('customer_id',$row->id)->where('live_ads',1)->get();
                    foreach($post_ad as $post){
                        $update_post = post_ad::find($post->id);
                        $update_post->live_ads = 0;
                        $update_post->save();
                    }
                }
            }
        }

        $user_status = User::where('image_status',1)->get();
        if(count($user_status) > 0){
            foreach($user_status as $row){
                if(strtotime(date('Y-m-d h:i A')) > strtotime($row->status_end_time)){
                    $user = User::find($row->id);
                    $old_image = "upload_status_image/".$user->status_image;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $user->status_start_time = '';
                    $user->status_end_time = '';
                    $user->status_image = '';
                    $user->image_status = 0;
                    $user->save();
                }
            }
        }
    }
}
