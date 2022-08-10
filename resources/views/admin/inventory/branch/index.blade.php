<style>
    .form-group.required .control-label:after {
        content: "*";
        color: red;
    }

</style>
<table id="table_branches" data-toggle="table" data-height="460" data-ajax="showBranches" data-pagination="true"
    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
    data-show-export="true">
    <thead>
        <tr>
            <th data-checkbox="true"></th>
            <th data-field="id">@lang('admin.ID')</th>
            <th data-field="wname">@lang('admin.Warehouse Name')</th>
            <th data-field="name">@lang('admin.Name')</th>
            <th data-field="detail">@lang('admin.Details')</th>
            <th data-field="address">@lang('admin.Address')</th>
            <th data-field="pincode">@lang('admin.Pincode')</th>
            <th data-field="country">@lang('admin.Status')</th>
            <th data-field="operate" data-formatter="branchAction">@lang('admin.Action')</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

{{-- add branches --}}
<div class="modal fade" id="add_branch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Add category')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add_branch_form">
                    @csrf

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Warehouse Name'):</label>
                        <select name="ware_house_id" class="form-control warehouse">

                        </select>

                        <span id="add_ware_house_id_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Branch Name'):</label>
                        <input type="text" name="name" class="form-control">

                        <span id="add_branch_name_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Details'):</label>
                        <input type="text" name="detail" class="form-control">

                        <span id="add_branch_detail_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Address'):</label>
                        <input type="text" name="address" class="form-control">

                        <span id="add_branch_address_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Pincode'):</label>
                        <input type="text" name="pincode" class="form-control">
                        <span id="add_branch_pincode_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Country'):</label>
                        {{-- <input type="text" name="country" class="form-control"> --}}
                        <select name="country" class="allcountry form-control">

                        </select>
                        <span id="add_branch_country_error" style="color: red"></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="add_branch_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="add_branch_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end add branch --}}

{{-- edit branch --}}
<div class="modal fade" id="edit_branch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Edit Category')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit_branch_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Warehouse Name'):</label>
                        <select name="ware_house_id" id="ware_house_id" class="form-control warehouse">

                        </select>

                        <span id="edit_ware_house_id_error" style="color: red"></span>
                    </div>
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Branch Name'):</label>
                        <input type="text" name="name" class="form-control" id="branch_name">
                        <input type="hidden" name="id" id="branch_id">

                        <span id="edit_branch_name_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Details'):</label>
                        <input type="text" name="detail" class="form-control" id="branch_detail">

                        <span id="edit_branch_detail_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="branch_address">

                        <span id="edit_branch_address_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Address'):</label>
                        <input type="text" name="pincode" class="form-control" id="branch_pincode">
                        <span id="edit_branch_pincode_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Country'):</label>
                        {{-- <input type="text" name="country" class="form-control" id="branch_country"> --}}
                        <select name="country" class="allcountry form-control" id="branch_country">

                        </select>
                        <span id="edit_branch_country_error" style="color: red"></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="edit_branch_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="edit_branch_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end edit branch --}}

<div id="branch_delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">@lang('admin.Delete Confirmation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">@lang('admin.Delete')</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('admin.Cancel')</button>
                <a href="" id="branch_delete-link" class="btn btn-primary mt-2">@lang('admin.Delete')</a>
            </div>
        </div>
    </div>
</div>
