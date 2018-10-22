@extends('admin.main')
@section('title',' | All Posts')
@section('content')
    <style>
        form {border: 3px solid #f1f1f1;}
        input[type=email], input[type=password] {width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;}
        button {background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;}
        button:hover {opacity: 0.8;}
        span.psw {float: right;padding-top: 16px;}
        @media screen and (max-width: 300px) {span.psw {display: block;float: none;}.cancelbtn {width: 100%;}}
    </style>
    <br><br><br>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="w3-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Adresiniz">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
        @endif

        <input id="password" type="password" class="w3-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Şifre">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
        @endif

        <input class="w3-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla

        <button type="submit" class="w3-btn w3-button w3-block w3-green">Login</button>
        <a   href="{{ route('password.request') }}"> Şifremi unuttum?</a>
    </form>

    <br><hr><br>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input id="email" type="email" class="w3-input" name="email" required autofocus placeholder="Sıfırlamak istediğiniz email adresi">

        <button type="submit" class="w3-btn w3-button w3-block w3-teal">Şifre Sıfırla</button>
    </form>
    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif
@endsection
