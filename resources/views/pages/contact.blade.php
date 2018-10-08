@extends('main')
@section('title',' | Contact Page')
@section('content')
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}
		input[type=text], select, textarea {
		    width: 100%;
		    padding: 12px;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		    margin-top: 6px;
		    margin-bottom: 16px;
		    resize: vertical;
		}
		input[type=submit] {
		    background-color: #4CAF50;
		    color: white;
		    padding: 12px 20px;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}
		input[type=submit]:hover {background-color: #45a049;}
		.container {border-radius: 5px;background-color: #f2f2f2;padding: 20px;}
	</style> 
  	<form action="{{url('contact')}}" method="POST">
  		{{csrf_field()}}
	    <input type="text" id="subject" name="subject" placeholder="Subject">
	    <input type="text" id="mail" name="email" placeholder="E-Mail">
	    <textarea id="subject" name="bodyMessage" placeholder="Message" style="height:200px;resize: none"></textarea>
	    <input type="submit" value="Send Message">
  	</form> 
@endsection 