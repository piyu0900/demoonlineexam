
    <?php 

require('configure.php'); 

$getAdminSetting = $pm->getSetting(1);

?>
<?php include "includes/header.php" ?>

<body>



<!-- start Container Wrapper -->


    
    <!-- start hero-header -->
    
    
    
    
    <div class="row topspace">
      <div class="post-hero">
        <div class="row">
          <div class="container">
            <div class="marqu-icon"> <a href="#"> <i class="fa fa-user" aria-hidden="true"></i> </a> </div>
            <?php include "includes/dashboard-marquee.php" ?>
            <p class="upload"><i class="fa fa-cloud-upload"></i>Upload Resume</p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/con1.jpg" alt="" width="100%"> </div>
    </div>

    
   

			
<div class="container">
<div class="row bg-shadow">
<div class="contact" id="contact">
		<div class="container">

			<h3>CONTACT US</h3>
			<p>Please send us your query and we will do our best to get back to you as soon as possible.</p>
			<div class="underline1"></div>

			<div class="contact-grids">

				<div class="col-md-12 col-sm-12 contact-grid">
					<form method="post" action="sendemail.php">
						<input type="text" class="text" name="name" placeholder="Full Name" required="">
						<input type="text" class="text" name="phone" placeholder="Mobile No." required="">
						<input type="text" class="text" name="email" placeholder="Email Id" required="">
						<textarea placeholder="Message"  name="message" required></textarea>
						<input type="submit" class="more_btn" value="Send">
					</form>
				</div>

				<!--<div class="col-md-6 col-sm-6 contact-grid">
					<h4>EMAIL US</h4>					
					
					<!--<div class="contact-phone">
						<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>Phone : +1 (734) 123-4567</p>
						<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>Phone : +1 (739) 648-7114</p>
					</div>-->
					<!--<div class="contact-email">
				<p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Email : <a href="mailto:support@petroleague.com">support@petroleague.com</a></p>
						
					</div>
					<!--<div class="address">
						<h5>ADDRESS</h5>
						<address>
							<ul>
								<li>Parma Via Modena</li>
								<li>40019</li>
								<li>Sant'Agata Bolognese</li>
								<li>BO, Italy</li>
							</ul>
						</address>
					</div>
				</div>-->
				
			</div>
			
	<!--<div class="row">
	<div class="row col-md-12 map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7563.931749193712!2d73.81457797468484!3d18.575577174566494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b8b5b8ad2de7%3A0xf3ab8cd75b15e385!2sSHRADDHA+CLINIC!5e0!3m2!1sen!2sin!4v1474535703713" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	</div>	-->	
			
			
		</div>
		
		
		
	</div>
          		  
</div>          
</div>
        
          

 <div class="clearfix"></div>

  
  <div class="clearfix"></div>



				<div class="clear mb-50"></div>

				       
<!--....................................footer start..............................-->
            
<?php include "includes/footer.php" ?>