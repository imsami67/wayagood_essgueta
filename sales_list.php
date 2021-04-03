 <?php 

include_once "includes/header.php";

include_once "inc/code.php";
$pri=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM custom_privileges WHERE user_id='".$_SESSION['userId']."'"));

?>
<style type="text/css">
  input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  padding: 8px;
}
</style>
<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Niwali Sales Table</div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">Niwali Sales Table</li>

                            </ol>

                        </div>

                    </div>



            <div class="col-sm-12">

                <div class="panel">

                    <div class="panel-heading " align="center">

                                        <div class="row form-group mb-5">
                                <div class="col-sm-3">
                                    <label>Since</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Until</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                   

                                    <?php if (@$_REQUEST['type']=="active"){ ?>
                                         <label>Status</label>
                                    
                                    <select class="form-control" id="order_type_get" name="order_type">
                                        <option   value="active_all" >All</option>
                                        <option  class="<?=@($pri['view_loaded']=='1')?'':'d-none'?>" value="loaded" >Loaded</option>
                                        <option  class="<?=@($pri['view_verified']=='1')?'':'d-none'?>" value="verified" >Verified</option>
                                        <option  class="<?=@($pri['view_sent']=='1')?'':'d-none'?>" value="sent" >Sent</option>
                                        <option  class="<?=@($pri['view_delivered']=='1')?'':'d-none'?>" value="delivered" >Delivered</option>
                                        <option  class="<?=@($pri['view_pending_collection']=='1')?'':'d-none'?>" value="pending_collection" >Pending Collection</option>
                                        <option  class="<?=@($pri['view_payment_agreement']=='1')?'':'d-none'?>" value="payment_agreement" >Payment Agreement</option>
                                        <option  class="<?=@($pri['view_charged']=='1')?'':'d-none'?>" value="charged" >Charged</option>
                                        <option  class="<?=@($pri['view_commission_paid']=='1')?'':'d-none'?>" value="commission_paid" >Commission Paid</option>
                                        <option  class="<?=@($pri['view_cleared']=='1')?'':'d-none'?>" value="cleared" >Cleared</option>
                                    </select>
                                    <?php }elseif (@$_REQUEST['type']=="returned") {
                                      ?>
                                       <label>Status</label>
                                      <select class="form-control" id="order_type_get" name="order_type">
                                        <option  value="returned_all" >All</option>
                                        <option class="<?=@($pri['view_pending_return']=='1')?'':'d-none'?>" value="pending_return" >Pending Return</option>
                                        <option class="<?=@($pri['view_returning']=='1')?'':'d-none'?>" value="returning" >Returning</option>
                                        <option class="<?=@($pri['view_confirm_return']=='1')?'':'d-none'?>" value="confirm_return" >Confirm Return</option>
                                        <option class="<?=@($pri['view_return_paid']=='1')?'':'d-none'?>" value="return_paid" >Return Paid</option>
                                        <option class="<?=@($pri['view_liquidated_return']=='1')?'':'d-none'?>" value="liquidated_return" >Liquidated Return</option>
                                        <option class="<?=@($pri['view_returned']=='1')?'':'d-none'?>" value="liquidated_return" >Returned</option>

                                       
                                    </select>

                                      <?php }elseif (@$_REQUEST['type']=="error") {
                                      ?>
                                       <label>Status</label>
                                      <select class="form-control" id="order_type_get" name="order_type">
                                        <option c  value="error_all" >All</option>
                                        <option class="<?=@($pri['view_error']=='1')?'':'d-none'?>"  value="error" >Error</option>
                                        <option class="<?=@($pri['view_package_handing']=='1')?'':'d-none'?>"  value="package_handing" >Package Handing</option>
                                        <option class="<?=@($pri['view_treatment_mangement']=='1')?'':'d-none'?>"  value="treatment_mangement" >Treatement Mangement</option>
                                         <option class="<?=@($pri['view_cash_envelope']=='1')?'':'d-none'?>"  value="cash_envelope" >Cash Envelope</option>
                                        <option class="<?=@($pri['view_missing_treatment']=='1')?'':'d-none'?>"  value="missing_treatment" >Missing Treatment</option>
                                        <option class="<?=@($pri['view_return_envelope']=='1')?'':'d-none'?>"  value="return_envelope" >Return Envelope</option>
                                       
                                    </select>
                                <?php   }elseif (@$_REQUEST['type']=="canceled") {
                                  ?>
                                   <label>Status</label>
                                      <select class="form-control" id="order_type_get" name="order_type">
                                       <option  class="<?=@($pri['view_canceled']==1)?'':'d-none'?>"  value="canceled">Canceled</option>
                                    </select>
                                <?php   } ?>
                                        
                               </div>
                               <div class="col-sm-3">
                                <br>

                                <label></label>
                                   <button type="button" class="btn mt-1 btn-sm btn-primary" onclick="order_type()" id="order_type_btn">
                                       Search
                                   </button>
                               </div>
                            </div>
       <hr>
                    </div>

                        <div class="panel-body">
                                <form action="php_action/custom_action.php" id="changeState_form" method="post">  
                         
                            <table class="table data-table" id="order_type_table">
                                <thead>
                                    <th>No#</th>
                                    <th>Agent</th>
                                    <th>Client</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                    <th>Add Date</th>
                                    <th>Deliver Date</th>
                                    <th>Actions</th>
                                    <th>Multiple</th>
                                </thead>
                               
                                <tbody id="order_type_tb">
                                    <?php 
                                    $c=0;
                                    if (@$_REQUEST['type']=="active"){

                                       $q=mysqli_query($dbc,"SELECT * FROM sale_order where order_status='loaded' OR order_status='verified'OR order_status='delivered' OR order_status='pending_collection' OR order_status='payment_agreement' OR order_status='charged' OR order_status='commission_paid' OR order_status='cleared'  ");
                                    
                                    }elseif (@$_REQUEST['type']=="returned") {




                                       $q=mysqli_query($dbc,"SELECT * FROM sale_order where order_status='pending_return' OR order_status='returning' OR order_status='confirm_return' OR order_status='return_paid' OR order_status='liquidated_return' ");
                                    
                                    }elseif (@$_REQUEST['type']=="canceled") {
                                       $q=mysqli_query($dbc,"SELECT * FROM sale_order where order_status='canceled' ");
                                    
                                    }elseif (@$_REQUEST['type']=="error") {
                                       $q=mysqli_query($dbc,"SELECT * FROM sale_order where order_status='error' OR order_status='package_handing' OR order_status='missing_treatment' OR order_status='return_envelope' OR order_status='treatment_mangement' OR order_status='cash_envelope' ");
                                    
                                    }elseif (@$_REQUEST['type']=="other") {
                                       $q=mysqli_query($dbc,"SELECT * FROM sale_order where order_status='".$_REQUEST['other']."'  ");
                                    
                                    }






                                        while ($r=mysqli_fetch_assoc($q)):
                                            $user=fetchRecord($dbc,"users",'user_id',$r['user_id']);
                                            $c++;
                                             $checks='';
                                            $checks='view_'.$r['order_status'];
                                            if ($pri[$checks]==1) {
                                              # code...
                                            
                                     ?>
                                     <tr>
                                      <th><?=$c?></th>
                                    <th><?=$user['username']?></th>
                                    <td><?=$r['nameClient']?></td>
                                    <td><?=$r['amount_payable']?></td>
                                    <td><?=$r['paymentTypeClient']?></td>
                                    <td><?=@str_replace("_"," ",ucfirst($r['order_status']))?></td>
                                    <td><?=getDateFormat("d-m-Y",$r['timestamp'])?></td>
                                    <td><?=$r['timestamp']?></td>
                                    <td>
                                        <a  href="loadsales.php?order_id=<?=$r['order_id']?>" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                    <td>
                                      <div class="form-group form-check">
                                       <input type="checkbox" name="changeState_checkbox[]"  class="form-check-input changeState_checkbox" value="<?=$r['order_id']?>">
    
                                      </div>
                                    </td>
                                   </tr>     
                                <?php }
                                          endwhile; ?>
                                </tbody>
                                <tfoot>
                                  <td colspan="3">
                                  

                                    <?php if (@$_REQUEST['type']=="active"){ ?>
                                        
                                    
                                    <select class="form-control"  name="changeState_select">
                                          <option value="automatic">Automatic</option>
                                        <option  value="loaded" >Loaded</option>
                                        <option  value="verified" >Verified</option>
                                        <option  value="sent" >Sent</option>
                                        <option  value="delivered" >Delivered</option>
                                        <option  value="pending_collection" >Pending Collection</option>
                                        <option  value="payment_agreement" >Payment Agreement</option>
                                        <option  value="charged" >Charged</option>
                                        <option  value="commission_paid" >Commission Paid</option>
                                        <option  value="cleared" >Cleared</option>
                                    </select>
                                    <?php }elseif (@$_REQUEST['type']=="returned") {
                                      ?>
                                      <select class="form-control"  name="changeState_select">
                                          <option value="automatic">Automatic</option>
                                        <option  value="pending_return" >Pending Return</option>
                                        <option  value="returning" >Returning</option>
                                        <option  value="confirm_return" >Confirm Return</option>
                                        <option  value="return_paid" >Return Paid</option>
                                        <option  value="liquidated_return" >Liquidated Return</option>
                                       
                                    </select>

                                      <?php }elseif (@$_REQUEST['type']=="error") {
                                      ?>
                                   
                                      <select class="form-control"  name="changeState_select">
                                          <option value="automatic">Automatic</option>
                                        <option  value="error" >Error</option>
                                        <option  value="package_handing" >Package Handing</option>
                                        <option  value="treatment_mangement" >Treatement Mangement</option>
                                         <option  value="cash_envelope" >Cash Envelope</option>
                                        <option  value="missing_treatment" >Missing Treatment</option>
                                        <option  value="return_envelope" >Return Envelope</option>
                                       
                                    </select>
                                <?php   }elseif (@$_REQUEST['type']=="canceled") {
                                  ?>
                                  
                                      <select class="form-control"  name="changeState_select">
                                         <option value="automatic">Automatic</option>
                                       <option value="canceled">Canceled</option>
                                    </select>
                                <?php   }else{ ?>
                                  <select class="form-control"  name="changeState_select">
                                    <option value="automatic">Automatic</option>
                                       
                                    </select>
                                  <?php } ?>
                                        
                               
                                  </td>
                                  <td colspan="7">
                                    <button class="btn btn-success" type="submit" id="changeState_btn">Change Status</button>
                                  </td>
                                </tfoot>
                              
                            </table>   
                             </form>               
                        </div>

                        </div>

                    </div>





    </div></div>  <!-- /// end of panel-->
<script type="text/javascript">
  function order_type() {
                     var value=  $('#order_type_get :selected').val();
console.log('dafsf');
        var from_date=  $('#from_date').val();
        var to_date=  $('#to_date').val();

         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {order_type_get:value,from_date:from_date,to_date:to_date},
            dataType:"text",
            success:function (msg) {
              var res=msg.trim();
               $("#order_type_tb").empty().html(res);
                
            }
        });//ajax call }
        // body...
             } 
</script>
<?php

include_once "includes/footer.php";

?>