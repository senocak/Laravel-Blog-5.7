@extends('main')
@section('title'," | $tags->name Tag")
@section('content')
	<h1>{{ $tags->name }} <small class="w3-tag">{{$tags->posts->count()}} Post</small></h1>
		<a href="{{ route('tags.edit',$tags->id) }}" class="w3-button w3-right w3-green">Edit</a>
		{{Form::open(['route'=>['tags.destroy',$tags->id],'method'=>'DELETE'])}}
			{{Form::submit('Delete',['class'=>'w3-button w3-right w3-red'])}}
		{{Form::close()}} 
	<br><br>
	
	<table class="w3-left w3-table-all">
	    <tr>
	     	<thead>
				<th>#</th>
		      	<th>Title</th>
		      	<th>Tags</th>
		      	<th></th>
	     	</thead>
	    </tr>
	    <tbody>
	    	@foreach($tags->posts as $post)
	    		<tr class="w3-hover-black">
	    			<th>{{ $post->id }}</th>
	    			<td>{{ $post->title }}</td> 
	    			<td>
	    				@foreach($post->tags as $tag)
	    					<span class="w3-tag">{{ $tag->name }}</span>
	    				@endforeach
	    			</td>
	    			<td>
	    				<a class="w3-button w3-small w3-red" href="{{ route('blog.single',$post->slug) }}" target="_blank">View</a>
	    				<a class="w3-button w3-small w3-green" href="{{ route('posts.edit',$post->id) }}" target="_blank">Edit</a>
	    			</td>
	    		</tr>
	    	@endforeach
	    </tbody> 
  	</table>
  
@endsection