<?php 
require('../configure.php'); 
$getAdminSetting = $pm->getSetting(1);
if(isset($_SESSION['ADMIN']['id']) && $_SESSION['ADMIN']['id'] !=""){ 
	echo "<script>window.location.href='dashboard.php'</script>"; 
}else{
if(isset($_SESSION['CLIENTS']['id']) && $_SESSION['CLIENTS']['id'] !=""){ 
	echo "<script>window.location.href='dashboard.php'</script>";
}
}
/*-----------------------------------------------------------------------------------------------------------------------------------LOGING*/
if(isset($_POST['admin_login']) && $_POST['admin_login']=='Adminlogin'){
$getType = 1;
if(!empty($getType)){
if($getType == 1){	
$sql = "SELECT * FROM ".DTABLE_ADMIN." WHERE admin_login_id = '".$_POST['admin_login_id']."' AND admin_password = '".md5($_POST['admin_password'])."'";
$getCount  = $db->countRows($sql);
if($getCount == 0) {
$msg_class = 'alert-danger';	
$msg = MSG_INVALID_USER;
}else{ 
$row = $db->selectData($sql);
$res = $db->getRow($row);
$newAdminDataArray = array( 
	'id' => $res['admin_id'],
	'loging' => $res['admin_login_id'], 
	'name' =>  ucwords($res['admin_fastname'].' '.$res['admin_lastname'])
);
if(count($newAdminDataArray) > 0){
$_SESSION['ADMIN'] = $newAdminDataArray;
$getIpaddress = $pm->onlyGetIp();
$updateQuery = "UPDATE ".DTABLE_ADMIN." SET admin_last_login_ip = '".$getIpaddress."', admin_last_login_datetime=NOW() WHERE admin_id=1";
$getEXE = mysql_query($updateQuery);
if($getEXE){
header("location:dashboard.php");	
}
}
}
}else{
$sql = "SELECT * FROM ".DTABLE_CHANNEL." WHERE user_name_loging = '".$_POST['admin_login_id']."' AND user_password = '".md5($_POST['admin_password'])."' AND status='Active'";
$getCount  = $db->countRows($sql);
if($getCount == 0) {
$msg_class = 'alert-danger';	
$msg = MSG_INVALID_USER;
}else{ 
$row = $db->selectData($sql);
$res = $db->getRow($row);
$newAdminDataArray = array( 
	'id' => $res['id'],
	'name' =>  ucwords($res['user_name']),
	'email' => $res['user_email'],
	'phone' => $res['user_phone'],
	'logo' => $res['user_name_loging'],
	'cate' => $res['cate_id'],
);
if(count($newAdminDataArray) > 0){
$_SESSION['CLIENTS'] = $newAdminDataArray;
header("location:dashboard.php");	
}
}
}
}
}
/*-----------------------------------------------------------------------------------------------------------------------------------FORGET PASSWORD*/
if(isset($_POST['admin_forgetPassword']) && $_POST['admin_forgetPassword']=='admin_forgetPassword'){
$forgetPassword = "SELECT * FROM ".DTABLE_ADMIN." WHERE admin_email = '".$_REQUEST['email_id']."'";	
if($db->countRows($forgetPassword)> 0){
$newPassword = $pm->generateCode(10);	
$updateQueryPassword = "UPDATE ".DTABLE_ADMIN." SET admin_password = '".md5($newPassword)."' WHERE admin_id=1";
$getEXEFire = mysql_query($updateQueryPassword);
if($getEXEFire){
//-----------Start mail format USER MAIL-----------------------
$to = $_REQUEST['email_id'];
$sent_message = "";
$from_name = SITE_FROM;
$from_email = $getAdminSetting['from_email'];
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:  <'.$to.'>' . "\r\n";
$headers .= 'From: '.$from_name.' <'.$from_email.'>'."\r\n" ;
$sent_message .= "Dear Admin,<br/><br/>";
$sent_message .= "Congratulations! You have successfully reset your password. Your new password is ".$newPassword.".<br/>";
$sent_message .= "Thanks and Regards.<br/><br/>";
$sent_message .= SITE_FROM;
$subject = "Admin Password Rest";
if(mail($to, $subject, $sent_message, $headers)){
$msg_class = 'alert-success';
$msg = 'One Email Has Been Sent To User Email Account';	
}else{
$msg_class = 'alert-danger';	
$msg = 'Sorry !! Some Technical Issue Please Try After Some Time !!';	
}
//-----------End mail format USER MAIL-----------------------	
}else{
$msg_class = 'alert-danger';	
$msg = 'Sorry !! Some Technical Issue Please Try After Some Time !!';	
}
}else{
$msg_class = 'alert-danger';	
$msg = 'Wrong !! Email Id you provide does not exist';		
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo ADMIN_TITLE; ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<!--<a href="index"><strong><?php echo SITE_NAME; ?></strong></a>-->
<a href="index"><strong><img src="images/logo_exam.png" height="100px" width="150px"/></strong></a>
</div>
<div class="login-box-body">
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
<form action="" method="post" name="MyForm">
<input type="hidden" name="admin_login" value="Adminlogin">	
<!--
<div class="form-group">
<select name="type" class="form-control" required>
<option value="">Select</option>
<option value="1">Master Admin</option>
<option value="2">User Admin</option>
</select>
</div>
-->
<div class="form-group has-feedback">
<input type="text" class="form-control" placeholder="Uesrname" name="admin_login_id" required>
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" placeholder="Password" name="admin_password" required>
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<!--<div class="col-xs-8">
<button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#myModal">Forget Password</button>
</div>-->
<div class="col-xs-4">
<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
</div>
</div>
</form>
<!-- Modal -->
<form action="" method="post">
<input type="hidden" name="admin_forgetPassword" value="admin_forgetPassword">	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Have you forgaton your password ??</h4>
</div>
<div class="modal-body">
<div class="form-group has-feedback">
<input type="email" class="form-control" placeholder="Please Enter Your Email" name="email_id" required>
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Rest Password</button>
</div>
</div>
</div>
</div>
</form>

</div>
</div>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
