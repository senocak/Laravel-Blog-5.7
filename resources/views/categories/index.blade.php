@extends('main')
@section('title',' | All categorys')
@section('content')
	<br>
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
		    <tbody>
		    	@foreach($categories as $category)
		    		<tr class="w3-hover-black">
		    			<th>{{ $category->id }}</th>
		    			<th><img src="images/{{ $category->picture }}" style="width:150px"></th> 
		    			<th>{{ $category->name }}</th> 
		    			<td>{{ date('M j, Y',strtotime($category->created_at)) }}</td>
		    			<td><a href="/categories/{{$category->id}}/edit" class="w3-button w3-khaki">Edit</a></td>
		    		</tr>
		    	@endforeach
		    </tbody> 
	  	</table>  
	  	<div class="w3-center">
	  		{!! $categories->links('posts.page') !!} 
		</div>
	 	<div class="w3-right w3-teal" style="width:30%">
	 		{!! Form::open(['route'=>'categories.store','method'=>'POST','files'=>true]) !!} 
	 		<img src="../images/no-image.png" style="width:320px" id="imgview" >
	 		{{ Form::file('img',['class'=>'w3-input','required'=>'required','onChange'=>'showimagepreview(this)'])}}
	 		{{ Form::text('name',null,['class'=>'w3-input','placeholder'=>'New Category','required'=>'required']) }}
	 		{{ Form::submit('New Category',['class'=>'w3-button w3-green']) }}
	 		{!! Form::close() !!}

	 	</div> 
	</div> 
@endsection