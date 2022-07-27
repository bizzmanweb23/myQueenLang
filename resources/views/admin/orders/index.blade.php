@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order list</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                {{-- date --}}
                <div class="row">
                    <div class="col-md-3 mt-2 ">
                        <ul class="nav nav-stacked align-items-center">
                            
                            <label class="control-label col-sm-2">From Date</label>
                            
                                <input type="date" class="form-control" id="dateFrom" name="dateFrom" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mt-2">
                        <ul class="nav nav-stacked align-items-center">
                        <label class="control-label col-sm-2">To Date</label>
                                <input type="date" class="form-control" id="dateTo" name="dateTo" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 mt-5">
                                        <button class="btn btn-primary" data-loading-text="Loading..." id="search" type="search">
                                            <i class="loading-icon fa fa-spinner fa-spin" id="search_form_gene_btnspin" style="display:none"></i>
                                            Search
                                        </button>
                 </div>
                   
                    @php
                        $order_status = App\Models\OrderStatus::get();
                    @endphp
                    <div class="col-md-5 mt-3">
                        <ul class="nav nav-stacked align-items-center">
                        <label class="control-label col-sm-2">Status</label>

                            <li>
                                <select name="" id="order_status" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach ($order_status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    <option value="0">Self Pick</option>
                                </select>
                            </li>
                        </ul>
                    </div>



                </div>

                <div class="row">
                    <div class="col-md-5 mt-3">
                        <ul class="nav nav-stacked align-items-center">
                        <label class="control-label col-sm-2">Payment</label>
                            <li>
                                <select name="" id="payment_status" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="0">Unpaid</option>
                                    <option value="1">Paid</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- end date --}}

                <div class="card-body">
                            <table id="table" class="table table-bordered table-hover" data-ajax="showOrders"
                                data-pagination="true" data-show-columns="true" data-show-pagination-switch="true"
                                data-show-refresh="true" data-search="true" data-show-export="true" >
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer_Name</th>
                                        <th>Total_Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Shipping Charge</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								foreach($result as $data)
								{
								?>
								<tr>
								<td><?php echo $data->order_unique;?></td>
								<td><?php echo $data->customer_name;?></td>
								<td><?php echo $data->order_sum;?></td>
								<td><?php echo $data->discount_amount;?></td>
								<td><?php echo $data->shipping_charge;?></td>
								<td><?php echo $data->total;?></td>
								<td><?php echo $data->payment_status;?></td>
								<td><?php echo $data->date;?></td>
								<td> 


                                     <a rel="id" href="{{route('show_order_details',$data->id)}}"><i class="fa fa-eye"></i></a>  
									<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" title="Download"><i class="fa fa-download"> &nbsp &nbsp </i></a>
                                    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" title="Delete"><i class="far fa-trash-alt"></i></i></a>										
								</td>
								</tr>
								<?php
								}
								?>
								</tbody>
                
    </div>
    {{-- loder --}}
    <div id="order_list_loder" style="display: none">
        @include('admin.loder.index')
    </div>
    {{-- end loder --}}

