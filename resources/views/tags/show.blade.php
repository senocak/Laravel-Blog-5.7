@extends('main')
@section('title'," | $tags->name Etiketi")
@section('content')
	<h1>{{ $tags->name }} <small class="w3-tag">{{$tags->posts->count()}} Yazı</small></h1>
	<br><br>
	<table class="w3-left w3-table-all">
	    <tr>
	     	<thead>
				<th>#</th>
		      	<th>Başlık</th>
		      	<th>Etiket</th>
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
	    				<a class="w3-button w3-small w3-red" href="{{ route('blog.single',$post->slug) }}" target="_blank">Görüntüle</a>
	    				<a class="w3-button w3-small w3-green" href="{{ route('posts.edit',$post->id) }}" target="_blank">Düzenle</a>
	    			</td>
	    		</tr>
	    	@endforeach
	    </tbody> 
  	</table>
@endsection