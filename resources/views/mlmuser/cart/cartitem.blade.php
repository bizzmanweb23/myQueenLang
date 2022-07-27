<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .btn btn-primary {
        padding: 10px 15px !important;
    }

    .item-price {
        margin-top: 45px
    }

    @media only screen and (max-width: 400px) {
        .btn-remove {
            position: relative;
            top: -84px;
        }

        .cart_middle1 {
            transform: translate(40%, 0);
        }

        .cart_middle2 {
            transform: translate(28%, 0);
        }

        .cart_remove_div {
            transform: translate(20%, 0);
        }

    }

    @media only screen and (max-width: 450px) {
        .btn-remove {
            position: relative;
            top: -84px;
        }

        .cart_middle1 {
            transform: translate(40%, 0);
        }

        .cart_middle2 {
            transform: translate(28%, 0);
        }

        .cart_price_div {
            transform: translate(20%, 0);
        }

        .cart_remove_div {
            transform: translate(20%, 0);
        }

    }

    @media only screen and (max-width: 540px) {
        .btn-remove {
            position: relative;
            top: -84px;
        }

        .cart_middle1 {
            transform: translate(40%, 0);
        }

        .cart_middle2 {
            transform: translate(28%, 0);
        }

        .cart_price_div {
            transform: translate(20%, 0);
        }

        .cart_remove_div {
            transform: translate(20%, 0);
        }

    }

</style>
<div class="row mt-5">
    <div class="col-md-8" id="cart_product_list">
        {{-- <div class="card mycard">
            <div class="card-body p-4">
                <div class="row">
                    <div class="item-img col-md-3 text-center">
                        <a href="app-ecommerce-details.html">
                            <img src="{{ asset('images/product-banner/MQ精华液 MQ Freckles Essence.jpg') }}"
        alt="img-placeholder" style="width: 200px; height: 100%;">
        </a>
    </div>
    <div class="col-md-5 cart_middle">
        <div class="row">
            <div class="col-md-6 mt-9">
                <div class="item-name">
                    <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body" style="display: inline-block;">
                            Debasis</a></h6>
                </div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width:80%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#review" class="link-to-tab rating-reviews" id="rating_count"></a>
                </div>
            </div>

            <div class="col-md-6 mt-9">
                <div class="item-quantity">
                    <span class="quantity-title">Qty:</span>
                    <input id="demo1" type="text" value="1" name="quantity" class="cart_quantity">
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-1  cart_price_div">
        <span class="item-cost">
            <h4 class="item-price">$100
            </h4>
        </span>
    </div>
    <div class="item-options text-center col-md-3  cart_remove_div">
        <div class="item-wrapper">
            <button style="padding: 10px 15px; margin-top:45px" type="button" class=" btn btn-primary float-right btn-remove">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x align-middle me-25">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                <span>Remove</span>
            </button>

        </div>

    </div>

</div>

</div>
</div> --}}



        <div class="card mycard">
            <div class="card-body p-4">
                @foreach ($cartdata as $cart)
                    <input type="hidden" id="cart_id" value="{{ $cart->id }}">
                    <div class="row">
                        <div class="item-img col-md-4 text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="{{ asset('images/product-banner/MQ精华液 MQ Freckles Essence.jpg') }}"
                                    alt="img-placeholder" style="width: 200px; height: 100%;">
                            </a>
                        </div>
                        <div class="col-md-5 ">
                            <div class="row">
                                <div class="col-md-6 mt-9 cart_middle1">
                                    <div class="item-name ">
                                        <h6 class="mb-0"><a href="" class="text-body"
                                                style="display: inline-block;">
                                                {{ $cart->title }}
                                            </a>
                                        </h6>
                                    </div>

                                    <div class="ratings-container ">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:80%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#review" class="link-to-tab rating-reviews" id="rating_count"></a>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-9 cart_middle2">
                                    <div class="item-quantity">
                                        <span class="quantity-title">Qty:</span>
                                        <input id="quantity" type="text" value=" " name="quantity"
                                            class="cart_quantity">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="item-options text-center col-md-3 ">
                            <div class="item-wrapper">
                                <button style="padding: 10px 15px;" type="button" class=" btn btn-primary float-right"
                                    id="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x align-middle me-25">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    <span>Remove</span>
                                </button>
                                <div class="item-cost">
                                    <input type="hidden" id="item_price" value="{{ $cart->saleprice }}">
                                    <h4 class="item-price" id="item_price_final">${{ $cart->saleprice }}
                                    </h4>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card mycard">
            <div class="card-body">
                {{-- <label class="section-label form-label mb-1">Options</label> --}}
                <div class="row">
                    {{-- <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="Coupons" aria-label="Coupons"
                            aria-describedby="input-coupons">
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-primary" id="input-coupons" style="padding: 11px;">Apply</button>
                </div> --}}
                </div>
                <hr>
                <div class="price-details">
                    <h6 class="price-title">Price Details</h6>
                    <ul class="list-unstyled">
                        <li class="price-detail ">
                            <div class="detail-title">Product Subtotal</div>
                            <div class="detail-amt total_cart_amount" id="subtotal"></div>
                        </li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="price-detail">
                            <div class="detail-title detail-total">Total</div>
                            <div class="detail-amt fw-bolder total_cart_amount" id="total"></div>
                        </li>
                    </ul>
                    <button type="button"
                        class="btnNext btn btn-primary w-100 btn-next place-order waves-effect waves-float waves-light"
                        id="place_order_btn">Place
                        Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right",
            "font": "20px"
        };

        $('#quantity').on('change', function() {
            var id = $('#cart_id').val();
            var quantity = $('#quantity').val();
            var item_price = $('#item_price').val();
            var subtotal = $('#subtotal').val();
            var total = $('#total').val();
            var item_price_final = quantity * item_price;
            var final_subtotal = item_price_final;
            var final_total = item_price_final;
            $('#item_price_final').html('$' + item_price_final);
            $('#subtotal').html('$' + final_subtotal);
            $('#total').html('$' + final_total);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/mlm-user/update-cart/' + id,
                type: 'POST',
                data: {
                    quantity: quantity
                },
                success: function(response) {
                    console.log('updated');
                    toastr.success(response.success);
                },
            });
        });
        $('#remove').on('click', function() {
            var id = $('#cart_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/mlm-user/delete-cart/' + id,
                type: 'POST',
                success: function(response) {
                    // window.location.href = '/mlm-user/cart';
                    toastr.success(response.success);
                },
            });
        });
    });
</script>
