<?php

namespace App\Http\Controllers\AdminLogin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\post_ad;
use App\Models\used_package;
use Auth;
use DB;
use Mail;
class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
     
      return view('admin-login.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
        
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location

        // $today = date('Y-m-d');
        // $user_package = User::where('package_status',0)->get();
        // if(count($user_package) > 0){
        //     foreach($user_package as $row){
        //         $package = used_package::find($row->package_id);
        //         if( strtotime($today) > strtotime($package->expire_date) ){
        //             $user = User::find($row->id);
        //             $user->package_status = 1;
        //             $user->save();
        //             $post_ad = post_ad::where('customer_id',$row->id)->where('live_ads',1)->get();
        //             foreach($post_ad as $post){
        //                 $update_post = post_ad::find($post->id);
        //                 $update_post->live_ads = 0;
        //                 $update_post->save();
        //             }
        //         }
        //     }
        // }

        return redirect()->intended(route('admin.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
      Auth::guard('admin')->logout();
      return redirect('/admin/login');
    }


}
