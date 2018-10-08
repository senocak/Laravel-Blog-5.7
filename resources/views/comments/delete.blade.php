@extends('main')
@section('title',' | Delete Comment')
@section('content')
	<br><h1>Are You Sure To Delete This Comment?</h1>
	<p><strong>Name: </strong>{{ $comment->name }}</p>
	<p><strong>Email: </strong>{{ $comment->email }}</p>
	<p><strong>Comment: </strong>{{ $comment->comment }}</p>
	{!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) !!}
		<div class="w3-margin "> 
			<div class="w3-container">
				{{ Form::submit('Delete Comment',["class"=>"w3-input w3-red"]) }}
			</div> 
		</div>
	{!! Form::close() !!}
@endsection