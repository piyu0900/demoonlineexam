 <?php 

require('configure.php');
 
if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}
$id = $_SESSION['student_id'];

?>

<?php include "includes/header.php" ?>



<div class="row topspace">
<div class="post-hero">
<div class="row">

						
<div class="container">
<div class="marqu-icon">
<a href="#">
<i class="fa fa-user" aria-hidden="true"></i>
</a>
</div>



 <?php include('includes/dashboard-marquee.php'); ?> 

<p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>	
</div>		
</div>
</div>




<div class="row">
<img src="images/banner/profile.jpg" alt="" width="100%">
</div>

</div>



			
<div class="clearfix"></div>
			

<div class="row">
<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->



<?php include('includes/navbar-dashboard.php'); ?> 


<div class="top-std">

<div class="col-md-4 col-sm-6 col-xs-12">

<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>

<div class="text-center">

<img src="images/banner/change.png" class="avatar" alt="">

</div>
</div>



<?php
//echo $_SESSION["userid"];
if(isset($_POST['submit']))
{
	$select_student = mysql_query("select * from `admin_student` where `admin_student`.`id` = '".$id."'");
	$fetch_student = mysql_fetch_array($select_student);
	$mdold = md5($_POST['passwordold']);
	if($fetch_student['password'] == $mdold)
	{
		if($_POST['passowrdnew'] == $_POST['passowrdnew2'])
		{
			$mdnw = md5($_POST['passowrdnew']);
			$update_company = mysql_query("UPDATE `admin_student` SET `password` = '".$mdnw."' where `admin_student`.`id` = '".$id."'");
			
			
			$subject = "Password Change Mail";    
			$headers = "MIME-Version: 1.0\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1 \n"; 
			$headers .= "X-Priority: 1 (Higuest)\n";
			$headers .= "X-MSMail-Priority: High\n";
			$headers .= "Importance: High\n";
			$headers .= "X-Mailer: PHP/phpversion()";

		   
			$headers.="from:Petroleague <".$fetch_student['company_email'].">"; 
			$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Petroleague</td></tr>";
			$mail_body.="<tr><td>Your Password have been changed.</td></tr>";
			$mail_body.="<tr><td>Your New Password:".$_POST['passowrdnew']."</td></tr>";
			$mail_body.="<tr><td>Click Here for <a href='http://petroleague.com/'>login</a></td></tr></table>";
			$mail_to=$fetch_student['email'];

			if(@mail($mail_to, $subject, $mail_body, $headers)) 
			{
				?>
				<script type="text/javascript">
				alert("Your password have been changed. Please check your mail.");
				</script>
				<?php 
			} 
			else
			{
				print("<h1><font color=\"#880000\">Sorry! An Error Occurred While Sending Message. Please Try Again</font></h1>"); 
			} 
		}
		else
		{
			?>
			<script>
			$(document).ready(function(){
				alert("You have enter wrong confirm password");
			});
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script>
		$(document).ready(function(){
			alert("You have enter wrong old password");
		});
		</script>
		<?php
	}
	
	
}
?>



<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
<form class="form-horizontal" method="post" action="" role="form">

<div class="form-group">
<label class="col-lg-4 control-label">Old Password:</label>
<div class="col-lg-8">
<input class="form-control" name="passwordold" value="" type="text" required>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">New Password:</label>
<div class="col-lg-8">
<input class="form-control" name="passowrdnew" value="" type="text" required>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">Confirm New Password:</label>
<div class="col-lg-8">
<input class="form-control" name="passowrdnew2" value="" type="text" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-8">
<input class="btn btn-info" name="submit" value="Change Password" type="submit">
</div>
</div>

</form>


</div>
</div>

</div>
          		  
</div>          
</div>
        

           

            

            

            

 <div class="clearfix"></div>

   





				<div class="clear mb-50"></div>

				


			


            

            

       

            

            

            

            

            

            
<!--....................................footer start..............................-->
            

             <?php include "includes/footer.php" ?> 

          

			