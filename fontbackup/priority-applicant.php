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
            <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();" class="marqu">
            <p class="mar-p-left"> Petroleague is a team of oil field professionals with global experience collaborated together to build a networking portal specifically to help oil field workers and students who are interested in joining oil industry by putting their careers development on fast track by providing platform for Networking. </p>
            </marquee>
            <p class="upload"><i class="fa fa-cloud-upload"></i>Upload Resume</p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/priority-applicant.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  
      <div class="pb-50">
        <div class="container bg-shadow">
          <div class="row">
         <div class="col-md-12">
<h4><a class="col" href="#">Priority Applicant</a></h4>

 <p class="text-color">Be a Priority Applicant now and leave the competition far behind! Within 24 hours, you will get email as per keyword provided. Just apply to job and get noticed on top of recruiter search as featured candidate. </p>

 <p class="text-color">Both Priority Applicant and Get noticed services are available to our Petroleague Advantage Plus members.</p>

<!-- <p class="upload1"><i class="fa fa-cc-visa"></i>Payment Gateways</p>-->
 
            
 </div>        
  <div class="col-md-12">
 <div class="bg-color">

 <label>Subscription:</label>
  <select>
   <option>Weekly</option>
   <option>Quarterly</option>
   <option>6 Month</option>
   <option>12 Month</option>
 </select>
 <div class="toltal">$2600</div>
 <div class="cart-div">
 <div class="cart">Buy</div>
 <div class="cart pull-right">Inquiry Now</div>
 </div>
 </div>
 </div>          
            
          </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
