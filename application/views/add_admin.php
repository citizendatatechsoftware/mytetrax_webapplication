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
                  <h1>Add Admin</h1>
                  <small></small>
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
                              <a class="btn btn-add " href="<?php echo base_url(); ?>admin_profile"> 
                              <i class="fa fa-list"></i>Admin List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        
                         <?php
                            echo $this->session->flashdata('errors');
                           ?>
                            <?php
                            echo $this->session->flashdata('success');
                           ?>
                          <?php
                     if(!empty($admin_edit)){ foreach ($admin_edit as $admin): ?>


                            <?php  $attributes = array('validate' => 'true');   echo form_open_multipart('update_admin_id', $attributes); ?>
                              <div class="col-sm-12">
                          <?php
                            echo $this->session->flashdata('success');
                           ?>
                           
                            <input id='minMaxExample' type="hidden" name="id" class="form-control" value="<?php echo $admin->id;  ?>"> 
                            <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" name="username" placeholder="" value="<?php echo $admin->username;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('username'); ?></span>
                               <div class="form-group">
                                 <label>Email ID</label>
                                 <input type="text" name="email" value="<?php echo $admin->email;  ?>" class="form-control" required >
                              </div>
                              <span class="text-danger"><?php echo form_error('email'); ?></span>
                              <div class="form-group">
                                 <label>Mobile Number</label>
                                 <input type="text" name="mobile" value="<?php echo $admin->mobile;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                <!-- <div class="form-group">
                                 <label>SET Password</label>

                                 <input type="password" name="password" maxlength="10" minlength="6" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                
                              </div>
                              <span class="text-danger"><?php echo form_error('password'); ?></span>

                               <div class="form-group">
                                 <label>Confirm Password</label>

                                 <input type="password" name="confirm" maxlength="10" minlength="6" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required id="exampleConfirmPassword1" required data-match="password"
                                 data-match-field="#exampleInputPassword1">
                                
                              </div>
                              <span class="text-danger"><?php echo form_error('password'); ?></span>
 -->
                               <div class="form-group">
                                 <label>Designation</label>
                                 <input  type="text" name="designation" value="<?php echo $admin->designation;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('designation'); ?></span>

                               <div class="form-group">
                                 <label>Gender</label><br>
                                 <label class="radio-inline"><input name="gender" value="male" type="radio" <?php echo ($admin->gender == 'male')?"checked":"" ;?> required>Male</label> 
                                 <label class="radio-inline"><input name="gender" value="female" type="radio" <?php echo ($admin->gender == 'female')?"checked":"" ;?> required>Female</label>
                              </div>
                              <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              
                              
                              <div class="form-group">
                                 <label>Company</label>
                                 <input  type="text" name="company" value="<?php echo $admin->company;  ?>" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('company'); ?></span>
                               <div class="form-group">
                                 <label>Admin type</label>
                                 <select class="form-control" required name="type">
                                    <option value="">Choose the Position</option>
                                    <option value="Super Admin" <?php echo ($admin->type == 'Super Admin')?"selected":"" ;?>>Super Admin</option>
                                    <option value="Sub Admin" <?php echo ($admin->type == 'Sub Admin')?"selected":"" ;?>>Sub Admin</option>
                                 </select>
                              </div>
                              <span class="text-danger"><?php echo form_error('type'); ?></span>
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" name="address" rows="3" class="form-control" required><?php echo $admin->address;  ?></textarea>
                              </div>
                              <span class="text-danger"><?php echo form_error('address'); ?></span>

                              
                              <div class="reset-button">
                                <input type="submit" class="btn btn-success" name="submit">
                                 <input type="reset" class="btn btn-danger" value="Cancel">
                              </div>
                           </div>
                              
                              
                           </form>
                           <?php endforeach; }?>
                        </div>

                        <div class="panel-body">

                           <?php
                           echo $this->session->flashdata('errors'); 
                           echo $this->session->flashdata('already'); ?> 

                           
                           <?php if(empty($admin_edit)){  ?>
                            
                           <?php $attributes = array('validate' => 'true'); 
                           echo form_open_multipart('admin_register', $attributes); ?>
                              <div class="col-sm-12">
                         
                            <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" name="username" placeholder="" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('username'); ?></span>
                               <div class="form-group">
                                 <label>Email ID</label>
                                 <input type="text" name="email" class="form-control" required >
                              </div>
                              <span class="text-danger"><?php echo form_error('email'); ?></span>
                              <div class="form-group">
                                 <label>Mobile Number</label>
                                 <input type="text" name="mobile" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                <div class="form-group">
                                 <label>SET Password</label>

                                 <input type="password" name="password" maxlength="20" minlength="6" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                
                              </div>
                              <span class="text-danger"><?php echo form_error('password'); ?></span>

                               <div class="form-group">
                                 <label>Confirm Password</label>

                                 <input type="password" name="confirm" maxlength="20" minlength="6" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required id="exampleConfirmPassword1" required data-match="password"
                                 data-match-field="#exampleInputPassword1">
                                
                              </div>
                              <span class="text-danger"><?php echo form_error('confirm'); ?></span>

                               <div class="form-group">
                                 <label>Designation</label>
                                 <input  type="text" name="designation" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('designation'); ?></span>

                               <div class="form-group">
                                 <label>Gender</label><br>
                                 <label class="radio-inline"><input name="gender" value="male" type="radio" required>Male</label> 
                                 <label class="radio-inline"><input name="gender" value="female" type="radio" required>Female</label>
                              </div>
                              <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              
                              
                              <div class="form-group">
                                 <label>Company</label>
                                 <input  type="text" name="company" class="form-control" required>
                              </div>
                              <span class="text-danger"><?php echo form_error('company'); ?></span>
                               <div class="form-group">
                                 <label>Admin type</label>
                                 <select class="form-control" required name="type">
                                    <option value="">Choose the Position</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Sub Admin">Sub Admin</option>
                                 </select>
                              </div>
                              <span class="text-danger"><?php echo form_error('type'); ?></span>
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" name="address" rows="3" class="form-control" required></textarea>
                              </div>
                              <span class="text-danger"><?php echo form_error('address'); ?></span>

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

