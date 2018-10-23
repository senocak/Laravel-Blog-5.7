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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/fontastic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/distribution/custom.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <a href="/" class="navbar-brand">Anıl Şenocak</a> 
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/" class="nav-link ">Anasayfa</a></li>
              <li class="nav-item"><a href="/about" class="nav-link">Hakkımda</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: white">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{url('/')}}/category/{{$category->slug}}">{{$category->name}}</a>
                    @endforeach
                </div>
              </li>
              <li class="nav-item"><a href="/contact" class="nav-link ">İletişim</a></li>
            </ul>
              @if(Auth::guest())
                  <a class="btn btn-success my-2 my-sm-0" href="/login">Login</a>
                @else
                    <div class="btn-group active ">
                      <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>{{ Auth::user()->name }}</b></a>
                      <div class="dropdown-menu"  style="background-color: white"> 
                        <a class="dropdown-item" href="/posts">Yazılar</a>
                        <a class="dropdown-item" href="/categories">Kategoriler</a>
                        <a class="dropdown-item" href="/comments">Yorumlar</a>
                        <a class="dropdown-item" href="/tags">Etiketler</a>
                        <div class="dropdown-divider"></div>
                          <form method="POST" action="{{ route('logout') }}">
                          @csrf
                              <button type="submit" class="dropdown-item" href="/logout" >Çıkış</button>
                          </form>
                      </div>
                    </div>
                 @endif 
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <main class="posts-listing col-lg-12"> 
          <div class="container">
            @yield('icerik')
          </div>
        </main>
      </div>
    </div>
    <!-- Page Footer-->
    <footer class=" "> 
      <div class="col-md-6 text-right">
        <p>Powered By <a href="www.github.com/senocak" >Anıl Şenocak</a></p>
        <a href="www.github.com/{{$var["github"]}}">Github</a>
        <a href="www.linkedin.com/in/{{$var["linkedin"]}}">Linkedin</a>
        <a href="www.twitter.com/{{$var["twitter"]}}">Twitter</a>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{url('/')}}/css/distribution/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/css/distribution/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{url('/')}}/css/distribution/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/css/distribution/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{url('/')}}/css/distribution/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="{{url('/')}}/js/distribution/front.js"></script>
  </body>
</html> 