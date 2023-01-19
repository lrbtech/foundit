<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\language;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\report_post;
use App\Models\User;
use App\Models\city;
use App\Models\settings;
use App\Models\favourite_post;
use App\Models\package;
use App\Models\chat;
use App\Models\blog;
use App\Models\used_package;
use App\Models\post_feedback;
use App\Models\news_letter_email;
use App\Models\reviews;
use App\Models\faq;
use App\Models\google_ads;
use Session;
use Hash;
use Mail;
use Auth;
use DB;

class PageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        //session (['lang' => 'english']);
    }

    
    public function admineditpost($post_id){
        $post_ads = post_ad::find($post_id);

        Auth::loginUsingId($post_ads->customer_id);

        $url = '/customer/edit-post-ads/'.$post_id;
        return redirect('/customer/edit-post-ads/'.$post_id);
    }

    private function send_sms($phone,$msg)
    {
        $settings = settings::find(1);
        $requestParams = array(
          'api_key' => $settings->sms_api_key,
          'type' => 'text',
          'contacts' => '+971'.$phone,
          'senderid' => $settings->sms_senderid,
          'msg' => $msg
        );
        
        //merge API url and parameters
        $apiUrl = 'https://www.elitbuzz-me.com/sms/smsapi?';
        foreach($requestParams as $key => $val){
            $apiUrl .= $key.'='.urlencode($val).'&';
        }
        $apiUrl = rtrim($apiUrl, "&");
      
        //API call
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
        curl_exec($ch);
        curl_close($ch);
    }

    public function userlogin($id){
        Auth::loginUsingId($id);
        $all_reviews =DB::table('reviews as r')
        ->join('users as u','u.id','=','r.sender_id')
        ->join('post_ads as p','p.id','=','r.post_id')
        ->select('r.*','u.profile_image','p.title','p.id as post_id')
        ->where('to_id',$id)
        ->orderBy('id','DESC')
        ->paginate(10);
        $reviews_count = reviews::where('to_id',$id)->count();
        $used_package = used_package::find(Auth::user()->package_id);
        $package_spent = used_package::where('customer_id',$id)->sum('price');

        $total_ads = post_ad::where('customer_id',$id)->count();
        $normal_ads = post_ad::where('customer_id',$id)->where('post_type',0)->count();
        $language = language::all();

        return view('customers.dashboard',compact('all_reviews','reviews_count','used_package','package_spent','total_ads','normal_ads','language'));
    }

    public function customerLogin(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'password' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $exist = User::where('email',$request->email)->get();
        if(count($exist)>0){
            if(Hash::check($request->password,$exist[0]->password)){
                Auth::loginUsingId($exist[0]->id);

                $user = User::find($exist[0]->id);
                // $today = date('Y-m-d');
                // $package = used_package::find($user->package_id);
                // if( strtotime($today) > strtotime($package->expire_date) ){
                //     $user = User::find($user->id);
                //     $user->package_status = 1;
                //     $user->save();
                //     $post_ad = post_ad::where('customer_id',$user->id)->get();
                //     foreach($post_ad as $post){
                //         $update_post = post_ad::find($post->id);
                //         $update_post->live_ads = 0;
                //         $update_post->save();
                //     }
                // }

                return response()->json(
                ['message' => 'Login Successfully',
                'status'=>0], 200);
            }else{
                return response()->json(['message' => 'Records Does not Match','status'=>1], 200);
            }
        }else{
            return response()->json(['message' => 'This Email Address Not Registered','status'=>1], 200);
        }
    }

    public function about(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.about',compact('settings','language','google_ads'));
    }
    public function howitworks(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.howitworks',compact('settings','language','google_ads'));
    }
    public function ourstory(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.ourstory',compact('settings','language','google_ads'));
    }
    public function careers(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.careers',compact('settings','language','google_ads'));
    }
    public function autodealerships(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.autodealerships',compact('settings','language','google_ads'));
    }
    public function trustsaftey(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.trustsaftey',compact('settings','language','google_ads'));
    }
    public function terms(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.terms',compact('settings','language','google_ads'));
    }
    public function community(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.community',compact('settings','language','google_ads'));
    }
    public function press(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.press',compact('settings','language','google_ads'));
    }
    public function help(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.help',compact('settings','language','google_ads'));
    }
    public function privacy(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.privacy',compact('settings','language','google_ads'));
    }
    public function contact(){
        $settings = settings::find(1);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.contact',compact('settings','language','google_ads'));
    }
    public function faq(){
        $settings = settings::find(1);
        $faq = faq::where('status',0)->get();
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.faq',compact('settings','faq','language','google_ads'));
    }
    public function packages(){
        $package = package::where('status',0)->get();
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.packages',compact('package','language','google_ads'));
    }

    public function blog(){
        $settings = settings::find(1);
        $blog=blog::paginate(12);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.blog',compact('settings','blog','language','google_ads'));
    }

    public function viewblog($id){
        $settings = settings::find(1);
        $blog=blog::find($id);
        $language = language::all();
        $google_ads = google_ads::first();
        return view('website.view_blog',compact('settings','blog','language','google_ads'));
    }

    public function contactsendmail(Request $request){
        $request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $all = $request->all();
        $settings = settings::find(1);
        Mail::send('mail.contact',compact('all','settings'),function($message) use($all,$settings){
             $message->to($settings->admin_email)->subject('Enquiry From Your Website');
             $message->from($all['email'],$all['subject']);
        });
        return response()->json(['message'=>'Successfully Send'],200); 
   }

    public function getsubcategory($id){ 
        $data = category::where('parent_id',$id)->get();
        $output='<option value="">Select Sub Category(s)*</option>';
        foreach ($data as $key => $value) {
            $output.= '<option value="'.$value->id.'">'.$value->category.'</option>';
        }
        echo $output;
    }

    public function getArea($id){ 
        //$city = city::where('city',$id)->first();
        $data = city::where('parent_id',$id)->orderBy('city','ASC')->get();
        $output ='<option value="">SELECT Area</option>';
        foreach ($data as $key => $value) {
            $output .= '<option value="'.$value->id.'">'.$value->city.'</option>';
        }
        echo $output;
    }

    public function getCityName($city,$area){ 
        $city = city::find($city);
        $area = city::find($area);
        $data = array(
            'city' => $city->city,
            'area' => $area->city,
        );
        return response()->json($data); 
    }

    public function getCityData($id){ 
        $data = city::find($id);
        return response()->json($data); 
    }

    public function savereport(Request $request){
        $this->validate($request, [
            'report_category'=>'required',
            'description'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $report_post = new report_post;
        $report_post->date = date('Y-m-d');
        $report_post->post_id = $request->report_post_id;
        $report_post->user_id = Auth::user()->id;
        $report_post->category = $request->report_category;
        $report_post->description = $request->description;
        $report_post->save();
  
        return response()->json('successfully save'); 
    }

    public function savefeedback(Request $request){
        $this->validate($request, [
            'feedback'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $post_feedback = new post_feedback;
        $post_feedback->date = date('Y-m-d');
        $post_feedback->post_id = $request->feedback_post_id;
        $post_feedback->user_id = Auth::user()->id;
        $post_feedback->feedback = $request->feedback;
        $post_feedback->save();
  
        return response()->json('successfully save'); 
    }

    public function updatefeedback(Request $request){
        $this->validate($request, [
            'feedback'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $post_feedback = post_feedback::find($request->feedback_post_id);
        $post_feedback->feedback = $request->feedback;
        $post_feedback->save();
  
        return response()->json('successfully save'); 
    }

    public function updatereport(Request $request){
        $this->validate($request, [
            'report_category'=>'required',
            'description'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $report_post = report_post::find($request->report_post_id);
        $report_post->category = $request->report_category;
        $report_post->description = $request->description;
        $report_post->save();
  
        return response()->json('successfully save'); 
    }

    public function saveuserregister(Request $request){
        $this->validate($request, [
            'email'=>'required|unique:users',
            'mobile'=>'required|digits:10|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'terms_and_condition'=>'required',
          ],[
            'terms_and_condition.required' => 'Please Accept Terms and Conditions',
        ]);
        
        $user = new User;
        $user->date = date('Y-m-d');
        $user->business_type = $request->business_type;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $all = User::find($user->id);

        Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
            $message->to($all->email)->subject('Found It - Confirm your email');
            $message->from('mail.lrbinfotech@gmail.com','Found It');
        });
  
        return response()->json('successfully save'); 
    }

    public function verifyAccount($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        $package = package::where('status',0)->get();
        $language = language::all();
        return view('website.activate_user',compact('user','package','language'));
    }

    public function sendMail($id){
        $all = User::find($id);
        Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
            $message->to($all->email)->subject('Found It - Confirm your email');
            $message->from('mail.lrbinfotech@gmail.com','Found It');
        });
    }

    public function activateplan($customer_id,$package_id){
        $package = package::find($package_id);

        $used_package = new used_package;
        $used_package->customer_id = $customer_id;
        $used_package->package_id = $package->id;
        $used_package->package_name = $package->package_name;
        $used_package->price = $package->price;
        $used_package->duration_period = $package->duration_period;
        $used_package->duration = $package->duration;
        $used_package->no_of_ads = $package->no_of_ads;
        $used_package->popular_ads = $package->popular_ads;
        $used_package->top_search = $package->top_search;
        $used_package->support = $package->support;

        $days=0;
        if($package->duration_period == 1){
            $days = $package->duration * 28;
        }
        elseif($row->duration_period == 2){
            $days = $package->duration;
        }
        $today = date('Y-m-d');
        $used_package->apply_date = $today;
        $used_package->expire_date = date('Y-m-d', strtotime($today . '+'.$days.'days'));
        $used_package->no_of_days = $days;

        $used_package->save();

        $user = User::find($customer_id);
        $user->package_id = $used_package->id;
        $user->package_status = 0;
        $user->save();

        return response()->json('Update Successfully'); 
    }

    public function savereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'quote' => 'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $post_ad = post_ad::find($request->review_post_id);
        $reviews = new reviews;
        $reviews->date = date('Y-m-d');
        $reviews->sender_id = Auth::user()->id;
        $reviews->to_id = $post_ad->customer_id;
        $reviews->post_id = $request->review_post_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->quote = $request->quote;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }

    public function updatesearchstatus(Request $request){        
        $user = User::find(Auth::user()->id);
        $user->search_history = 1;
        $user->save();
  
        return response()->json('successfully save'); 
    }

    public function updatesearchalerts(Request $request){        
        $user = User::find(Auth::user()->id);
        $user->search_alerts = 1;
        $user->save();
  
        return response()->json('successfully save'); 
    }

    public function updatereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'quote' => 'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $reviews = reviews::find($request->review_id);
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->quote = $request->quote;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }

    public function savenewslettermail(Request $request){  
        $this->validate($request, [
            'news_letter_email'=>'required|unique:news_letter_emails,email',
          ],[
            'news_letter_email.required' => 'For subscribe to foundit Email address is mandatory',
            'news_letter_email.unique' => 'You are already subscribed',
        ]);

        $exist = news_letter_email::where('email',$request->news_letter_email)->get();
        if(count($exist)>0){
            return response()->json('successfully save'); 
        }      
        $news_letter_email = new news_letter_email;
        $news_letter_email->email = $request->news_letter_email;
        $news_letter_email->save();
  
        return response()->json('successfully save'); 
    }


}
