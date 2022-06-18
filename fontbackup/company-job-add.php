<?php 


require('configure.php'); 
if(empty($_SESSION["userid"]))
{
	header('Location: index.php');
}
//echo $_SESSION["userid"];
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
<img src="images/banner/company-login.jpg" alt="" width="100%">
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
<li class=""><a href="company-dasbord.php">Dashboard</a></li>
<li class=""><a href="company-profile.php">Profile</a></li>
<li><a href="company-job-prefrences.php">Job Prefrences</a></li> 
<li class="active"><a href="company-job-add.php">Job Add</a></li> 
<li class=""><a href="company-change-password.php">Change Password</a></li> 
</ul>
</div>
</nav>
<div class="">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$select_post_job = mysql_query("select * from `admin_jobpost_subs` where `admin_jobpost_subs`.`company_id` = '".$_SESSION["userid"]."' and `admin_jobpost_subs`.`subs` = 'No'"); 
$fetch_post_job = mysql_fetch_array($select_post_job);

$select_job = mysql_query("select * from `admin_jobs` where `admin_jobs`.`company_id` = '".$_SESSION["userid"]."'");
$count_job = mysql_num_rows($select_job);
if($fetch_post_job['post_give'] == $count_job || $fetch_post_job['post_give'] > $count_job)
{
	?>
	<div class="top-std" id="postjob1">
	<div>Your Job Post <?php echo $count_job; ?> and your limit is <?php echo $fetch_post_job['post_give']; ?></div><br>
	<form class="form-horizontal" action="post-checkout.php" method="post">

	<div class="box-body">

	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-10">
	<input type="hidden"  name="userid" value="<?php echo $_SESSION["userid"]; ?>"/>
	<input type="submit" class="btn btn-info" name="submit" value="Pay Now"/>
	</div>
	</div>

	</div>

	</form>

	</div>
	<?php
	}
	if($fetch_post_job['post_give'] < $count_job)
	{
	?>
	<div class="top-std" id="postjob2">
		<div class="">
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding ">
				<?php
				$select_company = mysql_query("select * from `admin_company` where `admin_company`.`id` = '".$_SESSION["userid"]."'");
				$company_fetch = mysql_fetch_array($select_company);
				?>
				<?php
				if($company_fetch['image_browse'] == 0)
				{
					?>	
						<div class="text-center">
							<img src="images/banner/company-icon.png" class="avatar " alt="">
						</div>
					<?php
				}
				else
				{
					?>
						<div class="text-center">
							<img src="images/company/<?php echo $company_fetch['image_browse']; ?>" class="avatar " alt="">
						</div>
					<?php
				}
				?>
				
			</div>

		<div class="col-md-8 col-sm-6 col-xs-12 personal-info no-padding ">
		<?php
		if(isset($_POST['submit']))
		{
			$date = date('Y-m-d');

			$insert_job = mysql_query("insert into `admin_jobs` (`company_id`,`category_id`,`job_type`,`job_title`,`job_description`,`job_location_country`,`job_location_state`,`job_location_city`,`job_location_zip_code`,`job_salary`,`job_exprence`,`date_post`,`status`) values ('".$_SESSION["userid"]."','".$_POST["category_id"]."','".$_POST["job_type"]."','".$_POST["job_title"]."','".$_POST["job_description"]."','".$_POST["job_location_country"]."','".$_POST["job_location_state"]."','".$_POST["job_location_city"]."','".$_POST["job_location_zip_code"]."','".$_POST["job_salary"]."','".$_POST["job_exprence"]."','".$date."','Active')");
			//echo $insert_job;
			if(!empty($insert_job))
			{
				?>
				<script type="text/javascript">
					alert("Your job have been post.");
				</script>
				<?php
			}
		}
		?>



		<?php if((isset($msg)) and ($msg != '')){ ?>
		<div class="alert <?php echo $msg_class; ?> alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><?php echo $msg; ?></p>
		</div>
		<?php } ?>
		<div class="box box-info">
		<!-- form start -->
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="create_tariff" value="create_tariff">
		<div class="box-body">

		<div class="form-group">
		<label class="col-md-2 control-label">Category</label>
		<div class="col-md-10">
		<select class="form-control" id="category_id" name="category_id" required>
		<option value="">Select Category</option>
		<?php 
		echo $gf->getDropdown("SELECT * FROM ".DTABLE_STRAM,'id','category_name',$_GET['category_id']); 
		?>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-2 control-label">Job Type</label>
		<div class="col-md-10">
		<select class="form-control" id="job_type" name="job_type" required>

		<option value="">Select Type</option>
		<option value="Parmanet">Full Time</option>
		<option value="Part Time">Part Time</option>
		<option value="Project Work">Project Work</option>
		<option value="Internship">Internship</option>
		<option value="Freelancer">Freelancer</option>
		<option value="Apprentice">Apprentice</option>

		</select>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Job Title</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_title" placeholder="" name="job_title" required>
		</div>
		</div>
		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Description</label>
		<div class="col-md-10">
		<textarea id="editor1" name="job_description" class="form-control" required></textarea>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Country</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_country" placeholder="" name="job_location_country" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">State</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_state" placeholder="" name="job_location_state" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">City</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_city" placeholder="" name="job_location_city" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Zip</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_zip_code" placeholder="" name="job_location_zip_code" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Job Salary (Per/Month)</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_salary" placeholder="" name="job_salary" required>
		</div>
		</div>



		<div class="form-group">
		<label class="col-md-2 control-label">Experience</label>
		<div class="col-md-10">
		<select class="form-control" id="job_exprence" name="job_exprence" required>
		<option value="">Select Exprience</option>
		<?php
		for($i=0;$i<=25;$i++){
		?>
		<option value="<?php echo $i; ?>"><?php echo $i.' Years'; ?></option>
		<?php
		}
		?>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-2 control-label"></label>
		<div class="col-md-10">
		<input type="submit" class="btn btn-info" name="submit" value="Submit"/>
		</div>
		</div>


		<!--<div class="box-footer">

		</div>-->

		</div>
		</form>
		</div>





		</div>
		</div>


	</div>
	<?php
}
?>


