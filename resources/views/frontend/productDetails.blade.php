
@extends('frontend.layouts.master')
@section('title', 'Myqueen | Product')
@section('body')
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
                                <label class="product-label label-new">new</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <div class="product-navigation">
                                <ul class="breadcrumb breadcrumb-lg">
                                    <li><a href=""><i class="d-icon-home"></i></a></li>
                                    <li><a href="#" class="active">Products</a></li>
                                    <li>Detail</li>
                                </ul>


                            </div>

                            <h1 class="product-name">{{ $product_data->title }}</h1>
                            <div class="product-meta">
                                <span class="product-sku">Singapore MY QUEEN brand
                                </span>

                            </div>
                            <div class="product-price">${{ $product_data->saleprice }}</div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 reviews )</a>
                            </div>
                            <p class="product-short-desc">1 Set = 1 Unit, 1 unit 30ml, Price: USD 88, PV88 (Credit) </p>



                            <hr class="product-divider">



                            <div class="product-form product-qty">
                                <div class="product-form-group">
                                    <div class="input-group mr-2">
                                        <a class="quantity-minus d-icon-minus" style="font-size: 28px;"></a>
                                        <input class="quantity form-control" type="number" min="1" max="1000000" name="quantity"
                                            id="cart_quentity" value="1">
                                        <a class="quantity-plus d-icon-plus" style="font-size: 28px;"></a>
                                    </div>
                                    {{-- <div class="product-action">
                                        <button type="submit" class="btn btn-primary"><i class="d-icon-bag"></i> Add
                                            to Cart</button>
                                    </div> --}}

                                    <button class="btn btn-primary" onclick="add_to_cart()">
                                        <i class="loading-icon fa fa-spinner fa-spin" id="add_cart_spin"
                                            style="display: none">
                                        </i>
                                        <i class="d-icon-bag" style="margin-top: -4px;padding: 4px;"></i> Add to
                                        Cart
                                    </button>

                                </div>
                            </div>

                            <hr class="product-divider mb-3">

                            <div class="product-footer">

                                <span class="divider d-lg-show"></span>
                                <a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i>Add to
                                    wishlist</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab tab-nav-simple product-tabs">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#product-tab-description">Components</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-effect">Major Effects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-method">Use Method</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#review">Review</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="product-tab-description">
                            <div class="row mt-6">
                                <div class="col-md-6">
                                    <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Main Components</h5>
                                    <p class="mb-2">
                                        Water; Benzoic acid, 3,4,5-trihydroxybenzoic acid; Tranexamic acid; Nicotinamide;
                                        Glycerol;
                                        Dipropyl glycol; Hydroxy acetophenone; Potassium glycyrrhizinate; Octanediol;
                                        1-aminoethyl
                                        phosphinic acid; Sodium hyaluronate; N-acetyl-D-glucosamine; Allantoin; EDTA
                                        tetrasodium;
                                        xanthan

                                    </p>

                                    <h5 class="description-title mb-3 font-weight-semi-bold ls-m"> Introduction of main
                                        components:

                                    </h5>
                                    <ul>
                                        <li>Tranexamic Acid (Tranexamic Acid)
                                            Effectively reduce melanin generation, brightening whitening effect.
                                            Effectively reduce plaques and pockmarks
                                        </li>
                                        <hr>
                                        <li>3,4,5-trihydroxybenzoic Acid (Gallic Acid)
                                            Also known as gallic acid.
                                            Anti-inflammatory, anti-oxidation, anti-free radical and other biological
                                            activities,
                                            effectively prevent DNA damage, uniform skin color.
                                        </li>
                                        <hr>
                                        <li>Niacinamide (Niacinamide)
                                            Also known as Vitamin B3 (Vitamin B3)
                                            Accelerate metabolism, accelerate the horniness that contains melanocyte to fall
                                            off,
                                            stimulate the cell vitality that has decayed a few, promote the synthesis of
                                            collagen,
                                            prevent melanin excessive ad cool-headed, achieve the effect of whitening.
                                            Promote the synthesis of the protein in the epidermis, enhance the defense
                                            ability of
                                            the skin, increase the moisture content of the skin, reduce the wrinkle, dark
                                            yellow and
                                            stain of the face.
                                            Can reach narrow pores. Acne.
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
                            <h2>Major Effects
                            </h2>
                            <ul>
                                <li>Reduced aperture
                                </li>
                                <li>Prevent DNA damage caused by UV light</li>
                                <li>Prevents melanin production
                                </li>
                                <li>Reduces vasodilation and redness
                                </li>
                                <li>Reduces inflammation</li>
                                <li>Stop melanin transfer
                                </li>
                                <li>Skin Brightening
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane " id="product-method">

                            <h2>Use Method</h2>
                            <ul>
                                <li>
                                    Wash your face.

                                </li>
                                <li>MQ Anti-Blu-ray Fine Spray
                                </li>
                                <li>Then apply MQ freckle essence
                                </li>
                                <li>sooner or later
                                </li>
                                <li>28-day cycle
                                </li>
                                <li>Obviously see the effect of desalination freckle
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
                                                    <span class="comment-date text-body">June 22, 2021 at 4:42
                                                        pm</span>
                                                    <h4><a href="#">John Doe</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                        libero sodales leo,
                                                        eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                                                        Suspendisse potenti.
                                                        Sed egestas, ante et vulputate volutpat, eros pede semper
                                                        est, vitae luctus metus libero eu augue.</p>
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
                                                    <span class="comment-date text-body">June 22, 2021 at 9:42
                                                        pm</span>
                                                    <h4><a href="#">John Doe</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                        libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
                                                        mollis.
                                                        Ut justo. Suspendisse potenti. Sed egestas, ante et
                                                        vulputate volutpat,
                                                        eros pede semper est, vitae luctus metus libero eu augue.
                                                        Morbi purus libero,
                                                        faucibus adipiscing, commodo quis, avida id, est. Sed
                                                        lectus. Praesent elementum
                                                        hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                                        volutpat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <div class="rating-form">
                                    <label for="rating" class="text-dark">Your rating * </label>
                                    <span class="rating-stars selected">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4 active" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <input type="text" class="form-control" id="reply-name" name="reply-name"
                                                placeholder="Name *" required="">
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <input type="email" class="form-control" id="reply-email" name="reply-email"
                                                placeholder="Email *" required="">
                                        </div>
                                    </div>
                                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                        placeholder="Comment *" required=""></textarea>

                                    <div class="form-checkbox mb-4">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                            name="signin-remember">
                                        <label class="form-control-label" for="signin-remember">
                                            Save my name, email, and website in this browser for the next time I
                                            comment.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded">Submit<i
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
                    quantity: $('#cart_quentity').val()
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
                    window.location.href = '/frontend/products';
                },
                error: function(error) {
                    $('#add_cart_spin').hide()
                    console.log(error)
                    if (error.status == 401) {
                        toastr.error('Please Login');
                    }
                }
            })
        }
    </script>
@endsection

@endsection
