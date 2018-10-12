@extends('main')
@section('title',' | Tüm Yazılar')
@section('stylesheet')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<style type="text/css">.sortable { cursor: move; }</style>
@endsection
@section('content')
	<div id="alert"></div><br>
	<?php $sayac=0; ?>
	<a href="{{ route('posts.create') }}" class="w3-btn w3-blue-grey w3-block">Create Post</a>	
	<table class="w3-table-all">
	    <tr>
	     	<thead>
				<th>#</th>
		      	<th>Başlık</th> 
		      	<th>Kategori</th> 
		      	<th>Tarih</th>
		      	<th>Yorum</th>
		      	<th>Sabitle</th>
		     	<th class="w3-center">İşlemler</th>
	     	</thead>
	    </tr>
	    <tbody id="sortable">
	    	@foreach($posts as $post)
	    		<?php $sayac++ ;?>
	    		<meta name="csrf-token" content="{{ csrf_token() }}">
	    		<tr class="w3-hover-black" id="item-{{ $post->id }}">
	    			<th class="sortable"><?php echo $sayac;?></th>
	    			<td style="width: 25%">{{ $post->title }}</td>
	    			<th><a href="/categories/{{ $post->category["id"] }}/edit" target="_blank" class="w3-button w3-small">{{ $post->category["name"] }}</a></th>
	    			<td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
	    			<th>
	    				@if(count($post->comments)>0)
	    					<a href="/comments/{{ $post->id }}" class="w3-button w3-tiny w3-brown">{{ count($post->comments) }}</a>
	    				@endif
	    			</th>
	    			<td>
	    				@if($post->fixed=="0")<a href="/posts/{{$post->id}}/fixed" ><i class="fa fa-plus w3-button w3-blue w3-tiny"></i></a>
	    				@else
	    				<a href="/posts/{{$post->id}}/fixed" ><i class="fa fa-minus w3-button w3-gray w3-tiny"></i></a>
	    				@endif
	    			</td>
	    			<td>
	    				<a href="/posts/{{$post->id}}/edit" class="w3-button w3-khaki w3-tiny">Düzenle</a>
	    				<a href="/posts/{{$post->id}}" class="w3-button w3-orange w3-tiny">Görüntüle</a>
	    			</td>
	    		</tr>
	    	@endforeach
	    </tbody> 
  	</table>
  	<script type="text/javascript"> 
		var x = document.getElementById("alert"); 
		$(function() {
			$( "#sortable" ).sortable({
				revert: true,
				handle: ".sortable",
				stop: function (event, ui) {
					var data = $(this).sortable('serialize'); 
					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						type: "POST",
						dataType: "json",
						data: data,
						url: '{{route("posts.sortPosts")}}',
						success: function(msg){  
							document.getElementById("alert").innerHTML="<div class='w3-panel w3-green w3-round' ><h3>Success!</h3>"+msg.islemMsj+"</div>"; 
						}
					});	
					var x = setInterval(function() {
						document.getElementById("alert").innerHTML="";
					}, 3000);
				}
			});
			$( "#sortable" ).disableSelection();	                      		
		});	                      	
	</script>
  	<div class="w3-bar w3-center">
  		{!! $posts->links('posts.page') !!} 
	</div>
@endsection