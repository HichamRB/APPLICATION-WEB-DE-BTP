@extends('layouts.app')

<style>
    @import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');
* {
  box-sizing: border-box;
}
body {
  font-family: 'Rubik', sans-serif;
}
.container {
  display: flex;
  height: 100vh;
}
.left {
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  animation-name: left;
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-delay: 1s;
}
.right {
  flex: 1;
  background-color: transparent;
  transition: 1s;
  background-image: url(https://image.freepik.com/vecteurs-libre/illustration-travailleurs-chantier_209620-535.jpg);
  background-size: auto;
  background-repeat: no-repeat;
  background-position: center;
}
.header > h2 {
  margin: 0;
  color: #2eaacc;
}
.header > h4 {
  margin-top: 10px;
  font-weight: normal;
  font-size: 15px;
  color: rgba(0, 0, 0, .4);
}
.form {
  max-width: 80%;
  display: flex;
  flex-direction: column;
}
.form > p {
  text-align: right;
}
.form > p > a {
  color: #000;
  font-size: 14px;
}
.form-field {
  height: 46px;
  padding: 0 16px;
  border: 2px solid #2eaacc;
  border-radius: 4px;
  font-family: 'Rubik', sans-serif;
  outline: 0;
  transition: 0.2s;
  margin-top: 20px;
}
.form-field:focus {
  border-color: #2eaacc;
}
.form > button {
  padding: 12px 10px;
  border: 0;
  background: linear-gradient(to right, #de48b5 0%, #0097ff 100%);
  border-radius: 3px;
  margin-top: 10px;
  color: #2eaacc;
  letter-spacing: 1px;
  font-family: 'Rubik', sans-serif;
}
.animation {
  animation-name: move;
  animation-duration: 0.4s;
  animation-fill-mode: both;
  animation-delay: 2s;
}
.a1 {
  animation-delay: 2s;
}
.a2 {
  animation-delay: 2.1s;
}
.a3 {
  animation-delay: 2.2s;
}
.a4 {
  animation-delay: 2.3s;
}
.a5 {
  animation-delay: 2.4s;
}
.a6 {
  animation-delay: 2.5s;
}
.a7 {
  animation-delay: 2.5s;
}
@keyframes move {
  0% {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-40px);
  }
  100% {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
}
@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }
  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 440px;
  }
}


</style>
@section('content')

<div class="container">
    <div class="left" >
      <div class="header">
        <h2 class="animation a1">BTP Company</h2>
        <h4 class="animation a2">Log in to your account using email and password</h4>
      </div>
      <div class="form">
        @if(session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" >
        @csrf




        <input id="email"  class="form-field animation a3" placeholder="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
        <input id="password" name="password" class="form-field animation a4" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif



        <p class="animation a5">
            <div style="color: #3a3768 !important;">

            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                {{ trans('global.remember_me') }}
            </label>
            <input class="form-check-input" style="    margin-top: 0.4rem !important;
            margin-left: 0.75rem !important; name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
            </div>
            <div>
            @if(Route::has('password.request'))
            <a class="btn btn-link px-0"  href="{{ route('password.request') }}" style="color:#2eaacc !important">
                {{ trans('global.forgot_password') }}
            </a><br>
        @endif</p>
        </div>

        <button class="animation a6" type="submit" class="btn btn-primary px-4" style="    border-color: #2eaacc;
        background-color: #9ed8e9;
        color: #636f83;">
            {{ trans('global.login') }} </button>

      </div>
    </div>
    <div class="right" ></div>
  </div>



@endsection