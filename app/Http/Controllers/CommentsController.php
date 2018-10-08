<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller{
    public function __construct(){
        $this->middleware('auth',['except'=>'store']);
    }
    public function index(){
        //
    }
    public function create(){
        //
    }
    public function store(Request $request,$post_id){
        $this->validate($request,array(
          'name'        => 'required|max:255',
          'email'       => 'required|min:5|max:255', 
          'comment'     => 'required|min:5|max:2000'
        ));
        $post=Post::find($post_id);
        $comment=new Comment;
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        //$comment->post_id=$post_id;
        $comment->approved=true;
        $comment->post()->associate($post);
        $comment->save();

        //redirect
        Session::flash('success','Comment Successfully Saved');
        //return redirect()->route('posts.show',$post->id);
        return redirect()->route('blog.single',[$post->slug]);
    }
    public function show($id){
        //
    }
    public function edit($id){
        $comment=Comment::find($id);
        return view('comments.edit')->withComment($comment);        
    }
    public function update(Request $request, $id){
        $comment=Comment::find($id);
        $this->validate($request,array('comment'=> 'required|max:255'));
        $comment->comment=$request->comment;
        $comment->save();
        //redirect
        Session::flash('success','Comment Successfully Updated');
        //return redirect()->route('posts.show',$post->id);
        return redirect()->route('posts.show',$comment->post->id); 
    }
    public function delete($id){
        $comment=Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }
    public function destroy($id){
        $comment=Comment::find($id);
        $postid=$comment->post->id;
        $comment->delete();
        Session::flash('success','Comment Successfully Deleted');
        return redirect()->route('posts.show',$postid); 
    }
}