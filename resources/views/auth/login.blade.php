@extends('frontend.layouts.master')
@section('title','Myqueen | Login')
@section('body')
<main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                        <li><a href="shop.html">Myqueen</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-6 pb-2 mb-10">
                <div class="container">
                    <div class="login-popup login-bg">
                        <div class="form-box">
                            <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                                <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active border-no lh-1 ls-normal" id="login_refresh" href="#signin">Login</a>
                                    </li>
                                    <li class="delimiter">or</li>
                                    <li class="nav-item">
                                        <a href="{{route('register')}}">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="signin">
                                        <form method="POST" action="{{ route('login') }}" id="reset_login">
                                        @csrf
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Username or Email Address *" required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password *"
                                                    required />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="form-footer">
                                                <div class="form-checkbox">
                                                <input class="custom-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                                <a href="#" class="lost-link">Lost your password?</a>
                                            </div>
                                            <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                                        </form>
                                        <div class="form-choice text-center">
                                            <label class="ls-m">or Login With</label>
                                            <div class="social-links">
                                                <a href="#" class="social-link social-google fab fa-google border-no"></a>
                                                <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                                <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#email,#password').on('click', function(){
        $('.invalid-feedback').hide();
    });
    $('#login_refresh').on('click', function(){
        $('#reset_login').trigger("reset");
    });
</script>
@endsection
