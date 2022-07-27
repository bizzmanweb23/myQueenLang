<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>@yield('title')</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.min.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.min.css')}}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo-beauty.min.css')}}">
   <!-- Latest compiled and minified CSS -->
</head>

<body class="home riode-rounded-skin">

    <div class="page-wrapper">
        
        <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <div class="welcome-msg">
                            <a href="{{url('contact')}}" class="contact"><i class="d-icon-map"></i>@lang('auth.store')</a>
                            <a href="#" class="help"><i class="d-icon-info"></i>@lang('auth.shipping')</a>
                        </div>
                    </div>
                    <div class="header-right">
                   
                        <a class="call" href="tel:#">
                            <i class="d-icon-phone"></i>
                            <span>@lang('auth.call') </span>0(800) 123-456
                        </a>
                        @auth
                        <a href="#" class="wishlist"><i class="d-icon-heart"></i>@lang('auth.wishlist')</a>
                        <div class="dropdown ml-5">
                            <a href="" class="" target="_blank"><i class="d-icon-user"></i> &nbsp; @lang('auth.account')</a>
                            <ul class="dropdown-box">
                                <li><a href="{{ URL::signedRoute('users.profile.index') }}">@lang('auth.profile')</a></li>
                                <li><a href="{{ URL::signedRoute('MLM.tree.index') }}">@lang('auth.Affilate')</a></li>
                                <li><a href="{{ route('Referal') }}">@lang('auth.Refer')</a></li>
                                <li><a href="">@lang('auth.order')</a></li>
                                <li><a href="">@lang('auth.credit')</a></li>
                                <li><a href="">@lang('auth.Loyality')</a></li>
								<li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">@lang('auth.Logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
								</li>
                                </ul>
                            </div>
                        

                        <div class="dropdown cart-dropdown  type3 ml-2">
                            <a href="" class="cart-toggle">
                                <i class="d-icon-bag"></i>
                                @lang('auth.cart')
                            </a>
                            <div class="cart-overlay"></div>
                            <!-- End Cart Toggle -->
                           
                            <!-- End Dropdown Box -->
                        </div>
                        @endauth
                        @guest
                            <a href="{{ route('register') }}" class="___class_+?15___"><i class="d-icon-user"></i> &nbsp;
                                @lang('auth.login')
                            </a>
                        @endguest
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
			<!--?php echo '<pre>'; print_r(session()->get('lang_code'));? -->
            <!-- End HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle mr-0">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="#" class="logo d-none d-lg-block">
                            <img src="images/logo.png" alt="logo" class="img-responsive" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-center d-flex justify-content-center">
                        <a href="demo-beauty.html" class="logo d-block d-lg-none">
                            <img src="images/logo.png" alt="logo" width="154" height="43" />
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
                    title:'Myqueen Says',
                    text:"{{Session::get('warning')}}",
                    type:'warning',
                    timer:10000
                }).then((value) => {
                }).catch(swal.noop);
            </script>
            @endif
			<script>
    
    
    </script>
        </header>  
        <!-- End Header -->