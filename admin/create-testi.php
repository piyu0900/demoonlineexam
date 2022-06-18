<?php 

include('includes/admin_top.php'); 

$msg ="";

$page_title = 'Create Testimonial';

if(isset($_POST['create_testi']) && $_POST['create_testi']=='create_testi'){

if($_FILES['image_browse']['name']!=''){
$arr=getimagesize($_FILES['image_browse']['tmp_name']);
$userfile_extn = end(explode(".", strtolower($_FILES['image_browse']['name'])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $_FILES['image_browse']['tmp_name'];
$name = time()."_".$_FILES['image_browse']['name'];
move_uploaded_file($tmp_name, TESTI_ADMIN_IMAGE_PATH.$name);
$_POST['image_browse'] = $name;
}else{
$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
}
}

$get_last_id = $db->insertDataArray(DTABLE_TESTI,$_POST) or die(mysql_error());
if(!empty($get_last_id)):
$msg_class = 'alert-success';
$msg = MSG_ADD_SUCCESS;
else:
$msg_class = 'alert-error';
$msg = MSG_ADD_FAIL;
endif;

}
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

<input type="hidden" name="create_testi" value="create_testi">

<div class="box-body">

<div class="form-group">

<label for="inputPassword3" class="col-sm-2 control-label">Fullname</label>

<div class="col-sm-5">

<input type="text" class="form-control" id="fullname" placeholder="" name="fullname"  required>

</div>

</div>

<div class="form-group">

<label for="inputPassword3" class="col-sm-2 control-label">Designation</label>

<div class="col-sm-5">

<input type="text" class="form-control" id="desig" placeholder="" name="desig"  required>

</div>

</div>

<div class="form-group">

<label for="inputPassword3" class="col-sm-2 control-label">Description</label>

<div class="col-sm-10">

<textarea id="editor1" name="description" rows="2" cols="80"  required></textarea>

</div>

</div>

<div class="form-group">

<label for="inputPassword3" class="col-sm-2 control-label">Picture</label>

<div class="col-sm-5">

<input type="file" class="form-control" id="image_browse" placeholder="" name="image_browse" >

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