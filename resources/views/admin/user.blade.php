@extends('admin.layout.main')

@section('content') 
<div class="container">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Users</b></h2>
					</div>
				</div>
			</div>
			    <div class="tab-content bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                        <table class="table table-striped table-hover" id="table" data-toggle="table" data-height="460" data-pagination="true"
                               data-show-pagination-switch="true" data-search="true">               
				            <thead>
					            <tr>						         
						                        <th style="width: 280px;">User ID</th>
						                        <th style="width: 280px;">UserName</th>
						                        <th style="width: 280px;">Contact Number</th>
						                        <th style="width: 280px;">Gender</th>
						                        <th style="width: 280px;">Total PV Points</th>
						                        <th style="width: 280px;">Email Address</th>
						                        <th style="width: 280px;">Ranking</th>
						                        <th style="width: 280px;">Action</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->user_id;?></td>
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->name;?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->mobile_no;?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->gender;?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->total_pv_point;?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php echo $data->email_id;?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;"><?php if($data->rank_id == 1){ echo "Normal Member";} if($data->rank_id == 2){ echo "Silver Member";} if($data->rank_id == 3){ echo "Gold Member";} if($data->rank_id == 4){ echo "Diamond Member";}?></td>									
									<td style="border: 1px solid #dee2e6;width: 280px;">									    
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->user_id;?>" id="edit_user_details" title="Edit"><i class="las la-edit"></i></a> 
									</td>
									</tr>
									<?php
									  }
									?>
				                </tbody>
			            </table>
		            </div>
	            </div>        
        </div>
	</div>
</div>
	<div id="showView"></div>
<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<div id="user_details"></div>
                    <div class="modal-body" id="show_edit_details">
                       <form method="post" id="user_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>User ID:</label>
                        <input type="text" class="form-control form-control-user" id="user_id"
                               placeholder="User ID" value="" name="user_id">
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Name:</label>
                        <input type="text" class="form-control form-control-user" id="name"
                               placeholder="Name" value="" name="name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Contact Number:</label>
                        <input type="number" class="form-control form-control-user" id="contact_number"
                               placeholder="Contact Number" value="" name="contact_number">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Gender:</label>
                        <select name="gender" class="form-control form-control-user" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>                                         
                        </select>
						<span id="gender_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Email Address:</label>
                        <input type="text" class="form-control form-control-user" id="email_id"
                               placeholder="Email Address" value="" name="email_id" >
					    <span id="email_id_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Ranking:</label>
                        <input type="number" class="form-control form-control-user" id="ranking"
                               placeholder="Ranking" value="" name="ranking">
						<span id="ranking_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>PV Points:</label>
                        <input type="number" class="form-control form-control-user" value="" id="pv_points"
                               placeholder="Enter your Email Address" name="pv_points">
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Matching Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="" id="matching_bonus"
                               placeholder="Matching Bonus" name="matching_bonus">
					    <span id="matching_bonus_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Direct Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="" id="direct_bonus"
                               placeholder="Direct Bonus" name="direct_bonus">
					    <span id="direct_bonus_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>LeaderShip Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="" id="leadership_bonus"
                               placeholder="LeaderShip Bonus" name="leadership_bonus">
					    <span id="leadership_bonus_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Wallet:</label>
                        <input type="number" class="form-control form-control-user" value="" id="wallet"
                               placeholder="wallet" name="wallet">
					    <span id="wallet_error" style="color: red"></span>
                    </div>					
                </div>
                </div>
                </div>				
            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit_user_btn"><i
                                class="loading-icon fa fa-spinner fa-spin" id="edit_user_spin" style="display: none">
                            </i>Save</button>
                    </div>
                </div>
            </div>
        </div>
<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
@include('admin.js.users')
@endsection
@endsection