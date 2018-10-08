@extends('main')
@section('title'," | $category->name Tag")
@section('content')
	<br>

	<script type="text/javascript">
		function showimagepreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>

	{{Form::model($category,['route'=>['categories.update',$category->id],'method'=>'PUT','files'=>true])}}
		{{Form::label('name','Title:')}}
		{{Form::text('name',null,['class'=>'w3-input'])}}
		<img src="../../images/{{ $category->picture }}" style="width:250px"> -> 
		<img src="../../images/no-image.png" style="width:250px" id="imgview" >
		{{ Form::file('img',['class'=>'w3-input','required'=>'required','onChange'=>'showimagepreview(this)'])}}
  		{{Form::submit('Save Changes',['class'=>'w3-button w3-green'])}}
  		<a href="/categories/{{$category->id}}/delete" class="w3-button w3-red">Delete</a>
  	{{Form::close()}}
	<br><a href="/categories" class="w3-button w3-khaki">Return The Categories</a>
@endsection