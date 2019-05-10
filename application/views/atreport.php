<!DOCTYPE html>
<html lang="en">
 
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Mytetrax Attendance Details</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">
    
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      
      <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
     
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
     
      <!-- Site wrapper -->
      <div class="wrapper">
         <?php include('header.php');  ?>
         
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-ticket"></i>
               </div>
               <div class="header-title">
                  <h1>Attendance Report</h1>
                  <small>Attendance Reports details</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="panel lobidisable panel-bd">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Attendance Report</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <form action="" method="post" class="col-md-6 col-md-offset-3">
                             <div class="form-group">
                                 <label>Search Month</label>
                                 <div class="form-group">
                                    <input  name="search" type="text" class="form-control" placeholder="Enter month">
                                 </div>

                              </div>
                              <div class="col-md-12 text-center">
                                 <button type="submit" class="btn btn-add">Search</button><br><br>
                              </div>
                           </form>
                           <?php
                           if(!empty($attendancelist)){

                              ?>
                           <table class="table table-bordered table-striped table-hover">
                                          <thead>
                                             <tr class="info">
                                                <th>Employee Id</th>
                                                <th>Employee Name</th>
                                                <th>Type</th>
                                                <th>Date & Intime</th>
                                                <th>Outtime</th>
                                                <th>Total Hourse</th>
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                      foreach ($attendancelist as $attendance): ?>
                                             <tr>
                                                <td><?php echo $attendance->userid;  ?></td>
                                                <td><?php echo $attendance->username;  ?></td>
                                                <td><?php echo $attendance->type;  ?></td>
                                                <td><?php echo $attendance->intime;  ?></td>
                                                <td><?php echo $attendance->outtime;  ?></td>
                                                <td><?php echo $attendance->total_hours;  ?></td>
                                             </tr>
                                              <?php endforeach; ?>
                                        </tbody>
                                       </table>

                                       <?php
                                    }

                         ?>
                                  
                                      <ul class="pagination pull-right">
                              <?php
                            echo "<li>".$pagination."</li>";
                            ?>
                           </ul> 

                        </div>
                        
                    </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
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
      <!-- SlimScroll -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/custom.js" type="text/javascript"></script>
     
      <script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/dashboard.js" type="text/javascript"></script>
     
   </body>

</html>

