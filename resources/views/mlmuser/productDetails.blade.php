@extends('mlmuser.layouts.master')
@section('title', 'Myqueen | Product')
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

    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="product product-single row mb-7">
                    <div class="col-md-6 sticky-sidebar-wrapper">
                        <div class="product-gallery pg-vertical sticky-sidebar" data-sticky-options="{'minWidth': 767}">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-1.jpg') }}"
                                        alt="MQ Freckles Essence">
                                </figure>
                                <figure class="product-image">
                                    <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-2.jpg') }}"
                                        alt="MQ Freckles Essence">
                                </figure>
                                <figure class="product-image">
                                    <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-3.jpg') }}"
                                        alt="MQ Freckles Essence">
                                </figure>

                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-1.jpg') }}"
                                            alt="MQ Freckles Essence" width="109" height="122">
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-2.jpg') }}"
                                            alt="MQ Freckles Essence" width="109" height="122">
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{ asset('images/product/MQ精华液-MQ-Freckles-Essence/MQ-3.jpg') }}"
                                            alt="MQ Freckles Essence" width="109" height="122">
                                    </div>

                                </div>
                                <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-new">@lang('auth.new')</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <div class="product-navigation">
                                <ul class="breadcrumb breadcrumb-lg">
                                    <li><a href=""><i class="d-icon-home"></i></a></li>
                                    <li><a href="#" class="active">@lang('auth.Products')</a></li>
                                    <li>@lang('auth.Detail')</li>
                                </ul>


                            </div>

                            <h1 class="product-name">{{ $product_data->title }}</h1>
                            <div class="product-meta">
                                <span class="product-sku">@lang('auth.MyQueen')
                                </span>

                            </div>
                            <div class="product-price">${{ $product_data->saleprice }}</div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 @lang('auth.reviews') )</a>
                            </div>
                            <p class="product-short-desc">@lang('auth.set') </p>



                            <hr class="product-divider">



                            <div class="product-form product-qty">
                                <div class="product-form-group">
                                    <div class="input-group mr-2">
                                        <a class="quantity-minus d-icon-minus" style="font-size: 28px;"></a>
                                        <input class="quantity form-control" type="number" min="1" max="1000000" name="quantity"
                                            id="cart_quantity" value="1">
                                        <a class="quantity-plus d-icon-plus" style="font-size: 28px;"></a>
                                    </div>
                                    {{-- <div class="product-action">
                                        <button type="submit" class="btn btn-primary"><i class="d-icon-bag"></i> @lang('auth.addCart')</button>
                                    </div> --}}

                                    <button class="btn btn-primary" onclick="add_to_cart()">
                                        <i class="loading-icon fa fa-spinner fa-spin" id="add_cart_spin"
                                            style="display: none">
                                        </i>
                                        <i class="d-icon-bag" style="margin-top: -4px;padding: 4px;"></i> @lang('auth.addCart')
                                    </button>

                                </div>
                            </div>

                            <hr class="product-divider mb-3">

                            <div class="product-footer">

                                <span class="divider d-lg-show"></span>
                                <a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i>@lang('auth.addWishlist')</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab tab-nav-simple product-tabs">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#product-tab-description">@lang('auth.Components')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-effect">@lang('auth.Major Effects')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-method">@lang('auth.Use Method')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#review">@lang('auth.reviews')</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="product-tab-description">
                            <div class="row mt-6">
                                <div class="col-md-6">
                                    <h5 class="description-title mb-4 font-weight-semi-bold ls-m">@lang('auth.Main Components')</h5>
                                    <p class="mb-2">
                                        @lang('auth.componentsDesc')

                                    </p>

                                    <h5 class="description-title mb-3 font-weight-semi-bold ls-m"> @lang('auth.introductionOfComponents')

                                    </h5>
                                    <ul>
                                        <li>@lang('auth.intro1')
                                        </li>
                                        <hr>
                                        <li>@lang('auth.intro2')
                                        </li>
                                        <hr>
                                        <li>@lang('auth.intro3')
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <img src="images/product/MQ精华液-MQ-Freckles-Essence/海报_02.jpg" class="img-fluid"
                                        alt="">
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="product-effect">
                            <h2>@lang('auth.Major Effects')
                            </h2>
                            <ul>
                                <li>@lang('auth.effect1')
                                </li>
                                <li>@lang('auth.effect2')</li>
                                <li>@lang('auth.effect3')
                                </li>
                                <li>@lang('auth.effect4')
                                </li>
                                <li>@lang('auth.effect5')</li>
                                <li>@lang('auth.effect6')
                                </li>
                                <li>@lang('auth.effect7')
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane " id="product-method">

                            <h2>@lang('auth.Use Method')</h2>
                            <ul>
                                <li>
                                    @lang('auth.method1')

                                </li>
                                <li>@lang('auth.method2')
                                </li>
                                <li>@lang('auth.method3')
                                </li>
                                <li>@lang('auth.method4')
                                </li>
                                <li>@lang('auth.method5')
                                </li>
                                <li>@lang('auth.method6')
                                </li>

                            </ul>
                        </div>
                        <div class="tab-pane " id="review">
                            <div class="comments mb-8 pt-2 pb-2 border-no">
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="images/user.png" alt="avatar">
                                                </a>
                                            </figure>
                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top">4.00</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
                                                    <span class="comment-date text-body">@lang('auth.monthAndTime')</span>
                                                    <h4><a href="#">@lang('auth.John Doe')</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>@lang('auth.comment1')</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="images/user.png" alt="avatar">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top">4.00</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
                                                    <span class="comment-date text-body">@lang('auth.monthAndTime')</span>
                                                    <h4><a href="#">@lang('auth.John Doe')</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>@lang('auth.comment2')</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">@lang('auth.Add a Review')</h3>
                                    <p>@lang('auth.reviewquote')</p>
                                </div>
                                <div class="rating-form">
                                    <label for="rating" class="text-dark">@lang('auth.rating') </label>
                                    <span class="rating-stars selected">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4 active" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">@lang('auth.rate')</option>
                                        <option value="5">@lang('auth.Perfect')</option>
                                        <option value="4">@lang('auth.Good')</option>
                                        <option value="3">@lang('auth.Average')</option>
                                        <option value="2">@lang('auth.Not that bad')</option>
                                        <option value="1">@lang('auth.Very poor')</option>
                                    </select>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <input type="text" class="form-control" id="reply-name" name="reply-name"
                                                placeholder="@lang('user.Name') *" required="">
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <input type="email" class="form-control" id="reply-email" name="reply-email"
                                                placeholder="@lang('user.Email') *" required="">
                                        </div>
                                    </div>
                                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                        placeholder="@lang('user.Comment') *" required=""></textarea>

                                    <div class="form-checkbox mb-4">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                            name="signin-remember">
                                        <label class="form-control-label" for="signin-remember">
                                            @lang('auth.savereview')
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded">@lang('auth.submit')<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Comments -->

                            <!-- End Reply -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
@section('javascript')
    <script>
        function add_to_cart() {
            $.ajax({
                url: "{{ URL::signedRoute('users.cart.index') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    product_id: "{{ request()->id }}",
                    quantity: $('#cart_quantity').val()
                },
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('#add_cart_spin').show()
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.options = {
                            "closeButton": true,
                            "newestOnTop": true,
                            "positionClass": "toast-top-right"
                        };
                        toastr.success(data.message);
                    }
                    $('#add_cart_spin').hide()
                    calculate_cart()
                    window.location.href = '/mlm-user/membership';
                },
                error: function(error) {
                    $('#add_cart_spin').hide()
                    console.log(error)
                    if (error.status == 401) {
                        window.location.href = '/register';
                    }
                }
            })
        }
    </script>
@endsection

@endsection
