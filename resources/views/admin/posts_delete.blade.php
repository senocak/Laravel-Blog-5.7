@extends('admin.main')
@section('title',' | Yazı Sil')
@section('content')
	<br><h1 class="w3-center">Yazıyı silmek istediğinize emin misiniz?</h1>
	{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
		<div class="w3-margin "> 
			<div class="w3-container">
				{{ Form::submit('Sil',["class"=>"w3-input w3-red","onclick"=>"return confirm('Tag Sil?')"]) }}
			</div> 
		</div>
	{!! Form::close() !!}
@endsection