 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
if (isset($_REQUEST['id'])) {
    
$position=fetchRecord($dbc,"positions","position_id",$_REQUEST['id']);
}

?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Position</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Position</li>

                            </ol>

                        </div>

                    </div>



            <div class="col-sm-12">

                <div class="panel">

                    <div class="panel-heading panel-heading-red" align="center">

                        <b>Positions</b>
                        <a href="position.php" class="btn btn-success pull-right btn-sm">Add New</a>
    
                    </div>

                        <div class="panel-body">
                            <form action="php_action/custom_action.php" id="formData">
                                <input type="hidden" class="form-control" name="position_id" value="<?=@$position['position_id']?>" >
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Position Name</label>
                                        <input required class="form-control" type="text" name="add_position_name" value="<?=@$position['position_name']?>">
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

                        <b>Position</b>

    
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
                                        $q=mysqli_query($dbc,"SELECT * FROM positions ");
                                        while ($r=mysqli_fetch_assoc($q)) {
                                         $c++;
                                     ?>
                                     <tr>
                                         <td><?=$c?></td>
                                         <td><?=$r['position_name']?></td>
                                         <td>
                                             <a href="position.php?id=<?=$r['position_id']?>" class="btn btn-sm btn-success" >Edit</a>
                                             <a href="#" onclick="deleteData('positions','position_id',<?=$r['position_id']?>,'position.php')" class="btn btn-sm btn-danger">Delete</a>
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