<?php 

require('configure.php'); 

$getAdminSetting = $pm->getSetting(1);
$msg ="";


if(isset($_POST['reg_fornt']) && $_POST['reg_fornt']=='reg_fornt'){

$_POST['enquiry_date'] = date('Y-m-d');
$get_last_id = $db->insertDataArray(DTABLE_WEBSITE_ENQUIRY,$_POST);
if(!empty($get_last_id)):
$msg_class = 'alert-success';
$msg = 'Send Inquiry Successfull';
else:
$msg_class = 'alert-error';
$msg = MSG_ADD_FAIL;
endif;

}
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
      <div class="row"> <img src="images/banner/inquiry-now.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  
      <div class="pb-50">
        <div class="container bg-shadow">
          <div class="row">
          
          





<div class="col-md-12">
	<!-- start Inquiry Now Modal -->



			



			



				



				



				<div class="modal-body">



					<div class="row gap-20">



						



						<div class="col-sm-12 col-md-12">
<p class="mb-20">Please send us your Question,comments or concerns by filling up the form below.we'll do our 
best to get back to your as quickly as possible</p>

<hr>

</div>
<?php if(isset($msg)){?> <p style="text-align:center; color:#F00; font-weight:bold"><?php  echo $msg;  ?></p><br /> <?php } ?>
<form method="post" name="" action="">
<input type="hidden" name="reg_fornt" value="reg_fornt">
<div class="col-sm-12 col-md-12">
<label>User Type</label>
<select class="inp form-control" name="user_type" required>
  <option value="">Select Type</option>
  <option value="student">Student</option>
  <option value="recruitment">Recruitment/Company</option>
  <option value="others">Others</option>
</select>
</div>

<div class="col-sm-12 col-md-12">



				



							<div class="form-group"> 



								<label>Full Name</label>



								<input class="form-control inp" placeholder="Name" type="text" name="full_name" required> 



							</div>



						



						</div>
						<div class="col-sm-12 col-md-12">



				



							<div class="form-group"> 



								<label>Email Address</label>



								<input class="form-control inp" placeholder="Enter your email address" type="email" name="email" required> 



							</div>



						



						</div>

                        

                        <div class="col-sm-12 col-md-12">



				



							<div class="form-group"> 



								<label>what's your question?</label>



							

 <textarea class="form-control inp" placeholder="what's your question?" name="enquiry_question"></textarea> 



							</div>



						



						</div>

                        







						



						




						



					</div>



				</div>



				



				<div class="modal-footer ">



					<button type="submit" class="btn btn-primary">Submit</button>



					<button class="btn btn-primary btn-inverse" type="reset">Reset</button>



				</div>



				</form>



			


			<!-- end Inquiry Now Modal -->
 
            
 </div>             

 
         
         
            
            
          </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
