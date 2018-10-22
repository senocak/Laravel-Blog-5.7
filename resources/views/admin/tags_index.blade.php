@extends('admin.main'))
@section('title',' | Tüm Etiketler')
@section('content')
	<br>
	{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!} 
		{{Form::label('name','Etiket Başlığı:',['class'=>'w3-left w3-button w3-khaki','style'=>'width:15%'])}}
		{{ Form::text('name',null,['class'=>'w3-input w3-left','placeholder'=>'Etiket Başlığı','style'=>'width:50%']) }}
		{{ Form::submit('Yeni Etiket Ekle',['class'=>'w3-button w3-green']) }}
	{!! Form::close() !!} 
	<br>
	<?php $i=1; ?>
	<div class="w3-bar"> 
	  	<table class=" w3-table-all" >
		    <tr>
		     	<thead>
					<th>#</th>
			      	<th>İşlemler</th>
			      	<th class="w3-center">Gönderi</th> 
		     	</thead>
		    </tr>
		    <tbody>
		    	@foreach($tags as $tag)
		    		<tr class="w3-hover-black">
		    			<th>{{ $i }}</th>
		    			<th>
						  	{{Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete'])}}
								{{Form::submit('Sil',['class'=>'w3-button w3-right w3-red',"onclick"=>"return confirm('Tag Sil?')"])}}
							{{Form::close()}} 
		    				{{Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT'])}}
								{{Form::text('name',null,['class'=>'w3-input w3-left','style'=>'width:35%'])}}
						  		{{Form::submit('Kaydet',['class'=>'w3-button w3-green'])}}
						  	{{Form::close()}}
		    			</th> 
		    			<th class="w3-center"><small><a href="{{ route('tags.show',$tag->id) }}" class="w3-button w3-khaki" >{{$tag->posts->count()}} Yazı</a></small></th>
		    		</tr>
		    		<?php $i++; ?>
		    	@endforeach
		    </tbody> 
	  	</table>  
	  	<div class="w3-center">
	  		{!! $tags->links('admin.posts_page') !!} 
		</div>
	</div> 
@endsection