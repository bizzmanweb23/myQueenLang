@extends('frontend.layouts.masters')
@section('title','Myqueen | Register')
@section('body')
<main class="main">
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
                <li><a href="{{url('/')}}">Myqueen</a></li>
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
                                <a class="nav-link active border-no lh-1 ls-normal" id="register_refresh" href="#register">Register</a>
                            </li>
                            <li class="delimiter">or</li>
                            <li class="nav-item">
                                <a href="{{route('login')}}">Login</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="register">
                                <form action="{{ route('register') }}" method="POST" id="reset_register">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Your Name *" required />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }} " id="email" name="email" placeholder="Your Email address *" required />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password *" required />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Retype Password" required />
                                    </div>
                                    @if(app('request')->input('referal_code'))
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{app('request')->input('referal_code')}}" disabled placeholder="Referal Code *" />
                                        {{Session::put('referal_code',app('request')->input('referal_code'))}}
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('referal_code') is-invalid @enderror" id="referal_code" name="referal_code" value="{{app('request')->input('referal_code')}}" placeholder="Referal Code *" />
                                        @error('referal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="form-footer">
                                        <div class="form-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required />
                                            <label class="form-control-label" for="register-agree">I agree to the
                                                privacy policy</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
                                </form>
                                <div class="form-choice text-center">
                                    <label class="ls-m">or Register With</label>
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
    $('#email,#name,#password,#confirm-password').on('click', function() {
        $('.invalid-feedback').hide();
    });
    $('#register_refresh').on('click', function() {
        $('#reset_register').trigger("reset");
    });
    $('form').submit(function() {
        var referal_code = $('#referal_code').val();
        if (referal_code == '') {
         var ref = 'MQRF0000001' ;
            $('#referal_code').val(ref);
        } 
    });
</script>
@endsection