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

                                <div class="page-title">Users List</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Users List</li>

                            </ol>

                        </div>

                    </div>








<div class="col-sm-12">

		<div class="panel">

	<div class="panel-heading cyan-bgcolor" align="center"><h4>Users</h4></div>

	<div class="panel-body">

<?php getMessage(@$msg,@$sts); ?>

			<table class="table example1" id="myTable"  >

				<thead>

			<tr>	

				<th>User ID</th>

				<th>Username</th>

				<th>Email</th>

				<th>Phone</th>

				<th>Address</th>

				<th>User Role</th>

				<th>Status</th>

				<th>Action</th>

				<th>Set Privileges </th>

			</tr>

			</thead>

			<tbody>

			<?php 

				

			

			

			$sql = "SELECT * FROM users  ";

	

	$result = mysqli_query($dbc, $sql);

	

	if ( mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_array($result)){

			?>

			<tr>

				<td><?=$row['user_id'];?></td>

				<td><?=$row['username'];?></td>

				<td><?=$row['email'];?></td>

				<!-- <td>Encrypted </td> -->

				<td><?=$row['user_phone']?></td>

				<td><?=$row['user_address'];?></td>

				<td><?=$row['user_role'];?></td>

				

				<td>

					<?php

					if ($row['user_status'] == 'active') {

						?>

						 <span class="label label-lg label-info" style="font-size: ">Available</span>

						<?php

						# code...

					}else{

						?>

						<span class="label label-lg label-danger" style="font-size: "> Not Available</span>

						<?php

					}

					?>

				</td>

				<!-- <td><?=date('D, d-M-Y',strtotime($row['adddatetime'])) ;?> -->

					



				</td>

				<td><a href="users.php?user_del_id=<?=$row['user_id']?>" class="text-danger"><span class="fa fa-remove"></span></a> | 

					<a href="users.php?user_edit_id=<?=$row['user_id']?>" class="text-success"><span class="fa fa-edit"></span></a></td>

				<td><a href="privileges.php?users_id=<?=base64_encode($row['user_id'])?>" target="_blank" class="text-danger btn btn-info">Page
				</a> 
				<a href="custom_privileges.php?users_id=<?=base64_encode($row['user_id'])?>" target="_blank" class="text-danger btn btn-success mt-1">Other
				</a> 


					</td>	

				

			</tr>

			</tbody>

		<?php 

}

	} 

		?>

			

			

			</table>

		

	</div>

</div>



</div>

	</div></div>

<?php

include_once "includes/footer.php";

?>