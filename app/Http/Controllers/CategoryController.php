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
        $categories=Category::orderBy('sira','asc')->paginate(10);
        return view('categories.index')->withCategories($categories);
    }
    public function show(){ 
        return $this->index();
    }
    public function store(Request $request){
        $this->validate($request,array(
          'name' => 'required|max:255',
          'img'  => 'required|image'
        ));
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
        Session::flash('success','Yeni Kategori Eklendi');
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $category=Category::find($id);
        if(!$category){
            return $this->index();
        }else{
            return view('categories.edit')->withCategory($category);   
        }
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
        Session::flash('success','Kategori Güncellendi');
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $category=Category::find($id);
        Storage::delete($category->picture);
        $category->delete();
        Session::flash('success','Kategori Silindi');
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
        if(!$category_id){
            return redirect()->route("blog.index");
        }else{
            $c_id=$category_id->id;
            $post=Post::where('category_id','=',$c_id)->paginate(6);
            $category=Category::all();
            return view('categories.post')->withPosts($post)->withCategory($category)->withSlug($slug);
        }
    }
    public function getDelete($id){
        $category=Category::find($id);
        if (!$category) {
            return $this->index();
        }else{
            return view("categories.delete")->withCategory($category);
        }
    }
    public function sortPosts(Request $request){
        foreach ( $request->item as $key => $value ){ 
            $category=Category::find($value);
            $category->sira=$key;
            $category->save();    
        }
        Session::flash('success','İçeriklerin sırala işlemi güncellendi');
        return array( 'islemSonuc' => true , 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi' );
    }
}
