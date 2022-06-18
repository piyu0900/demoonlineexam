<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insightsias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css2/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="css2/font-awesome.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link rel="stylesheet" href="css2/owl.carousel.min.css">
<link rel="stylesheet" href="css2/owl.theme.min.css">
    <link href="css2/owl.carousel.css" rel="stylesheet">
    <link href="css2/owl.theme.css" rel="stylesheet">

</head>
<body>
<?
include('configure.php'); 
$id = 1;
$get_product_details = $pm->getTableDetails(DTABLE_THEME_PANEL,'id',$id);
?> 
<header>
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<ul class="top-social-icon">
						<li><a href="<?php echo $get_product_details['face_link']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $get_product_details['twi_link']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-xs-6">
					<div class="log-in-top">
						<?php
						if(isset($_SESSION["firstname"]))
						{
							?>
							<a href="dashboard.php"><i class="fa fa-sign-in" aria-hidden="true"></i><?php echo $_SESSION["firstname"]; ?></a>
							<?php
						}
						else
						{
							?>
							<a href="subscribe.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Log In</a>
							<?php
						}
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="header-bottom">
        <nav class="navbar navbar-default" role="navigation">
    	  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <div class="navbar-brand navbar-brand-centered"><a href="index.php"><img src="img/logo.png"></a></div>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navbar-brand-centered">
		      <ul class="nav navbar-nav">
		        <li><a href="about-us.php">About Us</a></li>
		        <li><a href="schedule.php">Schedule</a></li>
		        <li><a href="subscribe.php">Subscribe</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="testimonial.php">Testimonials</a></li>
		        <li><a href="faqs.php">FAQs</a></li>	        
		        <li><a href="contact-us.php">Contact Us</a></li>	        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
</div>
</header>


