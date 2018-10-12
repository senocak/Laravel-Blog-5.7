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
        $comments=Comment::all();
        return view('comments.index')->withComments($comments);
    }
    public function approved($id){
        $comments=Comment::find($id);
        if($comments){
            if ($comments->approved=="1") {
                $comments->approved="0";
            }else{
                $comments->approved="1";
            }
            $comments->save();
            Session::flash('success','Yorum Güncellendi.');
        }
        return redirect()->route('comments.index');
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
        Session::flash('success','Yorum Eklendi');
        return redirect()->route('blog.single',[$post->slug]);
    }
    public function show($id){
        return $this->index();
    }
    public function edit($id){
        $comment=Comment::find($id);
        if ($comment) {
            return view('comments.edit')->withComment($comment);
        }else{
            return $this->index();
        }
    }
    public function update(Request $request, $id){
        $comment=Comment::find($id);
        $this->validate($request,array('comment'=> 'required|max:255'));
        $comment->comment=$request->comment;
        $comment->save();
        Session::flash('success','Yorum Güncellendi');
        return redirect()->route('comments.index',$comment->post->id); 
    }
    public function delete($id){
        $comment=Comment::find($id);
        if ($comment) {
            return view('comments.delete')->withComment($comment);
        }else{
            return $this->index();
        }
    }
    public function destroy($id){
        $comment=Comment::find($id);
        $postid=$comment->post->id;
        $comment->delete();
        Session::flash('success','Yorum Silindi');
        return redirect()->route('comments.index');
    }
}