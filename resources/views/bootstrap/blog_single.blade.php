@extends('bootstrap.index')
@section("title",config("ayarlar.baslik")." Anasayfa")
@section("bg",url('/')."/images/".$post->category['picture'] )
@section("h1",$post->title)

@section("subheading")
	<a href="{{url('/')}}/category/{{ $post->category['slug'] }}" class="btn btn-danger"><span class='badge'>{{ $post->category['name'] }}</span></a><br><br>
<?php
foreach($post->tags as $tag){
    echo "<button type='button' class='btn btn-warning'><span class='badge'>$tag->name</span></button> ";
}
?>
@endsection

@section("icerik")

	{!! Html::style('css/w3css/prism.css') !!}
	{!! Html::script('js/w3css/prism.js') !!}

	<article>
		<div class="container">

			<div class="row">
				<div class="col-md-6"><span>Son Güncelleme: </span><b>{{ date('d M Y - H:i',strtotime($post->updated_at)) }}</b></div>
				<div class="col-md-6 text-right"><span>Yazılma Tarihi: </span><b>{{ date('d M Y - H:i',strtotime($post->created_at)) }}</b></div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12 col-md-10 mx-auto">
					<p>{!!  $post->body  !!}</p>
				</div>
			</div>
		</div>
	</article>
	<hr>
	<style>
		.actionBox .form-group * {width:100%;}
		.commenterImage {width:30px;margin-right:5px;height:100%;float:left;}
		.commenterImage img {width:100%;border-radius:50%;}
		.commentText p {margin:0;}
		.sub-text {color:#aaa;font-size:11px;}
	</style>
	<ul class="container">
		@foreach($post->comments as $comment)
			@if($comment->approved=="1")
					<li>
						<div class="commenterImage"><img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}" /></div>
						<div class="commentText"><p class="">{{$comment->name}}</p> <p>{{$comment->comment}}</p><span class="date sub-text">{{ date('n F Y - G:i',strtotime($comment->created_at)) }}</span></div>
					</li>
			@endif
	@endforeach
	</ul>
	<hr>
	<div class="container">
		{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
			{{Form::text('name',null,['class'=>'form-control','style'=>'width:100%;','placeholder'=>'İsim','required'=>'required'])}}
			{{Form::text('email',null,['class'=>'form-control','style'=>'width:100%;','placeholder'=>'Email','required'=>'required'])}}
			{{Form::textarea('comment',null,['class'=>'form-control','style'=>'width:100%;resize:none;','placeholder'=>'Yorumunuz','rows'=>'5','required'=>'required'])}}
			{{Form::submit('Yorum Ekle',['class'=>'btn btn-primary'])}}
		{{Form::close()}}
	</div>
	<br><br>
	<div style="height: 265px;background-image: url({{url('/')}}/images/footer.png);background-position-x: -120px;background-position-y: 0px;"></div>
@endsection