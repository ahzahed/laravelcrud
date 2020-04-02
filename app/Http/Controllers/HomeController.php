<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name','categories.slug')->paginate(2);
        return view('home',compact('posts'));
    }



    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function addCategory()
    {
        return view('crudWithDB.addCategory');
    }
    public function storeAddCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:categories', 'max:25','min:4'],
            'slug' => ['required','max:25','min:4'],
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] =$request->slug;
        $category = DB::table('categories')->insert($data);
        if($category){
            $notification=array(
                'message' => 'Successfully Category Inserted',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function viewCategory()
    {
        $category = DB::table('categories')->get();
        return view('crudWithDB.viewCategory',compact('category'));
    }
    public function singleView($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('crudWithDB.singleView',compact('category'));
    }

    public function singleDelete($id)
    {
        $category = DB::table('categories')->where('id',$id)->delete();
        return back();
    }
    public function singleUpdate($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('crudWithDB.singleUpdate',compact('category'));
    }
    public function storeUpdateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:25','min:4'],
            'slug' => ['required','max:25','min:4'],
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] =$request->slug;
        $category = DB::table('categories')->where('id',$id)->update($data);
        return back();
    }
}
