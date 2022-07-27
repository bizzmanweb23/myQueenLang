@extends('admin.layouts.master')
@section('title','Myqueen | Promotion')
@section('body')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Promotion </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Promotion</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#add_banner_modal" onclick="add_banner()"><i class="fa fa-plus"></i>
                                    Add Promotion
                                    Banner</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>English Image</th>
                                        <th>China Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promotions as $key=> $promotion)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img src="{{asset ('Promotion/english/'. $promotion->Image_eng) }}" alt=""  width="150px" height="100px"></td>
                                        <td><img src="{{asset ('Promotion/china/'. $promotion->Image_ch) }}" alt=""  width="150px" height="100px"></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure want to delete?')" href="{{route('Delete-Promotion',$promotion->id)}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- add banner --}}
<div class="modal fade " id="add_banner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add_banner_form" action="{{route('Store-Promotion')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">English Image:</label>
                        <input type="file" name="Image_eng" class="form-control" required>
                        <span id="add_banner_en_image_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">China Image:</label>
                        <input type="file" name="Image_ch" class="form-control" required>
                        <span id="add_banner_ch_image_error" style="color: red"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add_banner_btn"><i class="loading-icon fa fa-spinner fa-spin" id="add_banner_spin" style="display: none">
                    </i>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end add banner --}}
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