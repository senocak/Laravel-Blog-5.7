@extends('main')
@section('title',' | Yazı Görüntüle')
@section('content') 
	<div class="w3-card-4 w3-margin w3-white"> 
		<div class="w3-display-container" style="background-image: url({{ url("/") }}/images/{{ $post->category['picture'] }});width: 100%;">
			<img class="w3-display-container" src="../images/{{ $post->category['picture'] }}" style="width:100%">
			<div class="w3-display-topleft w3-container w3-khaki">
				<h3>{{ $post->category['name'] }}</h3>
			</div>
			<div class="w3-display-bottomright w3-container w3-white">
				Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
				Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
			</div>
			<div class="w3-display-bottomleft w3-container ">
				<a href="{{route('posts.edit',$post->id)}}" class="w3-button w3-red">Edit</a>
			</div>
		</div>
		<div class="w3-container" style="text-align:justify">
			<h3><b><a href="{{ url("/blog/$post->slug") }}">{{ $post->title }}</a></b></h3> 
			@foreach($post->tags as $tag)
				<span class="w3-tag">{{$tag->name}}</span>
			@endforeach
			<p>{!! $post->body !!}</p>
		</div> 
	</div>
	@foreach($post->comments as $comment)
		<div class="w3-margin w3-card-4">
			<header class="w3-container w3-light-grey">
				<a href="{{route('comments.delete',$comment->id)}}" class="w3-right w3-button w3-small w3-red">Delete</a>
				<a href="{{route('comments.edit',$comment->id)}}" class="w3-right w3-button w3-small w3-khaki">Edit</a>
				<h3>
					{{$comment->name}} ({{$comment->email}}) 
					<small style="font-size: 11px; ">{{ date('F nS, Y - g:i a',strtotime($comment->created_at)) }}</small>
				</h3>
			</header>
			<div class="w3-container">
				<img src="{{url('/')}}/svg/user.png" alt="Avatar" class="w3-left w3-circle" style="width: 50px;">
			  	<p>{{$comment->comment}}</p>
			</div>
		</div>
	@endforeach
@endsection