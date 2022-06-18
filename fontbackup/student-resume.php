<?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}
$getAdminSetting = $pm->getSetting(1);


$msg ="";
$id = $_SESSION['student_id'];
$_SESSION['student_type'] = "student";;
$page_title = 'Update Student';
if(isset($_POST['update_tariff']) && $_POST['update_tariff']=='update_tariff'){
if(isset($_FILES["student_resume"]["name"]) && $_FILES['student_resume']['name']!=''){
$path = STUDENT_RESUME_FRONTEND_IMAGE_PATH;
$tmpno = time();
$big_image  = $_FILES['student_resume']['name'];
$big_image1  = $_FILES['student_resume']['tmp_name'];
$filetype = $_FILES['student_resume']['type'];
$file_name = basename($big_image);
$file_name_arr = explode(".",$file_name);
$file_ext = $file_name_arr[count($file_name_arr)-1];
$new_file_name = "resume".$tmpno.".".$file_ext;
copy($big_image1,$path.$new_file_name);
list($width,$height,$type,$attr) = getimagesize($path.$new_file_name);
$image->load($path.$new_file_name);
//$image->resize(1100,359);
$image->save($path.$new_file_name);
$sql = "SELECT * FROM ".DTABLE_STUDENT." WHERE id='".$id."'";
$res = $db->selectData($sql);
$data_cover_photo = $db->getRow($res);
if($data_cover_photo['student_resume']!=''){
if(file_exists($path.$data_cover_photo['student_resume'])){
unlink($path.$data_cover_photo['student_resume']);
}
}
$_POST['student_resume'] = $new_file_name;
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

<div class="col-md-4 col-sm-6 col-xs-12">

<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>

<div class="text-center">




<?PHP if($get_product_details['student_resume']!='' && file_exists(STUDENT_RESUME_FRONTEND_IMAGE_PATH.$get_product_details['student_resume'])){?>
<p><a href="<?PHP echo STUDENT_RESUME_FRONTEND_IMAGE_PATH.$get_product_details['student_resume'];?>" target="_blank">Resume Download</a></p>
<?php }else{
	?>
	No Resume
	
	<?php } ?>



</div>
</div>
<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
<form class="form-horizontal" method="post"  role="form" action="" enctype="multipart/form-data">
<input type="hidden" name="update_tariff" value="update_tariff">
<div class="form-group">
<label class="col-lg-3 control-label">Upload Resume:</label>
<div class="col-lg-8">
<input class="form-control"  name="student_resume"  type="file" placeholder="Name" required>
</div>
</div>
<?php
$d = date('Y-m-d');
?>
<input class="form-control"  name="resume_date" value="<?php echo $d; ?>" type="hidden">
<div class="form-group">
<label class="col-md-4"></label>
<div class="col-md-12">
<input class="btn btn-info" value="Upload" type="submit">
</div>
</div>
</form>
</div>
</div>

</div>
          		  
</div>          
</div>
        

           

            

            

            

 <div class="clearfix"></div>

   





				<div class="clear mb-50"></div>

				


			


            

            

       

            

            

            

            

            

            
<!--....................................footer start..............................-->
            

             <?php include "includes/footer.php" ?> 

          

			