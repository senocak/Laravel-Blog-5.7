@extends('distribution.main')
@section('title'," | ".htmlspecialchars($post->title))
@section('icerik')
	{!! Html::style('css/w3css/prism.css') !!}
	{!! Html::script('js/w3css/prism.js') !!}
	<div class="row">
		<div class="post col-xl-12">
	        <div class="post-thumbnail"><img src="{{url('/')}}/images/{{ $post->category['picture'] }}" class="img-fluid"></div>
	        <div class="post-details">
	          	<div class="post-meta d-flex justify-content-between">
	            	<div class="date meta-last">Son Güncelleme: <b>{{ date('d M Y - H:i',strtotime($post->updated_at)) }}</b></div>
	            	<div class="category">Yazılma Tarihi:<b>{{ date('d M Y - H:i',strtotime($post->created_at)) }}</b></div>
	          	</div>
	          	<h3 class="h4">{{$post->title}}</h3>
	          	<p class="text-muted" style="text-align: justify;"> </p>
	          	<div class="post-footer d-flex align-items-center"> 
	              	<div class="title author d-flex align-items-center flex-wrap">
	              		<span>
			                @foreach($post->tags as $tag)
			                  	<span class="badge">{{$tag->name}}</span> 
			                @endforeach
		              	</span>
	              	</div>
		            <div class="title author d-flex align-items-center flex-wrap">
		            	{{count($post->comments)}} Yorum
		            </div> 
		            <div class="title author d-flex align-items-center flex-wrap">
            			<a href="{{url("/")}}/category/{{$post->category["name"]}}">{{$post->category["name"]}}</a>
	            	</div> 
	           </div>
	           <hr>{!!$post->body!!}
	        </div>
     	</div>  
	</div> 
	<hr>
	<style>
		.actionBox .form-group * {width:100%;}
		.commenterImage {width:30px;margin-right:5px;height:100%;float:left;}
		.commenterImage img {width:100%;border-radius:50%;}
		.commentText p {margin:0;}
		.sub-text {color:#aaa;font-size:11px;}
	</style> 
	@foreach($post->comments as $comment)
		@if($comment->approved=="1")
			<div class="commenterImage"><img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}" /></div>
			<div class="commentText"><p class="">{{$comment->name}}</p> <p>{{$comment->comment}}</p><span class="date sub-text">{{ date('n F Y - G:i',strtotime($comment->created_at)) }}</span></div>				 
				<hr>
		@endif
	@endforeach 
	<div class="container">
		{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
			{{Form::text('name',null,['class'=>'form-control','style'=>'width:100%;','placeholder'=>'İsim','required'=>'required'])}}
			{{Form::text('email',null,['class'=>'form-control','style'=>'width:100%;','placeholder'=>'Email','required'=>'required'])}}
			{{Form::textarea('comment',null,['class'=>'form-control','style'=>'width:100%;resize:none;','placeholder'=>'Yorumunuz','rows'=>'5','required'=>'required'])}}
			{{Form::submit('Yorum Ekle',['class'=>'btn btn-primary'])}}
		{{Form::close()}}
	</div> 
@endsection