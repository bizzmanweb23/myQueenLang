@extends('admin.layouts.master')
@section('title','Myqueen | Shipping Charge')
@section('body')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shipping Charge </li>
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
                                        <th>S.No.</th>
                                        <th>Country</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shipping as $key=> $shipping_data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$shipping_data->country}}</td>
                                        <td>${{$shipping_data->amount}}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure want to delete?')" href="{{route('Delete-Shipping',$shipping_data->id)}}"><i class="fas fa-trash-alt"></i></a>
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
                            <form action="{{route('Store-Shipping')}}" method="POST" id="add_shipc_form">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Shipping Amount</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="widget-content nopadding">
                                        <div class="form-group row">
                                            <label class="control-label">Country</label>
                                            <div class="col-sm-9">
                                                <select name="country" id="select_country" class="form-control allcountry" required>
                                                    <option value="">Select</option>
                                                </select>
                                                @if($errors->has('country'))
                                                <div class="error text-danger">{{ $errors->first('country') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="control-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="amount" value="" id="amount" required>
                                                @if($errors->has('amount'))
                                                <div class="error text-danger">{{ $errors->first('amount') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button class="btn btn-primary" data-loading-text="Loading..." id="ship_form_save_btn" type="submit">
                                            <i class="loading-icon fa fa-spinner fa-spin" id="ship_form_save_btnspin" style="display:none"></i>
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
    // get all country
    function getAllcountry() {
        $.ajax({
            url: "{{ route('get_all_country') }}",
            type: 'get',
            dataType: 'json',
            beforeSend: function() {
                $('#ship_charge_loder').show()
            },
            success: function(data) {
                $('#ship_charge_loder').hide()
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    ''
                    $(".allcountry").append("<option value='" + data[i] + "'>" + data[i] +
                        "</option>");
                }

            }
        })
    }

    $(document).ready(function() {
        getAllcountry();
    });
    $('#select_country').on('click', function(){
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