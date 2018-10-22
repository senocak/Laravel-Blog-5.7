@extends('bootstrap.index')
@section("title",config("ayarlar.baslik")." Anasayfa")
@section("bg",url("/")."/images/".tema()."/about-bg.jpg")
@section("h1","Hakkımda")
@section("subheading","")
@section("icerik")
    <div class="container">
        <div class="row">
            <div class="col-lg-18 col-md-18 mx-auto">
                <div class="post-preview"> 
                    <p class="post-meta">{!! $data["about"] !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection