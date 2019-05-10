<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>My Tetrax | Admin</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css">
     <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/bootstrap-select.min.css" rel="stylesheet" />

      <link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/dist/css/jquery.bxslider.css">
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
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="<?php echo base_url(); ?>resoursefile/assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
   </head>
   <body class="hold-transition sidebar-mini" onload="initialize()">
   
     
      <div class="wrapper">
         <?php include('header.php');  ?>
         <style type="text/css">
            .container-fluid {
            height: 100%;
            }
            #mydiv {
            position: absolute;
            z-index: 9;
            width: 350px;
            height: 330px;
            right: 0;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #d3d3d3;
            }
            #mydivheader {
            padding: 10px;
            cursor: move;
            z-index: 10;
            background-color: #00a0b3;
            color: #fff;
            }
            #map_canvas {
            width: 100%;
            height: 695px;
            
            }
             #allData,#head,#data {
            display: none;
            }
            .height{
            padding: 30px;
            }
            label input[type=checkbox] {
            display: none;
            }
            label:hover input[type=checkbox], input[type=checkbox]:checked{
            display: inline;
            }
         </style>
         <div class="content-wrapper">
            <section class="container-fluid">
               <div class="row">
                 <?php 
                    if($this->session->userdata('login')){
                      ?>
                  <div id="mydiv">
                     <div id="mydivheader">Click & Drag the Search</div>
                     <form method="get" action="index" validate="true">
                     <br>
                     <div class="custom-control custom-checkbox list-group-item">
                     <b style="text-align: justify; font-size: 16px;">Search Your Client Here!!</b>
                  </div>
                      <div class="custom-control custom-checkbox list-group-item">
                       <select name="clientid" class="form-control selectpicker" id="select-country" data-live-search="true">
                        <option value="" hidden>Choose Client ID</option>
                        <?php 
                    if($fetch_id->num_rows() > 0){
                       foreach ($fetch_id->result() as $row) {
                          ?>
                 
                 <option data-tokens="<?php echo $row->clientid; ?>"><?php echo $row->clientid; ?></option>
                <?php 
                     }
                  }
                  ?>
                 </select>

            
                        <div class="custom-control custom-checkbox list-group-item">
                        <button class="custom-control-input" id="customCheck1">Search Client ID</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                  }
                  ?>
                  <?php 
                 
                     // $coll = json_encode('', true);
                     // echo '<div id="data">' . $coll . '</div>';
                 //  $totalLangLAt = array();
                 //  $arrLstLn=array();
                 // foreach($arrList->result() as $listRow){
                 //   $arrLstLn[] = array('latitude'=>$listRow->latitude,'longitude'=>$listRow->longitude,'type'=>$listRow->type);
                 //    }
        
                 //  $totalLangLAt = $arrLstLn;
                 //  $totalLangLAt= json_encode($totalLangLAt, true);
                 //  echo '<div id="allData">' . $totalLangLAt . '</div>';
                  ?>
                  <div id="map_canvas"></div>
              <!--    <div id="tools">
            <button onclick="setRoutes();">Start</button> 
          </div> -->
               </section>
               <!-- /.content -->
         </div>
      </div>
     
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';

$(function() {
  $('.selectpicker').selectpicker();
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>resoursefile/js/bootstrap-select.min.js"></script>


       <script type="text/javascript" src="<?php echo base_url(); ?>resoursefile/js/googlemap.js"></script>
      <script src="<?php echo base_url(); ?>resoursefile/js/jquery.bxslider.min.js"></script>
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url(); ?>resoursefile/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
      
      <script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/custom.js" type="text/javascript"></script>
     
      <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB21baMnSAvRrcZ3IKymum3_vJFN4hm7xU&v=3.exp&libraries=places&callback=initialize"></script>
   <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>

<script type ="text/javascript" src="<?php echo base_url(); ?>resoursefile/js/v3_epoly.js"></script>
<script type="text/javascript">
_uacct = "UA-162157-1";
urchinTracker();
</script>
   </body>
</html>