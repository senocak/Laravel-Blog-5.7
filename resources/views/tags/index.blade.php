@extends('main')
@section('title',' | All Tags')
@section('content')
	<br>
	{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!} 
	{{Form::label('name','Tag Başlığı:',['class'=>'w3-left w3-button w3-khaki','style'=>'width:15%'])}}
	{{ Form::text('name',null,['class'=>'w3-input w3-left','placeholder'=>'New Tag','style'=>'width:50%']) }}
	{{ Form::submit('New Tag',['class'=>'w3-button w3-green']) }}
	{!! Form::close() !!} 
	<br>
	<?php $i=1; ?>
	<div class="w3-bar"> 
	  	<table class=" w3-table-all" >
		    <tr>
		     	<thead>
					<th>#</th>
			      	<th>Başlık</th>
			      	<th>Gönderi</th> 
		     	</thead>
		    </tr>
		    <tbody>
		    	@foreach($tags as $tag)
		    		<tr class="w3-hover-black">
		    			<th>{{ $i }}</th>
		    			<th>
						  	{{Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete'])}}
								{{Form::submit('Sil',['class'=>'w3-button w3-right w3-red'])}}
							{{Form::close()}} 

		    				{{Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT'])}}
								{{Form::text('name',null,['class'=>'w3-input w3-left','style'=>'width:35%'])}}
						  		{{Form::submit('Kaydet',['class'=>'w3-button w3-green'])}}
						  		<a href="{{ route('tags.show',$tag->id) }}" class="w3-button w3-khaki">Gör</a>
						  	{{Form::close()}}
		    			</th> 
		    			<th><small>{{$tag->posts->count()}} Yazı</small></th>
	    				
		    		</tr>
		    		<?php $i++; ?>
		    	@endforeach
		    </tbody> 
	  	</table>  
	  	<div class="w3-center">
	  		{!! $tags->links('posts.page') !!} 
		</div>
	</div> 
@endsection