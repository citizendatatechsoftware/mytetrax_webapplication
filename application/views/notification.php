
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Tetrax | Admin</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>resoursefile/assets/bootstrap/css/bootstrap.min.css">

<link rel="shortcut icon" href="<?php echo base_url(); ?>resoursefile/assets/dist/img/ico/favicon.png" type="image/x-icon">

<link href="<?php echo base_url(); ?>resoursefile/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>resoursefile/assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>resoursefile/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

<style type="text/css">
body{
}
div.container{
width: 1000px;
margin: 0 auto;
position: relative;
}
legend{
font-size: 30px;
color: #555;
}
.btn_send{
background: #00bcd4;
}
label{
margin:10px 0px !important;
}
textarea{
resize: none !important;
}
.fl_window{
width: 400px;
position: absolute;
right: 0;
top:100px;
}
pre, code {
padding:10px 0px;
box-sizing:border-box;
-moz-box-sizing:border-box;
webkit-box-sizing:border-box;
display:block; 
white-space: pre-wrap;  
white-space: -moz-pre-wrap; 
white-space: -pre-wrap; 
white-space: -o-pre-wrap; 
word-wrap: break-word; 
width:100%; overflow-x:auto;
}

</style>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
<?php include('header.php');  ?>

<div class="content-wrapper">


<?php
// Enabling error reporting
error_reporting(0);
ini_set('display_errors', 'On');

require_once 'firebase.php';
require_once 'push.php';

$firebase = new Firebase();
$push = new Push();

// optional payload
$payload = array();
$payload['team'] = 'India';
$payload['score'] = '5.6';

// notification title
$priority = isset($_POST['priority']) ? $_POST['priority'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';

// notification message
$message = isset($_POST['message']) ? $_POST['message'] : '';

// push type - single user / topic
$push_type = isset($_POST['push_type']) ? $_POST['push_type'] : '';

// whether to include to image or not
$include_image = isset($_POST['include_image']) ? TRUE : FALSE;


$push->setTitle($title);
$push->setPriority($priority);
$push->setMessage($message);
if ($include_image) {
$push->setImage('https://api.androidhive.info/images/minion.jpg');
} else {
$push->setImage('');
}
$push->setIsBackground(TRUE);
$push->setPayload($payload);


$json = '';
$response = '';

if ($push_type == 'topic') {
$json = $push->getPush();
$response = $firebase->sendToTopic('global', $json);
} else if ($push_type == 'individual') {
$json = $push->getPush();
$regId = isset($_POST['regId']) ? $_POST['regId'] : '';
$response = $firebase->send($regId, $json);
}
?>


<?php
$host="localhost";
$db_user="ogahxgaz_appapi";
$db_password="citizendt";
$db_name="ogahxgaz_citizendtapp";

$con=mysqli_connect($host,$db_user,$db_password,$db_name);
if(isset($_POST['submit'])){
$regId=$_POST['regId'];
$title=$_POST['title'];
$message=$_POST['message'];
date_default_timezone_set('Asia/Kolkata'); 
$intime = date('Y-m-d H:i:s');

if(!empty($_SESSION['login'])){
$admin='admin';
}

if(!empty($_SESSION['clientid'])){
$admin='Client';
}

$file_name = $_FILES['include_image']['name'];
$file_size = $_FILES['include_image']['size'];
$file_tmp = $_FILES['include_image']['tmp_name'];
$file_type = $_FILES['include_image']['type'];

$file_store = "upload/".$file_name;

move_uploaded_file($file_tmp,"upload/".$file_name);

$insert_data="INSERT INTO pushnotify(title,message,date_time,type,token,image)values('$title','$message','$intime','$admin','$regId','$file_store')";
$sql=mysqli_query($con,$insert_data);
}

?>

<div class="container">
<div class="fl_window">

<br/>
<?php if ($json != '') { ?>
    <label><b>Request:</b></label>
    <div class="json_preview">
        <pre><?php echo json_encode($json) ?></pre>
    </div>
<?php } ?>
<br/>
<?php if ($response != '') { ?>
    <label><b>Response:</b></label>
    <div class="json_preview">
        <pre><?php echo json_encode($response) ?></pre>
    </div>
<?php } ?>

</div>

<form class="pure-form pure-form-stacked" method="post" enctype ="multipart/form-data">
<fieldset>
    <input type="text" hidden="" name="priority" value="high">

    <legend>Send to Security Device</legend>

    <label for="redId">Firebase Reg Id</label>
    <input type="text" id="redId" name="regId" class="pure-input-1-2" placeholder="Enter firebase registration id" value="<?php echo $_SESSION['token']; ?>" required>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="pure-input-1-2" placeholder="Enter title" required>

    <label for="message">Message</label>
    <textarea class="pure-input-1-2" id="" rows="5"  name="message"  placeholder="Notification message!" required></textarea><br>

    <!--<label for="include_image" class="pure-checkbox">Include image</label>-->
    <!--    <input name="include_image" id="include_image" type="file" required> <br>-->
    
    <input type="hidden" name="push_type" value="individual"/>
    <button type="submit" name="submit" class="pure-button pure-button-primary btn_send">Send</button>
</fieldset>
</form>
<br/><br/><br/><br/>


<form class="pure-form pure-form-stacked" method="post">
<fieldset>
    <input type="text" hidden="" name="priority" value="high">
    <legend>Send to All Devices</legend>

    <label for="title1">Title</label>
    <input type="text" id="title1" name="title" class="pure-input-1-2" placeholder="Enter title">

    <label for="message1">Message</label>
    <textarea class="pure-input-1-2" id="" rows="5"  name="message"  placeholder="Notification message!" required></textarea><br>

    <input type="hidden" name="push_type" value="topic"/>
    <button type="submit" name="submit" class="pure-button pure-button-primary btn_send">Send to All</button>
</fieldset>
</form>
</div>

</div>

</div>



<script src="<?php echo base_url(); ?>resoursefile/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>resoursefile/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<!-- CRMadmin frame -->
<script src="<?php echo base_url(); ?>resoursefile/assets/dist/js/custom.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resoursefile/assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor');
</script>


</body>
</html>