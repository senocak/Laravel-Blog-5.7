@extends('main')

@section('title',' | Edit Post')

@section('stylesheet')
	{!! Html::style('css/parsley.css') !!} 
	{!! Html::style('css/select2.css') !!}
	
	
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

	{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
		<div class="w3-card-4 w3-margin w3-white"> 
			<div class="w3-display-container" style="background-image: url(../../images/{{ $post->category['picture'] }});width: 100%;"> 
				<img class="w3-display-container" src="../../images/{{ $post->category['picture'] }}" style="width:100%">
				<div class="w3-display-bottomleft w3-container w3-khaki">
					Created At: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
					Last Updated: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
				</div>
				<a href="/posts/" class="w3-display-bottomright w3-container w3-button w3-red">Return Posts</i></a>
			</div>
			<div class="w3-container">
				{{ Form::label('title','Title') }}
				{{ Form::text('title',null,["class"=>"w3-input w3-gray"]) }} 

				{{Form::label('category_id','Category:')}}
			    {{Form::select('category_id',$categories,null,['class'=>'w3-input w3-gray'])}}

			    {{Form::label('tags','Tags:')}}
			    {{Form::select('tags[]',$tags,null,['class'=>'w3-input select2-multi','multiple'=>'multiple'])}}
 		   	 
				{{ Form::label('body','Body') }}
				<p style="text-align:justify">{{ Form::textarea('body',null,["class"=>"ckeditor",'id'=>'editor1']) }}</p>
			</div>  
			{{ Form::submit('Save',["class"=>"w3-button w3-green w3-block"]) }}
			<a href="/posts/{{$post->id}}/delete" class="w3-block w3-button w3-red">Delete</a>
		</div>
	{!! Form::close() !!}

@endsection

@section('scripts')
	{!! Html::script('js/parsley.js') !!}
	{!! Html::script('js/select2.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>


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