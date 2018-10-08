@extends('main')
@section('title',' | '.htmlspecialchars($post->title))
@section('stylesheet')
	{!! Html::style('css/prism.css') !!} 
	{!! Html::style('js/prism.js') !!}
@endsection
@section('content') 
	<div class="w3-card-4 w3-margin w3-white"> 
		<div class="w3-display-container" style="background-image: url(../images/{{ $post->category['picture'] }});width: 100%;">
			<img class="w3-display-container" src="../images/{{ $post->category['picture'] }}" style="width:100%">
			<div class="w3-display-topleft w3-container w3-khaki">
				<h3>{{ $post->category['name'] }}</h3>
			</div>
			<div class="w3-display-bottomright w3-container w3-white">
				Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
				Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
			</div>
		</div>
		<div class="w3-container" style="text-align:justify">
			<h3><b><a href="{{ url($post->slug) }}">{{ $post->title }}</a></b></h3> 
			@foreach($post->tags as $tag)
				<span class="w3-tag">{{$tag->name}}</span>
			@endforeach
			<p>{!! $post->body !!}</p>
		</div> 
	</div>

	@foreach($post->comments as $comment)
		<div class="w3-margin w3-card-4">
			<header class="w3-container w3-light-grey"><h3>{{$comment->name}} <small style="font-size: 11px; ">{{ date('F nS, Y - g:i a',strtotime($comment->created_at)) }}</small></h3></header>
			<div class="w3-container">
				<!--<img src="http://127.0.0.1:8000/svg/user.png" alt="Avatar" class="w3-left w3-circle" style="width: 50px;">-->
				<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}"  class="w3-left w3-circle" style="width: 50px;">
			  	<p>{{$comment->comment}}</p>
			</div>
		</div>
	@endforeach

	<div class="w3-margin w3-card-4"> 
		{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
			{{Form::text('name',null,['class'=>'w3-input w3-left','style'=>'width:50%;','placeholder'=>'Name'])}}
			{{Form::text('email',null,['class'=>'w3-input w3-right','style'=>'width:50%;','placeholder'=>'Email'])}}
			<br>
			{{Form::textarea('comment',null,['class'=>'w3-input w3-bar','style'=>'resize:none;','placeholder'=>'Comment'])}}
			{{Form::submit('Add Comment',['class'=>'w3-vutton w3-green w3-bar'])}}
		{{Form::close()}}
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
	        	<button class="w3-button w3-black"><i class="fa fa-diamond w3-margin-right"></i>{{$cat->name}}</button>
          	@endforeach	
        </div>
      </div>
    </header>
@endsection