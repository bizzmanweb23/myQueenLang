 @extends('mlm.layouts.main')
@section('content')
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="@lang('user.search')" required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
         <ul class="mobile-menu mmenu-anim">
                <li>
                    <a href="index.html">@lang('auth.home')</a>
                </li>
                <li>
                    <a href="about-us.html">@lang('auth.About')</a>
                </li>
               
                <li>
                    <a href="#">@lang('auth.Products')</a>
                    <ul>
                        <li><a href="{{url('products')}}">@lang('auth.product name1')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name2')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name3')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name4')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name5')</a></li>
                        
                    </ul>
                </li>
              
             
                <li>
                    <a href="contact-us.html">@lang('auth.Contact') </a>
                </li>
                
            </ul>
    </div>
</div>

    <style>
        label {
            font-weight: bold;
        }

    </style>
	<main class="main account">
	        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>@lang('mlm.WithDraw Request')</li>
                </ul>
            </div>
        </nav>
	<div class="page-header pl-4 pr-4" style="background-image: url({{ asset('asset/image/font/about-us.jpg') }})">

            <h1 class="page-title font-weight-bold lh-1 text-capitalize" style="color:#231f1f;">@lang('mlm.WithDraw Bonus')</h1>

        </div>
   <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
				    <div class="col-lg-5 d-none d-lg-block bg-register-image">
					        <h4 class="bonus-table">@lang('mlm.withdrawRequest'):</h4>
                               <table id="bonus_table" data-toggle="table" data-height="460" data-ajax="drawbonusdetails" data-pagination="true" class="table-bordered"
                                      data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-search="true"
                                      data-show-export="true">
                                  <thead>
                                       <tr>					                   
                                          <th class="row-bonus" data-field="total_direct_dponsor" data-formatter="usd" data-footer-formatter="priceFormatter">@lang('mlm.bonus1')</th>
                                          <th data-field="total_matching_bonus" data-formatter="usd" data-footer-formatter="priceFormatter">@lang('mlm.bonus2')</th>
                                          <th data-field="leadership_bonus" data-formatter="usd" data-footer-formatter="priceFormatter">@lang('mlm.bonus3')</th>
                                       </tr>
                                  </thead>
                                      <tbody>
                                         <?php
										     foreach($result as $data)
											 {
										 ?>
										      <td class="row-bonus"><?php echo '$'.$data->total_direct_dponsor;?></td>
										      <td><?php echo '$'.$data->total_matching_bonus;?></td>
										      <td><?php echo '$'.$data->leadership_bonus;?></td>
										 <?php
										     }
										 ?>
                                      </tbody>
                              </table>
				   </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 mb-4" style="text-decoration: underline;">@lang('mlm.WithDraw Form')</h1>
                            </div>
                            <form method="post" id="withdraw_form">
							@csrf
							 <h1 class="h2 text-gray-900 mb-4">@lang('mlm.withdrawNote') </h1>
							  <div class="form-group row">
                                  <div class="col-sm-6 margin-right">
                                    <label>@lang('mlm.note1')*</label>
                                        <select name="bonus_type" class="form-control bonus_details" id="bonus_type">
										      <option>@lang('mlm.select')</option>         
                                              <option value="1">@lang('mlm.bonus1')</option>      
                                              <option value="2">@lang('mlm.bonus2')</option>											  
                                              <option value="3">@lang('mlm.bonus3')</option>											  
                                          </select>
                                             <span id="bonus_type_error" style="color: red"></span>										  
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>@lang('user.Bank name')*</label>
                                        <input type="text" class="form-control form-control-user" id="bank_name" name="bank_name">
										<span id="bank_name_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									   <label>@lang('mlm.Branch Name')*</label>
                                        <input type="text" class="form-control form-control-user" id="branch_name" name="branch_name">
										<span id="branch_name_error" style="color: red"></span>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>@lang('mlm.Account Number')*</label>
                                        <input type="text" class="form-control form-control-user" id="account_name" name="account_name">
										<span id="account_number_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									   <label>@lang('mlm.Amount')*</label>
                                        <input type="text" class="form-control form-control-user" id="amount" name="amount">
										<span id="amount_error" style="color: red"></span>
                                    </div>
                                </div>
								     <div class="form-group row">
                                         <div class="col-sm-6 mb-3 mb-sm-0">
								            <button class="btn btn-success" type="button" id="withdraw_button">@lang('mlm.Submit')</button>
										</div>
									</div>	
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
	
 <div id="loder" style="display: none">
        @include('mlm.loder.index');
    </div>


@section('javascript')
    @include('mlm.js.withdraw')
@endsection


@endsection