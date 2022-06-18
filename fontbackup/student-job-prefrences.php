 <?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}
$id = $_SESSION['student_id'];

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

<p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>	
</div>		
</div>
</div>




<div class="row">
<img src="images/banner/profile.jpg" alt="" width="100%">
</div>

</div>



			
<div class="clearfix"></div>
			

<div class="row">
<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->


<?php include('includes/navbar-dashboard.php'); ?> 


<div class="top-std">





<div class="col-md-12 personal-info">

<div class="top-std">
<div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
    <thead>
      <tr>
       <th>Job Type</th>
        <th style="width:20%">Company Name</th>
        <th style="width:10%" class="hidden-phone">Email</th>
         <th style="width:10%" class="hidden-phone">Phone</th>
         <th style="width:20%" class="hidden-phone">Address</th>
         <th style="width:10%" class="hidden-phone">Picture</th>
         <th style="width:10%" class="hidden-phone">Website</th>
         <th style="width:10%" class="hidden-phone">Position</th>
        <th style="width:10%" class="hidden-phone">Apply Date</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
	
	//$select_applyjob_list = mysql_query("select `admin_job_apply`.`apply_date`,`admin_category`.`category_name`,`admin_company`.`image_browse`,`admin_company`.`company_phone_no`,`admin_company`.`company_email`,`admin_company`.`company_address`,`admin_company`.`company_website`,`admin_company`.`company_name`,`admin_jobs`.`job_title`,`admin_jobs`.`job_type` from `admin_jobs` inner join `admin_category` on `admin_jobs`.`category_id` = `admin_category`.`id` inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id` inner join `admin_job_apply` on `admin_job_apply`.`company_id` = `admin_company`.`id` where `admin_job_apply`.`user_id` = '".$_SESSION['student_id']."'");
	$select_applyjob_list = mysql_query("select * from `admin_job_apply` inner join `admin_jobs` on `admin_job_apply`.`company_id` = `admin_jobs`.`id` inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id` where user_id = '".$_SESSION['student_id']."'");
	
	while($fetch_applyjob_list = mysql_fetch_array($select_applyjob_list))
	{
		?>
		  <tr>
			 <td>
			  <span class="name"><?php echo $fetch_applyjob_list['job_type'] ?></span>
			 </td>
	  
			 <td>
			  <span class="name"><?php echo $fetch_applyjob_list['company_name'] ?></span>
			 </td>
			<td>
			  <span class="name"><?php echo $fetch_applyjob_list['company_email'] ?></span>
			</td>
		   <td>
			  <span class="name"><span class="name"><?php echo $fetch_applyjob_list['company_phone_no'] ?></span></span>
			</td>
			<td>
			  <span class="name"><span class="name"><?php echo $fetch_applyjob_list['company_address'] ?></span></span>
		   </td>
		   <td class="hidden-phone">
		   <span class="name">
		   
		   <?php
		$image_browse = $fetch_applyjob_list['image_browse'];
		$array_img = explode('.',$image_browse);
		if(isset($array_img[1]))
		{
			?>
			<img src="images/company/<?php echo $fetch_applyjob_list['image_browse']; ?>"/>
			<?php
		}
		else
		{
			?>
			<img src="images/no-image.jpg"/>
			<?php
		}
		
		?>
		   </span></td>
		   <td>
			  <span class="name"><span class="name"><?php echo $fetch_applyjob_list['company_website'] ?></span></span>
		   </td>
		   <td class="hidden-phone">
			 <span class="name"><span class="name"><?php echo $fetch_applyjob_list['job_title'] ?></span></span>
			</td>
			<td class="hidden-phone"><?php echo $fetch_applyjob_list['apply_date'] ?></td>
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
</div>
        

           

            

            

            

 <div class="clearfix"></div>

   





				<div class="clear mb-50"></div>

				


			


            

            

       

            

            

            

            

            

            
<!--....................................footer start..............................-->
            

             <?php include "includes/footer.php" ?> 

          

			