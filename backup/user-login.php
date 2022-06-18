<?php 

require('configure.php'); 
$username=$_POST['uname'];

$password=$_POST['lpassword'];

$sql="select * from admin_student where (username='".$username."' or email='".$username."') and password='".$password."'";
$qry=mysql_query($sql);
$row= mysql_num_rows($qry);

if($row>0){
	echo 1;
}else {
	echo 0;
}
?>