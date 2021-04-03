 <?php 



include_once "includes/header.php";



@include_once "inc/code.php";

$pri=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM custom_privileges WHERE user_id='".$_SESSION['userId']."'"));

?>
<style type="text/css">
    input,select{
        text-transform: uppercase;
    }
</style>


<!-- start page content -->



            <div class="page-content-wrapper">



                <div class="page-content">



                    <div class="page-bar">



                        <div class="page-title-breadcrumb">



                            <div class=" pull-left">



                                <div class="page-title">Sales</div>



                            </div>



                            <ol class="breadcrumb page-breadcrumb pull-right">



                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>



                                </li>



                                <li class="active">Sales</li>



                            </ol>



                        </div>



                    </div>







            <div class="col-sm-12">



                <div class="panel">



                    <div class="panel-heading panel-heading-info" align="center">



                       
                      

                   <div class="row">
                       <div class="col-sm-6"> <b class="h3">Worksheet to enter Order</b></div>
                       <?php if (isset($_REQUEST['order_id'])): ?>
                           
                        <?php   $user=fetchRecord($dbc,"users",'user_id',$patient['user_id']);
                                           ?>
                       <div  class="col-sm-2">
                        <label class=" form-label form-check-inline">Agent</label>
                        </div>
                        <div class="col-sm-4">
                        <input type="text" readonly class="form-control " value="<?=$user['username']?>">
                    
                       </div>
                        <?php endif ?>
                   </div>

    

                    </div>



                        <div class="panel-body">

                            <div class="response">

                                

                            </div>

                            <form id="order_sale_form" action="php_action/custom_action.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="order_id" value="<?=@$patient['order_id']?>">

                                    <div class="row">

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Name of patient</label>

                                                <input class="form-control" maxlength="50" name="nameClient" placeholder="Name of patient" required type="text" autofocus="autofocus" id="nameClient" value="<?=@$patient['nameClient']?>">

                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Patient Last Name</label>

                                                <input class="form-control" maxlength="50" name="lastNameClient" placeholder="Patient's last name" required="required" type="text" value="<?=@$patient['lastNameClient']?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Main phone</label>

                                                <input class="form-control" placeholder="Main phone" maxlength="10" required="required" name="phoneClient" type="text" value="<?=@$patient['phoneClient']?>">

                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Alternative telephone</label>

                                                <input class="form-control" placeholder="Alternative telephone" maxlength="10" name="phoneAltClient" type="text" value="<?=@$patient['phoneAltClient']?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Gender?</label>

                                                 <select class="form-control" name="genderClient">

                                                    <option <?=@($patient['genderClient']=="male")?"selected":""?> value="male">Male</option>

                                                    <option <?=@($patient['genderClient']=="female")?"selected":""?> value="female">Female</option>



                                                 </select>

                                            

                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">

                                                <label>Age</label>

                                                <input class="form-control" placeholder="Age" name="ageClient" min="10" max="90" maxlength="2" type="number" value="<?=@$patient['ageClient']?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div style="border-bottom: solid black 1px; border-top: solid black 1px;">

                                    </div>

                                    <br>

                                    <div class="row">

                                        <div class="col-12">

                                            <div class="form-group">

                                                <label>Direction</label>

                                                <input class="form-control" name="dirClient" placeholder="Direction" required="required" type="text" value="<?=@$patient['dirClient']?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>City</label>

                                                <input class="form-control" name="cityClient" placeholder="City" required="required" type="text" value="<?=@$patient['cityClient']?>">

                                            </div>

                                        </div>

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Condition</label>

                                                <input class="form-control" placeholder="Condition" name="stateClient" required="required" type="text" value="<?=@$patient['stateClient']?>">

                                            </div>

                                        </div>

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Zipcode</label>

                                                <input class="form-control" placeholder="Zipcode" maxlength="5" name="zipcodeClient"  required="required" type="text" value="<?=@$patient['zipcodeClient']?>">

                                            </div>

                                        </div>

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Zip4</label>

                                                <input class="form-control" placeholder="Zip4" maxlength="4" name="zip4Client" type="text" value="<?=@$patient['zip4Client']?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div style="border-bottom: solid black 1px; border-top: solid black 1px;">

                                   <?php if (isset($_REQUEST['order_id'])): ?>
                                            
                                    
                                    <div class="row d-none">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tracking</label>
                                                <a value="" class="form-control" href="https://tools.usps.com/go/TrackConfirmAction.action?tLabels=" target="blank"></a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Return tracking (about)</label>
                                                <a value="" class="form-control" href="https://tools.usps.com/go/TrackConfirmAction.action?tLabels=" target="blank"></a>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endif ?>

                                    <div style="border-bottom: solid black 1px; border-top: solid black 1px;">

                                    </div>

                                    <br>

                                   

                                    

                                    <div class="row">

                                        

                                       

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Amount payable?</label>

                                                <input class="form-control" id="amount_payable" name="amount_payable" placeholder="Amount payable" type="number" value="<?=@$patient['amount_payable']?>">

                                            </div>

                                        </div>

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Was it a rearrangement?</label>

                                                <select class="form-control" name="rearrangement_status">

                                                    <option <?=@($patient['rearrangement_status']=="yes")?"selected":""?> value="yes">Yes</option>

                                                    <option <?=@($patient['rearrangement_status']=="no")?"selected":""?> value="no">No</option>

                                                </select>



                                                </div>

                                        </div>

                                  

                                    

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Way to pay</label>

                                                <select class="form-control" name="paymentTypeClient" required="required">



                                                    <option <?=@($patient['paymentTypeClient']=="credit_card")?"selected":""?> value="credit_card" >Credit card</option>

                                                    <option <?=@($patient['paymentTypeClient']=="bank_deposit")?"selected":""?> value="bank_deposit" >Bank deposit</option>

                                                    <option <?=@($patient['paymentTypeClient']=="zelle")?"selected":""?> value="zelle" >Zelle</option>

                                                    <option <?=@($patient['paymentTypeClient']=="paypal")?"selected":""?> value="paypal" >PayPal</option>

                                                    <option <?=@($patient['paymentTypeClient']=="money_order")?"selected":""?> value="money_order" >Money order</option>

                                                </select>

                                            </div>

                                        </div>

                                        

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Card type (only if applicable)</label>

                                                <select class="form-control" name="cardProcess">

                                                    <option <?=@($patient['cardProcess']=="visa")?"selected":""?> value="visa"> Visa</option>

                                                    <option <?=@($patient['cardProcess']=="n/a")?"selected":""?> value="n/a" style="color: black;">N / A</option>

                                                    <option <?=@($patient['cardProcess']=="visa")?"selected":""?> value="visa" style="color: black;">Visa</option>

                                                    <option <?=@($patient['cardProcess']=="mastercard")?"selected":""?> value="mastercard" style="color: black;">Mastercard</option>

                                                </select>

                                            </div>

                                        </div>

                                    

                                    </div>
                                    <?php if (isset($_REQUEST['order_id'])): ?>
                                        <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Pending Amount:</label>   
                                                                                               
                                                <input type="text" id="pending_amount" class="form-control" placeholder="Amount of current debt" name="pending_amount" readonly="readonly" value="<?=(int)$patient['amount_payable']-(int)$patient['amount_paid']?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">   
                                                <label>Amount to Pay:</label>                                              
                                                <input type="number" min="1"  class="form-control" placeholder="Amount to be paid to the current sale" id="amount_paid" name="amount_paid" value="">
                                            </div>
                                        </div>                                    
                                        <div class="col-3">
                                            <label>Make sure before pressing</label> 
                                            <input type="button"   class="btn btn-info btn-sm " value="Pay to the payment agreement" id="payto_payment_agree_btn" onclick="payPayment(<?=@$patient['order_id']?>)">
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <?php if (isset($_REQUEST['order_id'])): ?>
                                       
                                      
                                       <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label>Comment regarding payment</label>
                                                <textarea class="form-control" placeholder="Enter new comment regarding the payment." name="payment_coment2" readonly id="payment_coment2" rows="3"><?=@$patient['payment_coment1']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endif ?>
                                        <div class="row">

                                        <div class="col-12">

                                            <div class="form-group">

                                            <label>New Comment regarding payment</label>

                                                <textarea  class="form-control" placeholder="Comments made about the payment" name="payment_coment1" id="payment_coment1" rows="3"></textarea>

                                            </div>

                                        </div>

                                    </div>
                                            
                                     
                                   

                                  

                                    <div style="border-bottom: solid black 1px; border-top: solid black 1px;"></div>

                                    <br>

                                    <div class="row">

                                        <div class="col-4">

                                            <div class="form-group">

                                                <label>Select Treatment 1</label>
                                             
                                                <select required  <?=@isset($_REQUEST['order_id'])?"disabled":""?> class="form-control  product_select " id="product1" name="product1">
                                                      <option  value="">Select Treatment 2</option>
                                                     <?php $q=mysqli_query($dbc,"SELECT * FROM db_products ");
                      $c=0;
                      while ($r=mysqli_fetch_assoc($q)) {
                        $c++;
                       ?>
                                                    <option  <?=@($patient['product1']==$r['id'])?"selected":""?>   value="<?=$r['id']?>" ><?=$r['name']?></option>
                                                <?php } ?>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-2">

                                            <div class="form-group">

                                                <label>Qty 1</label>
                                                <input type="text"  readonly class="form-control <?=@isset($_REQUEST['order_id'])?"":"d-none"?>"  value="<?=@$patient['qty1']?>">
                                                <select  required class="form-control  qty_select <?=@isset($_REQUEST['order_id'])?"d-none":""?>" onchange="qty_select(1)" id="qty1" name="qty1">

                                                    <option <?=@($patient['qty1']=="0")?"selected":""?>  value="0" >0</option>

                                                    <option <?=@($patient['qty1']=="1")?"selected":""?>  value="1" >1</option>

                                                    <option <?=@($patient['qty1']=="2")?"selected":""?>  value="2" >2</option>

                                                    <option <?=@($patient['qty1']=="3")?"selected":""?>  value="3" >3</option>

                                                    <option <?=@($patient['qty1']=="4")?"selected":""?>  value="4" >4</option>

                                                   

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="form-group">

                                                <label>Select Treatment 2</label>
                                             
                                                <select   <?=@isset($_REQUEST['order_id'])?"disabled":""?> class="form-control  product_select " id="product2" name="product2">
                                                      <option  value="">Select Treatment 2</option>
                                                     <?php $q=mysqli_query($dbc,"SELECT * FROM db_products ");
                      $c=0;
                      while ($r=mysqli_fetch_assoc($q)) {
                        $c++;
                       ?>
                                                    <option  <?=@($patient['product2']==$r['id'])?"selected":""?>   value="<?=$r['id']?>" ><?=$r['name']?></option>
                                                <?php } ?>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-2">

                                            <div class="form-group">

                                                <label>Qty 2</label>

                                                <input type="text" readonly class="form-control <?=@isset($_REQUEST['order_id'])?"":"d-none"?>"  value="<?=@$patient['qty2']?>">
                                                <select   class="form-control  qty_select <?=@isset($_REQUEST['order_id'])?"d-none":""?>" id="qty2" onchange="qty_select(2)" name="qty2">

                                                    <option <?=@($patient['qty2']=="0")?"selected":""?>  value="0" >0</option>

                                                    <option <?=@($patient['qty2']=="1")?"selected":""?>  value="1" >1</option>

                                                    <option <?=@($patient['qty2']=="2")?"selected":""?>  value="2" >2</option>

                                                    <option <?=@($patient['qty2']=="3")?"selected":""?>  value="3" >3</option>

                                                    <option <?=@($patient['qty2']=="4")?"selected":""?>  value="4" >4</option>

                                                 

                                                </select>

                                            </div>

                                            </div>

                                   

                                    </div>

                                    <div class="row">

                                             <div class="col-4">

                                            <div class="form-group">

                                                <label>Select Treatment 3</label>
                                             
                                                <select   <?=@isset($_REQUEST['order_id'])?"disabled":""?> class="form-control  product_select " id="product3" name="product3">
                                                      <option  value="">Select Treatment 2</option>
                                                     <?php $q=mysqli_query($dbc,"SELECT * FROM db_products ");
                      $c=0;
                      while ($r=mysqli_fetch_assoc($q)) {
                        $c++;
                       ?>
                                                    <option  <?=@($patient['product3']==$r['id'])?"selected":""?>   value="<?=$r['id']?>" ><?=$r['name']?></option>
                                                <?php } ?>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-2">

                                            <div class="form-group">

                                                <label>Qty 3</label>

                                                <input type="text" readonly class="form-control <?=@isset($_REQUEST['order_id'])?"":"d-none"?>"  value="<?=@$patient['qty3']?>">
                                                <select   class="form-control  qty_select <?=@isset($_REQUEST['order_id'])?"d-none":""?>" id="qty3" onchange="qty_select(3)" name="qty3">

                                                    <option <?=@($patient['qty3']=="0")?"selected":""?>  value="0" >0</option>

                                                    <option <?=@($patient['qty3']=="1")?"selected":""?>  value="1" >1</option>

                                                    <option <?=@($patient['qty3']=="2")?"selected":""?>  value="2" >2</option>

                                                    <option <?=@($patient['qty3']=="3")?"selected":""?>  value="3" >3</option>

                                                    <option <?=@($patient['qty3']=="4")?"selected":""?>  value="4" >4</option>

                                                 

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="form-group">

                                                <label>Select Treatment 4</label>
                                             
                                                <select   <?=@isset($_REQUEST['order_id'])?"disabled":""?> class="form-control  product_select " id="product4" name="product4">
                                                      <option  value="">Select Treatment 2</option>
                                                     <?php $q=mysqli_query($dbc,"SELECT * FROM db_products ");
                      $c=0;
                      while ($r=mysqli_fetch_assoc($q)) {
                        $c++;
                       ?>
                                                    <option  <?=@($patient['product4']==$r['id'])?"selected":""?>   value="<?=$r['id']?>" ><?=$r['name']?></option>
                                                <?php } ?>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-2">

                                            <div class="form-group">

                                                <label>Qty 4</label>

                                                <input type="text" readonly class="form-control <?=@isset($_REQUEST['order_id'])?"":"d-none"?>"  value="<?=@$patient['qty4']?>">
                                                <select   class="form-control  qty_select <?=@isset($_REQUEST['order_id'])?"d-none":""?>" id="qty4"  onchange="qty_select(4)" name="qty4">

                                                    <option <?=@($patient['qty4']=="0")?"selected":""?>  value="0" >0</option>

                                                    <option <?=@($patient['qty4']=="1")?"selected":""?>  value="1" >1</option>

                                                    <option <?=@($patient['qty4']=="2")?"selected":""?>  value="2" >2</option>

                                                    <option <?=@($patient['qty4']=="3")?"selected":""?>  value="3" >3</option>

                                                    <option <?=@($patient['qty4']=="4")?"selected":""?>  value="4" >4</option>

                                                </select>

                                            </div>

                                        </div>

                                        

                                                                             

                                    </div>

                                  <?php if (isset($_REQUEST['order_id'])): ?>
                                      <div class="row ">

                                        <div class="col-3">

                                            <div class="form-group">

                                                <label>Status</label>

                                                <input readonly class="form-control" name="statusOrder" type="text"  value="<?=@str_replace("_"," ",ucfirst($patient['order_status']))?>">

                                            </div>

                                        </div>  
                                      
                                        <?php if (isset($patient['ship_order_number'])): ?>
                                        <div class="col-4">

                                            <div class="form-group">

                                                <label>Ship Order No.</label>

                                                <input readonly class="form-control" name="statusOrder" type="text"  value="<?=@$patient['ship_order_number']?>">

                                            </div>

                                        </div>  
                                                <?php endif; ?>                                        
                                                <?php if (isset($patient['tracking_number'])): ?>
                                        <div class="col-4">

                                            <div class="form-group">

                                                <label>Tracking Number</label>

                                                <input readonly class="form-control" name="statusOrder" type="text"  value="<?=@$patient['tracking_number']?>">

                                            </div>

                                        </div>  
                                <?php endif; ?>

                                    </div>  
                                  <?php endif; ?> 
                            <?php if (isset($_REQUEST['order_id'])): ?>
                                    <div class="row">

                                        <div class="col-12">

                                            <div class="form-goup">

                                                <label>Comments of the sale.</label> 

                                                <textarea class="form-control" id="noteComentOld" name="noteComentOld" rows="5" readonly="readonly"><?=@$patient['noteActual']?></textarea>

                                            </div>

                                        </div>

                                    </div>

                            <?php endif ?>

                                    <div class="row">

                                        <div class="col-12">

                                            <div class="form-goup">

                                                <label>General sale comment</label>

                                                <textarea class="form-control" id="noteActual" name="noteActual" rows="3"></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <br>

                                    <div style="border-bottom: solid black 1px; border-top: solid black 1px;">

                                    </div>

                                    <br>  
                            <div class="row mb-5 refreshMeStatus">
                                <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="loaded"): ?>
                                   
                                                    <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'verified')" class="btn btn-success  btn-block <?=@($pri['update_verified']=='1')?'':'d-none'?>" value="check">Check</button> 
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'post_dated')" class="btn btn-style-1 btn-primary  btn-block <?=@($pri['update_post_dated']=='1')?'':'d-none'?>">Post-dating</button> 
                                                    </div>
                                                   <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'canceled')" class="btn btn-style-6 btn-danger  btn-block <?=@($pri['update_canceled']=='1')?'':'d-none'?>">Cancel</button>
                                                    </div>
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="post_dated"): ?>
                                   
                                                    <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'sent')" class="btn btn-success  btn-block <?=@($pri['update_sent']=='1')?'':'d-none'?>" value="check">Send</button> 
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'canceled')" class="btn btn-style-1 btn-primary  btn-block <?=@($pri['update_canceled']=='1')?'':'d-none'?>">Cancel</button> 
                                                    </div>
                                                
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="verified"): ?>
                                   
                                                    <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'sent')" class="btn btn-success  btn-block <?=@($pri['update_sent']=='1')?'':'d-none'?>" value="check">Send</button> 
                                                    </div>
                                                       <div class="col-2">
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'canceled')" class="btn btn-style-1 btn-primary  btn-block <?=@($pri['update_canceled']=='1')?'':'d-none'?>">">Cancel</button> 
                                                    </div>
                                                    
                                                    
                                                
                                  <?php endif ?>
                                   <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="sent"): ?>
                                   
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'delivered')" class="ml-2 mt-2 btn btn-success <?=@($pri['update_delivered']=='1')?'':'d-none'?>">">Deliver</button> 
                                                    
                                                     
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'payment_agreement')" class="ml-2 mt-2 btn btn-success <?=@($pri['update_payment_agreement']=='1')?'':'d-none'?>">Payment Agreement</button> 
                                                    
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'cash_envelope')" class="ml-2 mt-2 btn btn-primary <?=@($pri['update_cash_envelope']=='1')?'':'d-none'?>">Cash Envelope</button> 
                                                    
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'return_envelope')" class="ml-2 mt-2 btn btn-primary <?=@($pri['update_return_envelope']=='1')?'':'d-none'?>">Return Envelope</button> 
                                                    

                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'missing_treatment')" class="ml-2 mt-2 btn btn-primary <?=@($pri['update_missing_treatment']=='1')?'':'d-none'?>">Missing Treatment</button> 
                                                    
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_return')" class="ml-2 mt-2 btn btn-primary <?=@($pri['update_pending_return']=='1')?'':'d-none'?>"> Pending Return</button> 
                                                    
                                                     
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'error')" class="ml-2 mt-2 btn btn-danger <?=@($pri['update_error']=='1')?'':'d-none'?>">Error</button> 
                                                          <button type="button"  onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button> 
                                                    
                                                    
                                                    
                                                
                                  <?php endif ?> 

                                   <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="delivered"): ?>
                                   
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_collection')" class="m-2 btn btn-success <?=@($pri['update_pending_collection']=='1')?'':'d-none'?>">Pending Collection</button> 
                                                    
                                                     
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'charged')" class="m-2 btn btn-success <?=@($pri['update_charged']=='1')?'':'d-none'?>">Charged</button> 
                                                    
                                                     
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'payment_agreement')" class="m-2 btn btn-success <?=@($pri['update_payment_agreement']=='1')?'':'d-none'?>">">Payment Agreement</button> 
                                                    
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'cash_envelope')" class="m-2 btn btn-success <?=@($pri['update_cash_envelope']=='1')?'':'d-none'?>">Cash Envelope</button> 
                                                    
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'return_envelope')" class="m-2 btn btn-success <?=@($pri['update_return_envelope']=='1')?'':'d-none'?>">Return Envelope</button> 
                                                    
                                                    <br>
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'missing_treatment')" class="m-2 btn btn-success <?=@($pri['update_missing_treatment']=='1')?'':'d-none'?>">Missing Treatment</button> 
                                                    
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_return')" class="m-2 btn btn-primary <?=@($pri['update_pending_return']=='1')?'':'d-none'?>"> Pending Return</button> 
                                                    
                                                     
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'error')" class="m-2 btn btn-danger <?=@($pri['update_error']=='1')?'':'d-none'?>">Error</button> 
                                                    
                                                    
                                                        <button type="button"   onclick="changeStatus(<?=$_REQUEST['order_id']?>,'returning')" class="m-2 btn btn-primary <?=@($pri['update_returning']=='1')?'':'d-none'?>">Returning</button> 
                                                    
                                                     
                                                        <button type="button" onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button> 
                                                    
                                                    
                                                    
                                                
                                  <?php endif ?> 
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="pending_collection"): ?>
                                    <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'charged')" class="btn btn-success ">Charged</button> 
                                                    </div>
                                                <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'payment_agreement')" class="btn btn-success <?=@($pri['update_payment_agreement']=='1')?'':'d-none'?>">">Payment Agreement</button> 
                                                    </div>
                                                <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_return')" class="btn btn-primary <?=@($pri['update_pending_return']=='1')?'':'d-none'?>">Pending Return</button> 
                                                    </div>
                                                    
                                                    
                                                
                                  <?php endif ?>
                                   <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="returning"): ?>
                                      <button type="button" onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button>
                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'returned')" class="btn btn-success m-2 <?=@($pri['update_returned']=='1')?'':'d-none'?>">Returned</button> 
                                                  
                                                
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'confirmed_return')" class="btn btn-primary m-2 <?=@($pri['update_confirm_return']=='1')?'':'d-none'?>">Confirmed Return</button> 
                                                  
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'return_collected')" class="btn btn-primary m-2 <?=@($pri['update_return_collected']=='1')?'':'d-none'?>">Return Collected</button>
                                <?php endif; ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="pending_return"): ?>
                                                 
                                                
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'returning')" class="btn btn-warning m-2 <?=@($pri['update_returning']=='1')?'':'d-none'?>">Returning</button> 
                                                  
                                                
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'returned')" class="btn btn-success m-2 <?=@($pri['update_returned']=='1')?'':'d-none'?>">Returned</button> 
                                                  
                                                
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'confirmed_return')" class="btn btn-primary m-2 <?=@($pri['update_confirm_return']=='1')?'':'d-none'?>">Confirmed Return</button> 
                                                  
                                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'return_collected')" class="btn btn-primary m-2 <?=@($pri['update_return_collected']=='1')?'':'d-none'?>">Return Collected</button> 
                                                  
                                                     
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_collection')" class="btn btn-primary m-2 <?=@($pri['update_pending_collection']=='1')?'':'d-none'?>">Pending Collection</button> 
                                                  
                                                      <button type="button" onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button> 
                                                    
                                                
                                  <?php endif ?>

                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="payment_agreement"): ?>
                                    
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'charged')" class="btn btn-success m-2 <?=@($pri['update_charged']=='1')?'':'d-none'?>">Charged</button> 
                                                   
                                                
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'pending_return')" class="btn btn-primary m-2 <?=@($pri['update_pending_return']=='1')?'':'d-none'?>"> Return Slope</button> 
                                                   
                                                    
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="charged"): ?>
                                    <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'commission_paid')" class="btn btn-success <?=@($pri['update_commission_paid']=='1')?'':'d-none'?>">Commission Paid</button> 
                                                    </div>
                                            
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="commission_paid"): ?>
                                    <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'cleared')" class="btn btn-success <?=@($pri['update_cleared']=='1')?'':'d-none'?>">Liquidate</button> 
                                                    </div>
                                            
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="return_envelope"): ?>
                                    <div class="col-2">
                                                        <button type="button" onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button>
                                                    </div>
                                            
                                                    
                                                
                                  <?php endif ?>
                                  <?php if (isset($_REQUEST['order_id']) AND $patient['order_status']=="error"): ?>
                                    <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'package_handing')" class="btn btn-success <?=@($pri['update_package_handing']=='1')?'':'d-none'?>">Package Handing</button> 
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button"  onclick="changeStatus(<?=$_REQUEST['order_id']?>,'missing_treatment')" class="btn btn-success <?=@($pri['update_missing_treatment']=='1')?'':'d-none'?>">Missing Treatment</button> 
                                                    </div>
                                                     <div class="col-2">
     <button type="button" onclick="checkTracking(<?=$_REQUEST['order_id']?>)"  class="m-2 btn btn-warning <?=@($pri['call_tracking_number']=='1')?'':'d-none'?>">Checking Tracking Number</button>

                                                    </div>
                                            
                                                    
                                                
                                  <?php endif ?>
                            </div>   
                                     <?php if (!isset($_REQUEST['order_id'])): ?>
                                    <div class="row">

                                        <div class="col-4">

                                        </div>

                                        <div class="col-4">

                                            <div class="form-group">                                                

                                                <font style="vertical-align: inherit;">

                                                <input type="submit" name="order_sale" class="btn btn-success submit-btn btn-block <?=@($pri['update_loaded']=='1')?'':'d-none'?>" value="Load sale"></font>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                        </div>

                                    </div>

                                  <?php endif ?>   

                                

                            </div></form>

                        </div>   <!-- end of panel-body -->



                        </div>



                    </div>











    </div></div>  <!-- /// end of panel-->

