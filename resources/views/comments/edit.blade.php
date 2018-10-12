@extends('main')
@section('title',' | Yorum Güncelle')
@section('content')
	@if($comment)
		<br>
		{!! Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT']) !!}
			<div class="w3-margin "> 
				<div class="w3-container">
					{{ Form::label('name','Name') }}
					{{ Form::text('name',null,["class"=>"w3-input ","disabled"=>"disabled"]) }} 

					{{ Form::label('email','Email:')}}
				    {{ Form::text('email',null,["class"=>"w3-input","disabled"=>"disabled"]) }} 

				    {{ Form::label('comment','Comment:')}}
				    {{ Form::textarea('comment',null,["class"=>"w3-input "]) }} 

					{{ Form::submit('Update Comment',["class"=>"w3-input w3-green	"]) }}
				</div> 
			</div>
		{!! Form::close() !!}
	@else
		<script>window.location = "/comments";</script>
	@endif
@endsection