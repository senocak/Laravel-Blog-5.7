@extends('main')

@section('title',' | Create Post')

@section('stylesheet')
	{!! Html::style('css/parsley.css') !!} 
@endsection

@section('content')
	<h1>Create New Post</h1>
  	{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
    	{{Form::label('title','Title:')}}
    	{{Form::text('title',null,array('class'=>'w3-input','required'=>'','maxlength'=>'255'))}}

	    {{Form::label('body','Body:')}}
	    {{Form::textarea('body',null,array('class'=>'w3-input','required'=>''))}}

	    {{Form::submit('Create Post',array('class'=>'w3-btn w3-blue-grey w3-block','style'=>'margin-top:10px;'))}}
  	{!! Form::close() !!}
@endsection

@section('scripts')
	{!! Html::style('js/parsley.js') !!}
@endsection