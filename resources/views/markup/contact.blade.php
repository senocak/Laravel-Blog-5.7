@extends('markup.main')
@section('title',' | İletişim')
@section('icerik')
	<div class="contact-sec">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<section class="comment-respond contact-form wow fadeInUp" data-wow-delay="0.6s">
						<form action="{{url('contact')}}" method="post" id="commentform" class="comment-form">
							{{csrf_field()}}
							<div class="wrap form-group">
								<div class="comment-form-subject"> 
									<input type="text" id="subject" name="subject" size="30" aria-required="true" placeholder="Konu">
								</div>
								<div class="comment-form-email"> 
									<input type="text" id="email" name="email" size="30" aria-required="true" placeholder="E-Mail">
								</div>
							</div> 
							<div class="comment-form-comment"> 
								<textarea id="bodyMessage" name="bodyMessage" rows="3" cols="72" aria-required="true" placeholder="Mesajınız" style="height:200px;resize: none"></textarea>
							</div> 
							<div class="form-submit">
								<input type="submit" name="submit" id="submit" value="Gönder"> 
							</div>
						</form>
					</section> 
				</div> 
			</div>
		</div>
	</div>
@endsection