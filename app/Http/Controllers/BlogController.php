<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller{
    public function getIndex(){
    	$post=Post::orderBy('fixed','desc')->orderBy('id','desc')->paginate(9);
    	$category=Category::all();
    	return view('blog.index')->withPosts($post)->withCategory($category);
    }
    public function getSingle($slug){
    	$post=Post::where('slug','=',$slug)->first();
        $category=Category::all();
        if (!$post) {
            $post=Post::orderBy('fixed','desc')->orderBy('id','desc')->paginate(9);
            return view('blog.index')->withPosts($post)->withCategory($category);
        }else{
            return view('blog.single')->withPosts($post)->withCategory($category);
        }
    }
}