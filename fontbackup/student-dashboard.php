<?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}


$getAdminSetting = $pm->getSetting(1);


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



	<!-- ......................................PROFILE DASBOARD START....................................... -->
<div class="row">
<img src="images/banner/dashboard.jpg" alt="" width="100%">
</div>

</div>
				
<div class="clearfix"></div>
			


<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->
<div class="row">
<?php include('includes/navbar-dashboard.php'); ?> 



<div class="row">
<div class="top-std">
<div class="col-md-12">



<div class="row">
 

 
<div class="col-sm-12 page-content col-thin-left">
<div class="category-list">
<div class="tab-box clearfix ">
 
<div class="col-lg-12  box-title no-border"><ul>
	<li class="ser">
	<?php
	if(isset($_POST['srch']))
	{
		$sr = $_POST['sr'];
		$search = mysql_Query("select `admin_jobs`.`id`,`admin_jobs`.`job_type`,`admin_jobs`.`job_title`,`admin_jobs`.`job_location_country`,`admin_jobs`.`job_location_state`,`admin_jobs`.`job_location_city`,`admin_jobs`.`job_location_zip_code`,`admin_jobs`.`job_salary`,`admin_category`.`category_name`,`admin_company`.`image_browse` from `admin_jobs` inner join `admin_category` on `admin_jobs`.`category_id` = `admin_category`.`id`  inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id` WHERE `admin_jobs`.`job_type` LIKE '%".$sr."%' OR `admin_jobs`.`job_title` LIKE '%".$sr."%' OR `admin_jobs`.`job_location_country` LIKE '%".$sr."%' OR `admin_jobs`.`job_location_state` LIKE '%".$sr."%' OR `admin_jobs`.`job_location_city` LIKE '%".$sr."%' OR `admin_category`.`category_name` LIKE '%".$sr."%'");
		
	}
	else
	{
		$select_job = mysql_query("select `admin_jobs`.`id`,`admin_jobs`.`job_type`,`admin_jobs`.`job_title`,`admin_jobs`.`job_location_country`,`admin_jobs`.`job_location_state`,`admin_jobs`.`job_location_city`,`admin_jobs`.`job_location_zip_code`,`admin_jobs`.`job_salary`,`admin_category`.`category_name`,`admin_company`.`image_browse` from `admin_jobs` inner join `admin_category` on `admin_jobs`.`category_id` = `admin_category`.`id` inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id`");
	}
	
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
		<div class="input-group stylish-input-group">
			
			<input type="text" name="sr" class="form-control he" placeholder="Search">
			<input type="hidden" name="srch"/>
			<span class="input-group-addon he">
				<button type="submit"><span class="glyphicon glyphicon-search"></span></button>  
			</span>
			
		</div>
</form>
    </li>
</ul>
<div class="inner">
<h2>All Job Listing</h2>

</div>

</div>
 


 
</div>
 
<div class="listing-filter hidden-xs">


<div style="clear:both"></div>
</div>
 
<div class="adds-wrapper jobs-list">

