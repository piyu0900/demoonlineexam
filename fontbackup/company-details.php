<?php 

require('configure.php'); 

$job = $_GET['job'];

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
      <div class="row banner-img"> <img src="images/banner/job-search.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
   <!--   <div class="row">
  <div class="side-left side-left1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right side-right1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
  </div>-->
  <?php
  
  $select_job_details = mysql_query("select `admin_jobs`.`job_title`,`admin_jobs`.`job_location_country`,`admin_jobs`.`job_location_state`,`admin_jobs`.`job_location_city`,`admin_jobs`.`job_location_zip_code`,`admin_jobs`.`job_type`,`admin_jobs`.`job_salary`,`admin_jobs`.`job_exprence`,`admin_jobs`.`job_description`,`admin_category`.`category_name`,`admin_company`.`image_browse` from `admin_jobs` inner join `admin_category` on `admin_jobs`.`category_id` = `admin_category`.`id` inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id` where `admin_jobs`.`id` ='".$job."'");
  $fetch_job_details = mysql_fetch_array($select_job_details);
  ?>
  
<div class="pb-50">
<div class="main-container">
<div class="container  bg-shadow bg-width">
<div class="row"> 
<div class="col-md-12 page-content col-thin-left">
<div class="col-md-2">
<div class="add-image"><a ><img class="thumbnail no-margin" src="images/company/<?php echo $fetch_job_details['image_browse']; ?>" alt="company logo"></a></div>
</div> 
<div class="col-md-10">
<h5 class="company-title "><a ><?php echo $fetch_job_details['category_name']; ?></a></h5>
<h4 class="job-title"><a > <?php echo $fetch_job_details['job_title']; ?> </a></h4>
<span class="info-row1"> 
<span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $fetch_job_details['job_location_country']; ?>,<?php echo $fetch_job_details['job_location_state']; ?>,<?php echo $fetch_job_details['job_location_city']; ?>,<?php echo $fetch_job_details['job_location_zip_code']; ?> </span>
<span class="date"><i class=" icon-clock"> </i><?php echo $fetch_job_details['job_type']; ?></span>
<span class=" salary"> <i class=" icon-money"> </i> &#8377; <?php echo $fetch_job_details['job_salary']; ?></span>
<span class=" salary"> <i class=" icon-money"> </i> Exp:  <?php echo $fetch_job_details['job_exprence']; ?> years</span>
</span>
<div class="jobs-desc">
<?php echo $fetch_job_details['job_description']; ?>
</div>
</div>
<div class="form-group sub-read">
<label class="col-md-2 control-label"></label>
<div class="col-md-10">
<!--<div class="sub-read">
<a href="job-list.php"><input type="submit" class="btn btn-info" name="Back" value="Back"/></a>
<a href="#"><input type="submit" class="btn btn-info" name="Apply" value="Apply"/></a>
</div>-->
	<?php
	if(isset($_POST['apply']))
	{
		//echo $_SESSION['student_id']."////////";
		if(isset($_SESSION['student_id']))
		{
			$jobid = $_POST['jobid'];
			$date = date('Y-m-d');
			$insert_apply = mysql_query("insert into `admin_job_apply`(`company_id`,`user_id`,`apply_date`) values ('".$jobid."','".$_SESSION['student_id']."','".$date."')");
			header('Location: student-job-prefrences.php');
		}
		else
		{
			?>
			<script>
			$(document).ready(function(){
				alert("Please Before Login Then Apply");
				window.location.replace("http://petroleague.com/");
			});			
			</script>
			<?php
			//header('Location: index.php');
		}
	}
	?>
<form action="" method="post">
<div class="sub-read">
<input  name="jobid" value="<?php echo $job;?>" type="hidden">
<a href="job-list.php"><input type="submit" class="btn btn-info" name="Back" value="Back"/></a>
<input class="btn btn-info" name="apply" value="Apply" type="submit">
</div>
</form>
</div>
</div>
</div>
 
</div>
 
</div>
</div>
</div>
 </div>
          		  

  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