<script type="text/javascript">
 function payPayment(id) {
   console.log(id);
      // var pending_amount=  $('#pending_amount').val();
      // var amount_payable=  $('#amount_payable').val();
         var amount_paid=  $('#amount_paid').val();
         var payment_coment1=  $('#payment_coment1').val();
         var payment_coment2=  $('#payment_coment2').val();
         console.log(amount_paid);

        if (amount_paid!='' || amount_paid!='0') {
                $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {payPayment:id,amount_paid:amount_paid,payment_coment1:payment_coment1,payment_coment2:payment_coment2},
            dataType:"json",
            success:function (msg) {
            $('#amount_paid').reset();
                  sweeetalert("Done",msg.msg,'success',2000);
                //$("#payto_payment_agree_btn").prop("disabled",true);  
                
                $('#pending_amount').val(msg.sts);
            }
        });//ajax call }
   }else{
     sweeetalert("Error",'Amount to Pay: should not be empty','error',2000);
   }

   }
function qty_select(id) {
    var qtyC=parseInt($('#qty'+id).val());
  //  var productC= $('#product'+id).val();
  //  console.log(productC);
    //console.log(qtyC);

var i;
var current=qty=0;

for (i = 1; i <5; i++) {
     qty=parseInt($('#qty'+i).val());
  //var product= $('#product'+i).val(); 
   //  console.log(i+product);
console.log(qty);
current+=qty;
  
    if (current>4) {
    sweeetalert("Error",'Quantity should not greater then 4','error',2000);
   // $('#product'+id).val(''); 
    $('#qty'+id+" option[value='0' ").prop('selected',true);
   }
  
   
}
 
  
}
 function changeStatus(id,status) {
//  alert(id);
  //  console.log(id);
    console.log(status);
       var noteComentOld=  $('#noteComentOld').val();
       var noteActual=  $('#noteActual').val();
       
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {changeStatus:id,status:status,noteComentOld:noteComentOld,noteActual:noteActual},
            dataType:"json",
            success:function (response) {
             /* alert(response);
              console.log(response);*/
                if (response.sts=="success" && status!='sent') {    
                    
                $('#noteComentOld').val(response.msg2);
                $('#noteActual').val('');
       
                  sweeetalert("Done",response.msg,'success',2000);
               setTimeout(function(){

                location.assign("sales_list.php?type=other&other="+status); },2500);


                  
                 //$(".refreshMeStatus").load(location.href + " .refreshMeStatus > *");
               
                }else if(response.sts=="success" && status=='sent'){
                     sweeetalert("Wait","Wait a moment .... ",'info',1500);
                $.ajax({
                    type: 'POST',
                    url: 'send_data.php/',
                    data: {get_shiporderid:id},
                    dataType:"json",
                    success:function (data) {
           
                        if (data.sts=="success") {    
                    sweeetalert("Done",data.msg,'success',2000);
                setTimeout(function(){

                location.assign("sales_list.php?type=other&other="+status); },2500);


                  
                 //$(".refreshMeStatus").load(location.href + " .refreshMeStatus > *");
               
                }
            }
        });//ajax call }

                }
            }
        });//ajax call }
       

   }
     function checkTracking(id) {
      console.log(id);
    sweeetalert("Done","Waitng Checking Tracking Number",'info',1000);
       $.ajax({
                    type: 'POST',
                    url: 'tracking.php',
                    data: {get_tracking:id},
                    dataType:"json",
                    success:function (data) {
           
                           
                    sweeetalert("Done",data.msg,data.sts,2000);
              location.reload();

}
});
}


</script>

<?php



include_once "includes/footer.php";



?>