<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\language;
use App\Models\faq;
use App\Models\news_letter;
use App\Models\news_letter_email;
use App\Models\blog;
use Image;
use Auth;
use Mail;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function saveblog(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'blog Image Field is Required',
        ]);

        $blog = new blog;
        $blog->date = date('Y-m-d');
        $blog->title = $request->title;
        $blog->description = $request->description;

        if($request->image!=""){            
            $image = $request->file('image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_files');
            $img = Image::make($image->getRealPath());
            $img->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $blog->image = $input['imagename'];
        }

        $blog->save();

        return response()->json('successfully save'); 
    }
    public function updateblog(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $blog = blog::find($request->id);
        $blog->title = $request->title;
        $blog->description = $request->description;

        if($request->image!=""){
            $old_image = "upload_files/".$blog->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_files');
            $img = Image::make($image->getRealPath());
            $img->insert('images/logo-blur.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $blog->image = $input['imagename'];
        }
        $blog->save();

        return response()->json('successfully update'); 
    }

    public function blog(){
        $blog = blog::all();
        $language = language::all();
        return view('admin.blog',compact('blog','language'));
    }

    public function editblog($id){
        $blog = blog::find($id);
        return response()->json($blog); 
    }
    
    public function deleteblog($id,$status){
        $blog = blog::find($id);
        $blog->status = $status;
        $blog->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savenewsletter(Request $request){
        $this->validate($request, [
            'subject'=>'required',
            'message'=>'required',
        ]);

        $newsletter = new news_letter;
        $newsletter->subject = $request->subject;
        $newsletter->message = $request->message;
        $newsletter->save();

        return response()->json('successfully save'); 
    }
    public function updatenewsletter(Request $request){
        $this->validate($request, [
            'subject'=>'required',
            'message'=>'required',
        ]);
        
        $newsletter = news_letter::find($request->id);
        $newsletter->subject = $request->subject;
        $newsletter->message = $request->message;
        $newsletter->save();

        return response()->json('successfully update'); 
    }

    public function newsletter(){
        $newsletter = news_letter::all();
        $language = language::all();
        return view('admin.newsletter',compact('newsletter','language'));
    }

    public function editnewsletter($id){
        $newsletter = news_letter::find($id);
        return response()->json($newsletter); 
    }
    
    public function deletenewsletter($id){
        $newsletter = news_letter::find($id);
        //$newsletter->status = $status;
        $newsletter->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function sendnewsletter($id){
        $newsletter = news_letter::find($id);

        $news_letter_email = news_letter_email::all();
        foreach($news_letter_email as $row){
            Mail::send('mail.newsletter',compact('newsletter'),function($message) use($row){
                $message->to($row->email)->subject('Found It - News Letter');
                $message->from('mail.lrbinfotech@gmail.com','Found It');
            });
        }
        return response()->json(['message'=>'Successfully Send'],200); 
    }

    public function savefaq(Request $request){
        $this->validate($request, [
            'question'=>'required',
            'answer'=>'required',
        ]);

        $faq = new faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return response()->json('successfully save'); 
    }
    public function updatefaq(Request $request){
        $this->validate($request, [
            'question'=>'required',
            'answer'=>'required',
        ]);
        
        $faq = faq::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return response()->json('successfully update'); 
    }

    public function faq(){
        $faq = faq::all();
        $language = language::all();
        return view('admin.faq',compact('faq','language'));
    }

    public function editfaq($id){
        $faq = faq::find($id);
        return response()->json($faq); 
    }
    
    public function deletefaq($id,$status){
        $faq = faq::find($id);
        $faq->status = $status;
        $faq->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
