
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Client List | Mytetrax</title>
     
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
                  <h1>Clients</h1>
                  <small>Client List</small>
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
                                 <h4>Client List</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="<?php base_url(); ?>addclient"> <i class="fa fa-plus"></i> Add Client
                                 </a>  
                              </div>
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                                  <div class="topnav">
                 <?php  echo $this->session->flashdata('msg'); ?>
                         <?php
                             echo $this->session->flashdata('success');
                         ?>
                  <div class="search-container">
                    
                   <?php  
                        echo form_open_multipart(''); ?>
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Photo</th>
                                       <th>Genate Code</th>
                                       <th>Client Id</th>
                                       <th>Person Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Address</th>
                                       <th>Company Details</th>
                                       <th>Registration Date</th>
                                       <th>Status</th>
                                       <th>Operation</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                            <?php 
                    if($fetch_client->num_rows() > 0){
                       foreach ($fetch_client->result() as $row) {
                          ?>
                                    <tr>
                                       <td><img src="<?php echo base_url(); ?><?php echo "resoursefile/person_prof/".$row->image; ?>" class="img-circle" alt="User Image" style="width: 75px; height: 75px;"> </td>
                                       <td><a href="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$row->qrcode; ?>"><img src="<?php echo base_url(); ?><?php echo "resoursefile/qrcode/".$row->qrcode; ?>" class="img-circle" alt="User Image" style="width: 75px; height: 75px;"></a> </td>
                                       <td><?php echo $row->clientid; ?></td>
                                       
                                       <td><?php echo $row->username; ?></td>
                                       <td><a href="http://gmail.com" class="__cf_email__"><?php echo $row->email; ?></a></td>
                                       <td><?php echo $row->mobile; ?></td>
                                       
                                        

                                         <td><?php echo $row->address; ?></td>
                                         <td><?php echo $row->company_name; ?></td>
                                         <td><?php echo $row->joining; ?></td>
                                         <?php if($row->status == "Active"){?><td><span class="label-custom label label-default">
                                       <?php echo $row->status; ?></span></td>
                                        <?php
                                         }
                                         ?>
                                      <?php
                                          if($row->status == "Pending"){ ?>
                                            <td><span class="label-danger label label-default">
                                       <?php echo $row->status; ?></span></td>
                                      <?php
                                     }   
                                        ?>
                                        <td>
                                         <a href="<?php echo base_url(); ?>clientedit/<?php echo $row->id; ?>"> <button type="button" class="btn btn-add btn-sm" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                          <a href="<?php echo base_url(); ?>clientdelete/?id=<?php echo $row->id; ?>" onClick="return confirm('Are You Sure Want delete?');"> <button type="button" class="btn btn-danger btn-sm" data-target="#customer2" value="delete"><i class="fa fa-trash-o"></i> </button></a>
                                       </td>
                                    </tr>
                                    <?php
                                       }
                                    }else
                                    {
                                    ?>
                                    <tr>
                                       <td colspan="3">No Data Found</td>
                                    </tr>
                                       <?php
                                    }
                                    ?>
                                   
                                 </tbody>
                              </table>
                              
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

