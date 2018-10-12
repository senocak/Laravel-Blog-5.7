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
        $posts=Post::orderBy('sira','asc')->paginate(30);
        return view('posts.index')->withPosts($posts);
    }
    public function create(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }
    public function store(Request $request){
        $this->validate($request,array(
          'title'       => 'required|max:255',
          'slug'        => 'alpha_dash|min:5|max:255|unique:posts,slug', 
          'category_id' => 'required|integer',
          'body'        => 'required'
        ));
        $post=new Post;
        $post->title=$request->title;
        $post->slug=$this->self_url(($request->title));
        $post->body=$request->body;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','Yazı Kaydedildi.');
        return redirect()->route('posts.index');
    }
    public function show($id){
        $post=Post::find($id);
        if ($post) {
            return view('posts.show')->withPost($post);
        }else{
            return $this->index();
        }
    }
    public function edit($id){
        $post=Post::find($id);
        if ($post) {
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
        }else{
            return $this->index();
        } 
    }
    public function update(Request $request, $id){
        $this->validate($request,array(
          'title' => 'required|max:255',
          'slug'  => '', 
          'category_id' => 'required|integer',
          'body'  => 'required'
        ));
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$this->self_url(($request->title));
        $post->title=$request->input('title');
        $post->body=$request->body;
        $post->category_id=$request->input('category_id');
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success','Yazı Güncellendi');
        return redirect()->route('posts.index');
    }
    public function destroy($id){
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','Yazı Silindi');
        return redirect()->route('posts.index');
    }
    public function self_url($title){
        $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","Ö","Ü","I","Ğ","Ç","Ş","&","'","S",",");
        $replace = array("-","o","u","i","g","c","s","-","","o","u","i","g","c","s","-","","s","");
        $new_text = str_replace($search,$replace,trim($title));
        return $new_text;
    }
    public function getDelete($id){
        $post=Post::find($id);
        if ($post) {
            return view("posts.delete")->withPost($post);
        }else{
            return $this->index();
        } 
    }
    public function sortPosts(Request $request){
        foreach ( $request->item as $key => $value ){ 
            $post=Post::find($value);
            $post->sira=$key;
            $post->save();    
        }
        Session::flash('success','İçeriklerin sırala işlemi güncellendi');
        return array( 'islemSonuc' => true , 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi' );
    }
    public function fixed ($id){
        $post=Post::find($id);
        if ($post) {
            $fixed=$post->fixed;
            $fixed2="";
            if($fixed=="1"){
                $fixed2="0";
            }else{
                $fixed2="1";
            }
            $post->fixed=$fixed2;
            $post->save();
            Session::flash('success','Yazı Güncellendi');
            return redirect()->route('posts.index');
        }else{
            return $this->index();
        }  
    }
}