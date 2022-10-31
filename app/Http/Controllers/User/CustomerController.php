<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\language;
use App\Models\category;
use App\Models\User;
use App\Models\used_package;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function profile(){
    	$user = User::find(Auth::user()->id);
        $used_package = used_package::find(Auth::user()->package_id);
        $package_spent = used_package::where('customer_id',Auth::user()->id)->sum('price');
        $language = language::all();
        return view('customers.profile',compact('user','used_package','package_spent','language'));
    }

    public function profilesettings(){
    	$user = User::find(Auth::user()->id);
        $language = language::all();
        return view('customers.profile_settings',compact('user','language'));
    }

    public function updateprofilesettings(Request $request){
        $this->validate($request, [
            //'username'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email,'.$request->id,
            'mobile'=>'required|digits:10|unique:users,mobile,'.$request->id,
            'gender'=>'required',
            'banner_image' => 'mimes:jpeg,jpg,png|max:10000', // max 1000kb
            'profile_image' => 'mimes:jpeg,jpg,png|max:10000', // max 1000kb
          ],[
            'banner_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'banner_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postal_code = $request->postal_code;
        $user->dob = $request->dob;
        $user->website = $request->website;

        if($request->banner_image!=""){
            $old_image = "upload_profile_image/".$user->banner_image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('banner_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_profile_image');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $user->banner_image = $input['imagename'];
        }

        if($request->profile_image!=""){
            $old_image = "upload_profile_image/".$user->profile_image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_profile_image');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $user->profile_image = $input['imagename'];
        }
        $user->save();

        return response()->json('successfully save'); 
    }



}
