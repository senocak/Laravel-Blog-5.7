@if (Session::has('success'))
	<div class="w3-panel w3-green w3-round">
		<h3>Success!</h3> {{Session::get('success')}}
	</div>  
@endif

@if (count($errors)>0)
	<div class="w3-panel w3-red w3-round">
		<h3>Error!</h3>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>  
@endif

