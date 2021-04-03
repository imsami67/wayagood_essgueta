 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
if (isset($_REQUEST['id'])) {
    
$user_role=fetchRecord($dbc,"user_roles","user_role_id",$_REQUEST['id']);
}

?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">User Roles</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">User Roles</li>

                            </ol>

                        </div>

                    </div>



            <div class="col-sm-12">

                <div class="panel">

                    <div class="panel-heading panel-heading-red" align="center">

                        <b>User Roles</b>
                        <a href="user_roles.php" class="btn btn-success pull-right btn-sm">Add New</a>
    
                    </div>

                        <div class="panel-body">
                            <form action="php_action/custom_action.php" id="formData">
                                <input type="hidden" class="form-control" name="user_role_id" value="<?=@$user_role['user_role_id']?>" >
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label> Name</label>
                                        <input required title="Small Alphabets and Number Only Without Space and Characters" class="form-control" pattern="^[a-zA-Z0-9]*$" type="text" name="add_role_name" value="<?=@$user_role['user_role_name']?>">
                                    </div>
                                    <div class="col-sm-6">
                    <label>Status</label>
                   

                   <select class="form-control" name="user_role_status">
                    <option  <?=@($fetchusers['status']=="active")?"seleted":""?>value="active">Active</option>

                    <option  <?=@($fetchusers['status']=="noactive")?"seleted":""?>value="noactive">Not Active</option>

                 </select>

                
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

                      User Roles List

    
                    </div>

                        <div class="panel-body">
                            <table class="table table-bordered data-table" id="tableData">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $c=0;
                                        $q=mysqli_query($dbc,"SELECT * FROM user_roles ");
                                        while ($r=mysqli_fetch_assoc($q)) {
                                         $c++;
                                     ?>
                                     <tr>
                                         <td><?=$c?></td>
                                         <td><?=$r['user_role_name']?></td>
                                         <td><?=$r['user_role_status']?></td>
                                 
                                         <td>
                                             <a href="user_roles.php?id=<?=$r['user_role_id']?>" class="btn btn-sm btn-success" >Edit</a>
                                             <a href="#" onclick="deleteData('user_roles','user_role_id',<?=$r['user_role_id']?>,'user_roles.php')" class="btn btn-sm btn-danger">Delete</a>
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