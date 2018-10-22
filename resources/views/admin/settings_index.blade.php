@extends('admin.main')
@section('title',' | Tüm Etiketler')
@section('content')
	<br><br>
	<form action="{{url('settings')}}" method="POST">
  		{{csrf_field()}}
	    <select class="w3-select" name="temalar">
	    	<?php
	    	$parcala=explode(",", temalar());
	    	foreach ($parcala as $key) {
	    		if (tema()==$key) {
	    			echo "<option value='$key' selected>$key</option>";
	    		}else{
	    			echo "<option value='$key'>$key</option>";
	    		}
	    	}
	    	?> 
	    </select>
	    <label>Twitter</label>
	    <input type="text" name="twitter" class="w3-input" value="{{$ayarlar->twitter}}">
	    <label>Github</label>
	    <input type="text" name="github" class="w3-input" value="{{$ayarlar->github}}">
	    <label>Linkedin</label>
	    <input type="text" name="linkedin" class="w3-input" value="{{$ayarlar->linkedin}}">
	    <br>
	    <input type="submit" value="Kaydet" class="w3-button w3-block w3-green">
  	</form>
@endsection