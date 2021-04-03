 <?php 

include_once "includes/header.php";

include_once "inc/code.php";



 $user_id = base64_decode($_REQUEST['users_id']);

//echo $user_id;
 
$fetchUSer=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id ='".base64_decode($_REQUEST['users_id'])."' "))



?>

<!-- start page content -->

            <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="page-bar">

                        <div class="page-title-breadcrumb">

                            <div class=" pull-left">

                                <div class="page-title">Privileges </div>

                            </div>

                            <ol class="breadcrumb page-breadcrumb pull-right">

                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>

                                </li>

                                <li>Users /&nbsp;</li>

                                <li class="active">Privileges</li>

                            </ol>

                        </div>

                    </div>



    <div class="col-sm-12">

        <div class="panel">

    <div class="panel-heading " align="center"><h4>Current user permissions</h4>
        
    </div>

    <div class="panel-body">

                             
                                <form  action="php_action/custom_action.php" method="POST" enctype="multipart/form-data" id="custom_privileges_form">
                                <input type="hidden" name="user_id" value="<?=base64_decode($_REQUEST['users_id'])?>">                                        
            <?php if (isset($_REQUEST['users_id'])): 

     @$pri=fetchRecord($dbc,"custom_privileges",'user_id',base64_decode($_REQUEST['users_id']));
         endif;     ?>
                
            
<div class="row">    
<!--------------------------------------------* Operaciones *-------------------------------------------->
    <div class="col-6" >    
    
          
      
        <div class="row">                                            
            <div class="col-9">
                <div class="form-group" style="text-align: center;">
                    <h5 class="sub-titles"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sales</font></font></h5>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group" >
                <input type="checkbox" id="checkAl" class="form-check-inline">CheckAll
            </div>

            </div>
        </div>
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
           
     
        <div class="row">                                            
            <div class="col-8">
                <h5 class="text-left">Name</h5>
            </div>
            <div class="col-2">
                <h5 class="text-left">View</h5>
            </div>
            <div class="col-2">
                <h5 class="text-left">Update</h5>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
        <br>  
         <div class="row">                                            
            <div class="col-8">
                <div class="form-group ">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">View Charged Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <input  type="hidden" value="0" name="view_loaded" id="view_loaded">                                           
                    <input <?=@($pri['view_loaded']==1)?"checked":""?> type="checkbox" value="1" name="view_loaded" id="view_loaded">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_loaded" id="update_loaded">                                           
                    <input <?=@($pri['update_loaded']==1)?"checked":""?> type="checkbox" value="1" name="update_loaded" id="update_loaded">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group ">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">View Charged Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <input  type="hidden" value="0" name="view_charged" id="view_charged">                                           
                    <input <?=@($pri['view_charged']==1)?"checked":""?> type="checkbox" value="1" name="view_charged" id="view_charged">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_charged" id="update_charged">                                           
                    <input <?=@($pri['update_charged']==1)?"checked":""?> type="checkbox" value="1" name="update_charged" id="update_charged">
                </div>
            </div>
        </div>
        
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Verified Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_verified" id="view_verified">                                          
                    <input <?=@($pri['view_verified']==1)?"checked":""?> type="checkbox" value="1" name="view_verified" id="view_verified">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_verified" id="update_verified">                                          
                    <input <?=@($pri['update_verified']==1)?"checked":""?> type="checkbox" value="1" name="update_verified" id="update_verified">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Post Dated</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_post_dated" id="view_post_dated">                                          
                    <input <?=@($pri['view_post_dated']==1)?"checked":""?> type="checkbox" value="1" name="view_post_dated" id="view_post_dated">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_post_dated" id="update_post_dated">                                          
                    <input <?=@($pri['update_post_dated']==1)?"checked":""?> type="checkbox" value="1" name="update_post_dated" id="update_post_dated">
                </div>
            </div>
        </div>

        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Sent sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_sent" id="view_sent">                                           
                    <input <?=@($pri['view_sent']==1)?"checked":""?> type="checkbox" value="1" name="view_sent" id="view_sent">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_sent" id="update_sent">                                           
                    <input <?=@($pri['update_sent']==1)?"checked":""?> type="checkbox" value="1" name="update_sent" id="update_sent">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">View Delivered Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_delivered" id="view_delivered">                                          
                    <input <?=@($pri['view_delivered']==1)?"checked":""?> type="checkbox" value="1" name="view_delivered" id="view_delivered">
                </div>
            </div>

            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_delivered" id="update_delivered">                                          
                    <input <?=@($pri['update_delivered']==1)?"checked":""?> type="checkbox" value="1" name="update_delivered" id="update_delivered">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> sales Pending Collection</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_pending_collection" id="view_pending_collection">                                           
                    <input <?=@($pri['view_pending_collection']==1)?"checked":""?> type="checkbox" value="1" name="view_pending_collection" id="view_pending_collection">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_pending_collection" id="update_pending_collection">                                           
                    <input <?=@($pri['update_pending_collection']==1)?"checked":""?> type="checkbox" value="1" name="update_pending_collection" id="update_pending_collection">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> sales in Payment Agreement</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_payment_agreement" id="view_payment_agreement">                                              
                    <input <?=@($pri['view_payment_agreement']==1)?"checked":""?> type="checkbox" value="1" name="view_payment_agreement" id="view_payment_agreement">
                </div>
            </div>
              <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_payment_agreement" id="update_payment_agreement">                                              
                    <input <?=@($pri['update_payment_agreement']==1)?"checked":""?> type="checkbox" value="1" name="update_payment_agreement" id="update_payment_agreement">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">View Return Collected</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_return_collected" id="view_return_collected">                                           
                    <input <?=@($pri['view_return_collected']==1)?"checked":""?> type="checkbox" value="1" name="view_return_collected" id="view_return_collected">
                </div>
            </div>

            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_return_collected" id="update_return_collected">                                           
                    <input <?=@($pri['update_return_collected']==1)?"checked":""?> type="checkbox" value="1" name="update_return_collected" id="update_return_collected">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> sales with Commission Paid</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_commission_paid" id="view_commission_paid">                                           
                    <input <?=@($pri['view_commission_paid']==1)?"checked":""?> type="checkbox" value="1" name="view_commission_paid" id="view_commission_paid">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_commission_paid" id="update_commission_paid">                                           
                    <input <?=@($pri['update_commission_paid']==1)?"checked":""?> type="checkbox" value="1" name="update_commission_paid" id="update_commission_paid">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See Cleared Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_cleared" id="view_cleared">                                            
                    <input <?=@($pri['view_cleared']==1)?"checked":""?> type="checkbox" value="1" name="view_cleared" id="view_cleared">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_cleared" id="update_cleared">                                            
                    <input <?=@($pri['update_cleared']==1)?"checked":""?> type="checkbox" value="1" name="update_cleared" id="update_cleared">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
        <br>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error (Unspecified)</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_error" id="view_error">                                           
                    <input <?=@($pri['view_error']==1)?"checked":""?> type="checkbox" value="1" name="view_error" id="view_error">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_error" id="update_error">                                           
                    <input <?=@($pri['update_error']==1)?"checked":""?> type="checkbox" value="1" name="update_error" id="update_error">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error Package Handling</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_package_handing" id="view_package_handing">                                           
                    <input <?=@($pri['view_package_handing']==1)?"checked":""?> type="checkbox" value="1" name="view_package_handing" id="view_package_handing">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_package_handing" id="update_package_handing">                                           
                    <input <?=@($pri['update_package_handing']==1)?"checked":""?> type="checkbox" value="1" name="update_package_handing" id="view_package_handing">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Error Handling Treatment</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_treatment_mangement" id="view_treatment_mangement">                                           
                    <input <?=@($pri['view_treatment_mangement']==1)?"checked":""?> type="checkbox" value="1" name="view_treatment_mangement" id="view_treatment_mangement">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_treatment_mangement" id="update_treatment_mangement">                                           
                    <input <?=@($pri['update_treatment_mangement']==1)?"checked":""?> type="checkbox" value="1" name="update_treatment_mangement" id="update_treatment_mangement">
                </div>
            </div>
        </div>
    
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 2px;">
                </div>
            </div>
        </div>
        <br>
                
    </div>

