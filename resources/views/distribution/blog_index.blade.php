@extends('distribution.main')
@section('title',' | Home Page')
@section('icerik') 
  <div class="row">
    @foreach($posts as $post) 
     <?php
      $kelime=200;
      $icerik=strip_tags($post->body);
      if(strlen($icerik)>=$kelime){
        if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))$icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...";
      }else{
        $icerik.="";
      } 
      ?>
      <div class="post col-xl-3">
        <div class="post-thumbnail"><a href="{{ url('blog/'.$post->slug) }}"><img src="{{url('/')}}/images/{{ $post->category['picture'] }}" class="img-fluid"></a></div>
        <div class="post-details">
          <div class="post-meta d-flex justify-content-between">
            <div class="date meta-last">{{ date("d.m.Y",strtotime($post->created_at)) }}</div>
            <div class="category"><a href="{{url("/")}}/category/{{$post->category["name"]}}">{{$post->category["name"]}}</a></div>
          </div><a href="{{ url('blog/'.$post->slug) }}"><h3 class="h4">{{$post->title}}</h3></a>
          <p class="text-muted" style="text-align: justify;">{!! $icerik !!}</p>
          <div class="post-footer d-flex align-items-center"> 
              <div class="title author d-flex align-items-center flex-wrap"><span>
                @foreach($post->tags as $tag)
                  <span class="badge">{{$tag->name}}</span> 
                @endforeach
              </span></div>
            <div class="comments meta-last">{{count($post->comments)}} Yorum</div>
          </div>
        </div>
      </div> 
   @endforeach
  </div>

  <nav aria-label="Page navigation example">
    <ul class="pagination pagination-template d-flex justify-content-center">
      {{ $posts->links('distribution.posts_page') }}
    </ul>
  </nav> 
@endsection 