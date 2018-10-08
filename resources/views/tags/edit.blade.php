@extends('main')
@section('title'," | $tags->name Tag")
@section('content')
	<br>
	{{Form::model($tags,['route'=>['tags.update',$tags->id],'method'=>'PUT'])}}
		{{Form::label('name','Title:')}}
		{{Form::text('name',null,['class'=>'w3-input'])}}
  		{{Form::submit('Save Changes',['class'=>'w3-button w3-green'])}}
  	{{Form::close()}}
@endsection