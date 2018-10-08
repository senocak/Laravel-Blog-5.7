<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use Image; 
use Storage; 


class CategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){ 
        $categories=Category::orderBy('id','desc')->paginate(10);
        //$categories=Category::all();
        return view('categories.index')->withCategories($categories);
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $this->validate($request,array(
          'name' => 'required|max:255',
          'img'  => 'required|image'
        ));
        //store in db
        $category=new Category;
        $category->name=$request->name;
        $slug=$this->self_url(($request->name));
        $category->slug=$slug;

        if ($request->hasFile('img')) {
            $img=$request->file('img');
            $filename=$slug.".".$img->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($img)->resize(1100,450)->save($location);
            $category->picture=$filename;
        }

        $category->save();
        //redirect
        Session::flash('success','New Category Added');
        //return redirect()->route('posts.show',$category->id);
        return redirect()->route('categories.index');
    }
    public function show($id){
        //
    }
    public function edit($id){
        $category=Category::find($id);
        return view('categories.edit')->withCategory($category);   
    }
    public function update(Request $request, $id){
        $this->validate($request,array(
          'name' => 'required|max:255',
          'img'  => 'required|image'
        ));
        //store in db
        $category=Category::find($id);
        $category->name=$request->name;
        $slug=$this->self_url(($request->name));
        $category->slug=$slug;
        if ($request->hasFile('img')) {
            $img=$request->file('img');
            $filename=$slug.".".$img->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($img)->resize(1100,450)->save($location);
            $oldfilename=$category->picture;
            $category->picture=$filename;
            Storage::delete($oldfilename);
        }
        $category->save();
        //redirect
        Session::flash('success','New Category Updated');
        //return redirect()->route('posts.show',$category->id);
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $category=Category::find($id);
        Storage::delete($category->picture);
        $category->delete();
        Session::flash('success','Category Successfully Deleted');
        return redirect()->route('categories.index');
    } 
    public function self_url($title){
        $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","Ö","Ü","I","Ğ","Ç","Ş","&","'");
        $replace = array("_","o","u","i","g","c","s","_","_","o","u","i","g","c","s","_","");
        $new_text = str_replace($search,$replace,trim($title));
        return $new_text;
    }
    public function getPost($slug){
        $category_id=Category::where('slug','=',$slug)->first();
        $c_id=$category_id->id;

        $post=Post::where('category_id','=',$c_id)->paginate(6);
        $category=Category::all();
        return view('categories.post')->withPosts($post)->withCategory($category);
    }
    public function getDelete($id){
        $category=Category::find($id);
        return view("categories.delete")->withCategory($category);
    }
}