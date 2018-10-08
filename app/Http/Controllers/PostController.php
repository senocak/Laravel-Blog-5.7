<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        $posts=Post::orderBy('id','desc')->paginate(20);
        return view('posts.index')->withPosts($posts);
    }
    public function create(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }
    public function store(Request $request){
        //dd($request);
        //validate data
        $this->validate($request,array(
          'title'       => 'required|max:255',
          'slug'        => 'alpha_dash|min:5|max:255|unique:posts,slug', 
          'category_id' => 'required|integer',
          'body'        => 'required'
        ));
        //store in db
        $post=new Post;
        $post->title=$request->title;
        $post->slug=$this->self_url(($request->title));
        $post->body=$request->body;
        $post->category_id=$request->category_id;
        $post->save();

        $post->tags()->sync($request->tags,false);
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
        $categories=Category::all();
        $cats=array();
        foreach ($categories as $category) {
            $cats[$category->id]=$category->name;
        }
        $tags=Tag::all();
        $tags2=array();
        foreach ($tags as $tag) {
            $tags2[$tag->id]=$tag->name;
        }
        return view("posts.edit")->withPost($post)->withCategories($cats)->withTags($tags2);
    }
    public function update(Request $request, $id){
        //validate data
        $this->validate($request,array(
          'title' => 'required|max:255',
          'slug'  => '', 
          'category_id' => 'required|integer',
          'body'  => 'required'
        ));
        //store in db
        $post=Post::find($id);
        $post->title=$request->input('title');
        //$post->slug=$this->self_url(strtolower($request->input('title')));
        $post->slug=$this->self_url(($request->title));
        $post->title=$request->input('title');
        $post->body=$request->body;
        $post->category_id=$request->input('category_id');
        $post->save();

        $post->tags()->sync($request->tags);
        //redirect
        Session::flash('success','Post Successfully Updated');
        //return redirect()->route('posts.show',$post->id);
        return redirect()->route('posts.index');
    }
    public function destroy($id){
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','Post Successfully Deleted');
        return redirect()->route('posts.index');
    }
    public function self_url($title){
        $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","Ö","Ü","I","Ğ","Ç","Ş","&","'","S");
        $replace = array("-","o","u","i","g","c","s","-","","o","u","i","g","c","s","-","","s");
        $new_text = str_replace($search,$replace,trim($title));
        return $new_text;
    }
    public function getDelete($id){
        $post=Post::find($id);
        return view("posts.delete")->withPost($post);
    }
}