<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container" >
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu"><i class="fa fa-remove"></i></a>
    <div class="w3-display-container w3-hover-gray scale" style="background-image: url(http://127.0.0.1:8000/images/pp.jpg);width: 100%;height: 342px;background-size: auto 100%;">
      <div class="w3-display-bottomleft w3-container w3-white"><h4><b>Anıl Şenocak</b></h4></div>
      <div class="w3-display-bottomright w3-container w3-white">
        <a href="https://www.linkedin.com/in/anilsenocak27/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
      </div> 
    </div> 
  </div>
  <div class="w3-bar-block">
    <a href="/" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="")echo "w3-blue"; ?>"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Anasayfa</a>
    <a href="/about" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="about")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Hakkımda</a>
    <a href="/contact" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="contact")echo "w3-blue"; ?>"><i class="fa fa-envelope fa-fw w3-margin-right"></i>İletişim</a>

    @if(Auth::check()) 
      <a href="/posts" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="posts" or Request::segment(1)=="blog")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Yazılar</a>
      <a href="/categories" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="categories")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Kategoriler</a>
      <a href="/tags" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="tags")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Etiketler</a>
    @else
      <a href="/login" class="w3-bar-item w3-button w3-padding <?php if(Request::segment(1)=="login")echo "w3-blue"; ?>"><i class="fa fa-user fa-fw w3-margin-right"></i>Giriş Yap</a>
    @endif
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>