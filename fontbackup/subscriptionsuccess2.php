<?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	echo "<script>
alert('Please before login');
window.location.href='index.php';
</script>"; 
}

$getAdminSetting = $pm->getSetting(1);

?>
<?php include "includes/header.php" ?>

<body>





<!--	<div id="introLoader" class="introLoading"></div>--> 

<!-- start Container Wrapper -->


    
    <!-- start hero-header -->
    
    <div class="row topspace">
      <div class="post-hero">
        <div class="row">
          <div class="container">
            <div class="marqu-icon"> <a href="#"> <i class="fa fa-user" aria-hidden="true"></i> </a> </div>
            <?php include "includes/dashboard-marquee.php" ?>
            <p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/e-library.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  <div class="row">
  <div class="side-left side-left1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right side-right1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
  </div>
      <div class="pb-50">
        <div class="container bg-shadow bg-width">
          <div class="row">
          
          
			<div class="col-md-12">
			<?php
			
			if($_REQUEST['status'] == 'Completed')
			{
				$amount = $_REQUEST['amount'];
				$txn_id = $_REQUEST['payment_id'];
				$currency = $_REQUEST['currency'];
				$userid = $_SESSION['student_id'];
				$date  = date('Y-m-d');
				$payment_insert = mysql_query("insert into `admin_payment_subscription` (`user_id`,`product_name`,`payment_mode`,`payment_gross`,`txn_id`,`mc_currency`,`satus`,`date`) values ('".$userid."','Subscription','Instamojo','".$amount."','".$txn_id."','".$currency."','".$_REQUEST['payment_status']."','".$date."')");
				echo "<script>
alert('Payment Successful');
window.location.href='index.php';
</script>"; 
				
			}
			else
			{
				$amount = $_REQUEST['amount'];
				$txn_id = $_REQUEST['payment_id'];
				$currency = $_REQUEST['currency'];
				$userid = $_SESSION['student_id'];
				$date  = date('Y-m-d');
				$payment_insert = mysql_query("insert into `admin_payment_subscription` (`user_id`,`product_name`,`payment_mode`,`payment_gross`,`txn_id`,`mc_currency`,`satus`,`date`) values ('".$userid."','Subscription','Instamojo','".$amount."','".$txn_id."','".$currency."','".$_REQUEST['payment_status']."','".$date."')");
				echo "<script>
alert('Payment Failed');
window.location.href='index.php';
</script>"; 
			}
			?>
			
			
			</div>          
			
			
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>

 