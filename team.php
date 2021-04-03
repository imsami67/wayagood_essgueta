 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
if (isset($_REQUEST['id'])) {
    
$team=fetchRecord($dbc,"teams","team_id",$_REQUEST['id']);
}

?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Team</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Team</li>

                            </ol>

                        </div>

                    </div>



			<div class="col-sm-12">

				<div class="panel">

					<div class="panel-heading panel-heading-red" align="center">

						<b>Team</b>
						<a href="team.php" class="btn btn-success pull-right btn-sm">Add New</a>
	
					</div>

						<div class="panel-body">
                            <form action="php_action/custom_action.php" id="formData">
                                <input type="hidden" class="form-control" name="team_id" value="<?=@$team['team_id']?>" >
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Team Name</label>
                                        <input required class="form-control" type="text" name="add_team_name" value="<?=@$team['team_name']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 offset-10">
                                        <button class="btn btn-primary" id="formData_btn" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>                  
                        </div>

						</div>
                        <div class="panel">

                    <div class="panel-heading panel-heading-red" align="center">

                        <b>Team</b>

    
                    </div>

                        <div class="panel-body">
                            <table class="table table-bordered data-table" id="tableData">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $c=0;
                                        $q=mysqli_query($dbc,"SELECT * FROM teams ");
                                        while ($r=mysqli_fetch_assoc($q)) {
                                         $c++;
                                     ?>
                                     <tr>
                                         <td><?=$c?></td>
                                         <td><?=$r['team_name']?></td>
                                         <td>
                                             <a href="team.php?id=<?=$r['team_id']?>" class="btn btn-sm btn-success" >Edit</a>
                                             <a href="#" onclick="deleteData('teams','team_id',<?=$r['team_id']?>,'team.php')" class="btn btn-sm btn-danger">Delete</a>
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