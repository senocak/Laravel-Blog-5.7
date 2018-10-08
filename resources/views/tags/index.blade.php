@extends('main')
@section('title',' | All Tags')
@section('content')
	<br>
	<div class="w3-bar"> 
	  	<table class="w3-left w3-table-all" style="width:70%">
		    <tr>
		     	<thead>
					<th>#</th>
			      	<th>Name</th>
			      	<th>Posts</th>
			      	<th></th>
		     	</thead>
		    </tr>
		    <tbody>
		    	@foreach($tags as $tag)
		    		<tr class="w3-hover-black">
		    			<th>{{ $tag->id }}</th>
		    			<th>{{ $tag->name }}</th> 
		    			<th><small>{{$tag->posts->count()}} Post</small></th>
	    				<td><a href="{{ route('tags.show',$tag->id) }}" class="w3-button w3-khaki">View</a></td>
		    		</tr>
		    	@endforeach
		    </tbody> 
	  	</table>  
	  	<div class="w3-center">
	  		{!! $tags->links('posts.page') !!} 
		</div>
	 	<div class="w3-right w3-teal" style="width:30%">
	 		{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!} 
	 		{{ Form::label('name','Name:')}}
	 		{{ Form::text('name',null,['class'=>'w3-input','placeholder'=>'New Tag']) }}
	 		{{ Form::submit('New Tag',['class'=>'w3-button w3-green']) }}
	 		{!! Form::close() !!}
	 	</div> 
	</div> 
@endsection