<?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	echo "<script>
window.location.href='index.php';
</script>"; 
}

$getAdminSetting = $pm->getSetting(1);

?>
<?php include "includes/header.php" ?>

<body>


<script>
$(document).ready(function(){
	//alert('hello');
	$('.from1').hide();
	$('.from2').hide();
    $(".rdo").click(function(){
        $('.from1').show();
		$('.from2').hide();
    });
	 $(".rdo2").click(function(){
        $('.from2').show();
		$('.from1').hide();
    });
});
</script>



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
    
  <!--<div class="row">
  <div class="side-left side-left1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right side-right1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
  </div>-->
      <div class="pb-50">
        <div class="container bg-shadow bg-width">
          <div class="row">
          
          
			<div class="col-md-12"><h4><a class="col" href="#">Checkout Form</a></h4></div>          
					  
			<hr>
			<div class="col-md-12">
			
			<div class="col-md-12"><strong>Payment Gatway:</strong></div>
            <div class="col-md-12 male">
				<label><input class="rdo" name="pay" type="radio" value="paypal" required/> Paypal</label>
				<label><input class="rdo2" name="pay" type="radio" value="instamojo" required/> Instamojo</label>
			</div>
			<?php
			$get_student = mysql_query("select * from `admin_student` where  `admin_student`.`id` = '".$_SESSION["student_id"]."'");
			$fetch_student = mysql_fetch_array($get_student);
			?>
			<?php
			$paypal_url='https://www.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
			$paypal_id='petroleague01@gmail.com'; // Business email ID
			?>
			<form class="form-horizontal from1" method="post" action="<?php echo $paypal_url; ?>">
                
                <div class="col-md-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                       
                        <div class="panel-body">
                            <div>Paypal Form</div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Full Name:</strong>
                                    <input type="text" name="fullname" class="form-control" value="<?php echo $fetch_student['name']; ?>" readonly/>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Username:</strong>
                                    <input type="text" name="username" class="form-control" value="<?php echo $fetch_student['username']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="<?php echo $fetch_student['address']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" value="<?php echo $fetch_student['email']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone No.:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="<?php echo $fetch_student['phone_no']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="<?php echo $fetch_student['zip_code']; ?>" readonly/>
                                </div>
                            </div>
                           <div class="form-group">
                                <div class="col-md-12"><strong>Price:</strong></div>
                                <div class="col-md-12">
								<?php
								
								$_SESSION['price'] = $_REQUEST['price'];
								$_SESSION['product_id'] = $_REQUEST['product_id'];
								?>
                                    <input type="text" name="price" class="form-control" value="<?php echo $_REQUEST['price']; ?>" readonly/>
                                </div>
                            </div>
							
							<input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="item_name" value="<?php echo $_REQUEST['name'];?>">
							<input type="hidden" name="item_number" value="1">
							<input type="hidden" name="amount" value="<?php echo $_REQUEST['price'];?>">
							<input type="hidden" name="userid" value="<?php echo $_SESSION["student_id"]; ?>">
							<input type="hidden" name="currency_code" value="USD">
							<!--<input type="hidden" name="credits" value="510">
							<input type="hidden" name="no_shipping" value="1">
							<input type="hidden" name="handling" value="0">-->
						   <input type="hidden" name="cancel_return" value="http://webtechnomind.com/work/petroleague/librarycancel.php">
							<input type="hidden" name="return" value="http://webtechnomind.com/work/petroleague/librarysuccess.php">
							
							<div class="form-group">
                                
								<div class="col-md-12">
								<input type="submit" class="btn btn-primary" value="Payment" name="payment"/>
								</div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                   
                </div>
                
            </form>
			             
			<form class="form-horizontal from2" method="post" action="instamojo-php-master/instamojo-payment.php">
                
                <div class="col-md-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                       
                        <div class="panel-body">
                            <div>Instamojo Form</div>
                            
							
							<div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Full Name:</strong>
                                    <input type="text" name="fullname" class="form-control" value="<?php echo $fetch_student['name']; ?>" readonly/>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Username:</strong>
                                    <input type="text" name="username" class="form-control" value="<?php echo $fetch_student['username']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="<?php echo $fetch_student['address']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" value="<?php echo $fetch_student['email']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone No.:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="<?php echo $fetch_student['phone_no']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="<?php echo $fetch_student['zip_code']; ?>" readonly/>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-md-12"><strong>Price:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="price" class="form-control" value="<?php echo $_REQUEST['price']; ?>" readonly/>
                                </div>
                            </div>
								<?php
								$_SESSION['price'] = $_REQUEST['price'];
								$_SESSION['product_id'] = $_REQUEST['product_id'];
								//echo $_SESSION['product_name'] = $_REQUEST['name'];
								?>
							<input type="hidden" name="item_name" value="<?php echo $_REQUEST['name'];?>">
							<div class="form-group">
								<div class="col-md-12">
								<input type="submit" class="btn btn-primary" value="Payment" name="payment"/>
								</div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                   
                </div>
                
            </form>
			 
         
           
			</div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
