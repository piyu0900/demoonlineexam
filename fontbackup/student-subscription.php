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





<div class="col-md-12 personal-info">

<div class="top-std">

 
 
 <?php
 
$select_subscription_payment = mysql_query("select * from `admin_payment_subscription` where `admin_payment_subscription`.`user_id` ='".$_SESSION["student_id"]."'");
$fetch_subscription_payment = mysql_fetch_array($select_subscription_payment);
if(isset($fetch_subscription_payment['id']))
{
	?>
  <h2>You are Subscribed member</h2>
  <?php
}
else
{
	?>
	<p style="font-size: 35px;"><b>You are not Subscribed member. For subscription <a href="resume-writing.php">click here</b></a></p>
	<?php
}

?>
 
 



</div>

</div>
</div>

</div>
          		  
</div>          
</div>
        

           

            

            

            

 <div class="clearfix"></div>

   





				<div class="clear mb-50"></div>

				


			


            

            

       

            

            

            

            

            

            
<!--....................................footer start..............................-->
            

             <?php include "includes/footer.php" ?> 

          

			