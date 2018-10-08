@extends('main')
@section('title',' | All Posts')
@section('content')
<br>
	<a href="{{ route('posts.create') }}" class="w3-btn w3-blue-grey w3-block">Create Post</a>	
	<table class="w3-table w3-striped w3-border">
	    <tr>
	     	<thead>
				<th>#</th>
		      	<th>Title</th>
		      	<th>Body</th>
		      	<th>Created At</th>
		     	<th></th>
	     	</thead>
	    </tr>
	    <tbody>
	    	@foreach($posts as $post)
	    		<tr class="w3-hover-black">
	    			<th>{{ $post->id }}</th>
	    			<td>{{ $post->title }}</td>
	    			<td>{!! substr(strip_tags($post->body), 0,50) !!} {!! strlen(strip_tags($post->body)) > 50 ? "..." : "" !!}</td>
	    			<td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
	    			<td>
	    				<!--<a href="{{ route('blog.single',$post->slug) }}" class="w3-button w3-grey">View</a>-->
	    				<!--<a href="{{ route('posts.edit',$post->id) }}" class="w3-button w3-khaki">Edit</a>-->
	    				<a href="/posts/{{$post->id}}/edit" class="w3-button w3-khaki">Edit</a></td>
	    		</tr>
	    	@endforeach
	    </tbody> 
  	</table>
  	<div class="w3-bar w3-center">
  		{!! $posts->links('posts.page') !!} 
	</div>
@endsection