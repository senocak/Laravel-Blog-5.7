<?php $users = DB::table('users')->where('id','=',"1")->first();?>
<!doctype html>
<html lang="en">
  <head>
    <title>Laravel Blog @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('/')}}/css/w3css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{url('/')}}/js/w3css/jquery.min.js"></script>
    <style>body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}</style>
    @yield('stylesheet')
  </head>
  <body class="w3-light-grey w3-content" style="max-width:1600px">
  @if(Auth::check())
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container" >
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu"><i class="fa fa-remove"></i></a>
        <div class="w3-display-container w3-hover-gray scale" style="background-image: url({{url('/')}}/images/{{$users->picture}});width: 100%;height: 342px;background-size: auto 100%;">
          <div class="w3-display-bottomleft w3-container w3-white"><h4><b>{{$users->name}}</b></h4></div>
          <div class="w3-display-bottomright w3-container w3-white">
            <a href="https://www.linkedin.com/in/{{$users->linkedin}}/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
          </div>
        </div>
      </div>
      <div class="w3-bar-block">
        <a href="/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Siteyi Gör</a>
        @if(Auth::check())
          <a href="/posts" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="posts" or Request::segment(1)=="blog")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Yazılar</a>
          <a href="/categories" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="categories")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Kategoriler</a>
          <a href="/tags" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="tags")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Etiketler</a>
          <a href="/comments" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="comments")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Yorumlar</a>
          <a href="/profile" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="profile")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Profil</a>
          <a href="/settings" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="settings")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Ayarlar</a>
        @else
          <a href="/login" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="login")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Giriş Yap</a>
        @endif
      </div>
    </nav>
  @endif
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  @if(Auth::check())
      <div class="w3-main" style="margin-left:300px">
  @else
      <div class="w3-main">
  @endif
        @yield('cat')
        <div class="w3-row-padding">
          @if (Session::has('success'))
            <div class="w3-panel w3-green w3-round">
              <h3>Başarılı!</h3> {{Session::get('success')}}
            </div>
          @endif

          @if (count($errors)>0)
            <div class="w3-panel w3-red w3-round">
              <h3>Hata!</h3>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif


        @yield('content')
      </div>
    </div>
    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>

    @yield('scripts')
  </body>
</html>