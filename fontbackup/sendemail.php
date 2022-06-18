<?php
$n=$_POST['name'];
$e=$_POST['email'];
$c=$_POST['phone'];
$m1=$_POST['message'];



$to="support@petroleague.com";
$sub="Petroleague Web Inquiry -".$_POST['email'];


$msg="<table>";
$msg.="<tr>";
$msg.="<td>Name :</td>";
$msg.="<td>".$n."</td>";
$msg.="</tr>";

$msg.="<tr>";
$msg.="<td>Email ID :</td>";
$msg.="<td>".$e."</td>";
$msg.="</tr>";

$msg.="<tr>";
$msg.="<td>Mobile No :</td>";
$msg.="<td>".$c."</td>";
$msg.="</tr>";



$msg.="<tr>";
$msg.="<td>Message:</td>";
$msg.="<td>".$m1."</td>";
$msg.="</tr>";

$msg.="</table>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$e . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";


mail($to,$sub,$msg,$headers);
?>




<script type="text/javascript">
 alert ("Successfully Sent");
 
window.location="contact-us.php";


</script>