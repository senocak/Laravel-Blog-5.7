@extends('admin.main')
@section('title',' | Yazı Düzenle')
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
	{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
		<div class="w3-card-4 w3-margin w3-white"> 
			<div class="w3-display-container" style="width: 100%;"> 
				<img class="w3-display-container" src="{{url('/')}}/images/{{ $post->category['picture'] }}" style="width:100%">
				<div class="w3-display-bottomleft w3-container w3-khaki">
					Oluşturma: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->created_at)) }}</span><br>
					Güncelleme: <span class="w3-opacity">{{ date('M j, Y H:ia',strtotime($post->updated_at)) }}</span>
				</div>
				<a href="/posts/" class="w3-display-bottomright w3-container w3-button w3-red">Geri Dön</i></a>
			</div>
			<div class="w3-container">
				{{ Form::label('title','Başlık') }}
				{{ Form::text('title',null,["class"=>"w3-input w3-gray"]) }} 
				{{Form::label('category_id','Kategori:')}}
			    {{Form::select('category_id',$categories,null,['class'=>'w3-input w3-gray'])}}
			    {{Form::label('tags','Tag:')}}
			    {{Form::select('tags[]',$tags,null,['class'=>'w3-input select2-multi','multiple'=>'multiple'])}}
				{{ Form::label('body','İçerik') }}
				{{ Form::textarea('body',null,["class"=>"ckeditor",'id'=>'editor1']) }}
			</div> 
			{{ Form::submit('Kaydet',["class"=>"w3-button w3-green w3-block"]) }}
			<a href="/posts/{{$post->id}}/delete" class="w3-block w3-button w3-red">Sil</a>
		</div>
	{!! Form::close() !!}
@endsection
@section('scripts')
	{!! Html::script('js/w3css/parsley.js') !!}
	{!! Html::script('js/w3css/select2.js') !!}
	<script type="text/javascript">	$('.select2-multi').select2(); </script>
	<script language="javascript" type="text/javascript">
		CKEDITOR.replace('editor1',{
			filebrowserWindowWidth: '900',
			filebrowserWindowHeight: '400',
			filebrowserBrowseUrl: '{{url('/')}}/editor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '{{url('/')}}/editor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl: '{{url('/')}}/editor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl: '{{url('/')}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '{{url('/')}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl: '{{url('/')}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		}); 
	</script>
@endsection