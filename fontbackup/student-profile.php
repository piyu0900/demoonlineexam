<?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}


$getAdminSetting = $pm->getSetting(1);


$msg ="";
$id = $_SESSION['student_id'];
$_SESSION['student_type'] = "student";
$page_title = 'Update Student';
if(isset($_POST['update_tariff']) && $_POST['update_tariff']=='update_tariff'){
if(isset($_FILES["image_browse"]["name"]) && $_FILES['image_browse']['name']!=''){
$path = STUDENT_FRONTEND_IMAGE_PATH;
$tmpno = time();
$big_image  = $_FILES['image_browse']['name'];
$big_image1  = $_FILES['image_browse']['tmp_name'];
$filetype = $_FILES['image_browse']['type'];
$file_name = basename($big_image);
$file_name_arr = explode(".",$file_name);
$file_ext = $file_name_arr[count($file_name_arr)-1];
$new_file_name = "student".$tmpno.".".$file_ext;
copy($big_image1,$path.$new_file_name);
list($width,$height,$type,$attr) = getimagesize($path.$new_file_name);
$image->load($path.$new_file_name);
//$image->resize(1100,359);
$image->save($path.$new_file_name);
$sql = "SELECT * FROM ".DTABLE_STUDENT." WHERE id='".$id."'";
$res = $db->selectData($sql);
$data_cover_photo = $db->getRow($res);
if($data_cover_photo['image_browse']!=''){
if(file_exists($path.$data_cover_photo['image_browse'])){
unlink($path.$data_cover_photo['image_browse']);
}
}
$_POST['image_browse'] = $new_file_name;
}
$_POST['id'] = $id;	
$db->updateArray(DTABLE_STUDENT,$_POST, "id=".$id) or die(mysql_error());
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}

$get_product_details = $pm->getTableDetails(DTABLE_STUDENT,'id',$id);



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
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>


<form class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
<input type="hidden" name="update_tariff" value="update_tariff">
<div class="col-md-6">

<div class="form-group">
<label class="col-lg-4">Student Name:</label>
<div class="col-lg-12">
<input class="form-control" value="<?php echo $get_product_details['name']; ?>" name="name" type="text" required>
</div>
</div>

<div class="form-group">
<label class="col-lg-4">User Name:</label>
<div class="col-lg-12">
<input class="form-control" value="<?php echo $get_product_details['username']; ?>" name="username" type="text" required>
</div>
</div>

<div class="form-group">
<label class="col-lg-4">Email:</label>
<div class="col-lg-12">
<input class="form-control" value="<?php echo $get_product_details['email']; ?>" name="email" type="email" required>
</div>
</div>



<div class="form-group">
<label class="col-lg-4">Phone No:</label>
<div class="col-lg-12">
<input class="form-control" value="<?php echo $get_product_details['phone_no']; ?>" name="phone_no" type="text">
</div>
</div>

</div>










<div class="col-md-6">

<div class="form-group">
<label class="col-lg-4">Gender:</label>
<div class="col-lg-12">
<div class="ui-select">
<select name="gender" class="form-control">
<option value="">Select Gender</option>
<option value="Male" <?php if($get_product_details['gender'] == 'Male'){?> selected <?php }?>>Male</option>
<option value="Female" <?php if($get_product_details['gender'] == 'Female'){?> selected <?php }?>>Female</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-lg-4">Address:</label>
<div class="col-lg-12">
<textarea style="width:100%; height:54px;" name="address" class="form-control"><?php echo stripslashes(strip_tags($get_product_details['address'])); ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-lg-12">Profile:</label>
<div class="col-lg-6">
<?PHP if($get_product_details['image_browse']!='' && file_exists(STUDENT_FRONTEND_IMAGE_PATH.$get_product_details['image_browse'])){?>
<img src="<?PHP echo STUDENT_FRONTEND_IMAGE_PATH.$get_product_details['image_browse'];?>" width="80" height="60"/>
<?php }else{
	?>
	<img src="<?PHP echo STUDENT_FRONTEND_IMAGE_PATH.'no-image.jpg';?>" width="80" height="60"/>
	
	<?php } ?>



<input class="form-control in" name="image_browse" type="file">
</div>
</div>


<div class="form-group">
<label class="col-lg-4">Countries:</label>
<div class="col-lg-12">
<div class="ui-select">
<select name="country_id" class="form-control">
<option value="">Select Countries</option>

<?php 
$sql1 = "SELECT * FROM `admin_country_list` ORDER BY id ASC";
$res1 = $db->selectData($sql1);
while($row_rec1 = $db->getRow($res1)){
?>
<option value="<?php echo $row_rec1['id']?>" <?php if($row_rec1['id'] == $get_product_details['country_id']){?> selected <?php }?>><?php echo ucfirst($row_rec1['country_name'])?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>


<div class="form-group">
<label class="col-lg-4">State:</label>
<div class="col-lg-12">
<div class="ui-select">
<select name="state_id" class="form-control">
<option value="">Select State</option>

<?php 
$sql = "SELECT * FROM ".DTABLE_STATE_LIST." ORDER BY id ASC";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
?>
<option value="<?php echo $row_rec['id']?>" <?php if($row_rec['id'] == $get_product_details['state_id']){?> selected <?php }?>><?php echo ucfirst($row_rec['state_name'])?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>




<div class="form-group">
<label class="col-md-4"></label>
<div class="col-md-12">
<input class="btn btn-info" value="Save" type="submit">
</div>
</div>

</div>

</form>
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