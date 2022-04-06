<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\language;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;
use Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function bookmark(){
        $language = language::all();
        return view('customers.bookmark',compact('language'));
    }

    public function ChangePassword(){
        $language = language::all();
        return view('customers.change_password',compact('language'));
    }

    public function UpdateChangePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
            if (!\Hash::check($request->password , $hashedPassword)) {
 
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
 
                return response()->json(['message' => 'Password Updated Successfully!' , 'status' => 1], 200);
            }
            else{
                return response()->json(['message' => 'new password can not be the old password!' , 'status' => 0]);
            }
        }
        else{
            return response()->json(['message' => 'old password doesnt matched!' , 'status' => 0]);
        }
    }

    public function deactivateaccount(Request $request){
        $request->validate([
            'deactivate_password' => 'min:6|required_with:deactivate_password_confirmation|same:deactivate_password_confirmation',
            'deactivate_password_confirmation' => 'min:6'
        ]);
        
        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->deactivate_password , $hashedPassword )) {
 
            $user = User::find(Auth::user()->id);
            $user->status = 2;
            $user->deactivate_description = $request->description;
            $user->save();

            return response()->json(['message' => 'Password Updated Successfully!' , 'status' => 1], 200);
        }
        else{
            return response()->json(['message' => 'password doesnt matched!' , 'status' => 0]);
        }
    }


}
