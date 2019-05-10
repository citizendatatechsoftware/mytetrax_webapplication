<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Client Login | Mytetrax</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/util2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/main1.css">


  <!-- Bootstrap CSS -->
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
      
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-pic js-tilt" data-tilt>
                  <span class="login100-form-title">
                        Client Login
                    </span>
               <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/logo.png" alt="">
               
                </div>

                <form action="client_login" class="login100-form validate-form" validate="true" method="post">
 <?php
                            echo $this->session->flashdata('cerror');
                           ?>
                            <?php
                             echo $this->session->flashdata('updatee');
                            echo $this->session->flashdata('client');
                             
                           ?>
                   

                    <div class="wrap-input100 validate-input" data-validate = "Valid clientid is required: ex(CDT001)">
                        <input class="input100" type="text" name="clientid" placeholder="Client ID">
                        <span class="text-danger"><?php echo form_error('clientid'); ?></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="forgot_client">
                           Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>resoursefile/js/jquery-simple-validator.min.js"></script> -->
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>resoursefile/vendor/jquery/jquery-3.2.1.min.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>resoursefile/vendor/bootstrap/js/popper.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
    <script src="<?php echo base_url(); ?>resoursefile/vendor/bootstrap/js/bootstrap.min.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>resoursefile/vendor/select2/select2.min.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>resoursefile/vendor/tilt/tilt.jquery.min.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
    <script type="dfafa868d4d5671d7f946ff2-text/javascript">
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>
<script type="dfafa868d4d5671d7f946ff2-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

   <script src="<?php echo base_url(); ?>resoursefile/js/main.js" type="dfafa868d4d5671d7f946ff2-text/javascript"></script>

<script src="<?php echo base_url(); ?>resoursefile/js/rocket-loader.min.js" data-cf-settings="dfafa868d4d5671d7f946ff2-|49" defer=""></script></body>

</html>
