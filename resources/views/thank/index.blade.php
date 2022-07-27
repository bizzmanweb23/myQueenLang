@extends('mlmuser.cart.layouts.master')
@section('title', 'Myqueen | Thank')
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

    <style>
        td {
            font-weight: bold;
        }

    </style>
    <main class="main single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <section class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 mx-auto">
                                <div class="row aiz-steps arrow-divider">
                                    <div class="col active">
                                        <div class="text-center text-primary">
                                            <i class="la-3x mb-2 las la-check-circle"></i>
                                            <h3 class="fs-14 fw-600 d-none d-lg-block"> @lang('user.Confirmation')
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>


                @php
                    $data = json_decode(json_encode($order_summary));
                @endphp
                <section class="py-4">
                    <div class="container text-left">
                        <div class="row">
                            <div class="col-xl-8 mx-auto">
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body">
                                        <div class="text-center py-4 mb-4">
                                            <i class="la la-check-circle la-3x text-success mb-3"></i>
                                            <h1 class="h3 mb-3 fw-600">@lang('user.Thanks')</h1>
                                            <h2 class="h5">@lang('user.OrderCode') <span
                                                    class="fw-700 text-primary">{{ $data->order_no }}</span></h2>
                                            <p class="opacity-70 font-italic">
                                               @lang('user.copyEmail')</p>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class="fw-600 mb-3 fs-17 pb-2">@lang('user.OrderSummary')</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.OrderCode')</td>
                                                            <td>{{ $data->order_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.name')</td>
                                                            <td>{{ $data->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.email')</td>
                                                            <td>{{ $data->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.ShippingAddress1')</td>
                                                            <td>{{ $data->shipping_address }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.Orderdate')</td>
                                                            <td>{{ date('d-M-y', strtotime($data->order_date)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.orderstatus')</td>
                                                            <td>{{ $data->order_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.orderAmount')</td>
                                                            <td>{{ $data->total_order_amount }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.shipping')</td>
                                                            <td>{{ $data->shipping }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">@lang('user.payment1')</td>
                                                            <td>{{ $data->payment_method }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-600 mb-3 fs-17 pb-2">@lang('user.OrderDetails')</h5>
                                            <div>
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th width="30%">@lang('user.Product')</th>
                                                            <th>@lang('user.name')</th>
                                                            <th>@lang('user.Quantity')</th>
                                                            <th>@lang('user.DeliveryType')</th>
                                                            <th class="text-right">@lang('user.Price')</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($order_details as $key => $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>
                                                                    <img src="{{ asset($item->image) }}" alt=""
                                                                        class="img-fluid">
                                                                </td>
                                                                <td>
                                                                    {{ $item->title }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->qun }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->shipping_method }}
                                                                </td>
                                                                <td class="text-right">
                                                                    ${{ $item->saleprice * $item->qun }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                                    <table class="table ">
                                                        <tbody>
                                                            <tr>
                                                                <th>@lang('user.Subtotal')</th>
                                                                <td class="text-right">
                                                                    <span
                                                                        class="fw-600">${{ $data->sub_total }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>@lang('user.shipping')</th>
                                                                <td class="text-right">
                                                                    <span
                                                                        class="font-italic">${{ $data->shipping_charge }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>@lang('user.CouponDiscount')</th>
                                                                <td class="text-right">
                                                                    <span
                                                                        class="font-italic">${{ $data->coupon_discount }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th><span class="fw-600">@lang('user.Total')</span></th>
                                                                <td class="text-right">
                                                                    <strong><span>${{ $data->total_amount }}</span></strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="{{ route('index') }}" class="btn btn-primary">@lang('user.GoToHome')</a>
                            </div>

                        </div>
                    </div>
                </section>



            </div>
        </div>
    </main>

@section('javascript')
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('body').addClass('mainloaded')
            }, [1000])
        });
    </script>
@endsection
@endsection
