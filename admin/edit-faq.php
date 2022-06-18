<?php 
include('includes/admin_top.php'); 
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'Update Faq';
if(isset($_POST['update_faq']) && $_POST['update_faq']=='update_faq'){


$db->updateArray(DTABLE_FAQ,$_POST, "id=".$id) or die(mysql_error());
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}
$get_product_details = $pm->getTableDetails(DTABLE_FAQ,'id',$id);
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
<input type="hidden" name="update_faq" value="update_faq">
<div class="box-body">
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Question</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="question" placeholder="" value="<?php echo $get_product_details['question']; ?>" name="question" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
<div class="col-sm-10">
<textarea id="editor1" name="answer" rows="2" cols="80" required><?php echo $get_product_details['answer']; ?></textarea>
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