<?php
$select_post_job2 = mysql_query("select * from `admin_jobpost_subs` where `admin_jobpost_subs`.`company_id` = '".$_SESSION["userid"]."' and `admin_jobpost_subs`.`subs` = 'Yes'"); 
$fetch_post_job2 = mysql_fetch_array($select_post_job2);

if(isset($fetch_post_job2['subs']))
{
	?>
	<div class="top-std" id="postjob2">
		<div class="">
			<div class="col-md-4 col-sm-6 col-xs-12 no-padding ">
				<?php
				$select_company = mysql_query("select * from `admin_company` where `admin_company`.`id` = '".$_SESSION["userid"]."'");
				$company_fetch = mysql_fetch_array($select_company);
				?>
				<?php
				if($company_fetch['image_browse'] == 0)
				{
					?>	
						<div class="text-center">
							<img src="images/banner/company-icon.png" class="avatar " alt="">
						</div>
					<?php
				}
				else
				{
					?>
						<div class="text-center">
							<img src="images/company/<?php echo $company_fetch['image_browse']; ?>" class="avatar " alt="">
						</div>
					<?php
				}
				?>
				
			</div>

		<div class="col-md-8 col-sm-6 col-xs-12 personal-info no-padding ">
		<?php
		if(isset($_POST['submit']))
		{
			$date = date('Y-m-d');

			$insert_job = mysql_query("insert into `admin_jobs` (`company_id`,`category_id`,`job_type`,`job_title`,`job_description`,`job_location_country`,`job_location_state`,`job_location_city`,`job_location_zip_code`,`job_salary`,`job_exprence`,`date_post`,`status`) values ('".$_SESSION["userid"]."','".$_POST["category_id"]."','".$_POST["job_type"]."','".$_POST["job_title"]."','".$_POST["job_description"]."','".$_POST["job_location_country"]."','".$_POST["job_location_state"]."','".$_POST["job_location_city"]."','".$_POST["job_location_zip_code"]."','".$_POST["job_salary"]."','".$_POST["job_exprence"]."','".$date."','Active')");
			//echo $insert_job;
			if(!empty($insert_job))
			{
				?>
				<script type="text/javascript">
					alert("Your job have been post.");
				</script>
				<?php
			}
		}
		?>



		<?php if((isset($msg)) and ($msg != '')){ ?>
		<div class="alert <?php echo $msg_class; ?> alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><?php echo $msg; ?></p>
		</div>
		<?php } ?>
		<div class="box box-info">
		<!-- form start -->
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="create_tariff" value="create_tariff">
		<div class="box-body">

		<div class="form-group">
		<label class="col-md-2 control-label">Category</label>
		<div class="col-md-10">
		<select class="form-control" id="category_id" name="category_id" required>
		<option value="">Select Category</option>
		<?php 
		echo $gf->getDropdown("SELECT * FROM ".DTABLE_STRAM,'id','category_name',$_GET['category_id']); 
		?>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-2 control-label">Job Type</label>
		<div class="col-md-10">
		<select class="form-control" id="job_type" name="job_type" required>

		<option value="">Select Type</option>
		<option value="Parmanet">Full Time</option>
		<option value="Part Time">Part Time</option>
		<option value="Project Work">Project Work</option>
		<option value="Internship">Internship</option>
		<option value="Freelancer">Freelancer</option>
		<option value="Apprentice">Apprentice</option>

		</select>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Job Title</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_title" placeholder="" name="job_title" required>
		</div>
		</div>
		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Description</label>
		<div class="col-md-10">
		<textarea id="editor1" name="job_description" class="form-control" required></textarea>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Country</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_country" placeholder="" name="job_location_country" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">State</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_state" placeholder="" name="job_location_state" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">City</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_city" placeholder="" name="job_location_city" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Zip</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_location_zip_code" placeholder="" name="job_location_zip_code" required>
		</div>
		</div>

		<div class="form-group">
		<label for="inputPassword3" class="col-md-2 control-label">Job Salary (Per/Month)</label>
		<div class="col-md-10">
		<input type="text" class="form-control" id="job_salary" placeholder="" name="job_salary" required>
		</div>
		</div>



		<div class="form-group">
		<label class="col-md-2 control-label">Experience</label>
		<div class="col-md-10">
		<select class="form-control" id="job_exprence" name="job_exprence" required>
		<option value="">Select Exprience</option>
		<?php
		for($i=0;$i<=25;$i++){
		?>
		<option value="<?php echo $i; ?>"><?php echo $i.' Years'; ?></option>
		<?php
		}
		?>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-2 control-label"></label>
		<div class="col-md-10">
		<input type="submit" class="btn btn-info" name="submit" value="Submit"/>
		</div>
		</div>


		<!--<div class="box-footer">

		</div>-->

		</div>
		</form>
		</div>





		</div>
		</div>


	</div>
	<?php
}
?>














</div>
</div>
</div>
          		  
</div>          

        

           

            

            

            

 <div class="clearfix"></div>


  

        

          

				<div class="clear mb-50"></div>

				



            

            

            
<!--....................................footer start..............................-->
            

    <?php include('includes/footer.php'); ?> 