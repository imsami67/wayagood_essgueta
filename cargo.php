 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
if (isset($_REQUEST['id'])) {
    
$cargo=fetchRecord($dbc,"cargo","cargo_id",$_REQUEST['id']);
}

?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Cargo</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Cargo</li>

                            </ol>

                        </div>

                    </div>



			<div class="col-sm-12">

				<div class="panel">

					<div class="panel-heading panel-heading-red" align="center">

						<b>Cargo</b>
						<a href="cargo.php" class="btn btn-success pull-right btn-sm">Add New</a>
	
					</div>

						<div class="panel-body">
                            <form action="php_action/custom_action.php" id="formData">
                                <input type="hidden" class="form-control" name="cargo_id" value="<?=@$cargo['cargo_id']?>" >
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Cargo Name</label>
                                        <input required class="form-control" type="text" name="add_cargo_name" value="<?=@$cargo['cargo_name']?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="cargo_email" value="<?=@$cargo['cargo_email']?>">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Phone NO.</label>
                                        <input required class="form-control" type="text" name="cargo_phone" value="<?=@$cargo['cargo_phone']?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="cargo_address" value="<?=@$cargo['cargo_address']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 offset-10">
                                        <button class="btn btn-primary" id="formData_btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>                  
                        </div>

						</div>
                        <div class="panel">

                    <div class="panel-heading h5" align="center">

                       Cargos List

    
                    </div>

                        <div class="panel-body">
                            <table class="table table-bordered data-table" id="tableData">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $c=0;
                                        $q=mysqli_query($dbc,"SELECT * FROM cargo ");
                                        while ($r=mysqli_fetch_assoc($q)) {
                                         $c++;
                                     ?>
                                     <tr>
                                         <td><?=$c?></td>
                                         <td><?=$r['cargo_name']?></td>
                                         <td><?=$r['cargo_email']?></td>
                                         <td><?=$r['cargo_phone']?></td>
                                         <td><?=$r['cargo_address']?></td>
                                         <td>
                                             <a href="cargo.php?id=<?=$r['cargo_id']?>" class="btn btn-sm btn-success" >Edit</a>
                                             <a href="#" onclick="deleteData('cargo','cargo_id',<?=$r['cargo_id']?>,'cargo.php')" class="btn btn-sm btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                 <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        </div>

					</div>





	</div></div>  <!-- /// end of panel-->

<?php

include_once "includes/footer.php";

?>