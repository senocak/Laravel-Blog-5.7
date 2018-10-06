<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>PORTFOLIO</b></h4>
    <p class="w3-text-grey">Template by W3.CSS</p>
  </div>
  <div class="w3-bar-block">
    <a href="/" class="w3-bar-item w3-button w3-padding {{ Request::is('/') ? "w3-blue" : "" }}"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Home</a>

    <div class="w3-dropdown-hover w3-right {{ Request::is('blog') ? "w3-blue" : "" }}">
       <a href="/blog" class="w3-bar-item w3-button w3-padding {{ Request::is('blog') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>BLOG</a>
      <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
        <a href="#" class="w3-bar-item w3-button">Link 1</a>
        <a href="#" class="w3-bar-item w3-button">Link 2</a>
        <a href="#" class="w3-bar-item w3-button">Link 3</a>
      </div>
    </div>

    <a href="/about" class="w3-bar-item w3-button w3-padding {{ Request::is('about') ? "w3-blue" : "" }}"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a>
    <a href="/contact" class="w3-bar-item w3-button w3-padding  {{ Request::is('contact') ? "w3-blue" : "" }}"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>