@extends('main')
@section('title',' | '.$post->title)
@section('content') 
	<div class="w3-card-4 w3-margin w3-white"> 
		<div class="w3-display-container w3-hover-gray scale" style="background-image: url(http://www.testingdiaries.com/wp-content/uploads/2014/12/selenium.jpg);width: 100%;height: 342px;background-size: auto 100%;">
			<div class="w3-display-topleft w3-container w3-white">
				Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
				Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
			</div>
		</div>
		<div class="w3-container" style="text-align:justify">
			<h3><b><a href="{{ url($post->slug) }}">{{ $post->title }}</a></b></h3> 
			<p>{{ $post->body }}</p>
		</div> 
	</div>
@endsection