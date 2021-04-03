 <?php 

include_once "includes/header.php";

include_once "inc/code.php";


?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Users</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Users</li>

                            </ol>

                        </div>

                    </div>



	<div class="col-sm-12">

		<div class="panel">

	<div class="panel-heading panel-heading-red" align="center"><h4>Create Users</h4></div>

	<div class="panel-body">

	

<form method="POST" action="php_action/custom_action.php" id="formData">
	<input type="hidden" name="up_user_id" value="<?=@$fetchusers['user_id']?>">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
         User Data
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>User Name</label>
			      <input type="text" class="form-control" id="username" name="new_add_username" placeholder="Username" autocomplete="off"  required  value="<?=@$fetchusers['username']?>" />
        		</div>
        		<div class="col-sm-6">
        			<label>Surname</label>
			       <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" autocomplete="off"  required  value="<?=@$fetchusers['surname']?>" />
        		</div>
        	</div>
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>Phone Number</label>
			      <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Phone Number" autocomplete="off"  required  value="<?=@$fetchusers['user_phone']?>" />
        		</div>
        		<div class="col-sm-6">
        			<label>Alternative telephone:</label>
			       <input type="text" class="form-control" id="user_whatsapp" name="user_whatsapp" placeholder="Alternative Telephone"   value="<?=@$fetchusers['user_whatsapp']?>" />
        		</div>
        	</div>
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>Password</label>
			      <input type="text" class="form-control" id="user_password" name="user_password" placeholder="" autocomplete="off" value="123456" <?=@isset($_REQUEST['user_edit_id'])?"disabled":""?>    />
        		</div>
        		<div class="col-sm-6">
        			<label>Gender</label>
			       <select class="form-control" name="user_gender">
			     	<option <?=@($fetchusers['user_gender']=="male")?"seleted":""?> value="male">Male</option>
			     	<option <?=@($fetchusers['user_gender']=="female")?"seleted":""?> value="female">Female</option>
			     </select>
        		</div>
        	</div>
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>Date of Birth</label>
			      <input type="date" class="form-control" id="user_dob" name="user_dob" placeholder="Date of Birth"   required  value="<?=@$fetchusers['user_dob']?>" />
        		</div>
        		<div class="col-sm-6">
        			<label>Age</label>
			       <input type="number" min="1" class="form-control" id="age" name="age" placeholder="Age"   value="<?=@$fetchusers['age']?>" />
        		</div>
        	</div>
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>Identification card</label>
			      <input type="text" class="form-control" id="id_card" name="id_card" placeholder="Identification card:"   required  value="<?=@$fetchusers['id_card']?>" />
        		</div>
        		<div class="col-sm-6">
        			<label>Sons</label>
			       <input type="number"  class="form-control" id="sons" name="sons" placeholder="Sons"   value="<?=@$fetchusers['sons']?>" />
        		</div>
        	</div>
        	<div class="row form-group">
        		<div class="col-sm-6">
        			<label>Skill</label>
			       <select class="form-control" name="skills">
			     	<option <?=@($fetchusers['skills']=="right")?"seleted":""?> value="right">right</option>
			     	<option <?=@($fetchusers['skills']=="left")?"seleted":""?> value="left">left</option>
			     </select>
        		</div>
        		<div class="col-sm-6">
        			<label>Status</label>
			       

			       <select class="form-control" name="user_status">
                    <option  <?=@($fetchusers['user_status']=="active")?"seleted":""?>value="active">Active</option>

                    <option  <?=@($fetchusers['user_status']=="noactive")?"seleted":""?>value="noactive">Not Active</option>

                 </select>

			    
        		</div>
        	</div>
        		<div class="row form-group">
        		<div class="col-sm-6">
        			<label>User Role</label>
			       <select class="form-control" name="user_role">

        				<?php  $q=mysqli_query($dbc,"SELECT * FROM user_roles where user_role_status='active' ");
        				 while ($r=mysqli_fetch_assoc($q)) {
						 ?>
						 <option <?=@($fetchusers['user_role_name']==$r['user_role'])?"selected":""?> value="<?=$r['user_role_name']?>"><?=$r['user_role_name']?></option>
						<?php } ?>
        			
			     </select>
        		</div>
        		<div class="col-sm-6">
        			<label>Address</label>
			       

			       <input class="form-control" name="user_address" placeholder="User Address" value="<?=@$fetchusers['user_address']?>">
			     	
        		</div>
        	</div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#bank_data">
        Bank data
      </a>
      </div>
      <div id="bank_data" class="collapse" data-parent="#accordion">
        <div class="card-body">
        	
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="userbank"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bank:</font></font></label>
                                                    <input class="form-control form-control-sm" name="bank_name" id="userbank" value="<?=@$fetchusers['bank_name']?>" title="User's Bank Name">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="useraccountnumber"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Account #:</font></font></label>
                                                    <input class="form-control form-control-sm" name="account_no" id="account_no" value="<?=@$fetchusers['account_no']?>" title="User Account Number">
                                                </div>
                                            </div>                                            
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="useraccounttype"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Account type:</font></font></label>
                                                    <input class="form-control form-control-sm" name="account_type" id="account_type" value="<?=@$fetchusers['account_type']?>" title="User Account Type">
                                                </div>
                                            </div>
                                        
                                        </div>
                                   <div class="row">
                                   	    <div class="col-6">
                                                <div class="form-group">
                                                    <label for="usermobilepaid"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mobile payment ?:</font></font></label>
                                                    <select class="form-control form-control-sm" name="mobile_payment" id="mobile_payment" title="If the User has Active Mobile Payment">
                                                        <option <?=@($fetchusers['mobile_payment']=="no")?"selected":""?> value="no">No</option>
                                                        <option <?=@($fetchusers['mobile_payment']=="yes")?"selected":""?> value="yes">Yes</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="usermobilepaidphone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Associated Phone:</font></font></label>
                                                    <input class="form-control form-control-sm" name="associated_no" id="associated_no" value="<?=@$fetchusers['associated_no']?>" title="Telephone Associated with the User's Mobile Payment">
                                                </div>
                                            </div> 
                                   </div>     
                                    
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Social Data
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">      <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="userbank"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></label>
                                                    <input class="form-control form-control-sm" name="email" id="email" value="<?=@$fetchusers['email']?>" title="User's Bank Name">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="useraccountnumber"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Facebook</font></font></label>
                                                    <input class="form-control form-control-sm" name="facebook" id="facebook" value="<?=@$fetchusers['facebook']?>" title="Facebook">
                                                </div>
                                            </div>                                            
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="useraccounttype"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instagram:</font></font></label>
                                                    <input class="form-control form-control-sm" name="instagram" id="instagram" value="<?=@$fetchusers['instagram']?>" title="Instagram">
                                                </div>
                                            </div>
                                        
                                        </div></div>
      </div>
    </div>
  <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#labor_data">