<?php
//echo $search;
if(isset($search))
{
	while($fetch_job_search = mysql_fetch_array($search))
	{
		?>

		<div class="item-list job-item">
		<div class="col-md-2 no-padding photobox">
		<?php
		$image_browse1 = $fetch_job_search['image_browse'];
		$array_img1 = explode('.',$image_browse1);
		if(isset($array_img1[1]))
		{
			?>
			<div class="add-image"><a href="company-details.php?job=<?php echo $fetch_job_search['id'];?>"><img class="thumbnail no-margin" src="images/company/<?php echo $fetch_job_search['image_browse']; ?>" alt="company logo" width="100%"></a></div>
			
			<?php
		}
		else
		{
			?>
			<div class="add-image"><a href="company-details.php?job=<?php echo $fetch_job_search['id'];?>"><img class="thumbnail no-margin" src="images/no-image.jpg" alt="company logo" width="100%"></a></div>
			
			<?php
		}
		
		?>
		</div>
		 
		<div class="col-md-10  add-desc-box">
		<div class="add-details jobs-item">
		<h5 class="company-title "><a href="company-details.php?job=<?php echo $fetch_job_search['id'];?>"><?php echo $fetch_job_search['category_name'];?></a></h5>
		<h4 class="job-title"><a href="company-details.php?job=<?php echo $fetch_job_search['id'];?>"> <?php echo $fetch_job_search['job_title'];?> </a></h4>
		<span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $fetch_job_search['job_location_country'];?>,<?php echo $fetch_job_search['job_location_state'];?>,<?php echo $fetch_job_search['job_location_city'];?>,<?php echo $fetch_job_search['job_location_zip_code'];?> </span> <span class="date"><i class=" icon-clock"> </i><?php echo $fetch_job_search['job_type'];?></span><span class=" salary"> <i class=" icon-money"> </i> &#8377; <?php echo $fetch_job_search['job_salary'];?></span></span>
		<form action="" method="post">
		<div class="sub-read">
		<input  name="jobid" value="<?php echo $fetch_job_search['id'];?>" type="hidden">
		<input class="btn btn-info" name="apply" value="Apply" type="submit">
		<a class="btn btn-info" href="company-details.php?job=<?php echo $fetch_job_search['id'];?>">Read More</a>
		</div>
		</form>
		</div>
		</div>
		</div>
		<?php
	}

}
else
{
	while($fetch_job = mysql_fetch_array($select_job))
	{
		?>

		<div class="item-list job-item">
		<div class="col-md-2 no-padding photobox">
		<?php
		$image_browse = $fetch_job['image_browse'];
		$array_img = explode('.',$image_browse);
		if(isset($array_img[1]))
		{
			?>
			<div class="add-image"><a href="company-details.php?job=<?php echo $fetch_job['id'];?>"><img class="thumbnail no-margin" src="images/company/<?php echo $fetch_job['image_browse']; ?>" alt="company logo" width="100%"></a></div>
			
			<?php
		}
		else
		{
			?>
			<div class="add-image"><a href="company-details.php?job=<?php echo $fetch_job['id'];?>"><img class="thumbnail no-margin" src="images/no-image.jpg" alt="company logo" width="100%"></a></div>
			
			<?php
		}
		
		?>
		</div>
		 
		<div class="col-md-10  add-desc-box">
		<div class="add-details jobs-item">
		<h5 class="company-title "><a href="company-details.php?job=<?php echo $fetch_job['id'];?>"><?php echo $fetch_job['category_name'];?></a></h5>
		<h4 class="job-title"><a href="company-details.php?job=<?php echo $fetch_job['id'];?>"> <?php echo $fetch_job['job_title'];?> </a></h4>
		<span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $fetch_job['job_location_country'];?>,<?php echo $fetch_job['job_location_state'];?>,<?php echo $fetch_job['job_location_city'];?>,<?php echo $fetch_job['job_location_zip_code'];?> </span> <span class="date"><i class=" icon-clock"> </i><?php echo $fetch_job['job_type'];?></span><span class=" salary"> <i class=" icon-money"> </i> &#8377; <?php echo $fetch_job['job_salary'];?></span></span>
		
		<form action="" method="post">
		<div class="sub-read">
		<input  name="jobid" value="<?php echo $fetch_job['id'];?>" type="hidden">
		<input class="btn btn-info" name="apply" value="Apply" type="submit">
		<a class="btn btn-info" href="company-details.php?job=<?php echo $fetch_job['id'];?>">Read More</a>
		</div>
		</form>
		</div>
		</div>
		</div>
		<?php
	}

}
?>
 
 
 
</div>
 

</div>
<!--<div class="pagination-bar text-center">
<ul class="pagination">
<li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#"> ...</a></li>
<li><a class="pagination-btn" href="#">Next</a></li>
</ul>
</div>-->
 

 
</div>
 
</div>









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