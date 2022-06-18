<?php 
require('configure.php'); 
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

//$sql="insert into admin_student set username='".$username."' , 	email='".$email."' , password='".$password."'";
$sql="insert into `admin_student` (`state_id`,`name`,`username`,`address`,`email`,`password`,`phone_no`,`image_browse`,`gender`,`student_resume`,`zip_code`,`registration_date`,`status`) values ('0','0','".$username."','0','".$email."','".$password."','0','0','0','0','0','".$date."','Active')";

$qry=mysql_query($sql);
if($qry){
	echo 1;
	/*$select_stu = mysql_query("select * from `admin_student` order by id desc limit 1");
	$fetch_stu = mysql_fetch_array($select_stu);	
	
	$_SESSION['student_id'] = $fetch_stu['id'];
	$_SESSION['student_type'] = "student";
	header('Location: company-dasbord.php');*/
}else {
	echo 0;
}
?>