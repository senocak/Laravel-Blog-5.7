@extends('markup.main')
@section('title',' | Home Page')
@section('icerik') 
	<section class="posts-blocks fullwidth">
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
			<article class="post-block wow fadeInUp" data-wow-delay="0.6s">
				<div class="post-holder">
					<div class="img-holder">
						<a href="{{ url('blog/'.$post->slug) }}"><img src="{{url('/')}}/images/{{ $post->category['picture'] }}" alt="image description"></a>
					</div>
					<time datetime="2011-01-12"><a href="{{url('/')}}/category/{{$post->category["slug"]}}">{{$post->category["name"]}}</a></time>
					<h2><a href="{{ url('blog/'.$post->slug) }}">{{$post->title}}</a></h2>
					<p style="text-align: justify;">{!! $icerik !!}</p>
					<a href="{{ url('blog/'.$post->slug) }}" class="read-more">Devamı...</a>
					<footer>
						<strong class="text comment-count"><span class="icon ico-comment"></span>{{count($post->comments)}} Yorum</strong>
						<strong class="text share-count"><span class="icon ico-share"></span>{{ date("d.m.Y",strtotime($post->created_at)) }}</strong>
					</footer>
				</div>
			</article>

		@endforeach
	</section>
	<nav role="navigation" class="navigation pagination">
        <div class="nav-links text-center">
        	{{ $posts->links("markup.posts_page") }}
        </div>
    </nav>
@endsection