Labor Data
        </a>
      </div>
      <div id="labor_data" class="collapse" data-parent="#accordion">
        <div class="card-body">
        	<div class="row form-group">
        		<div class="col-sm-3">
        			<label>Turn</label>
        			<select class="form-control" name="turn">
        				<option value="">Select Turn</option>
        				<option <?=@($fetchusers['turn']=="am")?"selected":""?> value="am">A.M</option>
        				<option <?=@($fetchusers['turn']=="pm")?"selected":""?> value="pm">P.M</option>
        				<option <?=@($fetchusers['turn']=="full")?"selected":""?> value="full">Full</option>

        			</select>
        		</div>
        		<div class="col-sm-3">
        			<label>Team</label>
        			<select class="form-control" name="team">
        				<option value="">Select Team</option>
        				<?php  $q=mysqli_query($dbc,"SELECT * FROM teams ");
        				 while ($r=mysqli_fetch_assoc($q)) {
						 ?>
						 
						 <option <?=@($fetchusers['team']==$r['team_id'])?"selected":""?> value="<?=$r['team_id']?>"><?=$r['team_name']?></option>
						<?php } ?>
        			</select>
        		</div>
        		<div class="col-sm-3">
        			<label>Leader</label>
        			<select class="form-control" name="leader">
        				 <option value="">Select Leader</option>
        				<?php  $q=mysqli_query($dbc,"SELECT * FROM users WHERE user_role='leader' ");
        				 while ($r=mysqli_fetch_assoc($q)) {
						 ?>
						
						 <option <?=@($fetchusers['leader']==$r['user_id'])?"selected":""?> value="<?=$r['user_id']?>"><?=$r['username']?></option>
						<?php } ?>
        			</select>
        		</div>
        		<div class="col-sm-3">
        			<label>Position</label>
        			<input type="date" readonly value="<?=getDateFormat("Y-m-d",@$fetchusers['user_add_date'])?>" class="form-control" >
        		</div>
        	</div> <!-- end of group -->
        	 	<div class="row form-group">
        		<div class="col-sm-4">
        			<label>Cargo</label>
        			<select class="form-control" name="cargo">
        				<option value="">Select Cargo</option>
        				<?php  $q=mysqli_query($dbc,"SELECT * FROM cargo ");
        				 while ($r=mysqli_fetch_assoc($q)) {
						 ?>
						 <option <?=@($fetchusers['cargo']==$r['cargo_id'])?"selected":""?> value="<?=$r['cargo_id']?>"><?=$r['cargo_name']?></option>
						<?php } ?>

        			</select>
        		</div>
        		<div class="col-sm-4">
        			<label>Criminal record:</label>
        			<input class="form-control" value="<?=@$fetchusers['criminal_record']?>" name="criminal_record" type="text">
        		</div>
        		<div class="col-sm-4">
        			<label>Referred from:</label>
        			<input class="form-control" value="<?=@$fetchusers['referred_from']?>" name="referred_from" type="text">
        		</div>
        	</div> <!-- end of group -->
        </div>
      </div>
    </div>
    <div class="row">
    
    	<div class="col-sm-8 offset-4">
    		<button class="btn btn-primary float-right ml-4" type="submit" id="formData_btn">Save Changes </button>
    		<?php if (isset($_REQUEST['user_edit_id'])): ?>
    			<a href="user_reset_password.php?user_id=<?=@base64_encode($_REQUEST['user_edit_id'])?>" class="btn btn-warning float-right ml-4">Reset Password</a>
    	
    		<?php endif ?>
    		</div>

    </div>
</form>

		</div>

	</div>

</div>







	</div></div>

<?php

include_once "includes/footer.php";

?>