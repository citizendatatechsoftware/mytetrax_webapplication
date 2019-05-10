<?php
if($this->session->userdata('login')){
redirect(base_url('index'));
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | MyTetrax</title>
        
 <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css">
 <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/main.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/style.css">
  <!-- Bootstrap CSS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>resoursefile/js/jquery-simple-validator.min.js"></script>
    </head>
    <body>
     
       <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
               
                <form class="login100-form validate-form" action="login" method="post" validate="true">
               <!-- Logo -->
               <span class="login100-form-title p-b-43">
               <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/logo.png" alt="">
               </span>
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>
                     <?php
                            echo $this->session->flashdata('error');
                           ?>
                            <?php
                            echo $this->session->flashdata('success');
                              echo $this->session->flashdata('updatee');
                           ?>
                    <label>Email ID</label>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                      
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100"></span>
                        <!-- <span class="label-input100">Email</span> -->

                    </div>
                     <span class="text-danger"><?php echo form_error('email'); ?></span>
                    <label>Password</label>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <input class="input100" type="password" name="password" class="form-control" required>
                        <span class="focus-input100"></span>
                       <!--  <span class="label-input100" >Password</span> -->
                    </div>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="forget_password" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                 <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn">
                           
                    </div>
                    
            
                </form>

                <div class="login100-more" style="background-image: url('<?php echo base_url(); ?>resoursefile/assets/dist/img/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>
       
    </body>
</html>