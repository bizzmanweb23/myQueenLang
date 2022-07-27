@extends('frontend.layouts.master')
@section('title','Myqueen | Contact')
@section('body')
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="index.html">@lang('auth.home')</a>
            </li>
            <li>
                <a href="about-us.html">@lang('auth.About')</a>
            </li>
           
            <li>
                <a href="#">Products</a>
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
    </div>
</div>

<main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
                        <li>@lang('auth.contactus')</li>
                    </ul>
                </div>
            </nav>
            <div class="page-header" style="background-image: url(images/Contact-us-us-.jpg)">
                <!-- <h1 class="page-title font-weight-bold text-capitalize ls-l">Contact Us</h1> -->
            </div>
            <div class="page-content mt-10 pt-7">
                <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4">
                                <div class="grey-section d-flex align-items-center h-100">
                                    <div>
                                        <h4 class="mb-2 text-capitalize">@lang('auth.address')</h4>
                                       <p>@lang('auth.address1')
                                    </p>

                                        <h4 class="mb-2 text-capitalize">@lang('auth.phone')</h4>
                                        <p>
                                            <a href="tel:#">+65 67219257
                                            </a>
                                            
                                        </p>

                                        <h4 class="mb-2 text-capitalize">@lang('auth.emailSupport')</h4>
                                        <p class="mb-4">
                                            <a href="#">Xizhiyanbiotechlab@gmail.com</a><br>
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                                <div class="w-100">
                                    <form class="pl-lg-2" action="#">
                                        <h4 class="ls-m font-weight-bold">@lang('auth.Let’s Connect')</h4>
                                        <p>@lang('auth.emailMsg')</p>
                                        <div class="row mb-2">
                                           
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="text" placeholder="Name *" required>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="email" placeholder="Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <textarea class="form-control" required
                                                placeholder="Comment*"></textarea>
                                        </div>
                                        <button class="btn btn-dark btn-rounded">@lang('auth.submit')<i
                                                class="d-icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End About Section-->

          
                <!-- End Store Section -->

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7733194199077!2d103.86092671457259!3d1.3113809990435397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19c656a5714d%3A0xa0fec5130a46b7d4!2sCT%20Hub%202!5e0!3m2!1sen!2sin!4v1622013362627!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                
                <!-- End Map Section -->
            </div>
        </main>
        <!-- End Main -->
@endsection