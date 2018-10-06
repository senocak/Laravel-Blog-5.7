<?php
namespace App\Http\Controllers;
use App\Post;
class PagesController extends Controller{
  public function getIndex(){
    //$posts=Post::orderBy('created_at','desc')->limit(6)->get();
    $posts=Post::orderBy('created_at','desc')->paginate(6);
    return view("pages.welcome")->withPosts($posts);
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
  public function postContact(){

  }
}