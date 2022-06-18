<?php 
include('includes/admin_top.php');
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'List Question and Answer'; 
if(isset($id) && $id!=""){
$db->deleteData(DTABLE_ADMIN_QUESANSW,"id=".$id);
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
<th>Exam</th>
<th>Test</th>
<th>Question</th>
<th>Answer</th>
<th>Action</th>
</tr>
</thead>
<tbody>


<?php 
$sql = "SELECT * FROM ".DTABLE_ADMIN_QUESANSW." ORDER BY id DESC";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
	$select_test = mysql_query("select * from ".DTABLE_TEST." where id = '".$row_rec['test_id']."'");
	$fetch_test = mysql_fetch_array($select_test);
	
	$select_exam = mysql_query("select `admin_exam`.`examname` from `admin_exam` inner join `admin_test` on `admin_exam`.`id` = `admin_test`.`exam_id` where `admin_test`.`exam_id` = '".$fetch_test['exam_id']."'");
	$fetch_exam = mysql_fetch_array($select_exam);
	?>
	<tr>
	<td><a href=""><?php echo strtoupper($fetch_exam['examname']); ?></a></td>
	<td><a href=""><?php echo strtoupper($fetch_test['testname']); ?></a></td>
	<td><a href=""><?php echo strtoupper($row_rec['question']); ?></a></td>
	<td><a href=""><?php echo strtoupper($row_rec['answer']); ?></a></td>
	<td>
	<a href="view-question-answer.php?id=<?php echo $row_rec['id']; ?>" title="View"><img src="images/view.png" width="16" height="16" alt=""></a>
	<a href="edit-question-answer.php?id=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>
	<a href="list-question-answer.php?id=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');"><img src="images/cross.png" width="16" height="16" alt=""></a> 
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