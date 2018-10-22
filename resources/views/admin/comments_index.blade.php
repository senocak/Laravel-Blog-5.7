@extends('admin.main')
@section('title',' | Yorum Sayfası')
@section('content')
	<br><br>
	<table class="w3-table-all">
	 	<thead>
			<th>#</th>
	      	<th>İsim</th> 
	      	<th>Yazı</th> 
	      	<th>Yorum</th> 
	      	<th>Tarih</th> 
	     	<th class="w3-center">İşlemler</th>
	 	</thead>
		<tbody id="sortable">
			<?php $sayac=0; ?>
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
					<th class="sortable"><?php echo $sayac;?></th>
					<td><a href="mailto:{{ $comment->email }}">{{ $comment->name }}</a></td>
					<th><a href="/blog/{{$comment->post["slug"] }}" target="_blank" class="w3-button">{{$comment->post["title"] }}</a></th>
					<td>{{ $icerik }}</td>
					<td>{{ date('d.m.Y',strtotime($comment->created_at)) }}</td>
					<td style="width: 25%">
						<a href="/comments/{{$comment->id}}/edit" class="w3-button w3-khaki w3-tiny">Düzenle</a>
						<a href="/comments/{{$comment->id}}/delete" class="w3-button w3-red w3-tiny">Sil</a>
						@if($comment->approved=="1")
							<a href="/comments/{{$comment->id}}/approved" class="w3-button w3-blue w3-tiny">Onaylandı</a>
						@else
							<a href="/comments/{{$comment->id}}/approved" class="w3-button w3-orange w3-tiny">Onaylanmadı</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody> 
	</table>
@endsection