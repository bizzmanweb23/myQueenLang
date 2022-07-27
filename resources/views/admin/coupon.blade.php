@extends('admin.layouts.master')
@section('title','Myqueen | Coupon')
@section('body')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Coupon </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><small><b>Shipping Charge</b></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Number</th>
                                        <th>Discount Type</th>
                                        <th>Discount Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupon as $key=> $coupon_data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$coupon_data->number}}</td>
                                        <td>{{$coupon_data->discount_type}}</td>
                                        <td>{{$coupon_data->discount_number}}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure want to delete?')" href="{{route('Coupon-Delete',$coupon_data->id)}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="widget-box">
                            <form action="{{route('Create-Coupon')}}" method="POST" id="add_coupon_form">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Generate Coupon</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="widget-content nopadding">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2">Coupon</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="number" value="" id="coupon_number" readonly>
                                                @if($errors->has('number'))
                                                <div class="error text-danger">{{ $errors->first('number') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="" class="control-label">Select Type</label>
                                                <select name="discount_type" id="discount_type" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="Fixed">Fixed</option>
                                                    <option value="Percentage">Percentage</option>
                                                </select>
                                                @if($errors->has('discount_type'))
                                                <div class="error text-danger">{{ $errors->first('discount_type') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="" class="control-label">Enter Number</label>
                                                <input type="number" class="form-control" name="discount_number" value="" id="coupon_discount">
                                                @if($errors->has('discount_number'))
                                                <div class="error text-danger">{{ $errors->first('discount_number') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button class="btn btn-primary" data-loading-text="Loading..." id="coupon_generate_btn" type="button">
                                            <i class="loading-icon fa fa-spinner fa-spin" id="coupon_form_gene_btnspin" style="display:none"></i>
                                            Generate
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" data-loading-text="Loading..." id="coupon_form_save_btn" type="submit">
                                            <i class="loading-icon fa fa-spinner fa-spin" id="coupon_form_save_btnspin" style="display:none"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#coupon_generate_btn').on('click', function() {
        var coupon = "MQCC" + Math.floor((Math.random() * 10000) + 5);
        $('#coupon_number').val(coupon);
    });
    $('#discount_type').on('click', function(){
        $('.error').hide();
    });
</script>
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