@section('javascript')
    <script>
        $('#payment_status').change(function() {
            var $select_id = $(this).val();
            var $startDate = $("#dateFrom").val(),
                $endDate = $("#dateTo").val();

            $.ajax({
               
                url: "{{ URL::signedRoute('orders.create') }}",
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    $('#order_list_loder').show();
                },
                success: function(data) {
                    $('#order_list_loder').hide();
                    var my_array;
                    my_array = [];
                    for (var i = 0; i < data.length; i++) {
                        var this_id = data[i].payment_status;
                        var this_date = new Date(data[i].date);
                        this_date = this_date.getFullYear() + "-" + "0" + (this_date.getMonth() + 1) +
                            "-" +
                            ("0" + this_date.getDate()).slice(-2)
                        if ((this_id == $select_id)) {
                            my_array.push(data[i]);
                        }
                        console.log(this_id == $select_id);
                    }
                    $("#table").bootstrapTable("load", my_array);
                },
                error: function(error) {
                    $('#order_list_loder').hide();
                    console.log(error);
                }
            })
        })
        // status filter
        $('#order_status').change(function() {
            var $select_id = $(this).val();
            var $startDate = $("#dateFrom").val(),
                $endDate = $("#dateTo").val();

            $.ajax({
                //url: '/admin/create/'
                url: "{{ route('orders.create') }}",
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    $('#order_list_loder').show();
                },
                success: function(data) {
                    $('#order_list_loder').hide();
                    var my_array;
                    my_array = [];
                    for (var i = 0; i < data.length; i++) {
                        var this_id = data[i].status_id;
                        var this_date = new Date(data[i].date);
                        this_date = this_date.getFullYear() + "-" + "0" + (this_date.getMonth() + 1) +
                            "-" +
                            ("0" + this_date.getDate()).slice(-2)
                        if ((this_id == $select_id)) {
                            my_array.push(data[i]);
                        }
                        console.log(this_id == $select_id);
                    }
                    $("#table").bootstrapTable("load", my_array);
                },
                error: function(error) {
                    $('#order_list_loder').hide();
                    console.log(error);
                }
            })
        })




        $('#dateFrom,#dateTo').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        $("#getJsonSrc").click(function() {
            var $table = $("#table"),
                $startDate = $("#dateFrom").val(),
                $endDate = $("#dateTo").val(),
                $select_id = $('#order_status').val(),
                $jsonSrc = "{{ URL::signedRoute('orders.create') }}";
            $.ajax({
                url: $jsonSrc,
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    $('#order_list_loder').show();
                },
                success: function(data) {
                    $('#order_list_loder').hide();
                    var my_array;
                    my_array = [];
                    for (var i = 0; i < data.length; i++) {
                        var this_id = data[i].status_id;
                        var this_date = new Date(data[i].date);
                        this_date = this_date.getFullYear() + "-" + "0" + (this_date.getMonth() + 1) +
                            "-" +
                            ("0" + this_date.getDate()).slice(-2)
                        if ((this_id == $select_id) || (this_date >= $startDate) && (this_date <=
                                $endDate)) {
                            my_array.push(data[i]);
                        }
                    }
                    $("#table").bootstrapTable("load", my_array);
                },
                error: function(error) {
                    $('#order_list_loder').hide();
                    console.log(error);
                }
            })
        });


        function showuOrders(params) {
            $.ajax({
                type: "GET",
                //url: '/admin/create/'
                url: "{{ URL::signedRoute('orders.create') }}",
                dataType: "json",
                success: function(data) {
                    params.success(data)
                },
                error: function(er) {
                    params.error(er);
                }
            });
        }

        function order_amount(data) {
            return "$" + data;
        }

        function discount_amount(data) {
            return "$" + data;
        }

        function shipping_charge(data) {
            return "$" + data;
        }

        function total(data) {
            return '$' + data;
        }

        function payment_status(data) {
            if (data == 1) {
                return ["<a class='btn btn-soft-success ' href='#' title='Status'>",
                    "Paid",
                    "</a>"
                ].join('');
            } else {
                return ["<a class='btn btn-soft-danger ' href='#' title='Status'>",
                    "Unpaid",
                    "</a>"
                ].join('');
            }
        }

        // order status
        function ordersStatus(data) {
            if (data == 0) {
                return ["<a class='btn btn-soft-success ' href='#' title='Status'>",
                    "Self Pick",
                    "</a>"
                ].join('');
            }
            if (data == 1) {
                return ["<a class='btn btn-soft-warning ' href='#' title='Status'>",
                    "Processing",
                    "</a>"
                ].join('');
            } else if (data == 2) {
                return ["<a class='btn btn-soft-info ' href='#' title='Status'>",
                    "Order Placed",
                    "</a>"
                ].join('');
            } else if (data == 3) {
                return ["<a class='btn btn-soft-dark ' href='#' title='Status'>",
                    "In transit",
                    "</a>"
                ].join('');
            } else if (data == 4) {
                return ["<a class='btn btn-soft-primary ' href='#' title='Status'>",
                    "On The Way",
                    "</a>"
                ].join('');
            } else {
                return ["<a class='btn btn-soft-success ' href='#' title='Status'>",
                    "Delivered",
                    "</a>"
                ].join('');
            }
        }

        // action
        function ordersAction(value, row, index) {
            var order_details = "{{ route('show_order_details', ':id') }}";
            order_details = order_details.replace(":id", row.id);

            var invoice_url = "{{ route('invoice.show', ':id') }}"
            var invoice_url = ""

            invoice_url = invoice_url.replace(":id", row.id);

            return [
                '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="' + order_details + '" title="Edit">',
                '<i class="fa fa-eye" aria-hidden="true"></i>',
                '</a>  ',
                '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' + invoice_url +
                '" title="Download">',
                '<i class="las la-download"></i>',
                '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" title="Delete" onclick="deleteOrder(' +
                row.id + ')">',
                '<i class="las la-trash"></i>',
                '</a>'
            ].join('')
        }


        // delete order
        function deleteOrder(id) {
            $('#order_delete-modal').modal('show');
            $("#order_delete-link").attr("href", id);
        }
        // delete logic
        $('#order_delete-link').click(function(e) {
            e.preventDefault();
            $.ajax({
               // url: '/admin/delete_order/'

                url: "{{ URL::signedRoute('delete_order') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: $(this).attr('href')
                },
                beforeSend: function() {
                    $('#order_list_loder').show()
                }
                success: function(data) {
                    $('#order_list_loder').hide()
                    $('#table').bootstrapTable('refresh')
                    if (data.status == 'success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        $('#order_delete-modal').modal('hide');
                    }
                },
                error: function(error) {
                    $('#order_list_loder').hide()
                    console.log(error)
                }
            })
        });
    </script>








<script>
 // action
 function ordersAction(value, row, index) {
    var order_details = "{{ route('show_order_details', ':id') }}";
            order_details = order_details.replace(":id", row.id);
            return [
                <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="" title="Edit"><i class="fa fa-eye"  onclick="{{ route('show_order_details', ':id') }}"></i></a> 
                <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" title="Download"><i class="fa fa-download"> &nbsp &nbsp </i></a>
                 <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" title="Delete"><i class="far fa-trash-alt"></i></i></a>		
            ].join('')
        }

        
</script>     
@endsection
@endsection
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset ('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset ('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('js')
<!-- DataTables -->
<script src="{{ asset ('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!--Data Table End -->
@endpush
