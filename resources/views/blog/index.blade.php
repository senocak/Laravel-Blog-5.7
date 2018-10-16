@extends('main')
@section('title',' | Home Page')
@section('content')
  <?php $i=0; ?>
   @foreach($posts as $post)
   <?php
      if($i%3==0){ echo "<div class='w3-row-padding' style='margin-top: 20px;'>";}
   ?>
    <div class="w3-third w3-container">
      <div class="w3-display-container w3-hover-gray scale" >
        <a href="{{ url('blog/'.$post->slug) }}">
          <img src="{{url('/')}}/images/{{ $post->category['picture'] }}" alt="Norway" style="width:100%" class="w3-hover-opacity">
        </a>
        <div class="w3-display-bottomleft w3-container w3-white"><b>{{$post->category["name"]}}</b></div>
        <div class="w3-display-bottomright w3-container w3-tag">{{count($post->comments)}}</div>
      </div>
      <div class="w3-container w3-white">
        <p><b>@if($post->fixed=="1")<img title="Sabit Öğe" style="float:right;width:20px;" src="https://image.flaticon.com/icons/svg/53/53833.svg"> @endif {{$post->title}} </b></p>
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
        <p style="text-align: justify;">
          {!! $icerik !!}<br>
          @foreach($post->tags as $tag)
            <span class="w3-tag">{{$tag->name}}</span>
          @endforeach
        </p>
      </div>
    </div>
    <?php
      if($i%3==0){ echo "</div>";}
   ?>
   @endforeach
  <br><br>
  <div class="w3-container w3-center w3-padding-16">
    {{ $posts->links('posts.page') }}
  </div>
  <br><br>
<div style="height: 265px;background-image: url({{url('/')}}/images/footer.png);background-position-x: -120px;background-position-y: 0px;"></div>
@endsection

@section('cat')
  <header id="portfolio">
      <img src="pp.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <div class="w3-section w3-bottombar w3-padding-16">
          @foreach($category as $cat)
            <a class="w3-button w3-black" href="{{url('/')}}/category/{{$cat->slug}}"><i class="fa fa-diamond w3-margin-right"></i>{{$cat->name}}</a>
            @endforeach 
        </div>
      </div>
    </header>
@endsection