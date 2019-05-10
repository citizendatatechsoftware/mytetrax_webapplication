<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Mytetrax | Add Client</title>
    
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
      
      <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/style.css">
  <!-- Bootstrap CSS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>resoursefile/js/jquery-simple-validator.min.js"></script>
  
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
     
      <!-- Site wrapper -->
      <div class="wrapper">
         <?php include('header.php'); ?>
         
         <div class="content-wrapper">
            
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Client</h1>
                  <small>Client list</small>
               </div>
            </section>
           
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="<?php echo base_url(); ?>clientlist"> 
                              <i class="fa fa-list"></i>  Client List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        
                           <?php echo $this->session->flashdata('success');
                           echo $this->session->flashdata('error'); ?> 
                          <?php
                     if(!empty($clientedit)){ foreach ($clientedit as $security): ?>


                            <?php  $attributes = array('validate' => 'true');   echo form_open_multipart('update_client_id1', $attributes); ?>
                              <div class="col-sm-6">
                          <?php
                            echo $this->session->flashdata('success');
                           ?>
                           
                            <input id='minMaxExample' type="hidden" name="id" class="form-control" value="<?php echo $security->id;  ?>"> 
                            
                            <div class="form-group">
                                 <label>Client Id</label>
                                 <input type="text" name="clientid" class="form-control" value="<?php echo $security->clientid;  ?>" required >
                              </div>
                              <span class="text-danger"><?php echo form_error('clienid'); ?></span>
                         <div class="form-group">
                                 <label>Person Name</label>
                                 <input type="text" name="username" class="form-control" value="<?php echo $security->username;  ?>" required >
                              </div>
                              <span class="text-danger"><?php echo form_error('username'); ?></span>
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" name="email" class="form-control" value="<?php echo $security->email;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('email'); ?></span>
                            
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="number" name="mobile" class="form-control" value="<?php echo $security->mobile;  ?>" class="form-control" required>
                              </div>
                              
                               <div class="form-group">
                                 <label>Age</label>
                                 <input type="number" name="age" class="form-control" maxlength="2" value="<?php echo $security->age;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                              
                             <div class="form-group">
                                 <label>Gender</label><br>
                                 <label class="radio-inline"><input name="gender" value="male" type="radio" <?php echo ($security->gender == 'male')?"checked":"" ;?> required>Male</label> 
                                 <label class="radio-inline"><input name="gender" value="female" type="radio" <?php echo ($security->gender == 'female')?"checked":"" ;?> required>Female</label>
                              </div>
                              <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              
                           <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                                 <input type="radio" name="status" value="Active" <?php echo ($security->status == 'Active')?"checked":"" ;?> required>Active</label>
                                 <label class="radio-inline"><input type="radio" name="status" value="Pending" <?php echo ($security->status == 'Pending')?"checked":"" ;?> required>Pending</label>
                              </div><br>
                              <span class="text-danger"><?php echo form_error('status'); ?></span>
                           </div>
                           <div class="col-sm-6">
                            
                              <div class="form-group">
                                 <label>Person Image</label>
                                 <input type="file" name="image" class="form-control" required>
                                 <?php $base= base_url(); ?>
                               <image src="<?php echo $base.'resoursefile/person_prof/'.$security->image; ?>" style="    width: 70px;">
                              </div>
                              <span class="text-danger"><?php echo form_error('image'); ?></span>
                              <div class="form-group">
                                 <label>Bank details</label>
                                 <input type="text" class="form-control" name="bank" value="<?php echo $security->bank;  ?>">
                              </div>
                              <span class="text-danger"><?php echo form_error('bank'); ?></span>
                             
                             <!--  <div class="form-group">
                                 <label>Joining Date</label>
                                <input id='minMaxExample' type="text" name="joining" class="form-control">
                              </div> -->
                              <div class="form-group">
                                 <label>Company Name (or) Domain Name</label>
                                 <input id='minMaxExample' type="text" name="companyname" class="form-control" value="<?php echo $security->company_name;  ?>" required> 
                              </div>
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" name="address" rows="3"><?php echo $security->address;  ?></textarea>
                              </div>

                              
                              <div class="reset-button">
                                <input type="submit" class="btn btn-success" name="submit">
                                 <input type="reset" class="btn btn-danger" value="Cancel">
                              </div>
                           </div>
                              
                              
                           </form>
                           <?php endforeach; }?>
                        </div>

                        <div class="panel-body">

                           <?php echo $this->session->flashdata('success');
                           echo $this->session->flashdata('error'); 
                           echo $this->session->flashdata('already'); ?> 

                           
                           <?php if(empty($clientedit)){  ?>
                            
                           <?php $attributes = array('validate' => 'true'); 
                           echo form_open_multipart('filename_exists', $attributes); ?>
                              <div class="col-sm-6">
                          <?php
                            echo $this->session->flashdata('success');
                           ?>
                            <div class="form-group">
                                 <label>Client Id</label>
                                 <input type="text" name="clientid" placeholder="ex: CDT001" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('clientid'); ?></span>
                               <div class="form-group">
                                 <label>Person Name</label>
                                 <input type="text" name="username" class="form-control" required >
                              </div>
                              <span class="text-danger"><?php echo form_error('username'); ?></span>
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" name="email" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('email'); ?></span>
                                <div class="form-group">
                                 <label>Password</label>

                                 <input type="password" name="password" maxlength="25" minlength="3" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                
                              </div>
                              <span class="text-danger"><?php echo form_error('password'); ?></span>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="number" name="mobile" class="form-control" required>
                              </div>
                              <div class="form-group">
                                 <label>Age</label>
                                 <input type="number" name="age" maxlength="2" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('age'); ?></span>
                              
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label>Gender</label><br>
                                 <label class="radio-inline"><input name="gender" value="male" type="radio" required>Male</label> 
                                 <label class="radio-inline"><input name="gender" value="female" type="radio" required>Female</label>
                              </div>
                              <span class="text-danger"><?php echo form_error('gender'); ?></span>
                               <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                                 <input type="radio" name="status" value="Active" required>Active</label>
                                 <label class="radio-inline"><input type="radio" name="status" value="Pending" required>Pending</label>
                              </div>
                              <span class="text-danger"><?php echo form_error('status'); ?></span>
                             
                              <div class="form-group">
                                 <label>Person Image</label>
                                 <input type="file" name="image" required>
                               
                              </div>
                              <div class="form-group">
                                 <label>Bank details</label>
                                 <input type="text" class="form-control" required name="bank">
                              </div>
                              <span class="text-danger"><?php echo form_error('bank'); ?></span>
                             
                             <!--  <div class="form-group">
                                 <label>Joining Date</label>
                                <input id='minMaxExample' type="text" name="joining" class="form-control">
                              </div> -->
                              <div class="form-group">
                                 <label>Company Name (or) Domain Name</label>
                                 <input  type="text" name="companyname" class="form-control" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" name="address" rows="3" class="form-control" required></textarea>
                              </div>

                              <div class="reset-button">
                                <input type="submit" class="btn btn-success" name="submit">
                                 <input type="reset" class="btn btn-danger" value="Cancel">
                              </div>
                           </div>
                              
                              
                           </form>
                           <?php  }?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         
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
      <script type="text/javascript">
    $(function(){
    $(".showpassword").each(function(index,input) {
        var $input = $(input);
        $('<label class="showpasswordlabel"/>').append(
            $("<input type='checkbox' class='showpasswordcheckbox glyphicon glyphicon-eye-open' />").click(function() {
                var change = $(this).is(":checked") ? "text" : "password";
                var rep = $("<input type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);
                $input.remove();
                $input = rep;
             })
        ).append($("<span/>")).insertAfter($input);
    });
});
      </script>
   </body>
</html>

