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

                                <div class="page-title">Reset Password</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Reset Password</li>

                            </ol>

                        </div>

                    </div>



			<div class="col-sm-12">

				<div class="panel">

					<div class="panel-heading panel-heading-red" align="center">

						<b>Reset Password</b>
						
					</div>

						<div class="panel-body">
                            <form action="php_action/custom_action.php" id="formData">
                                <input type="hidden" class="form-control" name="user_id" value="<?=@base64_decode($_REQUEST['user_id'])?>" >
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>New Password</label>
                                        <input required class="form-control" type="text" name="user_new_password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Confirm Password</label>
                                        <input required class="form-control" type="text" name="confirm_password" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-8">
                                        <button class="btn btn-primary" id="formData_btn" type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </form>                  
                        </div>

						</div>

					</div>





	</div></div>  <!-- /// end of panel-->

<?php

include_once "includes/footer.php";

?>