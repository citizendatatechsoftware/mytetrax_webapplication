<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>CRM Admin Panel</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">
      
        <link href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
       
        <link href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url(); ?>resoursefile/assets/socicon/social.css" rel="stylesheet" type="text/css"/>
      
        <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      
    </head>
    <body>
        <div class="lock-wrapper-page">
            <div class="text-center lock-heading">
                <a href="index.php" class="logo-lock"><i class="icon socicon-feedburner"></i> <span>thememinister</span> </a>
            </div>
            <form method="post" action="" class="text-center m-t-20">
                <div class="user-thumb">
                    <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/avatar.png" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                </div>
                <div class="form-group">
                    <h3>John Deo</h3>
                    <p class="text-muted">Enter your password to access the admin.</p>
                    <div class="input-group m-t-20">
                        <input class="form-control" placeholder="Password" type="password">
                        <i class="fa fa-key"></i>
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-add">Log In</button> 
                        </span>
                    </div>
                </div>
                <div class="text-left">
                    <a href="login" class="text-muted">Not John Deo ?</a>
                </div>
            </form>
        </div>
      
        <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
   
        <script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>