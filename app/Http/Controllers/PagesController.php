<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Mail;
use Session;
class PagesController extends Controller{
  public function getIndex(){
    //$posts=Post::orderBy('created_at','desc')->limit(6)->get();
    $posts=Post::orderBy('id','desc')->paginate(6);
    $category=Category::all();

    return view("pages.welcome")->withPosts($posts)->withCategory($category);
  }
  public function getAbout(){
    $first="Anıl";
    $last="Şenocak";
    $fullname=$first." ".$last;
    $email="anil@bilgimedya.com.tr";
    $data=[];
    $data["email"]=$email;
    $data["fullname"]=$fullname;
    return view("pages.about")->withData($data);
  }
  public function getContact(){
    return view("pages.contact");
  }
  public function postContact(Request $request){
    $this->validate($request,array(
      'subject' => 'required|min:3|max:255',
      'email'   => 'required|min:3|max:255', 
      'bodyMessage' => 'required|min:10'
    ));
    $data=array(
      'subject' =>$request->subject ,
      'email' =>$request->email ,
      'bodyMessage' =>$request->bodyMessage
    );
    Mail::send('emails.contact',$data,function($message)use ($data){
      $message->from($data['email']);
      $message->to('anil@bilgimedya.com.tr');
      $message->subject($data['subject']);
    });
    Session::flash('success','Your Email Successfully Sent');
    return redirect('contact');
  }
}