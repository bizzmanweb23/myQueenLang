<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Myqueen</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('asset/css/adminlte.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('asset/image/font/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font/animate.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font/owl.carousel.min.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font/demo-beauty.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/font/style.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/alert/toastr.min.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('asset/table/bootstrap-table.min.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/jquery-ui.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <div class="welcome-msg">
                            <a href="contact-us.html" class="contact"><i class="d-icon-map"></i>
                                @lang('auth.store')
                            </a>
							<a href="#" class="help"><i class="d-icon-info"></i>@lang('auth.shipping')</a>
                        </div>
                    </div>
                    <div class="header-right">

                        <a class="call" href="tel:#06567219257">
                            <i class="d-icon-phone"></i>
                            <span>@lang('auth.call') </span>+6567219257
                        </a>
                        @auth
                            <a href="{{ URL::signedRoute('users.wishlist.index') }}" class="wishlist"><i
                                    class="d-icon-heart"></i>@lang('auth.wishlist')</a>
                            <div class="dropdown ml-5">
                               <a href="#"><i class="d-icon-user"></i> &nbsp;
                                   @lang('auth.account')</a>
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

                                {{-- <li><a href="{{ route('Referal') }}">@lang('auth.Refer')</a></li> --}}
                                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div> --}}

                            </ul>
                            </div>


                            <div class="dropdown cart-dropdown  type3 ml-2">
                                <a href="{{ URL::signedRoute('users.cart.index') }}" class="cart-toggle">
                                    <i class="d-icon-bag"></i>
                                    @lang('auth.cart') <span id="all_cart_count"> </span>
                                </a>
                                <div class="cart-overlay"></div>
                            </div>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="___class_+?15___"><i class="d-icon-user"></i> &nbsp;
                                @lang('auth.login')
                            </a>
                        @endguest


                        <div class="dropdown">
                            <a href="#currency">@lang('auth.usd')</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">@lang('auth.usd')</a></li>
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
                <div class="container-fluid">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle mr-0">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="#" class="logo d-none d-lg-block">
                            <img src="{{ asset('asset/image/logo.png') }}" alt="logo" class="img-responsive" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-center d-flex justify-content-center">
                        <a href="#" class="logo d-block d-lg-none">
                            <img src="{{ asset('asset/image/logo.png') }}" alt="logo" width="154" height="43" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-right">
                        <nav class="main-nav mr-4">
                            <ul class="menu menu-active-underline">
                                <li class="active">
                                    <a href="{{ url('/') }}">@lang('auth.home')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('user.SalesPerformance')</a>
                                    <ul>
                                        <li><a href="{{route ('MLM.direct_bonus.index')}}">@lang('user.DirectBonus')</a>
                                        </li>
                                        <li><a href="{{route ('MLM.matching_bonus.index')}}">@lang('user.MatchingBonusHistory')</a></li>
                                        <li><a href="{{route ('MLM.leadership_bonus_details.index')}}">@lang('user.LeadershipBonusHistory')</a></li>   
                                   </ul>
                              </li>
                                 <li>
                                    <a href="#">@lang('user.MemberCenter')</a>
                                    <ul>
                                        <li><a href="{{ URL::signedRoute('MLM.withdrawform.index') }}">@lang('user.CashWithdrawl')</a></li>
                                        <li><a href="{{ URL::signedRoute('MLM.loyalitypoints_withdraw.index') }}">@lang('user.LoyalityPointsWallet')</a></li>
                                         <li><a href="{{ URL::signedRoute('MLM.transfer_points.index') }}">@lang('user.TransferFunds')</a></li>
                                    </ul>
                                </li>                
                                <li><a href="{{URL::signedRoute('MLM.tree.index')}}">@lang('user.Genealogy')</a>
                                </li>                                
                            </ul>
                        </nav>


                        <span class="divider mr-4"></span>

                    </div>
                </div>
            </div>
        </header>


        {{-- main data --}}
        @yield('content')
        {{-- end main data --}}









        <footer class="footer">
            <div class="container">
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="widget widget-about">
                                <a href="demo-beauty.html" class="logo-footer">
                                    <img src="{{ asset('asset/image/font/footer-logo.png') }}" alt="logo-footer"
                                        width="154" height="43">
                                </a>
                                <div class="widget-body">

                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="widget">
                                         <h4 class="widget-title">@lang('auth.aboutus')</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="{{url('about')}}">@lang('auth.aboutus')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.order')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Returns')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Custom')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.terms')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Widget -->
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="widget">
                                        <h4 class="widget-title">@lang('auth.customer')</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="">@lang('auth.payment')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.money')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Returns')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Custom')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.terms')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Widget -->
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-0 widget">
                                        <h4 class="widget-title">@lang('auth.account')</h4>
                                        <ul class="widget-body">
                                            @if (!Auth::user())
                                                <li>
                                                    <li>
                                                <a href="">@lang('auth.sign')</a>
                                            </li>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="">@lang('user.My Profile')</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="">@lang('auth.View')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.wish')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.track')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.help')</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Footer Middle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <figure class="payment">
                            @lang('user.Powered By')
                            <img src="{{ asset('asset/image/font/mctpay1.png') }}" alt="payment" width="159"
                                height="29">
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">@lang('user.developedBy') <a
                                href="https://bizzmanweb.sg/">@lang('user.Bizzmanweb')</a></p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                            <a href="#" class="social-link social-youtube fab fa-youtube"></a>
                            <a href="#" class="social-link social-wechat fab fa-weixin"></a>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>

    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="@lang('user.search')" required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End Search Form -->
            <ul class="mobile-menu mmenu-anim">
                <li>
                    <a href="index.html">@lang('auth.home')</a>
                </li>
                <li>
                    <a href="about-us.html">@lang('auth.About')</a>
                </li>
               
                <li>
                    <a href="#">@lang('auth.Products')</a>
                    <ul>
                        <li><a href="{{url('products')}}">@lang('auth.product name1')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name2')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name3')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name4')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name5')</a></li>
                        
                    </ul>
                </li>
              
             
                <li>
                    <a href="contact-us.html">@lang('auth.Contact') </a>
                </li>
                
            </ul>
            <!-- End MobileMenu -->
        </div>
    </div>

    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/alert/toastr.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-ui.js') }}"></script>
    {{-- <script src="{{ asset('public/frontend/vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('public/frontend/js/main.min.js') }}"></script> --}}
    <script src="{{ asset('asset/js/font/parallax.min.js') }}"></script>
    <script src="{{ asset('asset/js/font/owl.carousel.min.js') }}"></script>

    {{-- <script src="{{ asset('asset/table/bootstrap-table-mobile.min.js') }}"></script>
    <script src="{{ asset('asset/table/bootstrap-table-custom-view.js') }}"></script> --}}

    <script src="{{ asset('asset/table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('asset/table/bootstrap-table-custom-view.js') }}"></script>

    <script src="{{ asset('asset/js/font/main.min.js') }}"></script>
    
   <script>
   
   function changeLanguage(lang){
		//sse.preventDefault();
		//alert(lang);
        window.location='{{url("change-language")}}/'+lang;
	}
	
	</script>


    @yield('javascript')

</body>

</html>
