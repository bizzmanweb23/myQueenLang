<style>
    .form-group.required .control-label:after {
        content: "*";
        color: red;
    }

</style>
<table id="table_return" data-toggle="table" data-height="460" data-ajax="showReturn" data-pagination="true"
    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
    data-show-export="true">
    <thead>
        <tr>
            <th data-checkbox="true"></th>
            <th data-field="id">@lang('admin.ID')</th>
            <th data-field="productimagee" data-formatter="imageFormatter">@lang('admin.Products Image')</th>
            <th data-field="title">@lang('admin.Products Name')</th>
            <th data-field="wname" data-editable="true">@lang('admin.Warehouse Name')</th>
            <th data-field="rname" data-editable="true">@lang('admin.Rack Name')</th>
            <th data-field="quantity" data-editable="true">@lang('admin.Quantity')</th>
            <th data-field="status" data-formatter="return_status">@lang('admin.Status')</th>
            <th data-field="operate" data-formatter="returnAction">@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

{{-- add return stock --}}
<div class="modal fade" id="add_return_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Add Return')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add_return_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Product'):</label>
                        <select name="productid" id="select_return_product" class="form-control">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="add_return_product_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Warehouse'):</label>
                        <select name="warehouseid" id="select_return_warehouse" class="form-control">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="add_return_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Rack'):</label>
                        <select name="rackid" id="select_return_rack" class="form-control">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="add_return_rack_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Quantity'):</label>
                        <input type="text" name="quantity" class="form-control">

                        <span id="add_return_quantity_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Date'):</label>
                        <input type="date" name="date" class="form-control">

                        <span id="add_return_datetime_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Status'):</label>
                        <select name="status" id="select_return_status" class="form-control">
                            <option value="">@lang('admin.select')</option>
                            <option value="1">@lang('admin.Approved')</option>
                            <option value="0">@lang('admin.Pending')</option>
                        </select>
                        <span id="add_return_status_error" style="color: red"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="add_return_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="add_return_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end add return --}}

{{-- edit return --}}
<div class="modal fade" id="edit_return_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Edit Return')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit_return_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Product'):</label>
                        <input type="text" name="productname" class="form-control" readonly
                            id="edit_retutn_productname">
                        <input type="hidden" name="id" class="form-control" readonly id="edit_return_id">

                        <span id="edit_warehouse_stock_product_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Warehouse'):</label>
                        <select name="warehouseid" id="select_edit_return_warehouse" class="form-control">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="edit_return_warehouse_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Rack'):</label>
                        <select name="rackid" id="select_edit_return_rack" class="form-control">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="edit_return_rack_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Quantity'):</label>
                        <input type="text" name="quantity" class="form-control" id="edit_return_stock">

                        <span id="edit_return_quantity_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Date'):</label>
                        <input type="date" name="date" class="form-control" id="edit_date">

                        <span id="edit_return_datetime_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Status'):</label>
                        <select name="status" id="select_edit_return_status" class="form-control">
                            <option value="">@lang('admin.select')</option>
                            <option value="1">@lang('admin.Approved')</option>
                            <option value="0">@lang('admin.Pending')</option>
                        </select>
                        <span id="edit_return_status_error" style="color: red"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="edit_return_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="edit_return_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end edit return --}}

<div id="return_delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">@lang('admin.Delete Confirmation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">@lang('admin.Delete')</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('admin.Cancel')</button>
                <a href="" id="return_delete-link" class="btn btn-primary mt-2">@lang('admin.Delete')</a>
            </div>
        </div>
    </div>
</div>
