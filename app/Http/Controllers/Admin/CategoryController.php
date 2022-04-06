<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post_ad;
use App\Models\language;
use App\Models\report_category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public static function categorypostcount($id) {
        $post_count = post_ad::where('category',$id)->where('admin_status',0)->where('status',0)->count();
        return $post_count;
    }

    public static function subcategorypostcount($id) {
        $post_count = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',0)->count();
        return $post_count;
    }

    public function savecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            'banner_image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'banner_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'banner_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'banner_image.required' => 'Banner Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = 0;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        if($request->banner_image!=""){
            if($request->file('banner_image')!=""){
            $image = $request->file('banner_image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->banner_image = $upload_image;
            }
        }

        $category->save();

        return response()->json('successfully save'); 
    }
    public function updatecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            'banner_image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'banner_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'banner_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = 0;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        if($request->banner_image!=""){
            $old_image = "upload_files/".$category->banner_image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('banner_image')!=""){
            $image = $request->file('banner_image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->banner_image = $upload_image;
            }
        }
        $category->save();

        return response()->json('successfully update'); 
    }

    public function category(){
        $category = category::where('parent_id',0)->get();
        $language = language::all();
        return view('admin.category',compact('category','language'));
    }

    public function editcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletecategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully save'); 
    }

    public function updatesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully update'); 
    }

    public function subcategory($id){
        $subcategory = category::where('parent_id',$id)->get();
        $parent_id = $id;
        $language = language::all();
        return view('admin.subcategory',compact('subcategory','parent_id','language'));
    }

    public function editsubcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletesubcategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }



    public function savereportcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
           // 'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            // 'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            // 'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            // 'image.required' => 'Category Image Field is Required',
        ]);

        $category = new report_category;
        $category->category = $request->category;
        $category->save();

        return response()->json('successfully save'); 
    }
    public function updatereportcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            //'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            // 'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            // 'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $category = report_category::find($request->id);
        $category->category = $request->category;
        $category->save();

        return response()->json('successfully update'); 
    }

    public function reportcategory(){
        $category = report_category::all();
        $language = language::all();
        return view('admin.report_category',compact('category','language'));
    }

    public function editreportcategory($id){
        $category = report_category::find($id);
        return response()->json($category); 
    }
    
    public function deletereportcategory($id,$status){
        $category = report_category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
