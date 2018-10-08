<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container" >
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu"><i class="fa fa-remove"></i></a>
    <div class="w3-display-container w3-hover-gray scale" style="background-image: url(http://127.0.0.1:8000/images/pp.jpg);
                          width: 100%;
                          height: 342px;
                          background-size: auto 100%;">
      <div class="w3-display-bottomleft w3-container w3-white"><h4><b>Anıl Şenocak</b></h4></div>
      <div class="w3-display-bottomright w3-container w3-white">
        <a href="https://www.linkedin.com/in/anilsenocak27/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
      </div> 
    </div> 
  </div>
  <div class="w3-bar-block">
    <a href="/" class="w3-bar-item w3-button w3-padding {{ Request::is('/') ? "w3-blue" : "" }}"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Home</a>
    <a href="/about" class="w3-bar-item w3-button w3-padding {{ Request::is('about') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>About</a>
    <a href="/contact" class="w3-bar-item w3-button w3-padding  {{ Request::is('contact') ? "w3-blue" : "" }}"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Contact</a>

    @if(Auth::check()) 
      <a href="/posts" class="w3-bar-item w3-button w3-padding {{ Request::is('posts') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>Posts</a>
      <a href="/categories" class="w3-bar-item w3-button w3-padding {{ Request::is('categories') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>Categories</a>
      <a href="/tags" class="w3-bar-item w3-button w3-padding {{ Request::is('tags') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>Tags</a>
    @else
      <a href="/login" class="w3-bar-item w3-button w3-padding {{ Request::is('login') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>Login</a>
    @endif
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
