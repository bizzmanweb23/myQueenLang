                                            <div class="card-body">
                                                <ul class="list-unstyled price-details">
                                                    <li class="price-detail">
                                                        <div class="details-title">@lang('user.Price of items')</div>
                                                        <div class="detail-amt">
                                                            <strong><?php echo "$".($result[0]->quantity * $result[0]->pv);?></strong>
                                                        </div>
                                                    </li>
													<br>
                                                    <li class="price-detail">
                                                        <div class="details-title">@lang('user.Discount')</div>
                                                        <div class="detail-amt"><strong><?php echo '10%';?></strong></div>
                                                    </li>
                                                    <li class="price-detail" style="display: none" id="hole_delivery_charge_show">
                                                        <div class="details-title">@lang('user.Delivery Charges')</div>
                                                        <div class="detail-amt discount-amt" id="delivery_charge_show">
                                                        </div>
                                                    </li>
                                                </ul>
                                                <hr>
                                                <ul class="list-unstyled price-details">
                                                    <li class="price-detail">
                                                        <div class="details-title">@lang('user.Amount Payable')</div>
                                                        <div class="detail-amt font-weight-bolder"><strong><?php echo "$".($result[0]->quantity * $result[0]->pv)- $discount;?></strong>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                       
                                    