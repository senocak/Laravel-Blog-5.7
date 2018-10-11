@extends('main')
@section('title',' | All categorys')

@section('stylesheet')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<style type="text/css">.sortable { cursor: move; }</style>
@endsection

@section('content')
	<div id="alert"></div><br>
	<?php $sayac=0; ?> 
	<script type="text/javascript">
		function showimagepreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
	<div class="w3-bar"> 
	  	<table class="w3-left w3-table-all" style="width:70%">
		    <tr>
		     	<thead>
					<th>#</th>
			      	<th>Img</th> 
			      	<th>Title</th> 
			      	<th>Created At</th>
			     	<th></th>
		     	</thead>
		    </tr>
		    <tbody id="sortable">
		    	@foreach($categories as $category)
		    		<?php $sayac++ ;?>
	    			<meta name="csrf-token" content="{{ csrf_token() }}">
		    		<tr class="w3-hover-black" id="item-{{ $category->id }}">
		    			<td class="sortable">{{$sayac}}</td>
		    			<td><img src="images/{{ $category->picture }}" style="width:150px"></td> 
		    			<td>{{ $category->name }}</td> 
		    			<td>{{ date('M j, Y',strtotime($category->created_at)) }}</td>
		    			<td><a href="/categories/{{$category->id}}/edit" class="w3-button w3-khaki">Düzenle</a></td>
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
						url: '{{route("categories.sortPosts")}}',
						success: function(msg){  
							alert(msg.islemMsj);
							//document.getElementById("alert").innerHTML="<div class='w3-panel w3-green w3-round' ><h3>Success!</h3>"+msg.islemMsj+"</div>"; 
						}
					});	
					/*
					setInterval(function() {
						document.getElementById("alert").innerHTML="";
					}, 3000);
					*/
				}
			});
			$( "#sortable" ).disableSelection();	                      		
		});	                      	
	</script> 
	  	<div class="w3-center">
	  		{!! $categories->links('posts.page') !!} 
		</div>
	 	<div class="w3-right w3-teal" style="width:30%">
	 		{!! Form::open(['route'=>'categories.store','method'=>'POST','files'=>true]) !!} 
	 		<img src="{{url('/')}}/images/no-image.png" style="width:320px" id="imgview" >
	 		{{ Form::file('img',['class'=>'w3-input','required'=>'required','onChange'=>'showimagepreview(this)'])}}
	 		{{ Form::text('name',null,['class'=>'w3-input','placeholder'=>'New Category','required'=>'required']) }}
	 		{{ Form::submit('New Category',['class'=>'w3-button w3-green']) }}
	 		{!! Form::close() !!}
	 	</div> 
	</div> 
@endsection