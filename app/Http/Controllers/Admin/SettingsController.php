<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\User;
use App\Models\settings;
use App\Models\trending_today;
use App\Models\post_ad;
use App\Models\ad_banner;
use App\Models\language;
use App\Models\user_logs;
use App\Models\google_ads;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function changepassword()
    {
        $user = admin::find(Auth::guard('admin')->user()->id);
        $language = language::all();
        return view('admin.change_password',compact('user','language'));
    }

    public function updatechangepassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        $hashedPassword = Auth::guard('admin')->user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
            if (!\Hash::check($request->password , $hashedPassword)) {
 
                $admin = admin::find($request->id);
                $admin->password = Hash::make($request->password);
                $admin->save();
 
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

    public function userlogs(){
        $user_logs = user_logs::orderBy('id', 'DESC')->get();
        $language = language::all();
        $search='';
        return view('admin.user_logs',compact('user_logs','search','language'));
    }

    public function getuserlogs(){
        $logs = user_logs::orderBy('id', 'DESC')->get();
        return Datatables::of($logs)
        ->addColumn('user_ip', function ($logs) {
            return '<td>'.$logs->user_ip.'</td>';
        })
        ->addColumn('date', function ($logs) {
            return '<td>'.$logs->created_at.'</td>';
        })
        ->addColumn('user', function ($logs) {
            $customer = User::find($logs->user);
            if(!empty($customer)){
            return '<td>
            <p>'.$customer->first_name.' '.$customer->last_name.'</p>
            <p>'.$customer->email.'</p>
            </td>';
            }
            else{
                return '';
            }
        })
        ->addColumn('log', function ($logs) {
            return '<td>'.$logs->log.'</td>';
        })
        ->rawColumns(['user_ip','date', 'user', 'log'])
        ->addIndexColumn()
        ->make(true);
        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function settings(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.settings',compact('settings','language'));
    }

    public function updatesettings(Request $request){
        $settings = settings::find($request->id);
        $settings->mobile = $request->mobile;
        $settings->landline = $request->landline;
        $settings->email = $request->email;
        $settings->other_email = $request->other_email;
        $settings->admin_email = $request->admin_email;
        $settings->iframe_map = $request->iframe_map;
        $settings->footer_description = $request->footer_description;
        $settings->address = $request->address;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->linkedin = $request->linkedin;
        $settings->youtube = $request->youtube;
        $settings->google_plus = $request->google_plus;

        if($request->logo!=""){
            $old_image = "upload_files/".$settings->logo;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('logo')!=""){
            $image = $request->file('logo');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $settings->logo = $upload_image;
            }
        }
        if($request->header_banner!=""){
            $old_image = "upload_files/".$settings->header_banner;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('header_banner')!=""){
            $image = $request->file('header_banner');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $settings->header_banner = $upload_image;
            }
        }

        $settings->save();

        return response()->json('successfully update'); 
    }


    public function smsapi(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.sms_api',compact('settings','language'));
    }

    public function updatesmsapi(Request $request){
        $settings = settings::find($request->id);
        $settings->sms_api_key = $request->sms_api_key;
        $settings->sms_senderid = $request->sms_senderid;
        $settings->save();
        return response()->json('successfully update'); 
    }

    public function aboutus(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.about',compact('settings','language'));
    }

    public function updateaboutus(Request $request){
        $settings = settings::find($request->id);
        $settings->about_us = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function termsandconditions(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.terms',compact('settings','language'));
    }

    public function updatetermsandconditions(Request $request){
        $settings = settings::find($request->id);
        $settings->terms_and_conditions = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function howitworks(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.how_it_works',compact('settings','language'));
    }

    public function updatehowitworks(Request $request){
        $settings = settings::find($request->id);
        $settings->how_it_works = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function privacypolicy(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.privacy',compact('settings','language'));
    }

    public function updateprivacypolicy(Request $request){
        $settings = settings::find($request->id);
        $settings->privacy_policy = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function ourstory(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.ourstory',compact('settings','language'));
    }

    public function updateourstory(Request $request){
        $settings = settings::find($request->id);
        $settings->ourstory = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function careers(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.careers',compact('settings','language'));
    }

    public function updatecareers(Request $request){
        $settings = settings::find($request->id);
        $settings->careers = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function autodealerships(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.autodealerships',compact('settings','language'));
    }

    public function updateautodealerships(Request $request){
        $settings = settings::find($request->id);
        $settings->autodealerships = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function trustsaftey(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.trustsaftey',compact('settings','language'));
    }

    public function updatetrustsaftey(Request $request){
        $settings = settings::find($request->id);
        $settings->trustsaftey = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function community(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.community',compact('settings','language'));
    }

    public function updatecommunity(Request $request){
        $settings = settings::find($request->id);
        $settings->community = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function press(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.press',compact('settings','language'));
    }

    public function updatepress(Request $request){
        $settings = settings::find($request->id);
        $settings->press = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function help(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.help',compact('settings','language'));
    }

    public function updatehelp(Request $request){
        $settings = settings::find($request->id);
        $settings->help = $request->editor1;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }


    
    public function trendingtoday(){
        $trending_today = trending_today::orderBy('order_id','ASC')->get();
        $post_ads = post_ad::where('admin_status',0)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('admin.trending_today',compact('trending_today','post_ads','language'));
    }

    public function updatetrendingtoday(Request $request)
    {
        foreach ($request->value as $key => $value) 
        {
            $order_id=$key+1;
            $trending_today = trending_today::find($value);
            $trending_today->order_id = $order_id;
            $trending_today->save();
        }
        return response()->json(['message'=>'Successfully Update'],200);
    }

    public function savetrendingtoday(Request $request){
        $this->validate($request, [
            'post_id'=>'required|unique:trending_todays',
          ],[
            'post_id.required' => 'Select Post Field is Required',
            'post_id.unique' => 'This Post has Already been Taken',
        ]);
        $count = trending_today::count();
        $trending_today = new trending_today;
        $trending_today->order_id = $count + 1;
        $trending_today->post_id = $request->post_id;
        $trending_today->save();
        return response()->json('successfully save'); 
    }

    public function deletetrendingtoday($id){
        $trending_today = trending_today::find($id);
        $trending_today->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function adbanner(){
        $settings = ad_banner::find(1);
        $language = language::all();
        return view('admin.ad_banner',compact('settings','language'));
    }

    public function updateadbanner(Request $request){
        $settings = ad_banner::find($request->id);
        if($request->image!=""){
            $old_image = "upload_files/".$settings->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $settings->image = $upload_image;
            }
        }
        $settings->save();

        //return back();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function languageTable(){
        $language = language::all();
        return view('admin.languages',compact('language'));
    }
    
    public function fetchLanguage(Request $request){
       $language = array();
      // return response()->json();
        if($request['english'] !=null){
            $language = language::where('english', 'like', '%' . $request['english'].'%')->get();
        }else if($request['arabic'] !=null){
            $language = language::where('arabic', 'like', '%' . $request['arabic']. '%')->get();
        }else{
            $language = language::all();
        }
       
         $languages = array();
        if(count($language) >0){
            foreach ($language as $key => $value) {
               $lang=array(
                   'arabic'=>$value->arabic,
                   'english'=>$value->english,
                   'id'=>$value->id,
                   'index'=>$key,
               ); 
              // $language[] = $lang;
               $languages[]=$lang;
            }
            return response()->json($languages);
        }
        return response()->json($language);
    }

    public function insertLanguage(Request $request){
        $language = new language;
        $language->english = $request->english;
        $language->arabic = $request->arabic;
        $language->save();
    }
    public function updateLanguage(Request $request){
        $language =  language::find($request->id);
        $language->english = $request->english;
        $language->arabic = $request->arabic;
        $language->save();
    }

    public function changelanguage($language)
    {
        $user = admin::find(Auth::guard('admin')->user()->id);
        $user->lang = $language;
        $user->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function homepageseo(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.homepage_seo',compact('settings','language'));
    }

    public function updatehomepageseo(Request $request){
        $settings = settings::find($request->id);
        $settings->metatag_title = $request->metatag_title;
        $settings->metatag_description = $request->metatag_description;
        $settings->metatag_keywords = $request->metatag_keywords;
        $settings->save();
        return back();
    }

    public function googleads(){
        $google_ads = google_ads::find(1);
        $language = language::all();
        return view('admin.google_ads',compact('google_ads','language'));
    }

    public function updategoogleads(Request $request){
        $google_ads = google_ads::find($request->id);
        // $google_ads->adsense_script = $request->adsense_script;
        // $google_ads->adsense_728_90_script = $request->adsense_728_90_script;
        // $google_ads->adsense_160_600_script = $request->adsense_160_600_script;
        // $google_ads->adsense_300_250_script = $request->adsense_300_250_script;
        // $google_ads->adsense_300_600_script = $request->adsense_300_600_script;

        if($request->image_728_90!=""){
            $old_image = "ads_image/".$google_ads->image_728_90;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image_728_90')!=""){
            $image = $request->file('image_728_90');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ads_image/'), $upload_image);
            $google_ads->image_728_90 = $upload_image;
            }
        }

        if($request->image_160_600!=""){
            $old_image = "ads_image/".$google_ads->image_160_600;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image_160_600')!=""){
            $image = $request->file('image_160_600');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ads_image/'), $upload_image);
            $google_ads->image_160_600 = $upload_image;
            }
        }

        if($request->image_300_250!=""){
            $old_image = "ads_image/".$google_ads->image_300_250;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image_300_250')!=""){
            $image = $request->file('image_300_250');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ads_image/'), $upload_image);
            $google_ads->image_300_250 = $upload_image;
            }
        }

        if($request->image_300_600!=""){
            $old_image = "ads_image/".$google_ads->image_300_600;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image_300_600')!=""){
            $image = $request->file('image_300_600');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ads_image/'), $upload_image);
            $google_ads->image_300_600 = $upload_image;
            }
        }

        $google_ads->save();

        return response()->json('successfully update'); 
    }

}
