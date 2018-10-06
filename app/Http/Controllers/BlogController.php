<?php
namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller{
    public function getIndex(){
    	$post=Post::orderBy('created_at','desc')->paginate(6);
    	return view('blog.index')->withPosts($post);
    }
    public function getSingle($slug){
    	$post=Post::where('slug','=',$slug)->first();
    	return view('blog.single')->withPost($post);
    }
}