 <?php
include('header.php');

?>

 



   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Contact Us
			</h1>
			<div class="col-sm-12">			
				<h3 class="small-title">contact info</h3>
			</div>
			<div class="col-sm-6">
			<?php echo $get_product_details['contactinfo']; ?>
			</div>
			<div class="col-sm-6">
				<ul class="address_right">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $get_product_details['address']; ?></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $get_product_details['email']; ?></li>
				</ul>
			</div>
		</div>
		<div class="row contact_form">
			<div class="col-sm-12">			
				<h3 class="small-title">Contact Form</h3>
			</div>
			<div class="col-sm-6">
				<?php
				if(isset($_POST['submit']))
				{
	
					$subject="Contact Mail";    
					$headers="MIME-Version: 1.0\n"; 
					$headers.="Content-type: text/html; charset=iso-8859-1 \n"; 
					$headers .= "X-Priority: 1 (Higuest)\n";
					$headers .= "X-MSMail-Priority: High\n";
					$headers .= "Importance: High\n";
					$headers .= "X-Mailer: PHP/phpversion()";

				   
					$headers.="from:Insightsias<".$_POST['email'].">";
					$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Fullname:".$_POST['fullname']."</td></tr>";
					$mail_body.="<tr><td>Email:".$_POST['email']."</td></tr>";
					$mail_body.="<tr><td>Mobile:".$_POST['mobile']."</td></tr>";
					$mail_body.="<tr><td>Subject:".$_POST['subject']."</td></tr>";
					$mail_body.="<tr><td>Message:".$_POST['message']."</td></tr></table>";   
					
					$mail_to= $get_product_details['email'];

					if(@mail($mail_to, $subject, $mail_body, $headers)) 
					
					{
					?>
					
				   <script type="text/javascript">
					 alert("Thank You! Your Message Has Been Sent Successfully");
					</script>
						
					<?php 
					} 
					   else
					{
					  print("<h1><font color=\"#880000\">Sorry! An Error Occurred While Sending Message. Please Try Again</font></h1>"); 
					} 
					
					
				}
				
				?>
				<form role="form" action="" method="post" class="form-contact">
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="fullname" placeholder="Full Name" required="">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required="">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="">
					</div>
                    <div class="form-group">
                    <textarea class="form-control" name="message" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>              
                    </div>
            
					<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary" />
				</form>
			</div>
			<div class="col-sm-6">
				<div class="map">
					<?php echo $get_product_details['map']; ?>
				</div>
			</div>
		</div>
	</div>
</section>



   
    
<?php
include('footer.php');
?>

