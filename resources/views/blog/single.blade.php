@extends('main')
@section('title'," | ".htmlspecialchars($post->title))
@section('stylesheet')
	{!! Html::style('css/prism.css') !!} 
	{!! Html::script('js/prism.js') !!}
@endsection
@section('content') 
	<div class="w3-card-4 w3-margin w3-white"> 
		<div class="w3-display-container" style="width: 100%;">
			<img class="w3-display-container" src="{{url('/')}}/images/{{ $post->category['picture'] }}" style="width:100%">
			<a href="{{url('/')}}/category/{{ $post->category['slug'] }}" class="w3-button w3-display-topleft w3-black">{{ $post->category['name'] }}</a>
			<div class="w3-display-bottomright w3-container w3-white">
				<span class="w3-opacity">Son Güncelleme: </span><b>{{ date('d M Y - H:i',strtotime($post->updated_at)) }}</b>
			</div>
			<div class="w3-display-bottomleft w3-container w3-white">
				<span class="w3-opacity">Yazılma Tarihi: </span><b>{{ date('d M Y - H:i',strtotime($post->created_at)) }}</b>
			</div>
		</div>
		<div class="w3-container" style="text-align:justify">
			<h3><b>{{ $post->title }}</b></h3> 
			@foreach($post->tags as $tag)
				<span class="w3-tag">{{$tag->name}}</span>
			@endforeach
			<p><?php echo $post->body; ?></p>
		</div> 
	</div> 
	@foreach($post->comments as $comment)
		<div class="w3-margin w3-card-4 w3-white">
			<header class="w3-container "><h3>{{$comment->name}} <small style="font-size: 15px; " class="w3-right">{{ date('n F Y - G:i',strtotime($comment->created_at)) }}</small></h3></header>
			<div class="w3-container">
				<!--<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}" class="w3-left w3-circle" style="width: 80px;">-->
				<img src="{{url('/')}}/svg/user.png" alt="Avatar" class="w3-left w3-circle" style="width: 80px;">
				<p>{{$comment->comment}}</p>
			</div>
		</div>
	@endforeach
	<div class="w3-margin w3-card-4"> 
		{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
			{{Form::text('name',null,['class'=>'w3-input w3-left w3-border','style'=>'width:50%;','placeholder'=>'İsim','required'=>'required'])}}
			{{Form::text('email',null,['class'=>'w3-input w3-right w3-border','style'=>'width:50%;','placeholder'=>'Email','required'=>'required'])}}
			<br>
			{{Form::textarea('comment',null,['class'=>'w3-input w3-bar w3-border','style'=>'resize:none;','placeholder'=>'Yorumunuz','rows'=>'5','required'=>'required'])}}
			{{Form::submit('Add Comment',['class'=>'w3-button w3-green w3-bar'])}}
		{{Form::close()}}
	</div>
	<br><br>
	<div style="height: 265px;background-image: url({{url('/')}}/images/footer.png);background-position-x: -120px;background-position-y: 0px;"></div>
@endsection
@section('cat')
	<header id="portfolio">
      <img src="pp.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <div class="w3-section w3-bottombar w3-padding-16">
        	@foreach($category as $cat)
	        	<a class="w3-button w3-black" href="{{url('/')}}/category/{{$cat->slug}}"><i class="fa fa-diamond w3-margin-right"></i>{{$cat->name}}</a>
          	@endforeach	
        </div>
      </div>
    </header>
@endsection