<?php 
include('includes/admin_top.php'); 
$msg ="";
$id = 1;
$page_title = 'Theme Panel';
if(isset($_POST['update_theme']) && $_POST['update_theme']=='update_theme'){

	if($_FILES['image_browse1']['name']!=''){
	$arr=getimagesize($_FILES['image_browse1']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse1']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse1']['tmp_name'];
	$name = time()."_".$_FILES['image_browse1']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse1'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse2']['name']!=''){
	$arr=getimagesize($_FILES['image_browse2']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse2']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse2']['tmp_name'];
	$name = time()."_".$_FILES['image_browse2']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse2'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}

	if($_FILES['image_browse3']['name']!=''){
	$arr=getimagesize($_FILES['image_browse3']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse3']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse3']['tmp_name'];
	$name = time()."_".$_FILES['image_browse3']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse3'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse4']['name']!=''){
	$arr=getimagesize($_FILES['image_browse4']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse4']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse4']['tmp_name'];
	$name = time()."_".$_FILES['image_browse4']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse4'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse5']['name']!=''){
	$arr=getimagesize($_FILES['image_browse5']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse5']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse5']['tmp_name'];
	$name = time()."_".$_FILES['image_browse5']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse5'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse6']['name']!=''){
	$arr=getimagesize($_FILES['image_browse6']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse6']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse6']['tmp_name'];
	$name = time()."_".$_FILES['image_browse6']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse6'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse7']['name']!=''){
	$arr=getimagesize($_FILES['image_browse7']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse7']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse7']['tmp_name'];
	$name = time()."_".$_FILES['image_browse7']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse7'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	if($_FILES['image_browse8']['name']!=''){
	$arr=getimagesize($_FILES['image_browse8']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['image_browse8']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['image_browse8']['tmp_name'];
	$name = time()."_".$_FILES['image_browse8']['name'];
	move_uploaded_file($tmp_name, ADV_ADMIN_IMAGE_PATH.$name);
	$_POST['image_browse8'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	
	
	




$db->updateArray(DTABLE_THEME_PANEL,$_POST, "id=".$id) or die(mysql_error());
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}
$get_product_details = $pm->getTableDetails(DTABLE_THEME_PANEL,'id',$id);
?>  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
<?php include('includes/admin_header.php'); ?>  
<!-- Left side column. contains the logo and sidebar -->
<?php include('includes/admin_sidebar.php'); ?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1><?php echo $page_title; ?></h1>
</section>
<section class="content">
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
<div class="box box-info">
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="update_theme" value="update_theme">
<div class="box-body">

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">About Heading</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="aboutheading" placeholder="" value="<?php echo $get_product_details['aboutheading']; ?>" name="aboutheading" required />
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">About Description</label>
<div class="col-sm-10">
<textarea id="editor1" name="aboutdes" rows="2" cols="80" required><?php echo $get_product_details['aboutdes']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">More About Link</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="link1" placeholder="" value="<?php echo $get_product_details['link1']; ?>" name="link1" required />
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Video</label>
<div class="col-sm-10">
<textarea name="video" rows="5" cols="300" required><?php echo $get_product_details['video']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">More video Link</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="link2" placeholder="" value="<?php echo $get_product_details['link2']; ?>" name="link2" required />
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Blue 1st section</label>
<div class="col-sm-10">
<textarea name="fblues" rows="5" cols="300" required><?php echo $get_product_details['fblues']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Blue 2nd section</label>
<div class="col-sm-10">
<textarea name="sblues" rows="5" cols="300" required><?php echo $get_product_details['sblues']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Blue 3rd section</label>
<div class="col-sm-10">
<textarea name="tblues" rows="5" cols="300" required><?php echo $get_product_details['tblues']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Blue 4th section</label>
<div class="col-sm-10">
<textarea name="foblues" rows="5" cols="300" required><?php echo $get_product_details['foblues']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 1st section</label>
<div class="col-sm-10">
<textarea name="fads" rows="5" cols="300" required><?php echo $get_product_details['fads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse1']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse1'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse1'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture1</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse1" placeholder="" name="image_browse1" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 2nd section</label>
<div class="col-sm-10">
<textarea name="sads" rows="5" cols="300" required><?php echo $get_product_details['sads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse2']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse2'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse2'];?>" width="80" height="60"/>
<?php }
?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture2</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse2" placeholder="" name="image_browse2" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 3rd section</label>
<div class="col-sm-10">
<textarea name="tads" rows="5" cols="300" required><?php echo $get_product_details['tads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse3']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse3'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse3'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture3</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse3" placeholder="" name="image_browse3" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 4th section</label>
<div class="col-sm-10">
<textarea name="foads" rows="5" cols="300" required><?php echo $get_product_details['foads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse4']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse4'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse4'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture4</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse4" placeholder="" name="image_browse4" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 5th section</label>
<div class="col-sm-10">
<textarea name="fifads" rows="5" cols="300" required><?php echo $get_product_details['fifads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse5']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse5'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse5'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture5</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse5" placeholder="" name="image_browse5" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 6th section</label>
<div class="col-sm-10">
<textarea name="sixads" rows="5" cols="300" required><?php echo $get_product_details['sixads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse6']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse6'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse6'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture6</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse6" placeholder="" name="image_browse6" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 7th section</label>
<div class="col-sm-10">
<textarea name="sevads" rows="5" cols="300" required><?php echo $get_product_details['sevads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse7']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse7'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse7'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture7</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse7" placeholder="" name="image_browse7" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage 8th section</label>
<div class="col-sm-10">
<textarea name="eigads" rows="5" cols="300" required><?php echo $get_product_details['eigads']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<?PHP if($get_product_details['image_browse8']!='' && file_exists(ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse8'])){?>
<img src="<?PHP echo ADV_ADMIN_IMAGE_PATH.$get_product_details['image_browse8'];?>" width="80" height="60"/>
<?php }
 ?>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Advantage Picture8</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse8" placeholder="" name="image_browse8" >
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<textarea name="address" rows="5" cols="300" required><?php echo $get_product_details['address']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="email" placeholder="" value="<?php echo $get_product_details['email']; ?>" name="email" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Facebook Link</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="face_link" placeholder="" value="<?php echo $get_product_details['face_link']; ?>" name="face_link" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Twitter Link</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="twi_link" placeholder="" value="<?php echo $get_product_details['twi_link']; ?>" name="twi_link" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Contact Info</label>
<div class="col-sm-10">
<textarea name="contactinfo" rows="5" cols="300" required><?php echo $get_product_details['contactinfo']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Map</label>
<div class="col-sm-10">
<textarea name="map" rows="5" cols="300" required><?php echo $get_product_details['map']; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Subscribe Price</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="subcribe_price" placeholder="" value="<?php echo $get_product_details['subcribe_price']; ?>" name="subcribe_price" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Subscribe Header</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="subcribe_header" placeholder="" value="<?php echo $get_product_details['subcribe_header']; ?>" name="subcribe_header" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Subscribe Description</label>
<div class="col-sm-10">
<textarea name="subcribe_des" rows="10" cols="300" required><?php echo $get_product_details['subcribe_des']; ?></textarea>
</div>
</div>




<div class="box-footer">
<button type="submit" class="btn btn-info">Submit</button>
</div>
</div>
</form>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 