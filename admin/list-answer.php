<?php 
include('includes/admin_top.php');
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'List Answer'; 
if(isset($id) && $id!=""){
$db->deleteData(DTABLE_ADMIN_QUESANS,"test_id=".$id);
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
<th>User Name</th>
<th>Exam Name</th>
<th>Test Name</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "SELECT * FROM ".DTABLE_ADMIN_QUESANS." where answer = '0' group by test_id";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
	
	$sql1 = mysql_query("SELECT * FROM ".DTABLE_USER." where id = '".$row_rec['user_id']."'");
	$fetch1 = mysql_fetch_array($sql1);
	
	$sql2 = mysql_query("SELECT * FROM `admin_test` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_test`.`id` = '".$row_rec['test_id']."'");
	$fetch2 = mysql_fetch_array($sql2);
?>
<tr>
<td><?php echo $fetch1['firstname']." ".$fetch1['lastname']; ?></td>
<td><?php echo $fetch2['examname']; ?></td>
<td><?php echo $fetch2['testname']; ?></td>
<td><?php echo $row_rec['date']; ?></td>
<td>
<?php
$result = mysql_query("SELECT * FROM `admin_user_result` where `admin_user_result`.`user_id` = '".$row_rec['user_id']."' and `admin_user_result`.`test_id` = '".$row_rec['test_id']."'");
$fetch_result = mysql_fetch_array($result);
if($fetch_result['id'] == "")
{
	?>
	<a href="give-marks.php?id=<?php echo $row_rec['test_id']; ?>&user=<?php echo $row_rec['user_id']; ?>" title="Give marks"><img src="images/view.png" width="16" height="16" alt=""></a>
	<?php
}
else
{
	?>
	
	<?php
}
?>
<?php

?>
<a href="list-answer.php?id=<?php echo $row_rec['test_id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
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