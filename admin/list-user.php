<?php 
include('includes/admin_top.php');
$msg ="";
$page_title = 'List user'; 

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
<div class="box-body">
<table id="example1" class="table table-bordered table-striped tableGrid">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Image</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "SELECT * FROM ".DTABLE_USER." ORDER BY id DESC";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
?>
<tr>
<td><?php echo strtoupper($row_rec['firstname'])." ".strtoupper($row_rec['lastname']); ?></td>
<td><?php echo $row_rec['email']; ?></td>
<td><?php echo $row_rec['phone']; ?></td>
<td><?php echo $row_rec['adddress'].",".$row_rec['city'].",".$row_rec['state'].",".$row_rec['country'].",".$row_rec['zipcode'];?></td>
<td>
<?PHP if($row_rec['image_browse']!='' && file_exists(USER_ADMIN_IMAGE_PATH.$row_rec['image_browse'])){?>
<img src="<?PHP echo USER_ADMIN_IMAGE_PATH.$row_rec['image_browse'];?>" width="80" height="60"/>
<?php }else{
	?>
	<img src="<?PHP echo COMPANY_ADMIN_IMAGE_PATH.'no-image.jpg';?>" width="80" height="60"/>
	
	<?php } ?>



</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 