@extends('distribution.main')
@section('title',' | Hakkımda')
@section('icerik')
	<div class="row">
		{!! $data["about"] !!}
	</div>
@endsection