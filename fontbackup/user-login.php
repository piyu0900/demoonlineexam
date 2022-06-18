<?php 

require('configure.php'); 
$username=$_POST['uname'];

$password=$_POST['lpassword'];

$sql="select * from admin_student where (username='".$username."' or email='".$username."') and password='".md5($password)."'";
$qry=mysql_query($sql);
$row= mysql_num_rows($qry);

$row_details = mysql_fetch_assoc($qry);

$_SESSION['student_id'] = $row_details['id'];
$_SESSION['student_type'] = "student";


if($row>0){
	echo 1;
}else {
	echo 0;
}
?>