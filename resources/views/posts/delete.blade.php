@extends('main')
@section('title',' | Delete Post')
@section('content')
	<br><h1 class="w3-center">Are You Sure You Want To Delete This Post?</h1>
	{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
		<div class="w3-margin "> 
			<div class="w3-container">
				{{ Form::submit('Delete Post',["class"=>"w3-input w3-red"]) }}
			</div> 
		</div>
	{!! Form::close() !!}
@endsection