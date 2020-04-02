<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function post()
    {
        $category = DB::table('categories')->get();
        return view('frontend.post',compact('category'));
    }
    public function storePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg,PNG|max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image=$request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='frontend/postImage/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function viewPost(){
        // $posts = DB::table('posts')->get();
        // Join one to one
        $posts = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        return view('crudWithDB.viewPost',compact('posts'));
    }

    public function singlePostView($id){
        // $posts = DB::table('posts')->get();
        // Join one to one
        $posts = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name','categories.slug')
            ->where('posts.id',$id)
            ->first();
        return view('crudWithDB.singlePostView',compact('posts'));
    }

    public function singlePostUpdate($id){
        $category=DB::table('categories')->get();
        $posts=DB::table('posts')->where('id',$id)->first();
        return view('crudWithDB.singlePostEdit',compact('category','posts'));
    }

    public function singlePostStore(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required|max:1000',
            'image' => 'mimes:png,jpg,jpeg,PNG|max:10000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image=$request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='frontend/postImage/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Successfully Post updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('viewPost')->with($notification);
        }
        else{
            $data['image']=$request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Successfully Post updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('viewPost')->with($notification);
        }
    }
    public function singlePostDelete($id){
        $posts=DB::table('posts')->where('id',$id)->first();
        $image=$posts->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($image);
            $notification=array(
                'messege' => 'Successfully Post deleted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'messege' => 'Something is wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


}
