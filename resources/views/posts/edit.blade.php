@extends('main')

@section('title',' | Edit Post')

@section('content')
	{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
		<div class="w3-card-4 w3-margin w3-white"> 
			<div class="w3-display-container w3-hover-gray scale" style="background-image: url(http://www.testingdiaries.com/wp-content/uploads/2014/12/selenium.jpg);width: 100%;height: 342px;background-size: auto 100%;"> 
				<div class="w3-display-topleft w3-container w3-white">
					Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
					Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
				</div>
				{{ Form::submit('Save',["class"=>"w3-display-bottomleft w3-container w3-button w3-green"]) }}  
				<a href="/posts/{{$post->id}}" target="_blank" class="w3-display-bottomright w3-container w3-button w3-red"><i class="fa fa-times"></i></a>
			</div>
			<div class="w3-container">
				{{ Form::label('title','Title') }}
				{{ Form::text('title',null,["class"=>"w3-input w3-gray"]) }} 

				{{ Form::label('body','Body') }}
				<p style="text-align:justify">
					{{ Form::textarea('body',null,["class"=>"w3-input w3-gray"]) }}
				</p>
			</div> 
		</div>
	{!! Form::close() !!}
@endsection