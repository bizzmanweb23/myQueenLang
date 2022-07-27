<div class="modal-body">
<form method="post" id="user_edit_form">
			    <div class="card">
                <div class="card-body">
				<input type="hidden" id="user_edit_id" value="<?php echo $result[0]->user_id;?>">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>User ID:</label>
                        <input type="text" class="form-control form-control-user" id="user_id"
                               placeholder="User ID" value="<?php echo $result[0]->user_id;?>" name="user_id" readonly>
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Name:</label>
                        <input type="text" class="form-control form-control-user" id="name"
                               placeholder="Name" value="<?php echo $result[0]->name;?>" name="name" readonly>
						<span id="name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Contact Number:</label>
                        <input type="number" class="form-control form-control-user" id="contact_number"
                               placeholder="Contact Number" value="<?php echo $result[0]->mobile_no;?>" name="mobile_no">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Gender:</label>
                        <select name="gender" class="form-control form-control-user" id="gender" readonly>
                            <option <?php if($result[0]->gender == 'Male'){ echo 'selected'; }?> value="Male">Male</option>
                            <option <?php if($result[0]->gender == 'Female'){ echo 'selected'; }?> value="Female">Female</option>
                            <option <?php if($result[0]->gender == 'Other'){ echo 'selected'; }?> value="Other">Other</option>                                         
                        </select>
						<span id="gender_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Email Address:</label>
                        <input type="text" class="form-control form-control-user" id="email_id"
                               placeholder="Email Address" value="<?php echo $result[0]->email;?>" name="email_id" readonly>
					    <span id="email_id_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Ranking:</label>
                        <input type="number" class="form-control form-control-user" id="ranking"
                               placeholder="Ranking" value="<?php echo $result[0]->rank_id;?>" name="rank_id">
						<span id="ranking_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>PV Points:</label>
                        <input type="number" class="form-control form-control-user" value="<?php echo $result[0]->total_pv_point;?>" id="pv_points"
                               placeholder="Enter your Email Address" name="total_pv_point">
					    <span id="points_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Matching Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="<?php echo $result[0]->total_matching_bonus;?>" id="matching_bonus"
                               placeholder="Matching Bonus" name="total_matching_bonus">
					    <span id="matching_bonus_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Direct Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="<?php echo $result[0]->total_direct_dponsor;?>" id="direct_bonus"
                               placeholder="Direct Bonus" name="total_direct_dponsor">
					    <span id="direct_bonus_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>LeaderShip Bonus:</label>
                        <input type="number" class="form-control form-control-user" value="<?php echo $result[0]->leadership_bonus;?>" id="leadership_bonus"
                               placeholder="LeaderShip Bonus" name="leadership_bonus">
					    <span id="leadership_bonus_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Wallet:</label>
                        <input type="number" class="form-control form-control-user" value="<?php echo $result[0]->wallet;?>" id="wallet"
                               placeholder="wallet" name="wallet">
					    <span id="wallet_error" style="color: red"></span>
                    </div>					
                </div>
                </div>
                </div>				
            </form>
			</div>