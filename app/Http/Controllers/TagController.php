<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;
class TagController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $tags=Tag::orderBy('id','desc')->paginate(20);
        return view('tags.index')->withTags($tags);
    }
    public function store(Request $request){
        $this->validate($request,array('name' => 'required|max:255'));
        $tags=new Tag;
        $tags->name=$request->name;
        $tags->save();
        Session::flash('success','Etiket Eklendi');
        return redirect()->route('tags.index');
    }
    public function show($id){
        $tags=Tag::find($id);
        return view('tags.show')->withTags($tags);
    }
    public function edit($id){
        return redirect()->route('tags.index');
    }
    public function update(Request $request, $id){
        $this->validate($request,array('name' => 'required|max:255'));
        $tag=Tag::find($id);
        $tag->name=$request->name;
        $tag->save();
        Session::flash('success','Etiket Güncellendi');
        return redirect()->route('tags.index');
    }
    public function destroy($id){
        $tag=Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        Session::flash('success','Etiket Silindi');
        return redirect()->route('tags.index');
    }
}