<!--------------------------------------------* Usuarios *-------------------------------------------->    
    <div class="col-6" >

      
        <div class="row">                                            
            <div class="col-12">
                <div class="form-group" style="text-align: center;">
                    <h5 class="sub-titles"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Return Sales</font></font></h5>
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
           
     
        <div class="row">                                            
            <div class="col-8">
                <h5 class="text-left">Name</h5>
            </div>
            <div class="col-2">
                <h5 class="text-left">View</h5>
            </div>
            <div class="col-2">
                <h5 class="text-left">Update</h5>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
        <br>  
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Pending Return</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_pending_return" id="view_pending_return">                                            
                    <input <?=@($pri['view_pending_return']==1)?"checked":""?> type="checkbox" value="1" name="view_pending_return" id="view_pending_return">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_pending_return" id="update_pending_return">                                            
                    <input <?=@($pri['update_pending_return']==1)?"checked":""?> type="checkbox" value="1" name="update_pending_return" id="update_pending_return">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See sales Returning</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="view_returning" id="view_returning">                                            
                    <input <?=@($pri['view_returning']==1)?"checked":""?> type="checkbox" value="1" name="view_returning" id="view_returning">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <input  type="hidden" value="0" name="update_returning" id="update_returning">                                            
                    <input <?=@($pri['update_returning']==1)?"checked":""?> type="checkbox" value="1" name="update_returning" id="update_returning">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirm Return Sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_confirmed_return" id="view_confirmed_return">                                           
                    <input <?=@($pri['view_confirmed_return']==1)?"checked":""?> type="checkbox" value="1" name="view_confirmed_return" id="view_confirmed_return">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_confirmed_return" id="update_confirmed_return">                                           
                    <input <?=@($pri['update_confirmed_return']==1)?"checked":""?> type="checkbox" value="1" name="update_confirmed_return" id="update_confirmed_return">
                </div>
            </div>
        </div>
     
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Return Paid</font></font></h6>
               </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_return_paid" id="view_return_paid">                                          
                    <input <?=@($pri['view_return_paid']==1)?"checked":""?> type="checkbox" value="1" name="view_return_paid" id="view_return_paid">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input type="hidden" value="0" name="update_return_paid" id="update_return_paid">                                          
                    <input <?=@($pri['update_return_paid']==1)?"checked":""?> type="checkbox" value="1" name="update_return_paid" id="update_return_paid">
                </div>
            </div>  
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Liquidated Return</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_liquidated_return" id="view_liquidated_return">                                          
                    <input <?=@($pri['view_liquidated_return']==1)?"checked":""?> type="checkbox" value="1" name="view_liquidated_return" id="view_liquidated_return">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_liquidated_return" id="update_liquidated_return">                                          
                    <input <?=@($pri['update_liquidated_return']==1)?"checked":""?> type="checkbox" value="1" name="update_liquidated_return" id="update_liquidated_return">
                </div>
            </div>

        </div>
           <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Returned</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_returned" id="view_returned">                                          
                    <input <?=@($pri['view_returned']==1)?"checked":""?> type="checkbox" value="1" name="view_returned" id="view_returned">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_returned" id="update_returned">                                          
                    <input <?=@($pri['update_returned']==1)?"checked":""?> type="checkbox" value="1" name="update_returned" id="update_returned">
                </div>
            </div>

        </div>
               <div class="row">                                            
            <div class="col-12">
                <div style="border-bottom: solid black 1px;">
                </div>
            </div>
        </div>
        <br>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Canceled sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input type="hidden" value="0" name="view_canceled" id="view_canceled">                                          
                    <input <?=@($pri['view_canceled']==1)?"checked":""?> type="checkbox" value="1" name="view_canceled" id="view_canceled">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_canceled" id="update_canceled">                                          
                    <input <?=@($pri['update_canceled']==1)?"checked":""?> type="checkbox" value="1" name="update_canceled" id="update_canceled">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Cash Envelope sales</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_cash_envelope" id="view_cash_envelope">                                          
                    <input <?=@($pri['view_cash_envelope']==1)?"checked":""?> type="checkbox" value="1" name="view_cash_envelope" id="view_cash_envelope">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_cash_envelope" id="update_cash_envelope">                                          
                    <input <?=@($pri['update_cash_envelope']==1)?"checked":""?> type="checkbox" value="1" name="update_cash_envelope" id="update_cash_envelope">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Missing Envelope</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_missing_treatment" id="view_missing_treatment">                                          
                    <input <?=@($pri['view_missing_treatment']==1)?"checked":""?> type="checkbox" value="1" name="view_missing_treatment" id="view_missing_treatment">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_missing_treatment" id="update_missing_treatment">                                          
                    <input <?=@($pri['update_missing_treatment']==1)?"checked":""?> type="checkbox" value="1" name="update_missing_treatment" id="update_missing_treatment">
                </div>
            </div>
        </div>
        <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Sales Return Envelope</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="view_return_envelope" id="view_return_envelope">                                          
                    <input <?=@($pri['view_return_envelope']==1)?"checked":""?> type="checkbox" value="1" name="view_return_envelope" id="view_return_envelope">
                </div>
            </div>
             <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="update_return_envelope" id="update_return_envelope">                                          
                    <input <?=@($pri['update_return_envelope']==1)?"checked":""?> type="checkbox" value="1" name="update_return_envelope" id="update_return_envelope">
                </div>
            </div>
        </div>
            <div class="row">                                            
            <div class="col-8">
                <div class="form-group">
                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Call Tracking Api</font></font></h6>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"> 
                    <input  type="hidden" value="0" name="call_tracking_number" id="call_tracking_number">                                          
                    <input <?=@($pri['call_tracking_number']==1)?"checked":""?> type="checkbox" value="1" name="call_tracking_number" id="call_tracking_number">
                </div>
            </div>
             <div class="col-2"></div>
        </div>
    </div>  
</div>
<br>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" name="edituser" id="custom_privileges_btn" class="btn btn-success submit-btn btn-block" value="Save Changes"></font></font>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <br>                                                                                            
                                </form>

                            </div>
</div>
</div>
</div>
</div>
<style type="text/css">

    .checkbox{

        width: 20px;

        height: 20px;

    }

    label{

        font-size: 20px;

    }

</style>


<?php include_once 'includes/footer.php'; ?>

<script>

$("#checkAl").click(function () {

$('input:checkbox').not(this).prop('checked', this.checked);

});

</script>