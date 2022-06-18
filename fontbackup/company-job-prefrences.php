<?php 

require('configure.php'); 

if(empty($_SESSION["userid"]))
{
	header('Location: index.php');
}
?>

<?php include "includes/header.php" ?>
<div class="row topspace">
<div class="post-hero">
<div class="row">

						
<div class="container">
<div class="marqu-icon">
<a href="#">
<i class="fa fa-user" aria-hidden="true"></i>
</a>
</div>

    <?php include('includes/dashboard-marquee.php'); ?> 

</div>		
</div>
</div>


<div class="row">
<img src="images/banner/job.jpg" alt="" width="100%">
</div>

</div>
 <div class="clearfix"></div>

<div class="row">
<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->
<div class="row">
<nav class="navbar">
<ul class="nav navbar-nav das-nav">
<li class=" "><a href="company-dasbord.php">Dashboard</a></li>
<li class=""><a href="company-profile.php">Profile</a></li>
<li class="active"><a href="company-job-prefrences.php">Job Prefrences</a></li>
<li class=""><a href="company-job-add.php">Job Add</a></li> 
<li class=""><a href="company-change-password.php">Change Password</a></li> 
</ul>
</div>
</nav>


<div class="">
<div class="top-std">
<div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
    <thead>
      <tr>
       <th>Job Type</th>
        <th style="width:20%">Student Name</th>
        <th style="width:15%" class="hidden-phone">Email</th>
         <th style="width:15%" class="hidden-phone">Phone</th>
         <th style="width:20%" class="hidden-phone">Address</th>
         <th style="width:13%" class="hidden-phone">Picture</th>
         <th style="width:7%" class="hidden-phone">Resume</th>
        <th style="width:30%" class="hidden-phone">Apply Date</th>
      </tr>
    </thead>
    <tbody>
	
	
	<?php 
	
	$select_applyjob_list = mysql_query("select * from `admin_job_apply` inner join `admin_jobs` on `admin_job_apply`.`company_id` = `admin_jobs`.`id` inner join `admin_student` on `admin_student`.`id` = `admin_job_apply`.`user_id` where `admin_jobs`.`company_id` = '".$_SESSION['userid']."'");
	
	while($fetch_applyjob_list = mysql_fetch_array($select_applyjob_list))
	{
		?>
	
      <tr>
        <td>
          <span class="name"><?php echo $fetch_applyjob_list['job_type']; ?></span>
         </td>
  
         <td>
          <span class="name"><?php echo $fetch_applyjob_list['name']; ?></span>
         </td>
        <td>
          <span class="name"><?php echo $fetch_applyjob_list['email']; ?></span>
        </td>
       <td>
          <span class="name"><span class="name"><?php echo $fetch_applyjob_list['phone_no']; ?></span></span>
        </td>
        <td>
          <span class="name"><span class="name"><?php echo $fetch_applyjob_list['address']; ?></span></span>
       </td>
       <td class="hidden-phone">
       <span class="name">
	   <img src="images/student/<?php echo $fetch_applyjob_list['image_browse']; ?>"/>
       </span></td>
       <td class="hidden-phone">
       
       <!--<label class="col-lg-3 control-label">Upload Resume:</label>-->
        <span class="label label control-label"><a href="images/student-resume/<?php echo $fetch_applyjob_list['student_resume']; ?>" target="_blank">Download</a></span>
        </td>
        <td class="hidden-phone"><?php echo $fetch_applyjob_list['apply_date']; ?></td>
       
      </tr>
	  
	  <?php
	}
	  ?>
	  
        
    </tbody>
  </table>
</div>


</div>
</div>
</div>
</div>
          		  
</div>          

        
<!-- ......................................PROFILE DASBOARD END....................................... -->
           <div class="clearfix"></div>



				<div class="clear mb-50"></div>

<!--....................................footer start..............................-->
            

    <?php include('includes/footer.php'); ?> 
