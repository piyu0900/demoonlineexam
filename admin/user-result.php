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
<th>Sr.No.</th>
<th>Name</th>
<th>Image</th>
<th>Exam</th>
<th class="numeric">Test</th>
<th class="numeric">Total</th>
<th class="numeric">Result</th>
<th class="numeric">Date</th>
</tr>
</thead>
<tbody>

<?php
$select_test = mysql_query("select `admin_user`.`firstname`,`admin_user`.`lastname`,`admin_user`.`image_browse`,`admin_test`.`testname`,`admin_exam`.`examname`,`admin_user_result`.`total_marks`,`admin_user_result`.`result`,`admin_user_result`.`date` from `admin_user_result` inner join `admin_test` on `admin_user_result`.`test_id` = `admin_test`.`id` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` inner join `admin_user` on `admin_user_result`.`user_id` = `admin_user`.`id`");
$c= 1;
While($fetch_test = mysql_fetch_array($select_test))
{
	?>
	<tr>
	<td data-title="Sr.No."><?php echo $c; ?>.</td>
	<td data-title="Sr.No."><?php echo $fetch_test['firstname']." ".$fetch_test['lastname']; ?></td>
	<td data-title="Image">
	<?PHP if($fetch_test['image_browse']!='' && file_exists(USER_ADMIN_IMAGE_PATH.$fetch_test['image_browse'])){?>
	<img src="<?PHP echo USER_ADMIN_IMAGE_PATH.$fetch_test['image_browse'];?>" width="80" height="60"/>
	<?php }else{
		?>
		<img src="<?PHP echo COMPANY_ADMIN_IMAGE_PATH.'no-image.jpg';?>" width="80" height="60"/>
		
		<?php } ?>


	</td>
	<td data-title="Exam"><?php echo $fetch_test['examname']; ?></td>
	<td data-title="Test" class="numeric"><?php echo $fetch_test['testname']; ?></td>
	<td data-title="Total" class="numeric"><?php echo $fetch_test['total_marks']; ?></td>
	<td data-title="Result" class="numeric"><?php echo $fetch_test['result']; ?></td>
	<td data-title="Date" class="numeric"><?php echo $fetch_test['date']; ?></td>
	</tr>
	<?php
	$c++;
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