<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\package;
use App\Models\language;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function savepackage(Request $request){
        $this->validate($request, [
            'package_name'=>'required',
            'price'=>'required',
            'duration_period'=>'required',
            'duration'=>'required',
            'support'=>'required',
            //'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            // 'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            // 'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            // 'image.required' => 'package Image Field is Required',
        ]);

        $package = new package;
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->duration_period = $request->duration_period;
        $package->duration = $request->duration;
        //$package->no_of_feautured_ads = $request->no_of_feautured_ads;
        $package->no_of_ads = $request->no_of_ads;
        $package->popular_ads = $request->popular_ads;
        $package->top_search = $request->top_search;
        $package->support = $request->support;
        $package->save();

        return response()->json('successfully save'); 
    }
    public function updatepackage(Request $request){
        $this->validate($request, [
            'package_name'=>'required',
            'package_name'=>'required',
            'price'=>'required',
            'duration_period'=>'required',
            'duration'=>'required',
            'support'=>'required',
            //'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            // 'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            // 'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'package Image Field is Required',
        ]);
        
        $package = package::find($request->id);
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->duration_period = $request->duration_period;
        $package->duration = $request->duration;
        //$package->no_of_feautured_ads = $request->no_of_feautured_ads;
        $package->no_of_ads = $request->no_of_ads;
        $package->popular_ads = $request->popular_ads;
        $package->top_search = $request->top_search;
        $package->support = $request->support;
        $package->save();

        return response()->json('successfully update'); 
    }

    public function package(){
        $package = package::all();
        $language = language::all();
        return view('admin.package',compact('package','language'));
    }

    public function editpackage($id){
        $package = package::find($id);
        return response()->json($package); 
    }
    
    public function deletepackage($id,$status){
        $package = package::find($id);
        $package->status = $status;
        $package->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
