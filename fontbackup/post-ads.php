<?php 

require('configure.php'); 

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
            <p class="upload"><i class="fa fa-cloud-upload"></i>Upload Resume</p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/post-ads.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  
      <div class="pb-50">
        <div class="container bg-shadow">

                <h1 class="post-text">Post Your Ads</h1>

                  <div class="row contact-wrap">

<div class="status alert alert-success" style="display: none"></div>

<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="http://shapebootstrap.net/demo/html/corlate/sendemail.php">

<div class="col-sm-6 ">

<div class="form-group">

<label>Company Name <span>*</span> </label>

<input type="text" name="name" class="form-control" required="" placeholder="Name">

</div>







<div class="form-group">

<label>Phone <span>*</span></label>

<input type="text" name="email" class="form-control" required="" placeholder="Phone">

</div>





<div class="form-group">

<label>Email <span>*</span></label>

<input type="text" name="email" class="form-control" required="" placeholder="Email">

</div>









<div class="form-group">

<label>Website Link </label>

<input type="text" name="email" class="form-control" required="" placeholder="Type Your url ">

</div>



</div> 

<div class="col-sm-6">

<div class="form-group">

<label>Message</label>

<textarea name="message" id="message" required="" class="form-control" rows="8" placeholder="Massage"></textarea>

</div>

<div class="form-group">

<label>Ads Image<span>*</span></label>

<input type="file" name="img">

</div>



</div>

</form>



</div>

<div class="form-group">

<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit</button>

</div>

          	</div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
