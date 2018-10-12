@extends('main')
@section('title',' | Yorum Sil')
@section('content')
	@if($comment)
		<br><h1>Yorumu silmek istediğinize emin misiniz?</h1>
		<p><strong>İsim: </strong>{{ $comment->name }}</p>
		<p><strong>Email: </strong>{{ $comment->email }}</p>
		<p><strong>Yorum: </strong>{{ $comment->comment }}</p>
		{!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) !!}
			<div class="w3-margin "> 
				<div class="w3-container">
					{{ Form::submit('Yorumu Sil',["class"=>"w3-input w3-red","onclick"=>"return confirm('Tag Sil?')"]) }}
				</div> 
			</div>
		{!! Form::close() !!}
	@else
		<script>window.location = "/comments";</script>
	@endif
@endsection