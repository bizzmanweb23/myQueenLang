<style>
    .form-group.required .control-label:after {
        content: "*";
        color: red;
    }

</style>
<table id="table_category" data-toggle="table" data-height="460" data-ajax="showCategory" data-pagination="true"
    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
    data-show-export="true">
    <thead>
        <tr>
            <th data-checkbox="true"></th>
            <th data-field="id">@lang('admin.ID')</th>
            <th data-field="image" data-formatter="categoryImage">@lang('admin.Image')</th>
            <th data-field="name">@lang('admin.Category Name')</th>
            <th data-field="status" data-formatter="category_status">@lang('admin.Status')</th>
            <th data-field="operate" data-formatter="categoryAction">@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

{{-- add return stock --}}
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" id="add_category_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Category Name'):</label>
                        <input type="text" name="name" class="form-control">

                        <span id="add_category_name_error" style="color: red"></span>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">@lang('admin.Slug'):</label>
                        <input type="text" name="slug" class="form-control">

                        <span id="add_category_slug_error" style="color: red"></span>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">@lang('admin.Description'):</label>
                        <input type="text" name="description" class="form-control">

                        <span id="add_category_description_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Status'):</label>
                        <select name="status" class="form-control">
                            <option value="">@lang('admin.select')</option>
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.In Active')</option>
                        </select>

                        <span id="add_category_status_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Image'):</label>
                        <input type="file" name="image" class="form-control">
                        <span id="add_category_image_error" style="color: red"></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="add_category_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="add_category_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end add category --}}

{{-- edit category --}}
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" id="edit_category_form">
                    @csrf
                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Category Name'):</label>
                        <input type="text" name="name" class="form-control" id="edit_category_name">
                        <input type="hidden" name="id" id="edit_category_id">

                        <span id="edit_category_name_error" style="color: red"></span>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">@lang('admin.Slug'):</label>
                        <input type="text" name="slug" class="form-control" id="edit_category_slug">

                        <span id="edit_category_slug_error" style="color: red"></span>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">@lang('admin.Description'):</label>
                        <input type="text" name="description" class="form-control" id="edit_category_description">

                        <span id="edit_category_description_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Status'):</label>
                        <select name="status" id="edit_category_status" class="form-control">
                            <option value="">@lang('admin.select')</option>
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.In Active')</option>
                        </select>

                        <span id="edit_category_status_error" style="color: red"></span>
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label">@lang('admin.Image'):</label>
                        <input type="file" name="image" id="edit_category_img" class="form-control">
                        <span id="edit_category_image_error" style="color: red"></span>
                        <img src="" alt="" id="edit_category_exit_image" width="300" class="p-2">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Close')</button>
                <button type="submit" class="btn btn-primary" id="edit_category_btn"><i
                        class="loading-icon fa fa-spinner fa-spin" id="edit_category_spin" style="display: none">
                    </i>@lang('admin.Save')</button>
            </div>
        </div>
    </div>
</div>
{{-- end edit category --}}

<div id="category_delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">@lang('admin.Delete Confirmation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">@lang('admin.Delete')</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('admin.Cancel')</button>
                <a href="" id="category_delete-link" class="btn btn-primary mt-2">@lang('admin.Delete')</a>
            </div>
        </div>
    </div>
</div>
