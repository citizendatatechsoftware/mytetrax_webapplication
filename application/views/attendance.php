<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Mytetrax | Employee Attendance Details</title>
     
      <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">
   
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
     
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
     <style>


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
                  <i class="fa fa-clock-o"></i>
               </div>
               <div class="header-title">
                  <h1>Time History</h1>
                  <small>Time History details</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group buttonexport">
                              <a href="#">
                                 <h4>Employee Attendance Details</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                           <!-- Nav tabs -->
                           <!-- Tab panels -->
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab1">
                                 <div class="panel-body">
                                    <h3>Employee Attendance Details</h3>
                                     
                                    <div class="table-responsive">
                                       <div class="topnav">

                                         <div class="search-container">
                                            
                                          <?php  
                                               echo form_open_multipart(''); ?>
                                             <input type="text" placeholder="Search.." name="search">
                                             <button type="submit" name="submit">Submit</button>
                                           </form>
                                         </div>
                                       </div>
                                       <table class="table table-bordered table-striped table-hover">
                                          <thead>
                                             <tr class="info">
                                              <?php
                                              if($this->session->userdata('login')){

                                                ?>
                                              <th>Client Id</th>
                                              <?php
                                            }
                                            ?>
                                                <th>Employee Id</th>
                                                 <th>Employee Name</th>
                                                <th>Date & Tme</th>
                                                <th>Out Time</th>
                                                <th>Type</th>
                                                <th>Total_Hours</th>
                                                <th>View Overall Report</th>
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
                                              <?php 
                    if($attendancelist->num_rows() > 0){
                       foreach ($attendancelist->result() as $list) {
                          ?>
                                             <tr>
                                              <?php
                                              if($this->session->userdata('login')){

                                                ?>
                                               <td><?php echo $list->clientid; ?></td>
                                               <?php
                                             }
                                             ?>
                                                <td><?php echo $list->userid; ?></td>
                                                <td><?php echo $list->username; ?></td>
                                                <td><?php echo $list->intime; ?></td>
                                                <td><?php echo $list->outtime; ?></td>
                                                <td><?php echo $list->type; ?></td>
                                                <td><?php echo $list->total_hours; ?></td>
                                                <td><a href="<?php echo base_url(); ?>atreport/<?php echo $list->userid; ?>"><span class="label-custom label label-default">
                                       View All Days Report</span></a></td>
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
                     </div>
                  </div>
               </div>
               <!-- Update Modal1 -->
               <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plus m-r-5"></i> Update</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Date</label>
                                          <input type="number" placeholder="Date" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">In Time</label>
                                          <input type="number" placeholder="In Time" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Out Time</label>
                                          <input type="number" placeholder="Out Time" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Hours</label>
                                          <input type="number" placeholder="Hours" class="form-control">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Update</button>
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
                    
                  </div>
                 
               </div>
                 
            </section>
          
         </div>
        
      </div>
     
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
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

