<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        $posts=Post::orderBy('id','desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        //validate data
        $this->validate($request,array(
          'title' => 'required|max:255',
          'slug'  => 'alpha_dash|min:5|max:255|unique:posts,slug', 
          'body'  => 'required'
        ));
        //store in db
        $post=new Post;
        $post->title=$request->title;
        $post->slug=$this->self_url(strtolower($request->title));
        $post->body=$request->body;
        $post->save();
        //redirect
        Session::flash('success','Post Successfully Saved');
        //return redirect()->route('posts.show',$post->id);
        return redirect()->route('posts.index');

    }
    public function show($id){
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }
    public function edit($id){
        $post=Post::find($id);
        return view("posts.edit")->withPost($post);
    }
    public function update(Request $request, $id){
        //validate data
        $this->validate($request,array(
          'title' => 'required|max:255',
          'slug'  => '', 
          'body'  => 'required'
        ));
        //store in db
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$this->self_url(strtolower($request->input('title')));
        $post->body=$request->input('body');
        $post->save();
        //redirect
        Session::flash('success','Post Successfully Updated');
        //return redirect()->route('posts.show',$post->id);
        return redirect()->route('posts.index');
    }
    public function destroy($id){
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','Post Successfully Deleted');
        return redirect()->route('posts.index');
    }
    public function self_url($title){
        $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","Ö","Ü","I","Ğ","Ç","Ş","&","'");
        $replace = array("_","o","u","i","g","c","s","_","_","o","u","i","g","c","s","_","");
        $new_text = str_replace($search,$replace,trim($title));
        return $new_text;
    }
}