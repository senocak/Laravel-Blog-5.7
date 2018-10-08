<!doctype html>
<html lang="en">
  <head>@include('partials._head')</head>
  <body class="w3-light-grey w3-content" style="max-width:1600px">
    @include('partials._nav')
    <div class="w3-main" style="margin-left:300px">

        @yield('cat')

      <div class="w3-row-padding">
        @include('partials._messages')
        @yield('content')
      </div>
    </div>
    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>