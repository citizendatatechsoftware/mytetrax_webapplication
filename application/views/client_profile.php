
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Client List | Mytetrax</title>
     <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/slickpop.css" rel="stylesheet" type="text/css"/>
      <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
       <style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e7f0f2;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #019688;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #0ca798;
  color: #ffffff;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #019688;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
   </head>
   <body class="hold-transition sidebar-mini">
 
      <!-- Site wrapper -->
      <div class="wrapper">
         <?php include('header.php');  ?>
         
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Profile</h1>
                   <small>Admin Details</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="">
                                 <h4>Personal Profile</h4>
                               
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                       
                           <div class="table-responsive">
                            
                           
                               
                            <table border="0" cellpadding="5" cellspacing="5" style=" width: 100%;">
                                          
                                <tbody style="line-height: 3;">
                                  <?php
                                
                                if(!empty($client)){ foreach ($client as $clients): 
                                 ?>
                                  <tr><b>Client QRCode :</b><td><a href="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$clients->qrcode; ?>"><img src="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$clients->qrcode; ?>" class="" alt="User Image" style="width: 40%" > </a></td></tr>
                                 <tr><th>Profile Image :</th><td><img src="<?php echo base_url(); ?><?php echo "resoursefile/person_prof/".$clients->image; ?>" class="img-circle" alt="User Image" width="100" height="100" style="border-radius: 20%"> </td></tr>

                                <tr><th>Client ID :</th><td><b><?php echo $clients->clientid;  ?></b></td></tr>
                                <tr><th>Username :</th><td><?php echo $clients->username; $this->session->set_userdata('name', $clients->username); ?></td></tr>

                                <tr><th>Mobile No :</th><td><?php echo $clients->mobile;  ?></td></tr>
                                <tr><th>Email ID :</th><td><?php echo $clients->email;  ?></td></tr>
                                <tr><th>Gender :</th><td><?php echo $clients->gender;  ?></td></tr>
                                
                                <tr><th>Address : <td><?php echo $clients->address;  ?></td></th></tr>
                               <tr><th>Operation:  <td>
                                   <a href="<?php echo base_url(); ?>clientedit/<?php echo $clients->id; ?>"> <button type="button" class="btn btn-add btn-sm" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                    <a href="#slick-popup2"> <button type="button" class="btn btn-primary btn-sm" data-target="#customer2" value="Genarate Qrcode"><i class="fa fa-qrcode"></i> Genarate Qrcode</button></a>
                                  </td></th></tr>
                                   <tr><th>Payment:  <td>
                                  
                                    <a href="#slick-popup"> <button type="button" class="btn btn-primary btn-sm" data-target="#customer2" value="Genarate Qrcode" style="font-size: 18px;"><i class="fa fa-plus"></i> Add Security</button></a>
                                  </td></th></tr>

                               
                                 <?php endforeach; }?>
                                </tbody>
                                 
                               </table><br><br>
                               
                           </div>
                           <hr></hr>
                           <b>Note - Latest Generated QrCode Visible at First.</b>
                           <hr>
 <div class="container">
      
  <div class="row">
    <div class="col-md-12">
        <?php 
                    if($createdcode->num_rows() > 0){
                       foreach ($createdcode->result() as $row) {
                          ?> 
    <div class="col-sm-4">
     <img src="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$row->qrcodeimg; ?>" class="" alt="User Image" style="width: 40%" ><br>

     <b><?php echo $row->qrname; ?></b><br>
     <b><?php echo $row->qrdate; ?></b><br>
     <a href="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$row->qrcodeimg; ?>" target="_blank">Click&Save</a>
    </div>

    <?php
             }
          }else
          {
          ?> 
          <tr style="">
             <td colspan="3"><b>No QrCode Found</b></td>
          </tr>
             <?php
          }
          ?>

   </div>
    <ul class="pagination pull-right">
                              <?php
                            echo "<li>".$pagination."</li>";
                            ?>
                           </ul>
    </div>
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
  
         
      </div>

      <div id="slick-popup2">
      <a href="#close" class="close-overlay"></a>
      <section id="slick">
        <!-- Social buttons -->
        <div class="sb">        
            <a href="#" class="entypo-cancel close-top"><span class="slick-tip right">Close window</span></a>
        </div> 
        <!-- Login form -->
        <div class="login-form">
            <!-- Title -->
            <div class="title">Genarate Your QrCode</div>  

            <form role="form" action="floarqr" method="post" >
              
               <br>
                <br>
               
                <br>
                <br>

       
          <div class="field">
      <input name="qrcode" placeholder="Genarate Your Qrcode" type="text" id="username" required />
              <!-- <span class="entypo-user icon"></span> -->
              <span class="slick-tip left">Genarate Your Qrcode</span>    <br>
                <br>

          </div>
          <?php  echo $this->session->flashdata('qrsuccess'); 
             echo $this->session->flashdata('qrerror');?> 
        <div class="f1-buttons">
           
         <input type="submit" id="button" name="email" value="Genarate" class="btn btn-sumit">
        </div>
  
</form>
<style>
#button{
 background-color: #008d6c;
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    font-size: 16px;
    margin: 4px 2px;
  
}
</style>
</div>
<!-- / Login form -->
</section>
</div>

<div id="slick-popup">
      <a href="#close" class="close-overlay"></a>
      <section id="slick">
        <!-- Social buttons -->
        <div class="sb">        
            <a href="#" class="entypo-cancel close-top"><span class="slick-tip right">Close window</span></a>
        </div> 
        <!-- Login form -->
        <div class="login-form">
            <!-- Title -->
            <div class="title">Fill Security Limit</div>  

            <form role="form" action="products/insert" method="post" >
              
               <br>
                <br>
               
                <br>
                <br>
<?php  echo $this->session->flashdata('wrong'); 
     ?> 
       <div class="field">
      <input name="clientid" placeholder="client ID" type="text" id="clientid" required />
              <!-- <span class="entypo-user icon"></span> -->
              <span class="slick-tip left">Enter Client ID</span>    <br>
                <br>

          </div>
          <div class="field">
      <input name="sec_limit" placeholder="Security Limit" type="number" id="username" required />
              <!-- <span class="entypo-user icon"></span> -->
              <span class="slick-tip left">Security Limit</span>    <br>
                <br>

          </div>
          <?php  echo $this->session->flashdata('qrsuccess'); 
             echo $this->session->flashdata('qrerror');?> 
        <div class="f1-buttons">
           
         <input type="submit" id="button" name="email" value="Submit" class="btn btn-sumit">
        </div>
  
</form>
<style>
#button{
 background-color: #008d6c;
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    font-size: 16px;
    margin: 4px 2px;
  
}
</style>
</div>
<!-- / Login form -->
</section>
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

