@extends('mlmuser.layouts.master')
@section('title','Myqueen | Referal')
@section('body')
<main class="main account">
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb" style="background: none;">
                <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                <li>@lang('user.Account')</li>
            </ul>
        </div>
    </nav>
    <div class="page-header pl-4 pr-4" style="background-image: url({{asset('images/refferal.jpg')}}">

        <h1 class="page-title font-weight-bold lh-1 text-capitalize text-dark">@lang('user.Referral')</h1>

    </div>
    <div class="container">
        <div class="site-promotion text-center">
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="site-ref-link">
                    <p>@lang('user.refquote')</p>
                    <div class="visible-print text-center">
                      <!-- {!! QrCode::size(100)->generate(url('/register?referal_code=' . $ref)); !!} --> 
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" id="copytext" class="form-control" value="{{  url('/register?referal_code=' . $ref) }}" disabled>

                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-sm" id="copy">@lang('user.Copy')</button>
                        </div>
                    </div>
                    <br>
            
                    
                    
                     {!! QrCode::size(100)->generate(url('/register?referal_code=' . $ref)); !!}                        <button type="button" class="btn btn-primary btn-md" style="transform: translate(60px, -44px);">@lang('user.Download')</button>
                    </a>
                    <form action="{{route('Share-Referal')}}" method="POST">
                        @csrf
                        <br>
                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="@lang('user.EnterReceipent')">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <button class="btn btn-primary btn-sm btn-block"> <i class="fa fa-share"></i> Share the link</button> -->
                                <!-- <a href="" class="btn btn-primary btn-sm btn-block"><i class="fa fa-share"></i> Share the link</a> -->
                                <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-share"></i> @lang('user.Share the link')</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
    <br>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#copy').on('click', function() {
            var text = $('#copytext').val();
            navigator.clipboard.writeText(text);
            alert('Copied to clipboard');
        });
    });
</script>
@endsection