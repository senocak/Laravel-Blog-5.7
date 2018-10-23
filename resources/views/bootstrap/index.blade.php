<?php 
$categories = DB::table('categories')->get();
$ayar = DB::table('ayar')->where('id', '=', 1)->get();
$var=(Array)$ayar[0];
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{config("ayarlar.description")}}">
        <meta name="keywords" content="{{config("ayarlar.keywords")}}">
        <meta name="author" content="{{config("ayarlar.author")}}">
        <title>@yield('title')</title>
        <link href="{{url('/')}}/css/{{ tema()  }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{url('/')}}/css/{{ tema()  }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fontphp s.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="{{url('/')}}/css/{{ tema()  }}/clean-blog.min.css" rel="stylesheet">
        <link href="{{url('/')}}/css/{{ tema()  }}/custom.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <!-- <a class="navbar-brand" href="/">Anıl Şenocak</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="/">Anasayfa <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">Hakkımda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: white">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{url('/')}}/category/{{$category->slug}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link disabled" href="/contact">İletişim</a></li>
                </ul>
                @if(Auth::guest())
                    <a class="btn btn-success my-2 my-sm-0" href="/login">Login</a>
                @else
                    <div class="btn-group">
                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
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
        </nav>
        <header class="masthead" style="background-image: url(@yield('bg')">
            <div class="overlay"></div>
            <div class="container"> <!-- style="height:350px;" -->
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>@yield('h1')</h1>
                            <span class="subheading">  
                                @if ($__env->yieldContent('subheading'))
                                    @yield('subheading')
                                @else
                                    Bootstrap Blog Theme For Laravel 5.7
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('icerik')
        <hr>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item"><a href="http://twitter.com/{{$var["twitter"]}}" target="_blank"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x fa-inverse"></i></span></a></li>
                            <li class="list-inline-item"><a href="http://linkedin.com/in/{{$var["linkedin"]}}" target="_blank"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-linkedin fa-stack-1x fa-inverse"></i></span></a></li>
                            <li class="list-inline-item"><a href="http://github.com/{{$var["github"]}}" target="_blank"><span class="fa-stack fa-lg"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-github fa-stack-1x fa-inverse"></i></span></a></li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; <a href="https://github.com/senocak" target="_blank">Anıl Şenocak</a> {{ date("Y") }}</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{url('/')}}/css/{{ tema()  }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/css/{{ tema()  }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('/')}}/js/{{ tema()  }}/clean-blog.min.js"></script>
    </body>
</html>