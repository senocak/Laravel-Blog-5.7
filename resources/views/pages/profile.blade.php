@extends('main')
@section('title',' | Profil Sayfası')
@section('stylesheet')
	{!! Html::style('editor/ckeditor/ckeditor.css') !!}
	{!! Html::script('editor/ckeditor/ckeditor.js') !!}
	<script>
		CKEDITOR.replace( 'editor',{
			extraPlugins: 'image2,imageuploader,codesnippet', 
			language: 'tr'
		});  
	</script>
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}
		input[type=text], select, textarea {
		    width: 100%;
		    padding: 12px;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		    margin-top: 6px;
		    margin-bottom: 16px;
		    resize: vertical;
		}
		input[type=submit] {
		    background-color: #4CAF50;
		    color: white;
		    padding: 12px 20px;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}
		input[type=submit]:hover {background-color: #45a049;}
		.container {border-radius: 5px;background-color: #f2f2f2;padding: 20px;}
	</style>
	<script type="text/javascript">
		function showimagepreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
@endsection
@section('content')
  	<form action="{{url('profile')}}" method="POST" enctype="multipart/form-data">
  		{{csrf_field()}}
  		<img src="../images/{{ Auth::user()->picture }}" width="250px">
  		<img src="../images/no-image.png" width="250px" id="imgview">
  		<input class="w3-input" onchange="showimagepreview(this)" name="img" type="file">
	    <input type="text" class="w3-input" name="name" placeholder="İsim" value="{{ Auth::user()->name }}">
	    <input type="text" class="w3-input" name="email" placeholder="E-Mail" value="{{ Auth::user()->email }}">
	    <textarea class="ckeditor" id="editor1" name="about" cols="50" rows="10">{{ Auth::user()->about }}</textarea>
	    <input type="submit" value="Kaydet" class="w3-button w3-block w3-green">
  	</form>
  	<br>
@endsection
@section('scripts')
	<script language="javascript" type="text/javascript">
		CKEDITOR.replace('editor1',{
			filebrowserWindowWidth: '900',
			filebrowserWindowHeight: '400',
			filebrowserBrowseUrl: '../../editor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		}); 
	</script>
@endsection