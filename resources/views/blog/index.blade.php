@extends('main')
@section('title',' | Home Page')
@section('content')
  <?php $i=0; ?>
   @foreach($posts as $post)
   <?php
      if($i%3==0){ echo "<div class='w3-row-padding' style='margin-top: 20px;'>";}
   ?>
    <div class="w3-third w3-container">
      <a href="{{ url('blog/'.$post->slug) }}"><img src="../images/{{ $post->category['picture'] }}" alt="Norway" style="width:100%" class="w3-hover-opacity"></a>
      <div class="w3-container w3-white">
        <p><b>{{$post->title}}</b></p>
        <?php
        $kelime=200;
        $icerik=strip_tags($post->body);
        if(strlen($icerik)>=$kelime){
          if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))$icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...";  
        }else{
          $icerik.="";
        } 
        $i++;
        ?>
        <p>
          {!! $icerik !!}<br>
          @foreach($post->tags as $tag)
            <span class="w3-tag">{{$tag->name}}</span>
          @endforeach
        </p>
      </div>
    </div>
   @endforeach
 </div>
  <div class="w3-container">
    {{ $posts->links('posts.page') }}
  </div>
  <br><br>
@endsection

@section('cat')
  <header id="portfolio">
      <a href="#"><img src="pp.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <div class="w3-section w3-bottombar w3-padding-16">
          @foreach($category as $cat)
            <a class="w3-button w3-black" href=""><i class="fa fa-diamond w3-margin-right"></i>{{$cat->name}}</a>
            @endforeach 
        </div>
      </div>
    </header>
@endsection