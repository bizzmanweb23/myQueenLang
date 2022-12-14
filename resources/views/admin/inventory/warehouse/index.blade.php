<style>
    .form-group.required .control-label:after {
        content: "*";
        color: red;
    }

</style>
<table id="table" data-toggle="table" data-height="460" data-ajax="showWarehouse" data-pagination="true"
    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
    data-detail-view="true" data-unique-id="id" data-detail-formatter="showRack">
    <thead>
        <tr>
            <th data-checkbox="true"></th>
            <th data-field="id">@lang('admin.ID')</th>
            <th data-field="name">@lang('admin.Warehouse Name')</th>
            <th data-field="country">@lang('admin.Country Name')</th>
            <th data-field="status" data-formatter="ware_house_status">@lang('admin.Status') </th>
            <th data-field="operate" data-formatter="ware_house_action">@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

{{-- add warehouse --}}
<div class="modal fade" id="add_warehouse_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Add Warehouse')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add_warehouse_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Warehouse Name'):</label>
                        <input type="text" type="text" name="name" class="form-control">

                        <span id="add_warehouse_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Country'):</label>
                        {{-- <input type="text" type="text" name="country" class="form-control"> --}}
                        <select name="country" class="form-control allcountry"></select>
                        <span id="add_warehouse_country_error" style="color: red"></span>
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.Warehouse Details'):</label>
                        <input type="text" type="text" name="detail" class="form-control">

                        <span id="add_warehouse_detail_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Warehouse Status'):</label>
                        <select name="status" class="form-control">
                            <option value="">@lang('admin.select')</option>
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.In Active')</option>
                        </select>

                        <span id="add_warehouse_statu_error" style="color: red"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="add_warehouse_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="add_warehouse_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end ware house --}}

{{-- add rack --}}
<div class="modal fade" id="add_rack_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Add Rack')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add_rack_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Select Warehouse Name'):</label>
                        <select name="warehouses_id" class="form-control" id="select_ware_house">
                            <option value="">@lang('admin.select')</option>
                        </select>

                        <span id="select_warehouse_name_error" style="color: red"></span>
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.Rack Name'):</label>
                        <input type="text" type="text" name="name" class="form-control">

                        <span id="add_rack_name_error" style="color: red"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="add_rack_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="add_rack_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end add rack --}}


<div id="ware_house_delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">@lang('admin.Delete Confirmation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">@lang('admin.Delete')</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('admin.Cancel')</button>
                <a href="" id="ware_house_delete-link" class="btn btn-primary mt-2">@lang('admin.Delete')</a>
            </div>
        </div>
    </div>
</div>
