<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\report_posts;
use App\Models\report_category;
use App\Models\live_ads;
use App\Models\language;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\ImageFilter;
use Auth;
use DB;
use Mail;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }


    public function newpostads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('admin.create_post',compact('category','subcategory','city','area','language'));
    }

    public function editpostads($id){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ad = post_ad::find($id);
    	$post_ad_image = post_ad_image::where('post_id',$id)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('admin.edit_post',compact('category','subcategory','post_ad','post_ad_image','city','area','language'));
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

    public function savepostads(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,NULL,id,customer_id,'.$request->customer_id,
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'price'=>'required',
            'city'=>'required',
            'area'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
          	'profile_image' => 'required|mimes:jpeg,jpg,png|max:10000', // max 1000kb
          	'images.*' => 'mimes:jpeg,jpg,png|max:10000' // max 1000kb
          ],[
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.required' => 'Profile Image Feild is Required',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

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
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $post_ad->image = $input['imagename'];
        }

        $post_ad->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
            
                $destinationPath = public_path('/upload_image');
                $img = Image::make($image->getRealPath());
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);

                $post_ad_image = new post_ad_image;
                $post_ad_image->post_id = $post_ad->id;
                $post_ad_image->image = $input['imagename'];
                $post_ad_image->save();
            }
        }

        return response()->json(['message' => 'Successfully Save','status'=>0], 200);
    }


    public function updatepostads(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,'.$request->id.',id,customer_id,'.$request->customer_id,
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'price'=>'required',
            'city'=>'required',
            'area'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
          	'profile_image' => 'mimes:jpeg,jpg,png|max:10000', // max 1000kb
          	'images.*' => 'mimes:jpeg,jpg,png|max:10000' // max 1000kb
          ],[
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $post_ad = post_ad::find($request->id);
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

        if($request->profile_image!=""){
            $old_image = "upload_image/".$post_ad->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_image');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $post_ad->image = $input['imagename'];
        }

        $post_ad->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
            
                $destinationPath = public_path('/upload_image');
                $img = Image::make($image->getRealPath());
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);

                $post_ad_image = new post_ad_image;
                $post_ad_image->post_id = $post_ad->id;
                $post_ad_image->image = $input['imagename'];
                $post_ad_image->save();
            }
        }

        return response()->json(['message' => 'Successfully Update','status'=>0], 200);
    }

    public function postads(){
        $user = User::where('status',1)->get();
        $language = language::all();
        $category = category::where('parent_id',0)->where('status',0)->get();
        return view('admin.post_ads',compact('user','language','category'));
    }

    public function reportpostads(){
        $language = language::all();
        return view('admin.report_posts',compact('language'));
    }

    public function customerpostads($id){
        $language = language::all();
        return view('admin.customer_post_ads',compact('id','language'));
    }

    public function approvedpostads($id){
        $post_ad = post_ad::find($id);
        $post_ad->status = 1;
        $post_ad->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function deletepostads($id,$status){
        $post_ad = post_ad::find($id);
        $post_ad->admin_status = $status;
        $post_ad->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getpostads($fdate,$tdate,$user_id,$category,$from_range,$to_range){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $i =DB::table('post_ads as p');
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $i->whereBetween('p.date', [$fdate1, $tdate1]);
        }
        if ( $user_id != 'user' )
        {
            if($user_id != 'admin'){
                $i->where('p.customer_id', $user_id);
            }
            else{
                $i->where('p.customer_id', 0);
            }
        }
        if ( $category != 'category' )
        {
            $i->where('p.category', $category);
        }
        if ( $from_range != 'from_range' && $to_range != 'to_range' )
        {
            $i->whereBetween('p.price', [$from_range, $to_range]);
        }
        $i->orderBy('p.id','DESC');
        $post_ad = $i->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
                else{
                    return '<td>
                    <p>Created by Admin</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
				$subcategory = category::find($post_ad->subcategory);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>SubCategory : '.$subcategory->category.'</p>
                </td>';
            })

            ->addColumn('post_details', function ($post_ad) {
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>Mobile : '.$post_ad->mobile.'</p>
                <p>email : '.$post_ad->email.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('status', function ($post_ad) {
                if($post_ad->status == 0){
                    return 'New Post';
                }
                else{
                    if($post_ad->admin_status == 0){
                        return 'Active';
                    }
                    elseif($post_ad->admin_status == 1){
                        return 'DeActive';
                    }
                }
            })

            ->addColumn('date', function ($post_ad) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($post_ad->created_at)).'</p>
                <p>'.date('h:i A',strtotime($post_ad->created_at)).'</p>
                </td>';
            })

            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->status == 0){
                    $output.='<a onclick="Approved('.$post_ad->id.')" class="dropdown-item" href="#">Approved</a>';
                }
                else{
                    if($post_ad->admin_status == 0){
                        $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">DeActive</a>';
                    }
                    elseif($post_ad->admin_status == 1){
                        $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Active</a>';
                    }
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a target="_blank" class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['date','customer','post_details','post_image', 'category', 'status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function getreportpostads($fdate,$tdate){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $post_ad =DB::table('report_posts as r');
        $post_ad->join('post_ads as p','p.id','=','r.post_id');
        $post_ad->select('p.*',DB::raw("r.post_id as report_post_id"),DB::raw("r.category as report_category"),DB::raw("r.description as report_description"),DB::raw("r.user_id as report_user"));
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $post_ad->whereBetween('r.date', [$fdate1, $tdate1]);
        }
        $post_ad->orderBy('r.id','DESC');
        //$post_ad = $i->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
                else{
                    return '<td>
                    <p>Created by Admin</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
				$subcategory = category::find($post_ad->subcategory);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>SubCategory : '.$subcategory->category.'</p>
                </td>';
            })

            ->addColumn('post_details', function ($post_ad) {
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>Mobile : '.$post_ad->mobile.'</p>
                <p>email : '.$post_ad->email.'</p>
                </td>';
            })

            ->addColumn('report_reason', function ($post_ad) {
                $category = report_category::find($post_ad->report_category);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>Reason : '.$post_ad->report_description.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('post_status', function ($post_ad) {
                if($post_ad->admin_status == 0){
                    return 'Active';
                }
                elseif($post_ad->admin_status == 1){
                    return 'DeActive';
                }
            })

            ->addColumn('user_status', function ($post_ad) {
                $user = User::find($post_ad->report_user);
                if($user->status == 1){
                    return 'Active';
                }
                elseif($user->status == 2){
                    return 'DeActive';
                }
            })

            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->admin_status == 0){
                    $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">Post DeActive</a>';
                }
                elseif($post_ad->admin_status == 1){
                    $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Post Active</a>';
                }
                $user = User::find($post_ad->report_user);
                $output1='';
                if($user->status == 1){
                    $output1.='<a onclick="UserDelete('.$user->id.',2)" class="dropdown-item" href="#">User DeActive</a>';
                }
                elseif($user->status == 2){
                    $output1.='<a onclick="UserDelete('.$user->id.',1)" class="dropdown-item" href="#">User Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        '.$output1.'
                        <a class="dropdown-item" href="/admin/edit-post-ads/'.$post_ad->id.'">Edit Post</a>
                        <a class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['customer','post_details','post_image', 'category', 'post_status','user_status','action','report_reason'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }


    public function getcustomerpostads($id){
        $post_ad = post_ad::where('customer_id',$id)->orderBy('id','DESC');
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
                else{
                    return '<td>
                    <p>Created by Admin</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
				$subcategory = category::find($post_ad->subcategory);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>SubCategory : '.$subcategory->category.'</p>
                </td>';
            })

            ->addColumn('post_details', function ($post_ad) {
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>Mobile : '.$post_ad->mobile.'</p>
                <p>email : '.$post_ad->email.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('status', function ($post_ad) {
                if($post_ad->status == 0){
                    return 'Active';
                }
                elseif($post_ad->status == 1){
                    return 'DeActive';
                }
                elseif($post_ad->status == 2){
                    return 'Featured';
                }
            })

            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->admin_status == 0){
                    $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">DeActive</a>';
                }
                elseif($post_ad->admin_status == 1){
                    $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a class="dropdown-item" href="/admin/edit-post-ads/'.$post_ad->id.'">Edit Post</a>
                        <a class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['customer','post_details','post_image', 'category', 'status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }


    public function liveads(){
        $live_ads = live_ads::where('user_id',0)->orderBy('order_id','ASC')->get();
        $post_ads = post_ad::where('customer_id',0)->where('admin_status',0)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('admin.live_ads',compact('live_ads','post_ads','language'));
    }

    public function updateliveads(Request $request)
    {
        foreach ($request->value as $key => $value) 
        {
            $order_id=$key+1;
            $live_ads = live_ads::find($value);
            $live_ads->order_id = $order_id;
            $live_ads->save();
        }
        return response()->json(['message'=>'Successfully Update'],200);
    }

    public function saveliveads(Request $request){
        $this->validate($request, [
            'post_id'=>'required|unique:live_ads',
          ],[
            'post_id.required' => 'Select Post Field is Required',
            'post_id.unique' => 'This Post has Already been Taken',
        ]);
        $count = live_ads::where('user_id',0)->count();
        $live_ads = new live_ads;
        $live_ads->order_id = $count + 1;
        $live_ads->post_id = $request->post_id;
        $live_ads->user_id = 0;
        $live_ads->save();
        return response()->json('successfully save'); 
    }

    public function deleteliveads($id){
        $live_ads = live_ads::find($id);
        $live_ads->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
