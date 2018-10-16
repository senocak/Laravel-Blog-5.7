@extends('main')
@section('title'," | $slug Kategorisi")
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
  <div class="w3-container w3-center w3-padding-16">
    {{ $posts->links('posts.page') }}
  </div>
  <br><hr><br>
  <div style="height: 265px;background-image: url({{url('/')}}/images/footer.png);background-position-x: -120px;background-position-y: 0px;"></div>
@endsection

@section('cat')
  <header id="portfolio">
      <img src="{{url('/')}}/pp.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <div class="w3-section w3-bottombar w3-padding-16">
          @foreach($category as $cat)
            <a class="w3-button w3-black" href="{{$cat->slug}}"><i class="fa fa-diamond w3-margin-right"></i>{{$cat->name}}</a>
            @endforeach 
        </div>
      </div>
    </header>
@endsection