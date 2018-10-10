@extends('main')
@section('title',' | All Posts')

@section('stylesheet')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<style type="text/css">.sortable { cursor: move; }</style>
@endsection

@section('content')

<div id="alert"></div>
<?php $sayac=0; ?>
<br>
	<a href="{{ route('posts.create') }}" class="w3-btn w3-blue-grey w3-block">Create Post</a>	
	<table class="w3-table-all">
	    <tr>
	     	<thead>
				<th>#</th>
		      	<th>Başlık</th> 
		      	<th>Kategori</th> 
		      	<th>Tarih</th>
		     	<th></th>
	     	</thead>
	    </tr>
	    <tbody id="sortable">
	    	@foreach($posts as $post)
	    		<?php $sayac++ ;?>
	    		<meta name="csrf-token" content="{{ csrf_token() }}">
	    		<tr class="w3-hover-black" id="item-{{ $post->id }}">
	    			<td class="sortable"><?php echo $sayac;?></td>
	    			<td>{{ $post->title }}</td>
	    			<th>{{ $post->category["name"] }}</th>
	    			<td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
	    			<td><a href="/posts/{{$post->id}}/edit" class="w3-button w3-khaki">Düzenle</a></td>
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