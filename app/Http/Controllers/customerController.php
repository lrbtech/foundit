<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }
    public function dashboard(){
        return view('customers.dashboard');
    }
    public function profileSetting(){
        return view('customers.profileSetting');
    }
    public function myAds(){
        return view('customers.myAds');
    }
    
    public function chat(){
        return view('customers.chat');
    }
    public function packages(){
        return view('customers.packages');
    }
    public function favorite(){
        return view('customers.favorite');
    }
    
}
