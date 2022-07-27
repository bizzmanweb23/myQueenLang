<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>@yield('title')</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('cart/css/demo-beauty.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cart/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cart/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cart/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cart/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alert/toastr.min.css') }}">

</head>

<body>
    <style>
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
            font-size: 18px;
        }


        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 10px;
            box-sizing: border-box;
            width: 100%;
            margin: 0 3% 20px 3%;
            position: relative;
            padding-bottom: 70px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 94%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        label {
            text-align: left !important;
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            /* border: none; */
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: -7px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            /* border: none; */
            font-weight: bold;
            /* border-bottom: 2px solid skyblue; */
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #c89f63;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;

        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            margin-left: 150px;
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .btn-primary {
            background-color: #c89f63 !important;
            border-color: #c89f63 !important;
        }

        .btn-primary:hover {
            background-color: #000 !important;
        }

        .collapse::after {
            display: none;
        }

    </style>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <div class="welcome-msg">
                            <a href="{{ url('contact') }}" class="contact"><i class="d-icon-map"></i>@lang('auth.store')</a>
                            <a href="#" class="help"><i class="d-icon-info"></i>@lang('auth.shipping')</a>
                        </div>
                    </div>
                    <div class="header-right">

                        <a class="call" href="tel:#">
                            <i class="d-icon-phone"></i>
                            <span>@lang('auth.call') </span>0(800) 123-456
                        </a>
                        <a href="#" class="wishlist"><i class="d-icon-heart"></i>@lang('auth.wishlist')</a>
                        <div class="dropdown ml-5">
                            <a href="" class="" target="_blank"><i class="d-icon-user"></i> &nbsp; @lang('auth.account')</a>
                            <ul class="dropdown-box">
                                 <li><a href="{{ URL::signedRoute('users.profile.index') }}">@lang('auth.profile')</a></li>
                                    <li><a href="{{ URL::signedRoute('MLM.tree.index') }}">@lang('auth.Affilate')</a></li>
                                    <li><a href="{{ route('Referal') }}">@lang('auth.Refer')</a></li>
                                    <li><a href="{{ route('users.purchase_history.index') }}">@lang('auth.order')</a></li>
                                    <li><a href="{{ URL::signedRoute('users.show_wallet_page') }}">@lang('auth.credit')</a></li>
                                    <li><a href="{{ URL::signedRoute('users.show_royalty') }}">@lang('auth.Loyality') </a></li>
                                
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">@lang('auth.Logout')</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </ul>

                        </div>
                        <div class="dropdown cart-dropdown  type3 ml-2">
                            <a href="{{ URL::signedRoute('users.cart.index') }}" class="cart-toggle">
                                <i class="d-icon-bag"></i>
                                @lang('auth.cart') <span id="all_cart_count"> </span>
                            </a>
                            <div class="cart-overlay"></div>
                            <!-- End Cart Toggle -->

                            <!-- End Dropdown Box -->
                        </div>
                        <div class="dropdown">
                            <a href="#currency">@lang('auth.usd')</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">@lang('auth.usd')</a></li>
                                <!-- <li><a href="#EUR">EUR</a></li> -->
                            </ul>
                        </div>
                        <div class="dropdown ml-5">
						     @lang('auth.language') : <select onchange="changeLanguage(this.value)">
                                               <option <?php if(session()->get('lang_code') == 'en') { echo 'selected'; }?> value="en">English</option>
                                               <option <?php if(session()->get('lang_code') == 'chi') { echo 'selected'; }?> value="chi">Chinese</option>
                                               <option <?php if(session()->get('lang_code') == 'malay') { echo 'selected'; }?> value="malay">Malay</option>
                                               </select>
						</div>
                    </div>
                </div>
            </div>
            <!-- End HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle mr-0">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="#" class="logo d-none d-lg-block">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-responsive" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-center d-flex justify-content-center">
                        <a href="" class="logo d-block d-lg-none">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" width="154" height="43" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-right">
                        <nav class="main-nav mr-4">
                         <ul class="menu menu-active-underline">
                                <li class="active">
                                    <a href="{{url('/')}}">@lang('auth.home')</a>
                                </li>
                                <li class="#">
                                    <a href="{{url('/about')}}">@lang('auth.About')</a>
                                </li>
                                <li>
                                    <a href="{{url('/products')}}">@lang('auth.Products')</a>
                                </li>
                               
                                <li>
                                    <a href="{{url('/contact')}}">@lang('auth.Contact')</a>
                                   
                                </li>
                               
                            </ul>
                        </nav>


                        <span class="divider mr-4"></span>
                        <div class="header-search hs-toggle d-block">
                            <a href="#" class="search-toggle d-flex align-items-center">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="@lang('user.search')" required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            @if ($alertFm = Session::get('warning'))
                <script type="text/javascript">
                    swal({
                        title: 'Myqueen Says',
                        text: "{{ Session::get('warning') }}",
                        type: 'warning',
                        timer: 10000
                    }).then((value) => {}).catch(swal.noop);
                </script>
            @endif
        </header>
        <!-- End Header -->
