<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Session;
use Auth;
use Image; 
use Storage;
use Cache;
class PagesController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['getAbout','getContact','getIndex','postContact']]);
  }
  public function getIndex(){
    $posts=Post::orderBy('fixed','desc')->orderBy('id','desc')->paginate(9);
    $category=Category::all();
    $this->site_settings = "ad";
    return view("pages.welcome")->withPosts($posts)->withCategory($category);
  }
  public function getAbout(){
    $user=User::find("1");
    return view("pages.about")->withData($user);
  }
  public function getContact(){
    return view("pages.contact");
  }
  public function getProfile(){
    return view("pages.profile");
  }
  public function saveProfile(Request $request){
    $this->validate($request,array(
      'name'    => 'required|min:3|max:255',
      'email'   => 'required|min:3|max:255'
    ));
    $user=User::find(Auth::user()->id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->about=$request->about;
    if ($request->hasFile('img')) {
      $img=$request->file('img');
      $filename="pp.jpg";
      $location=public_path('images/'.$filename);
      Image::make($img)->save($location);
      $oldfilename=$user->picture;
      $user->picture=$filename;
    }
    $user->save();
    Session::flash('success','Profil Güncellendi.'); 
    return redirect()->route('login.index');
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
    Session::flash('success','Mesaj Gönderildi');
    return redirect('contact');
  }
  public function self_url($title){
    $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","Ö","Ü","I","Ğ","Ç","Ş","&","'");
    $replace = array("_","o","u","i","g","c","s","_","_","o","u","i","g","c","s","_","");
    $new_text = str_replace($search,$replace,trim($title));
    return $new_text;
  }
}