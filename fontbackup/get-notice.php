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
            <p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/get-notice.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  
      <div class="pb-50">
        <div class="container bg-shadow">
          <div class="row">
         <div class="col-md-12">
<h4><a class="col" href="#">Get Noticed </a></h4>

<h4> Get noticed by recruiter and increase your chances of getting interview calls </h4>

 <p class="text-color">We will put your resume in spot light right in front of recruiter.Once the recruiter searches our database, your resume will be displayed with featured tag  informing recruiter about your skills and active job search. It certainly enhances your profile views and chances of getting a call. </p>

 <p class="text-color">Get noticed is available to our advantage members only ,so hurry now and upgrade to Petroleague Advantage!!!</p>

<!-- <p class="upload1"><i class="fa fa-cc-visa"></i>Payment Gateways</p>-->
 
 
         
 </div>
 

 <div class="col-md-12">
 <div class="bg-color">

 <label>Subscription:</label>
  
 <div class="toltal">$2600</div>
 <div class="cart-div">
 <form action="notice-checkout.php" method="post">
  <select name="package">
   <option value="Weekly">Weekly</option>
   <option value="Quarterly">Quarterly</option>
   <option value="6 Month">6 Month</option>
   <option value="12 Quarterly">12 Month</option>
 </select>
 <input type="hidden" name="price" value="2600"/>
 <input class="cart" type="submit" name="buy" value="Buy"/>
	

 
 </form>
 </div>
 </div>
 </div>
 
         
 <!--<div class="col-md-12">
 <div class="bg-color">
  <div class="jobsCategry"><div class="jobSubCategory"><span class="hexagon"><em class="highLtIc"></em></span><div><h3 class="catHead">Highlight Your Profile</h3>
                            Your profile is marked as "Featured" to make you stand out in the Naukri Database as an active jobseeker. <br></div></div><div class="jobSubCategory"><span class="hexagon"><em class="rankIc"></em></span><div><h3 class="catHead">Rank Higher In Search Results</h3>
                            Your profile is given a higher rank when recruiters search CVs of active candidates in Naukri database.
                        </div></div><div class="jobSubCategory"><span class="hexagon"><em class="accessIc"></em></span><div><h3 class="catHead">Be Accessible To More Recruiters</h3>
                            Your resume is searchable even by recruiters not registered with Naukri via "Free CV Search"
                        </div></div><input type="hidden" id="incart" value=""></div>
 
 <select>
   <option>Weekly</option>
   <option>Quarterly</option>
   <option>6 Month</option>
   <option>12 Month</option>
 </select>
 </div></div>-->           
            
          </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
