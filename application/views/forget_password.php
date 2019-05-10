
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mytetrax | Forgot Password Admin</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">

        <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo base_url(); ?>resoursefile/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/style.css">
  <!-- Bootstrap CSS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>resoursefile/js/jquery-simple-validator.min.js"></script>
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center">
                        <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-refresh-2"></i>
                            </div>
                            <div class="header-title">
                                <h3>Password Reset</h3>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                      if(!$this->session->userdata('valid')){ ?>
                    <div class="panel-body">
                          <?php
                            echo $this->session->flashdata('wrong');
                           ?>
                           
                        <?php 
                        $attributes = array('validate' => 'true'); 
                     echo form_open_multipart('reset_admin', $attributes);
                           ?>
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label><span class="text-danger pull-right"><?php echo form_error('email'); ?></span> 
                                <input type="email" value="" name="email" id="username" class="form-control">
                                
                                <span class="help-block small">Your registered email address</span>
                                
                            </div>
                            <div>
                                <button class="btn btn-add btn-block">Reset password</button>
                            </div>
                             <a  href="logout" class="txt1">
                                <span class="fa fa-long-arrow-left"></span> Back To Login
                            </a>
                        </form>
                        <?php
                        }
                        ?>
                        
                         <?php
                      if($this->session->userdata('valid')){ ?>
                         <div class="panel-body">
                            
                            <?php
                            echo $this->session->flashdata('correct');
                           
                              echo $this->session->flashdata('wrg');
                           ?>
                    <?php $attributes = array('validate' => 'true');  echo form_open_multipart('update_password' ,$attributes);
                           ?>
                            <div class="form-group">
                                <label class="control-label" for="username">Password</label>
                                <input type="password" name="password" minlength="6" type="password" class="form-control" id="exampleInputPassword1"  required>
                                <span class="text-danger"><?php echo form_error('password'); ?></span> 
                                <label class="control-label" for="password">Confirm Password</label>
                                <input type="password" name="confirmpassword" class="form-control" id="exampleConfirmPassword1" required data-match="password"
              data-match-field="#exampleInputPassword1">
                                <span class="text-danger"><?php echo form_error('confirmpassword'); ?></span> 
                                <!--<span class="help-block small">Your registered email address</span>-->
                            </div>
                            
                            <div>
                                
                            </div>
                            <button class="btn btn-add btn-block">Update Password</button>
                            
                                <a  href="logout" class="txt1">
                                <span class="fa fa-long-arrow-left"></span> Back To Login
                            </a>
                        </form>
                        
                        <?php
                      }
                      ?>
                    </div>
                </div>
                </div>
            </div>
     
        <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
    
        <script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

</html>