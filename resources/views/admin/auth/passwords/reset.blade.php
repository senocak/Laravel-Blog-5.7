@extends('main')
@section('title',' | Şifre Sıfırla')
@section('content')
    <style>
        form {border: 3px solid #f1f1f1;}
        input[type=email], input[type=password] {width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;}
        button {background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;}
        button:hover {opacity: 0.8;}
        span.psw {float: right;padding-top: 16px;}
        @media screen and (max-width: 300px) {span.psw {display: block;float: none;}.cancelbtn {width: 100%;}}
    </style> 
    <br><br><br><h1>Şifre Sıfırla</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input id="email" type="email" class="w3-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email Adresiniz">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
        @endif

        <input id="password" type="password" class="w3-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Yeni Şifreniz">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
        @endif 

        <input id="password-confirm" type="password" class="w3-input" name="password_confirmation" required placeholder="Yeni Şifrenizi Tekrar Giriniz.">
        <button type="submit" class="btn btn-primary">Şifreyi Değiştir</button>
    </form> 
@endsection