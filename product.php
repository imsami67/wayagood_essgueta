 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
if (isset($_REQUEST['pro_id'])) {
     $pro=fetchRecord($dbc,"db_products",'id',$_REQUEST['pro_id']);
                               
}

?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Product</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Product</li>

                            </ol>

                        </div>

                    </div>



			<div class="col-sm-12">

				<div class="panel">

					<div class="panel-heading panel-heading-red h5" align="center">

						<b>Product</b>
						<a href="product.php" class="btn btn-success pull-right btn-sm">Add New</a>
	
					</div>

						<div class="panel-body">
          <div class="row">
              <div  class="col-sm-12">
                  <form action="php_action/custom_action.php" id="add_product_fm">
                      <input type="hidden" name="product_id" value="<?=@$pro['id']?>">
                      <div class="row form-group">
                          <div class="col-sm-6">
                            <label>Product Name</label>
                              <input  class="form-control" required type="text" name="product_name" value="<?=@$pro['name']?>">
                          </div>
                          <div class="col-sm-6">
                             <label>Product weight</label>
                              <input  class="form-control" required type="number" step="0.001" min="1" name="product_weight" value="<?=@$pro['weight']?>">
                          </div>
                         </div> 
                          <div class="row form-group">
                            <div class="col-sm-6">
                            <label>Rate</label>
                              <input  class="form-control" type="text" name="product_rate" value="<?=@$pro['rate']?>">
                          </div>
                          <div class="col-sm-6">
                            <label>SKU</label>
                              <input  class="form-control" type="text" name="product_sku" value="<?=@$pro['sku']?>">
                          </div>
                         </div> 
                         <div class="row form-group mt-2">
                          <div class="col-sm-2 offset-sm-8">
                             <button class="btn btn-primary float-right"   type="submit" id="add_product_btn"><?=isset($_REQUEST['pro_id'])?"Update Product":"Add Product"?></button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>                  
                        </div>

						</div>
<!-- ------------------- -->


                <div class="panel">

                    <div class="panel-heading panel-heading-red  h4" align="center">

                        <b>Product List</b>
                        
                    </div>

                        <div class="panel-body">
          <div class="row">
              <div  class="col-sm-12">
                  <table  class="table data-table" id="add_product_tb">
                      <thead>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Product Weight</th>
                          <th>Rate</th>
                          <th>SKU</th>
                          <th>Action</th>
                      </thead>
                      <?php $q=mysqli_query($dbc,"SELECT * FROM db_products ");
                      $c=0;
                      while ($r=mysqli_fetch_assoc($q)) {
                        $c++;
                       ?>
                       <tr>
                        <td><?=$c?></td>
                           <td><?=$r['name']?></td>
                           <td><?=$r['weight']?></td>
                            <td><?=@$r['rate']?></td>
                           <td><?=@$r['sku']?></td>
                           <td>
                               <a href="product.php?pro_id=<?=$r['id']?>" class="btn btn-primary btn-sm mt-1">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm m-1" onclick="deleteData('db_products','id',<?=$r['id']?>,'product.php')">Delete</a>
                           </td>
                       </tr>
                   <?php } ?>
                  </table>
              </div>
          </div>                  
                        </div>

                        </div>


					</div>





	</div></div>  <!-- /// end of panel-->

<?php

include_once "includes/footer.php";

?>