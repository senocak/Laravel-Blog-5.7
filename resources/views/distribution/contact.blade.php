@extends('distribution.main')
@section('title',' | İletişim')
@section('icerik')
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<form action="{{url('contact')}}" method="POST">
					{{csrf_field()}}
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Name</label>
							<input class="form-control" type="text" id="subject" name="subject" placeholder="Konu" required="">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Email Address</label>
							<input class="form-control" type="email" id="mail" name="email" placeholder="E-Mail" required="">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Message</label>
							<textarea class="form-control" id="subject" name="bodyMessage" placeholder="Message" style="height:100px;resize: none" required=""></textarea>
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<br>
					<div id="success"></div>
					<div class="form-group">
						<input class="btn btn-success" type="submit" value="Send Message">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection 