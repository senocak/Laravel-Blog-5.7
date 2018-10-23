@extends('markup.main')
@section('title',' | Home Page')
@section('icerik') 
	<div class="container">
		<div class="row">
			<article id="content" class="col-xs-12">
				<div class="post-block single-post wow fadeInUp" data-wow-delay="0.4s">
					<div class="post-holder">
						<div class="img-holder"><img src="{{url('/')."/images/".$post->category['picture']}}"></div>
						<?php
							foreach($post->tags as $tag){
							    echo "<time datetime='2011-01-12'><a>$tag->name</a></time>";
							}
						?>
						<h2>{{$post->title}}</h2>
						<p>{!!  $post->body  !!}</p>
						<footer>
							<strong class="text"><span class="icon ico-user"></span><a href="#">David Ramon</a></strong>
							<strong class="text comment-count"><span class="icon ico-comment"></span>{{count($post->comments)}} Yorum</strong>
							<strong class="text"><span class="icon ico-tag"></span><a href="{{url('/')}}/category/{{$post->category["slug"]}}">{{$post->category["name"]}}</a></strong>
							<strong class="text share-count"><span class="icon ico-share"></span>{{ date("d.m.Y",strtotime($post->created_at)) }}</strong>
						</footer>
					</div>
				</div> 
				  
				<section class="section comments wow fadeInUp" data-wow-delay="0.4s"> 
					<div class="commentlist"> 
						@foreach($post->comments as $comment)
							@if($comment->approved=="1")  
								<div class="commentlist-item">
									<div class="comment even thread-even depth-1" id="comment-1">
										<div class="avatar-holder">
											<img alt="image description" src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}" class="avatar avatar-48 photo avatar-default">
										</div>
										<div class="commentlist-holder">
											<p class="meta">
												<strong class="name">{{$comment->name}}</strong>
												<time datetime="2011-01-12">{{ date('n F Y - G:i',strtotime($comment->created_at)) }}</time>
											</p>
											<p>{{$comment->comment}}</p> 
										</div>
									</div>
								</div> 
							@endif
						@endforeach 
					</div> 
				</section> 
				<section class="comment-respond wow fadeInUp" data-wow-delay="0.4s"> 
					{{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST','id'=>'commentform','class'=>'comment-form'])}} 
						<div class="wrap">
							<div class="comment-form-author">
								{{Form::text('name',null,['size'=>'30','placeholder'=>'İsim','required'=>'required'])}}
							</div>
							<div class="comment-form-email">
								{{Form::text('email',null,['size'=>'30','placeholder'=>'Email','required'=>'required'])}} 
							</div>
						</div>
						<div class="comment-form-url hidden"><label for="url">Website</label> <input type="text" id="url" name="url" size="30"></div>
						<div class="comment-form-comment">
							{{Form::textarea('comment',null,['style'=>'resize:none;','placeholder'=>'Yorumunuz','rows'=>'5','required'=>'required'])}}
						</div> 
						<div class="form-submit">
							{{Form::submit('Gönder')}}
						</div>
					{{Form::close()}}
				</section> 
			</article> 
		</div>
	</div> 
@endsection