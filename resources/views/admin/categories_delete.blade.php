@extends('admin.main')
@section('title',' | Delete Category')
@section('content')
	<br><h1 class="w3-center">Silmek İstediğinize Emin Misiniz?</h1>
	{!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'DELETE']) !!}
		<div class="w3-margin "> 
			<div class="w3-container">
				{{ Form::submit('Kategoriyi Sil',["class"=>"w3-input w3-red"]) }}
			</div> 
		</div>
	{!! Form::close() !!}
@endsection