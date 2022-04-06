<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\city;
use App\Models\live_ads;
use App\Models\used_package;
use App\Models\package;
use App\Models\language;
use App\Models\search_history;
use App\Models\User;
use App\Http\Controllers\LogsController;
use Auth;
use DB;
use Mail;
use Image;
use App\Http\Controllers\ImageFilter;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function createpostad(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('customers.create_post_ad',compact('category','subcategory','city','area','language'));
    }

    public function myads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ads = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->orderBy('id','DESC')->paginate(12);
        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        return view('customers.my_ads',compact('category','subcategory','post_ads','city','language'));
    }

    public function editpostad($id){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ad = post_ad::find($id);
    	$post_ad_image = post_ad_image::where('post_id',$id)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('customers.edit_post_ad',compact('category','subcategory','post_ad','post_ad_image','city','area','language'));
    }

    public function deletepostad($id){
        $post_ad = post_ad::find($id);
        $logsController = new LogsController();
        $logsController->createlog(Auth::user()->id,"Delete Post '.$post_ad->title.'");
        //$post_ad->status = $status;
        $old_image = "upload_image/".$post_ad->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $post_ad->delete();

        $post_ad_image_details = post_ad_image::where('post_id',$id)->get();
        foreach($post_ad_image_details as $row){
            $post_ad_image = post_ad_image::find($row->id);
            $old_image = "upload_image/".$post_ad_image->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $post_ad_image->delete();
        }
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function deletepostimge($id){
        $post_ad_image = post_ad_image::find($id);
        $old_image = "upload_image/".$post_ad_image->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $post_ad_image->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
    public function postvalidatefirst(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,NULL,id,customer_id,'.$request->customer_id,
            'price'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
        ]);
        return true;
    }
    public function postvalidatesecond(Request $request){
        $this->validate($request, [
            'profile_image' => 'required|mimes:jpeg,jpg,png|max:10000', // max 1000kb
          ],[
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.required' => '1st Image Field is Must Required',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 10MB',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }
        return true;
    }
    public function postvalidatethird(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'area'=>'required',
        ]);
        return true;
    }

    public function savepostad(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'area'=>'required',
        ]);

        $today = date('Y-m-d');
        $cfdate = date('Y-m-d',strtotime('first day of this month'));
        $cldate = date('Y-m-d',strtotime('last day of this month'));

        
        // if(Auth::user()->package_status == 0){
        //     $used_package = used_package::find(Auth::user()->package_id);
        //     $no_of_ads = $used_package->no_of_ads;
        //     $popular_ads = $used_package->popular_ads;
        //     $top_search = $used_package->top_search;

        //     if($request->post_type == 0){
        //         $no_of_ads_count = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->where('post_type',0)->where('package_status',0)->count();
                
        //         if($no_of_ads_count >= $no_of_ads){
        //             return response()->json(['message' => 'Ad Limit is Exceed','status'=>1], 200);
        //         }
        //     }

        //     if($request->popular_ads == 1){
        //         $popular_ads_count = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->where('popular_ads',1)->where('package_status',0)->count();
                
        //         if($popular_ads_count >= $popular_ads){
        //             return response()->json(['message' => 'Popular Ads Limit is Exceed','status'=>1], 200);
        //         }
        //     }

        //     if($request->top_search == 1){
        //         $top_search_count = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->where('top_search',1)->where('package_status',0)->count();
                
        //         if($top_search_count >= $top_search){
        //             return response()->json(['message' => 'Top Search Limit is Exceed','status'=>1], 200);
        //         }
        //     }

        // }else{
        //     return response()->json(['message' => 'Your Package is Expired','status'=>1], 200);
        // }

        $post_ad = new post_ad;
        $post_ad->date = date('Y-m-d');
        $post_ad->customer_id = $request->customer_id;
        $post_ad->post_type = $request->post_type;
        $post_ad->popular_ads = $request->popular_ads;
        $post_ad->top_search = $request->top_search;
        $post_ad->category = $request->category;
        $post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        $post_ad->mobile = $request->mobile;
        $post_ad->email = $request->email;
        $post_ad->name = $request->name;
        $post_ad->description = $request->description;
        $post_ad->city = $request->city;
        $post_ad->area = $request->area;
        $post_ad->address = $request->address;
        $post_ad->latitude = $request->latitude;
        $post_ad->longitude = $request->longitude;
        $post_ad->price_condition = $request->price_condition;
        $post_ad->item_condition = $request->item_condition;
        $post_ad->used_package_id = Auth::user()->package_id;

        if($request->profile_image!=""){
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_image');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);
    
            $post_ad->image = $input['imagename'];
        }

        $post_ad->save();

        // $fileName = null;
        // if($request->hasfile('images'))
        // {
        //     foreach($request->file('images') as $image)
        //     {
        //         $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
            
        //         $destinationPath = public_path('/upload_image');
        //         $img = Image::make($image->getRealPath());
        //         $img->resize(1200, 600, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);

        //         $post_ad_image = new post_ad_image;
        //         $post_ad_image->post_id = $post_ad->id;
        //         $post_ad_image->image = $input['imagename'];
        //         $post_ad_image->save();
        //     }
        // }

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($name_array[$x] != ""){
                    $post_ad_image = new post_ad_image;

                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/upload_image');
                    $img = Image::make($tmp_name_array[$x]);
                    $img->resize(1200, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);

                    $post_ad_image->post_id = $post_ad->id;
                    $post_ad_image->image = $input['imagename'];
                    $post_ad_image->save();
                }
    	    }
        }

        $logsController = new LogsController();
        $logsController->createlog(Auth::user()->id,"Create Post '.$request->title.'");


        $search_history = search_history::where('search', 'like', '%' . $request->title . '%')->get();
        foreach($search_history as $row){
            $all = User::find($row->customer_id);
            $post = post_ad::find($post_ad->id);
            $category = category::find($request->category);
            Mail::send('mail.search_alert',compact('all','post','category'),function($message) use($all){
                $message->to($all->email)->subject('Found It - New Posts');
                $message->from('mail.lrbinfotech@gmail.com','Found It');
            });
        }

        return response()->json(['message' => 'Successfully Save','status'=>0], 200); 
    }

    public function editpostvalidatefirst(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,'.$request->id.',id,customer_id,'.$request->customer_id,
            'price'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
        ]);
        return true;
    }
    public function editpostvalidatesecond(Request $request){
        $this->validate($request, [
            'profile_image' => 'mimes:jpeg,jpg,png|max:10000', // max 1000kb
          ],[
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            //'profile_image.required' => '1st Image Field is Must Required',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 10MB',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }
        return true;
    }

    public function updatepostad(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'area'=>'required',
        ]);


        $post_ad = post_ad::find($request->id);
        $post_ad->customer_id = $request->customer_id;
        // $post_ad->post_type = $request->post_type;
        // $post_ad->popular_ads = $request->popular_ads;
        // $post_ad->top_search = $request->top_search;
        $post_ad->category = $request->category;
        $post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        $post_ad->mobile = $request->mobile;
        $post_ad->email = $request->email;
        $post_ad->name = $request->name;
        $post_ad->description = $request->description;
        $post_ad->city = $request->city;
        $post_ad->area = $request->area;
        $post_ad->address = $request->address;
        $post_ad->latitude = $request->latitude;
        $post_ad->longitude = $request->longitude;
        $post_ad->price_condition = $request->price_condition;
        $post_ad->item_condition = $request->item_condition;

        if($request->profile_image!=""){
            $old_image = "upload_image/".$post_ad->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/upload_image');
            $img = Image::make($image->getRealPath());
            // $img->text('By LRB INFOTECH', 350, 100, function ($font) {
            //     // Using font family here
            //     // $font->file(public_path('RobotoMono-VariableFont_wght.ttf'));
            //     $font->size(20);
            //     $font->color('#000');
            //     $font->align('center');
            //     $font->valign('bottom');
            // });

            // $watermarkSize = $img->width() - 20;
            // $watermarkSize = $img->width() / 2;
            // $resizePercentage = 70;
            // $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); 
            // $img->resize($watermarkSize, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);
    
            $post_ad->image = $input['imagename'];
        }

        $post_ad->save();

        // $fileName = null;
        // if($request->hasfile('images'))
        // {
        //     foreach($request->file('images') as $image)
        //     {
        //         $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
            
        //         $destinationPath = public_path('/upload_image');
        //         $img = Image::make($image->getRealPath());
        //         $img->resize(1200, 600, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);

        //         $post_ad_image = new post_ad_image;
        //         $post_ad_image->post_id = $post_ad->id;
        //         $post_ad_image->image = $input['imagename'];
        //         $post_ad_image->save();
        //     }
        // }

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($_POST['image_id'][$x]!=""){
                    $post_ad_image = post_ad_image::find($_POST['image_id'][$x]);
                    if($name_array[$x] != ""){
                        $old_image = "upload_image/".$post_ad_image->image;
                        if (file_exists($old_image)) {
                            @unlink($old_image);
                        }
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/upload_image');
                        $img = Image::make($tmp_name_array[$x]);
                        // $img->text('By LRB INFOTECH', 450, 100, function ($font) {
                        //     // Using font family here
                        //     // $font->file(public_path('RobotoMono-VariableFont_wght.ttf'));
                        //     $font->size(40);
                        //     $font->color('#202124');
                        //     $font->align('center');
                        //     $font->valign('bottom');
                        // });
                        $img->resize(1200, 600, function ($constraint) {
                            $constraint->aspectRatio();
                        })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);
                        $post_ad_image->image = $input['imagename'];
                    }
                    $post_ad_image->save();
                }
                else{
                    if($name_array[$x] != ""){
                        $post_ad_image = new post_ad_image;
                        
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/upload_image');
                        $img = Image::make($tmp_name_array[$x]);
                        // $img->text('By LRB INFOTECH', 450, 100, function ($font) {
                        //     // Using font family here
                        //     // $font->file(public_path('RobotoMono-VariableFont_wght.ttf'));
                        //     $font->size(40);
                        //     $font->color('#202124');
                        //     $font->align('center');
                        //     $font->valign('bottom');
                        // });
                        $img->resize(1200, 600, function ($constraint) {
                            $constraint->aspectRatio();
                        })->insert('images/logo-blur.png','center')->save($destinationPath.'/'.$input['imagename']);

                        $post_ad_image->post_id = $post_ad->id;
                        $post_ad_image->image = $input['imagename'];
                        $post_ad_image->save();
                    }
                }
            }
        }

        $logsController = new LogsController();
        $logsController->createlog(Auth::user()->id,"Edit Post '.$request->title.'");

        return response()->json(['message' => 'Successfully Update','status'=>0], 200);
    }

}
