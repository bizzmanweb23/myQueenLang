@extends('frontend.layouts.master')
@section('title','Myqueen | About')
@section('body')
<!--?php echo '<pre>'; print_r(session()->get('lang_code'));die;?-->
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
                placeholder="@lang('auth.search')" required />
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
    </div>
</div>

<main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
                        <li>@lang('auth.aboutus')</li>
                    </ul>
                </div>
            </nav>
            <div class="page-header pl-4 pr-4" style="background-image: url(images/about-us-.jpg)">
                
                <!-- <h1 class="page-title font-weight-bold lh-1 text-capitalize">About us</h1> -->
                
            </div>
            <div class="page-content mt-10 pt-10">
              
                <!-- End About Section-->

                <section class="customer-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/brand.jpg" alt="Happy Customer" width="580"
                                        height="507" class="banner-radius" style="background-color: #BDD0DE;" />
                                </figure>
                            </div>
                            <div class="col-md-7 mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal">@lang('auth.aboutus')</h5>
                               
                                <p class="section-desc text-grey">
                                    @lang('auth.myQueenDescription')
                                </p>
                                <p><b>@lang('auth.Brand concept') 
                                </b>@lang('auth.scientifically')</p>
                                <p><b>@lang('auth.Brand mission')</b>
                                    @lang('auth.brandDes')
                                    </p>
                                    <p><b>@lang('auth.Brand policy')</b> @lang('auth.policyDes')
                                    </p>
                                    <p><b>@lang('auth.Brand vision') </b>@lang('auth.visionDes')</p>
                                    <p><b>@lang('auth.Brand culture')</b> @lang('auth.cultureDes')
                                    </p>
                                    <p><b>@lang('auth.Brand slogan')</b> @lang('auth.sloganDes')
                                    </p>
                                <a href="#" class="btn btn-dark btn-link btn-underline ls-m">@lang('auth.contactus')<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Customer Section -->

                <section class="store-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-7 order-md-first mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal mb-1">@lang('auth.Brand Story')</h5>
                                
                                <p class="section-desc text-grey">
                                    @lang('auth.storyDes')
                                    </p>
                                
                            </div>
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/BRAND STORY.jpg" alt="Our Store" width="580" height="507"
                                        class="banner-radius" style="background-color: #DEE6E8;" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Store-section -->

                <section class="customer-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/product development principles.jpg" alt="Happy Customer" width="580"
                                        height="507" class="banner-radius" style="background-color: #BDD0DE;" />
                                </figure>
                            </div>
                            <div class="col-md-7 mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal">@lang('auth.principles')
                                </h5>
                               
                                <p class="section-desc text-grey">
                                    @lang('auth.principleDes')

                                </p>
                                <p>@lang('auth.principleDes1')
                                </p>
                                <p>@lang('auth.principlesDes2')
                                </p>
                                <p>@lang('auth.principlesDes3')
                                </p>
                                <p></p>
                                <a href="#" class="btn btn-dark btn-link btn-underline ls-m">@lang('auth.contactus')<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="store-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-7 order-md-first mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal mb-1">@lang('auth.quality standards')</h5>
                                
                                <p class="section-desc text-grey">
                                   
                                    @lang('auth.qualityDes1')

                                    </p>
                                    <p>@lang('auth.qualityDes2')
                                    </p>
                                    <p><b>@lang('auth.qualityDes3')
                                    </b></p>
                                    <p>@lang('auth.qualityDes4')
                                    </p>
                                
                            </div>
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/Quality Production standards.jpg" alt="Our Store" width="580" height="507"
                                        class="banner-radius" style="background-color: #DEE6E8;" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="customer-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/Operating Strategy.jpg" alt="Happy Customer" width="580"
                                        height="507" class="banner-radius" style="background-color: #BDD0DE;" />
                                </figure>
                            </div>
                            <div class="col-md-7 mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal">@lang('auth.Operating strategy') </h5>
                               
                                <p class="section-desc text-grey">
                                    @lang('auth.opertingDes')         </p>
                                
                                    <p><b>@lang('auth.Development Strategy')
                                    </b></p>
                                    <p>@lang('auth.developmentDes')
                                    </p>
                                <a href="#" class="btn btn-dark btn-link btn-underline ls-m">@lang('auth.contactus')<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="store-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-7 order-md-first mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal mb-1">@lang('auth.Research And Laboratory Facts')</h5>
                                
                                <p class="section-desc text-grey">
                                    @lang('auth.researchDes')

                                    </p>
                                    <p>@lang('auth.researchDes1')
                                    </p>
                                
                            </div>
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/Research and Laboratory facts.jpg" alt="Our Store" width="580" height="507"
                                        class="banner-radius" style="background-color: #DEE6E8;" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="customer-section pb-10 appear-animate">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-4">
                                <figure>
                                    <img src="images/subpages/Biological Health Research.jpg" alt="Happy Customer" width="580"
                                        height="507" class="banner-radius" style="background-color: #BDD0DE;" />
                                </figure>
                            </div>
                            <div class="col-md-7 mb-4">
                                <h5 class="section-subtitle lh-2 ls-md font-weight-normal">@lang('auth.Biological health research')
                                </h5>
                               
                                <p class="section-desc text-grey">
                                    <b>@lang('auth.innovative')</b>
                                   </p>
                                   <p>@lang('auth.innovativeDes')
                                </p>
                                
                                <p><b>@lang('auth.activity')
                                </b>@lang('auth.activityDes')
                                </p>
                                
                                <p><b>@lang('auth.formulation')
                                </b> @lang('auth.formulationDes')
                                </p>
                                
                                <p><b>@lang('auth.industrilization')
                                </b>@lang('auth.industrilizationDesc')
                                </p>
                                
                                <p> <b>@lang('auth.health')
                                </b> @lang('auth.healthDesc')
                                </p>
                               
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- End Main -->
@endsection