<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Paypal | Mytetrax</title>
     
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
     
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
     
   </head>
   <body class="hold-transition sidebar-mini">
 
      
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                          
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                            <div class="col-lg-12">
<!-- List all products -->
<?php if(!empty($products)){ foreach($products as $row){ ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <p>Your Security List Is: <b><?php echo $this->input->post('sec_limit'); ?> Check Your Payment Details And Proceed.<br><br> ONE SECURITY INR 500</b> </p>
        <div class="thumbnail">
            

            <table border="1" cellpadding="5" cellspacing="5" style=" width: 100%;">
                                         
                                <tbody style="line-height: 2;">
                                
              
            </div>

                                <tr><th>Username :</th><td><?php echo "<b>" .$row['clientid']."</b>";  ?></td></tr>
                                <tr><th>Mobile No :</th><td><?php echo "<b>" . $row['limit']."</b>"; ?> </td></tr>
                                <tr><th>Email ID :</th><td><a href="<?php echo base_url('products/buy/'.$row['id']); ?>">$<?php echo "<b>" . $row['price']."</b>"; ?> USD</a></td></tr>
                               
                                
                                </tbody>
                <!--  <div class="ratings">
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </p>
               </div> -->
                               </table><br>
                               <a href="<?php echo base_url('products/buy/'.$row['id']); ?>"><button class="btn btn-info">Proceed To Pay</button></a>

            
            
        </div>
    </div>
<?php } }else{ ?>
    <b>Client ID not found...<a href="<?php echo base_url('client_profile#slick-popup'); ?>">Click_Back</a></b>
<?php } ?>
</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
               <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
                        </div>
                        
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
               <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Customer</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>
  
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- table-export js -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/tableExport.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/html2canvas.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/sprintf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/jspdf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/table-export/base64.js" type="text/javascript"></script>
      <!-- dataTables js -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/custom.js" type="text/javascript"></script>
  
      <script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/dashboard.js" type="text/javascript"></script>
    
   </body>

</html>

