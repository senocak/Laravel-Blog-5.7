@extends('main')
@section('title',' | Edit Comment')
@section('content')

	<br><br>
	<?php 
	$sayac=0; 
	?>
	<table class="w3-table-all">
		<tr>
		 	<thead>
				<th>#</th>
		      	<th>İsim</th> 
		      	<th>Yazı</th> 
		      	<th>Yorum</th> 
		      	<th>Tarih</th> 
		     	<th></th>
		 	</thead>
		</tr>
		<tbody id="sortable">
			@foreach($comments as $comment)
				<?php 
				$sayac++;
				$kelime=100;
			    $icerik=strip_tags($comment->comment);
			    if(strlen($icerik)>=$kelime){
			      if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))$icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...";  
			    }else{
			      $icerik.="";
			    } 
				?>
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<tr class="w3-hover-black" id="item-{{ $comment->id }}">
					<td class="sortable"><?php echo $sayac;?></td>
					<td><a href="mailto:{{ $comment->email }}">{{ $comment->name }}</a></td>
					<th><a href="/blog/{{$comment->post["slug"] }}" target="_blank">{{$comment->post["title"] }}</a></th>
					<td>{{ $icerik }}</td>
					<td>{{ date('d.m.Y',strtotime($comment->created_at)) }}</td>
					<td>
						<a href="/comments/{{$comment->id}}/edit" class="w3-button w3-khaki w3-tiny">Düzenle</a>
						@if($comment->approved=="1")
							<a href="/comments/{{$comment->id}}/approved" class="w3-button w3-blue w3-tiny">Onaylandı</a>
						@else
							<a href="/comments/{{$comment->id}}/approved" class="w3-button w3-red w3-tiny">Onaylanmadı</a>
						@endif

					</td>
				</tr>
			@endforeach
		</tbody> 
	</table>


@endsection