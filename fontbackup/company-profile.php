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

  
       

            

				

			

			<!-- end hero-header -->


<?php

if(isset($_POST['upload']))
{
	
	
	if(isset($_FILES["image"]["name"]) && $_FILES['image']['name']!='')
	{
		$time=time();
		$path=COMPANY_FRONTEND_IMAGE_PATH;
		move_uploaded_file($_FILES['image']['tmp_name'],$path.$time.$_FILES['image']['name']);
		
	$update_company = mysql_query("UPDATE `admin_company` SET `category_id` = '".$_POST['category_id']."',`state_id` = '".$_POST['state_id']."',`company_phone_no` = '".$_POST['phoneno']."',
	`company_name` = '".$_POST['companynm']."',`company_description` = '".$_POST['description']."',`company_contact_person` = '".$_POST['contact']."',
	`company_address` = '".$_POST['address']."',`company_website` = '".$_POST['website']."',`image_browse` = '".$time.$_FILES['image']['name']."' 
	WHERE `id` = '".$_SESSION["userid"]."'");
	}
	
	
	$update_company = mysql_query("UPDATE `admin_company` SET `category_id` = '".$_POST['category_id']."',`state_id` = '".$_POST['state_id']."',`company_phone_no` = '".$_POST['phoneno']."',
	`company_name` = '".$_POST['companynm']."',`company_description` = '".$_POST['description']."',`company_contact_person` = '".$_POST['contact']."',
	`company_address` = '".$_POST['address']."',`company_website` = '".$_POST['website']."'	WHERE `id` = '".$_SESSION["userid"]."'");
	
	
	
	
	
}

?>			

			

<div class="row">
<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->
<div class="row">
<nav class="navbar">
<ul class="nav navbar-nav das-nav">
<li class=" "><a href="company-dasbord.php">Dashboard</a></li>
<li class="active"><a href="company-profile.php">Profile</a></li>
<li class=""><a href="company-job-prefrences.php">Job Prefrences</a></li>
<li class=""><a href="company-job-add.php">Job Add</a></li> 
<li class=""><a href="company-change-password.php">Change Password</a></li> 
</ul>
</div>
</nav>
<div class="">
<div class="top-std">
<?php

$select_category = mysql_query("select * from `admin_category`");
$select_state = mysql_query("select * from `admin_state_list`");

$select_company = mysql_query("select * from `admin_company` where `admin_company`.`id` = '".$_SESSION["userid"]."'");
$company_fetch = mysql_fetch_array($select_company);
?>
<?php
if($company_fetch['image_browse'] == 0)
{
	?>	
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="text-center">
			<img src="images/banner/company-icon.png" class="avatar " alt="">
		</div>
	</div>
	<?php
}
else
{
	?>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="text-center">
			<img src="images/company/<?php echo $company_fetch['image_browse']; ?>" class="avatar " alt="">
		</div>
	</div>
	<?php
}
?>


<div class="col-md-8 col-sm-6 col-xs-12 personal-info">


<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" role="form">

<div class="form-group">
<label class="col-lg-3 control-label">Category:</label>
<div class="col-lg-8">
<select class="form-control" id="category_id" name="category_id" required="">

<option value="">Select Category</option>
<?php
while($category_fetch = mysql_fetch_array($select_category))
{
	?>
	<option value="<?php echo $category_fetch['id'];?>" <?php if($category_fetch['id'] == $company_fetch['category_id']){?> selected <?php }?>><?php echo $category_fetch['category_name'];?></option>
	<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">State:</label>
<div class="col-lg-8">
<select class="form-control" id="category_id" name="state_id" required="">

<option value="">Select State</option>
<?php
while($state_fetch = mysql_fetch_array($select_state))
{
	?>
	<option value="<?php echo $state_fetch['id'];?>" <?php if($state_fetch['id'] == $company_fetch['state_id']){?> selected <?php }?>><?php echo $state_fetch['state_name'];?></option>
	<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Username:</label>
<div class="col-lg-8">
<input class="form-control" value="<?php echo $company_fetch['username']; ?>"  type="text" readonly>
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Email:</label>
<div class="col-lg-8">
<input class="form-control" value="<?php echo $company_fetch['company_email']; ?>"  type="text" readonly>
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Phone No:</label>
<div class="col-lg-8">
<input class="form-control" name="phoneno" value="<?php echo $company_fetch['company_phone_no']; ?>"  type="text">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Name:</label>
<div class="col-lg-8">
<input class="form-control" name="companynm" value="<?php echo $company_fetch['company_name']; ?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Description:</label>
<div class="col-lg-8">
<input class="form-control" name="description" value="<?php echo $company_fetch['company_description']; ?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Contact Person:</label>
<div class="col-lg-8">
<input class="form-control" name="contact" value="<?php echo $company_fetch['company_contact_person']; ?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Address:</label>
<div class="col-lg-8">
<input class="form-control" name="address" value="<?php echo $company_fetch['company_address']; ?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Company Website:</label>
<div class="col-lg-8">
<input class="form-control" name="website" value="<?php echo $company_fetch['company_website']; ?>" type="text" >
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Image:</label>
<div class="col-lg-8">
<input class="form-control" name="image" type="file">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-8">
<input type="submit" name="upload" value="Edit Profile" class="btn btn-info">
</div>
</div>



</form>
</div>
</div>
</div>
</div>
</div>
          		  
</div>          

        

           

            

            

            

 <div class="clearfix"></div>


  

        

          

				<div class="clear mb-50"></div>

				



            

            

            
<!--....................................footer start..............................-->
            

    <?php include('includes/footer.php'); ?> 