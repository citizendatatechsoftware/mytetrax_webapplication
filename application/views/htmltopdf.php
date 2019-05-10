
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mytetrax | Incident Report</title>

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
    <h1>Incident Details</h1>
    <small>Incident Details</small>
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
                   <h4>Incident Details</h4>
                </a>

             </div>

          </div>

          <div class="panel-body">

             <!-- Nav tabs -->
            
             <!-- Tab panels -->
            <div class="container box">
		<br />
		<h3 align="center">Incident Details Report</h3>
		<br />
		
		<?php
		
		if(isset($customer_details))
		{
			echo $customer_details;
		}
		?>
	</div>
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

