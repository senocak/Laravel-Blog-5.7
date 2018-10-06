@extends('main')
@section('title',' | Home Page')
@section('content')
   @foreach($posts as $post)
    <div class="w3-third w3-container">
      <a href="{{ url('blog/'.$post->slug) }}"><img src="https://www.w3schools.com/w3images/nature.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"></a>
      <div class="w3-container w3-white">
        <p><b><a href="{{ url('blog/'.$post->slug) }}">{{$post->title}}</a></b></p>
        <p>{{ substr($post->body, 0,100) }} {{ strlen($post->body) > 100 ? "..." : "" }}</p>
      </div>
    </div>
   @endforeach
 
  <div class="w3-center">{{ $posts->links('posts.page') }} </div>

@endsection