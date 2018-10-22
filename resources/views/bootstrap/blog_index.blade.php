@extends('bootstrap.index')
@section("title",config("ayarlar.baslik")." Anasayfa")
@section("bg")
    @if(isset($image))
        {{ url('/')."/images/".$image }}
    @else
        <?php echo url("/")."/images/".tema()."/home-bg.jpg"; ?>
    @endif
@endsection
@section("h1")
    @if(isset($slug))
        {{ strtoupper($slug)  }}
    @else
        Anasayfa
    @endif
@endsection

@if(Request::segment(1)=="")
    @section("subheading","Bootstrap Blog Theme For Laravel 5.7")
@else
    @section("subheading","")
@endif

@section("icerik")
    <?php $i=0;?>
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-3">
                    <div class="post-preview">
                        <a href="{{ url('blog/'.$post->slug) }}">
                            <img src="{{url('/')}}/images/{{ $post->category['picture'] }}" alt="ArkaPlan" style="width:100%" class="w3-hover-opacity">
                            <h4>{{$post->title}}</h4>
                            <?php
                            $kelime=100;
                            $icerik=strip_tags($post->body);
                            if(strlen($icerik)>=$kelime){
                                if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))$icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...";
                            }else{
                                $icerik.="";
                            }
                            $i++;
                            ?>
                            <p class="post-subtitle" style="text-align: justify;">{!! $icerik !!}</p>
                        </a>
                        <p class="post-meta"><a href="{{url('/')}}/category/{{$post->category["slug"]}}">{{$post->category["name"]}}</a> {{count($post->comments)}} Yorum</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        <div style="text-align:center;">{{ $posts->links() }}</div>
    </div>
@endsection