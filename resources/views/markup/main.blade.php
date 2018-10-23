<?php 
$categories = DB::table('categories')->get();
$ayar = DB::table('ayar')->where('id', '=', 1)->get();
$var=(Array)$ayar[0];
?>
<!DOCTYPE html>
<html>
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="{{config("ayarlar.description")}}">
	    <meta name="keywords" content="{{config("ayarlar.keywords")}}">
	    <meta name="author" content="{{config("ayarlar.author")}}">
	    <title>Laravel Blog @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CPoppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{url('/')}}/css/markup/font-awesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/bootstrap.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/slick.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/animate.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/style.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/responsive.css">
		<link rel="stylesheet" href="{{url('/')}}/css/markup/colors.css"> 
	</head>
	<body class="version-ii"> 
		<div id="wrapper">
			<div class="w1"> 
				<header id="header" class="version-ii">
					<div class="container">
						<div class="row top-bar"> 
							<nav class="col-xs-12 col-sm-6 policy-nav">
								<ul> 
									<li><a href="{{$var["twitter"]}}"><span class="ico-twitter"></span></a></li> 
									<li><a href="{{$var["linkedin"]}}"><span class="ico-linkedin"></span></a></li>
									<li><a href="{{$var["github"]}}"><img src="https://assets-cdn.github.com/images/modules/logos_page/GitHub-Mark.png" width="10px"></a></li>
								</ul>
							</nav> 
							<div class="col-xs-12 col-sm-6 pull-right hidden-xs"> 
								<ul class="social-networks"> 
									@if(Auth::guest())
					                    <li><a href="/login">Login</a></li>
					                @else
					                    <a href="/posts">{{ Auth::user()->name }}</a>
					                 @endif
								</ul>
							</div>
						</div>
					</div>
					<div class="stick-holder">
						<div class="container">
							<div class="row holder">
								<div class="col-xs-3 col-sm-2"><div class="logo">Anıl Şenocak</div></div>
								<div class="col-xs-9 col-sm-10 nav-holder">
									<nav id="nav" class="navbar navbar-default">
										<!-- Navbar Header of the page -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
										<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li data-drop="drop-right" class="active"><a href="/">Anasayfa</a></li>
												<li data-drop="drop-right"><a href="/about">Hakkımda</a></li>
												<li data-drop="drop-right">
													<a href="single-post.html">Kategoriler</a>
													<div class="drop">
														<ul>
															@foreach($categories as $category)
																<li><a href="{{url('/')}}/category/{{$category->slug}}">{{$category->name}}</a></li>
										                    @endforeach
														</ul>
													</div>
												</li>
												<li data-drop="drop-right"><a href="/contact">İletişim</a></li>
											</ul>
										</div> 
									</nav> 
								</div>
							</div>
						</div>
					</div>
					 
				</header>
				<main id="main" role="main"><br>
					<div id="twocolumns" class="container">
						<div class="row">
							<div id="content" class="col-xs-12"> 
							    @yield('icerik') 
							</div>
						</div>
					</div>
				</main> 
				<footer id="footer" class="container version-ii">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<p>&copy; 2016 Copyright 2016, <a href="#">Dot</a>. All Rights Reserved</p>
						</div>
						<div class="col-xs-12 col-sm-6">
							<!-- Social Network of the page -->
							<ul class="social-networks">
								<li><a href="{{$var["twitter"]}}"><span class="ico-twitter"></span></a></li> 
								<li><a href="{{$var["linkedin"]}}"><span class="ico-linkedin"></span></a></li>
								<li><a href="{{$var["github"]}}"><img src="https://assets-cdn.github.com/images/modules/logos_page/GitHub-Mark.png" width="10px"></a></li>
							</ul>
							<!-- Social Network of the page end -->
						</div>
					</div>
				</footer>
				<!-- Footer of the page end -->
				<!-- Back Top of the page -->
				<span id="back-top">UP</span>
			</div>
		</div>
		<script src="{{url('/')}}/js/markup/jquery.js"></script> 
	    <script src="{{url('/')}}/js/markup/plugins.js"></script> 
	    <script src="{{url('/')}}/js/markup/jquery.main.js"></script>
	</body>
</html>