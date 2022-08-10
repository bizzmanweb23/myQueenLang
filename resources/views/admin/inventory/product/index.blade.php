<table id="product_table_list" data-toggle="table" data-height="460" data-ajax="showProduct" data-pagination="true"
    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
    data-show-export="true">
    <thead>
        <tr>
            <th data-checkbox="true"></th>
            <th data-field="id">@lang('admin.ID')</th>
            <th data-field="productimagee" data-formatter="productImage">@lang('admin.Products Image')</th>
            <th data-field="title">@lang('admin.Products Name')</th>
            <th data-field="categoryname">@lang('admin.category')</th>
            <th data-field="regularprice">@lang('admin.Regular Price')</th>
            <th data-field="saleprice">@lang('admin.Sale Price')</th>
            <th data-field="istock">@lang('admin.Stock')</th>
            <th data-field="status" data-formatter="product_status">@lang('admin.Status')</th>
            <th data-field="operate" data-formatter="productAction">@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<div id="product_delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">@lang('admin.Delete Confirmation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">@lang('admin.Delete')</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('admin.Cancel')</button>
                <a href="" id="product_delete-link" class="btn btn-primary mt-2">@lang('admin.Delete')</a>
            </div>
        </div>
    </div>
</div>
