<!doctype html>
<html lang="en">
  <head>@include('partials._head')</head>
  <body class="w3-light-grey w3-content" style="max-width:1600px">
    @include('partials._nav')
    <div class="w3-main" style="margin-left:300px">
      <br>
      <!--
      <header id="portfolio">
        <a href="#"><img src="avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
        <div class="w3-container">
          <h1><b>My Portfolio</b></h1>
          <div class="w3-section w3-bottombar w3-padding-16">
            <span class="w3-margin-right">Filter:</span>
            <button class="w3-button w3-black">ALL</button>
            <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Design</button>
            <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Photos</button>
            <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Art</button>
          </div>
        </div>
      </header>
      -->
      <div class="w3-row-padding">
        @include('partials._messages')


        @if(Auth::check())
          <a href="/logout" class="w3-right">Logout</a>
        @endif

        @yield('content')
      </div>
    </div>
    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>