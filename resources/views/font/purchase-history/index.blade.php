@extends('font.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/mycss.css') }}">
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

        .aiz-table thead th {
            border-top: 0;
            border-bottom: 1px solid #eceff7;
        }

        .aiz-table th {
            padding: 1rem 0.75rem;
        }

        .aiz-table td,
        .aiz-table th {
            padding: 1rem 0.75rem;
        }

    </style>
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">@lang('order.PurchaseHistory')</h5>
                    </div>
                    <div class="card-body">
                        <table class="table aiz-table mb-0 footable footable-1 breakpoint-xl">
                            <thead>
                                <tr>
                                    <th>@lang('order.Code')</th>
                                    <th data-breakpoints="md">@lang('order.Date')</th>
                                    <th>@lang('wallet.Amount')</th>
                                    <th data-breakpoints="md">@lang('order.Delivery')</th>
                                    <th data-breakpoints="md">@lang('order.Payment')</th>
                                    <th class="text-right">@lang('order.Options')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $item->order_unique }}
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            {{ $item->total }}
                                        </td>
                                        <td>
                                            @if ($item->status_id == 1)
                                                <span class="badge badge-inline badge-primary">@lang('order.Processing')</span>
                                            @elseif($item->status_id == 2)
                                                <span class="badge badge-inline badge-dark">@lang('order.OrderPlaced')
                                                </span>
                                            @elseif($item->status_id == 3)
                                                <span class="badge badge-inline badge-info">@lang('order.Intransit')</span>
                                            @elseif($item->status_id == 4)
                                                <span class="badge badge-inline badge-success">@lang('order.On The Way')</span>
                                            @elseif($item->status_id == 5)
                                                <span class="badge badge-inline badge-success">@lang('order.Delivered')</span>
                                            @elseif($item->status_id == 6)
                                                <span class="badge badge-inline badge-danger">@lang('order.Cancelled')</span>
                                            @else
                                                <span class="badge badge-inline badge-info">@lang('order.Self-Pickup')</span>
                                                @if ($item->self_pick_order_status == 4)
                                                    <span class="badge badge-inline badge-warning">@lang('order.Pendingcollection')</span>
                                                @elseif ($item->self_pick_order_status == 5)
                                                    <span class="badge badge-inline badge-success">@lang('order.Complete')</span>
                                                @elseif($item->self_pick_order_status == 6)
                                                    <span class="badge badge-inline badge-danger">@lang('order.Cancelled')</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->payment_status == 1)
                                                <span class="badge badge-inline badge-success">@lang('order.Approve')</span>
                                            @else
                                                <span class="badge badge-inline badge-danger">@lang('order.Pending')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ URL::signedRoute('users.purchase_history.show', $item->id) }}"
                                                class="btn btn-soft-info btn-icon btn-circle btn-sm" title="Order Details">
                                                <i class="las la-eye"></i>
                                            </a>
                                            <a class="btn btn-soft-warning btn-icon btn-circle btn-sm"
                                                href="{{ URL::signedRoute('users.invoice.show', $item->id) }}"
                                                title="Download Invoice">
                                                <i class="las la-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="aiz-pagination">
                            {{ $data->links() }}
                        </div>
                    </div>
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
