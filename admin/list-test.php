<?php 
include('includes/admin_top.php');
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'List Test'; 
if(isset($id) && $id!=""){
$db->deleteData(DTABLE_TEST,"id=".$id);
$msg_class = 'alert-success';
$msg = MSG_DELETE_SUCCESS;
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
<div class="box-body">
<table id="example1" class="table table-bordered table-striped tableGrid">
<thead>
<tr>
<th>Exam Name</th>
<th>Test Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "SELECT * FROM ".DTABLE_TEST." ORDER BY id DESC";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
	$sql1 = mysql_query("SELECT * FROM ".DTABLE_EXAM." where id = '".$row_rec['exam_id']."'");
	$fetch = mysql_fetch_array($sql1);
	
?>
<tr>
<td><?php echo $fetch['examname']; ?></td>
<td><?php echo $row_rec['testname']; ?></td>
<td>
<a href="edit-test.php?id=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>
<a href="list-test.php?id=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
<img src="images/cross.png" width="16" height="16" alt="">
</a> 
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