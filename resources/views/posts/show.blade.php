@extends('main')

@section('title',' | View Post')

@section('content') 
	<div class="w3-card-4 w3-margin w3-white"> 
		<div class="w3-display-container w3-hover-gray scale" style="background-image: url(http://www.testingdiaries.com/wp-content/uploads/2014/12/selenium.jpg);width: 100%;height: 342px;background-size: auto 100%;">
			<div class="w3-display-topleft w3-container w3-white">
				Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
				Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
			</div>
			{!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'w3-display-bottomleft w3-container w3-button w3-green')) !!}
			
			{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'delete']) !!}
				{!! Form::submit('Delete',array('class'=>'w3-display-bottomright w3-container w3-button w3-red')) !!}
			{!! Form::close() !!}

		</div>
		<div class="w3-container" style="text-align:justify">
			<h3><b><a href="{{ url($post->slug) }}">{{ $post->title }}</a></b></h3> 
			<p>{{ $post->body }}</p>
		</div> 
	</div>
@endsection