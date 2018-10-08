<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller{
    public function getIndex(){
    	$post=Post::orderBy('id','desc')->paginate(6);
    	$category=Category::all();
    	return view('blog.index')->withPosts($post)->withCategory($category);
    }
    public function getSingle($slug){
    	$post=Post::where('slug','=',$slug)->first();
    	$category=Category::all();
    	return view('blog.single')->withPost($post)->withCategory($category);
    }
}