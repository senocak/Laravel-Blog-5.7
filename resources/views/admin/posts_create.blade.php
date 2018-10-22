@extends('admin.main')
@section('title',' | Yazı Yaz')
@section('stylesheet')
	{!! Html::style('css/w3css/parsley.css') !!}
	{!! Html::style('css/w3css/select2.css') !!}
	
	{!! Html::style('editor/ckeditor/ckeditor.css') !!}
	{!! Html::script('editor/ckeditor/ckeditor.js') !!}
	<script>
		CKEDITOR.replace( 'editor', {
			//filebrowserUploadUrl: 'db.php?upload_img',
			extraPlugins: 'image2,imageuploader,codesnippet', 
			language: 'tr'
		});  
	</script>
@endsection
@section('content')
	<h1>Create New Post</h1>
  	{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
    	{{Form::label('title','Title:')}}
    	{{Form::text('title',null,array('class'=>'w3-input','required'=>'','maxlength'=>'255'))}}
	    {{Form::label('category_id','Category:')}}
	    <select class="w3-input" name="category_id">
	    	@foreach($categories as $category)
	    		<option value="{{$category->id}}">{{$category->name}}</option>
	    	@endforeach
	    </select>
	    {{Form::label('tags','Tags:')}}
	    <select class="w3-input select2-multi" name="tags[]" multiple="multiple">
	    	@foreach($tags as $tag)
	    		<option value="{{$tag->id}}">{{$tag->name}}</option>
	    	@endforeach
	    </select>
	    {{Form::label('body','Body:')}}
	    {{Form::textarea('body',null,array('class'=>'ckeditor','required'=>'','id'=>'editor1'))}}
	    {{Form::submit('Yazı Oluştur',array('class'=>'w3-btn w3-green w3-block','style'=>'margin-top:10px;'))}}
  	{!! Form::close() !!}
@endsection
@section('scripts')
	{!! Html::script('js/w3css/parsley.js') !!}
	{!! Html::script('js/w3css/select2.js') !!}
	<script type="text/javascript">$('.select2-multi').select2();</script>
	<script language="javascript" type="text/javascript">
		CKEDITOR.replace('editor1',{
			filebrowserWindowWidth: '900',
			filebrowserWindowHeight: '400',
			filebrowserBrowseUrl: '../editor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '../editor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl: '../editor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl: '../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl: '../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		}); 
	</script>
@endsection