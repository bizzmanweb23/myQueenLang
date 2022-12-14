<style>
    button {
        padding: 8px;
    }

</style>
<table id="table" data-toggle="table" data-height="500" data-ajax="show_to_receive" data-pagination="true"
    data-show-refresh="true" data-search="true">
    <thead>
        <tr>
            <th data-checkbox="true" data-footer-formatter="total"></th>
            <th data-field="order_unique">@lang('order.Order Id')</th>
            <th data-field="total" data-formatter="total_pending">@lang('order.Total')
            </th>
            <th data-field="payment_status" data-formatter="receive_payment_status">@lang('order.Payment Status')
            </th>
            <th data-field="created_at" data-formatter="change_date_format">@lang('order.Date')</th>
            </th>
        </tr>
    </thead>
</table>
