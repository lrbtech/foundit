<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\User;
use App\Models\user_logs;
use App\Models\language;
use App\Models\google_ads;
use Auth;
use DB;
use Mail;
use Hash;

class LogsController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
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


    public function createlog($user,$data){
        $get_ip = $this->getClientIP();  
        $log = new user_logs;
        $log->date = date('Y-m-d');
        $log->user_ip = $get_ip;
        $log->user = $user;
        $log->log = $data;
        $log->save();
        return true;
    }

}
