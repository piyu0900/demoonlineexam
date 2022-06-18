<?php 
require('configure.php'); 
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="insert into admin_student set username='".$username."' , 	email='".$email."' , password='".$password."'";
$qry=mysql_query($sql);
if($qry){
	echo 1;
}else {
	echo 0;
}
?>