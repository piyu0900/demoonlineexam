<?php 
include('includes/admin_top.php'); 
$msg ="";
$page_title = 'Create Banner';
$id = $_REQUEST['id'];
if(isset($_POST['create_banner']) && $_POST['create_banner']=='create_banner'){
if(empty($_POST['id'])){
if(isset($_FILES["image_browse"]["name"]) && $_FILES['image_browse']['name']!=''){
$path = BANNER_ADMIN_IMAGE_PATH;
$tmpno = time();
$big_image  = $_FILES['image_browse']['name'];
$big_image1  = $_FILES['image_browse']['tmp_name'];
$filetype = $_FILES['image_browse']['type'];
$file_name = basename($big_image);
$file_name_arr = explode(".",$file_name);
$file_ext  = end($file_name_arr);
$new_file_name = "banner".$tmpno.".".$file_ext;
copy($big_image1,$path.$new_file_name);
$_POST['image_browse'] = $new_file_name;
}
$db->insertDataArray(DTABLE_BANNER,$_POST);
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}
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
<input type="hidden" name="create_banner" value="create_banner">
<div class="box-body">

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Banner</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse" placeholder="" name="image_browse" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Status</label>
<div class="col-sm-5">
<select class="form-control" id="status" name="status" required>
<option value="">Select Status</option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
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