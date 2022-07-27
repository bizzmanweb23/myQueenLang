@extends('font.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/mycss.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font/order_tracker.css') }}">
    <style>
        .btn-sm.btn-icon {
            padding: 1.416rem;
        }

        .btn i {
            display: inline-block;
            vertical-align: middle;
            margin-left: -0.9rem;
            margin-top: -1.9rem;
            line-height: 0;
            font-size: 1.9rem;
        }

        .card .card-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            position: relative;
            padding: 12px 25px;
            border-bottom: 1px solid #ebedf2;
            min-height: 50px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            background-color: transparent;
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important;
        }

        .h6,
        h6 {
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.2;
        }

        .bold {
            font-weight: bold;
        }

        td {
            font-size: 15px;
        }

    </style>
    @php
    $data = json_decode(json_encode($order_summary));
    @endphp
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="row">
                    <div class="card mt-4">
                        <div class="card-header">
                            <b class="fs-15">@lang('order.Order Summary')</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Order Code'):</td>
                                            <td>{{ $data->order_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Customer'):</td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Email'):</td>
                                            <td>
                                                {{ $data->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Shipping address'):</td>
                                            <td>
                                                {{ $data->shipping_address }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Order date'):</td>
                                            <td>
                                                {{ date('d-M-Y', strtotime($data->order_date)) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Order status'):</td>
                                            <td>

                                                @if ($data->status_id == 1)
                                                    <span class="badge badge-inline badge-primary">@lang('order.Processing')</span>
                                                @elseif($data->status_id == 2)
                                                    <span class="badge badge-inline badge-dark">@lang('order.OrderPlaced')
                                                    </span>
                                                @elseif($data->status_id == 3)
                                                    <span class="badge badge-inline badge-info">@lang('order.Intransit')</span>
                                                @elseif($data->status_id == 4)
                                                    <span class="badge badge-inline badge-success">@lang('order.On The Way')</span>
                                                @elseif($data->status_id == 5)
                                                    <span class="badge badge-inline badge-success">@lang('order.Delivered')</span>
                                                @elseif($data->status_id == 6)
                                                    <span class="badge badge-inline badge-danger">@lang('order.Cancelled')</span>
                                                @else
                                                    <span class="badge badge-inline badge-success">@lang('order.Self-Pickup')</span>
                                                    @if ($data->self_pick_order_status == 4)
                                                        <span class="badge badge-inline badge-warning">@lang('order.Pendingcollection')</span>
                                                    @elseif ($data->self_pick_order_status == 5)
                                                        <span class="badge badge-inline badge-success">@lang('order.Complete')</span>
                                                    @elseif($data->self_pick_order_status == 6)
                                                        <span class="badge badge-inline badge-danger">@lang('order.Cancelled')</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Total order amount'):</td>
                                            <td>
                                                ${{ $data->total_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Shipping method'):</td>
                                            <td>{{ $data->shipping_method }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('order.Payment method'):</td>
                                            <td>{{ $data->payment_method }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card mt-4">
                            <div class="card-header">
                                <b class="fs-15">@lang('order.Order Details')</b>
                            </div>
                            <div class="card-body pb-0">
                                <table class="table table-borderless table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="30%">@lang('user.Product')</th>
                                            <th>@lang('user.Name')</th>
                                            <th>@lang('user.Quantity')</th>
                                            <th>@lang('order.Delivery Type')</th>
                                            <th>@lang('user.Price')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
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
                                                <td class="">
                                                    ${{ $item->saleprice * $item->qun }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mt-4">
                            <div class="card-header">
                                <b class="fs-15">@lang('order.Order Amount')</b>
                                @if ($data->payment_status == 1)
                                    <span class="badge badge-inline badge-success">@lang('order.Approve')</span>
                                @else
                                    <span class="badge badge-inline badge-danger">@lang('order.Pending')</span>
                                @endif
                            </div>
                            <div class="card-body pb-0">

                                <table class="table table-borderless">
                                    <tbody>
                                        @if ($show_payment == 1)
                                            <tr>
                                                <td class="w-50 fw-600 bold">@lang('order.Payment Proof')</td>
                                                <td class="text-right">
                                                    <span class="strong-600">
                                                        <img src="{{ asset($payment) }}" alt="" width="100">
                                                    </span>
                                                </td>
                                            </tr>

                                        @endif
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('user.Subtotal')</td>
                                            <td class="text-right">
                                                <span class="strong-600">${{ $data->sub_total }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('user.shipping')</td>
                                            <td class="text-right">
                                                <span class="text-italic">${{ $data->shipping_charge }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('user.Coupons')</td>
                                            <td class="text-right">
                                                <span class="text-italic">${{ $data->coupon_discount }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600 bold">@lang('user.Total')</td>
                                            <td class="text-right bold">
                                                <strong><span>${{ $data->total_amount }}</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    @if ($data->status_id == 0 && $data->in_house_status != null)
                        <div class="col-lg-9">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <b class="fs-15">@lang('order.Pickup Point Details')</b>
                                </div>
                                <div class="card-body pb-0">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="w-50 fw-600 bold">@lang('user.Name')</td>
                                                <td class="text-right">
                                                    <span class="strong-600">{{ $data->branch_name }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600 bold">@lang('user.Address')</td>
                                                <td class="text-right">
                                                    <span class="text-italic">{{ $data->branch_address }}</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="w-50 fw-600 bold">@lang('user.ZIP')</td>
                                                <td class="text-right">
                                                    <span class="text-italic">{{ $data->branch_zip }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600 bold">@lang('user.Country')</td>
                                                <td class="text-right bold">
                                                    <strong><span>{{ $data->branch_country }}</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->status_id > 0)
                        <div class="col-lg-12">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <b class="fs-15">@lang('order.Order Ship Details')</b>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="card card-timeline px-2 border-none">
                                        <ul class="bs4-order-tracking">
                                            <li class="step active">
                                                <div><i class="fas fa-hourglass-half"></i></i></div> @lang('order.Processing')
                                            </li>
                                            <li class="step  @if ($data->status_id >= 2) active @endif">
                                                <div><i class="fas fa-user"></i></div> @lang('order.OrderPlaced')
                                            </li>
                                            <li class="step @if ($data->status_id >= 3) active @endif">
                                                <div><i class="fas fa-bread-slice"></i></div> @lang('order.Intransit')
                                            </li>
                                            <li class="step @if ($data->status_id >= 4) active @endif">
                                                <div><i class="fas fa-truck"></i></div> @lang('order.Out for delivery')
                                            </li>
                                            <li class="step @if ($data->status_id >= 5) active @endif">
                                                <div><i class="fas fa-birthday-cake"></i></div> @lang('order.Delivered')
                                            </li>
                                        </ul>
                                        @if ($data->status_id == 1)
                                            <h5 class="text-center"><b>@lang('order.InProcessing')</b>. @lang('order.orderplaced1')</h5>
                                        @elseif ($data->status_id == 2)
                                            <h5 class="text-center"><b>@lang('order.InPlaced')</b>. @lang('order.orderinTransit')</h5>
                                        @elseif ($data->status_id == 3)
                                            <h5 class="text-center"><b>@lang('order.Intransit')</b>. @lang('order.ordershipped')</h5>
                                        @elseif ($data->status_id == 4)
                                            <h5 class="text-center"><b>@lang('order.Indelivery')</b>. @lang('order.outdelivery')</h5>
                                        @else
                                            <h5 class="text-center"><b>@lang('order.Delivery')</b>. @lang('order.orderDelivery')</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
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
