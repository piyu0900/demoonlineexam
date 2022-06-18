<?php 
include('includes/admin_top.php'); 
$msg ="";
$id = $_REQUEST['id'];
$idd = $_REQUEST['user'];
$page_title = 'Give Marks';
if(isset($_POST['update_marks']) && $_POST['update_marks']=='update_marks'){

	/*
	$get_product_details1 = mysql_query("select * from `admin_ques_ans` inner join `admin_question_answer2` on `admin_ques_ans`.`ques_answ_id` = `admin_question_answer2`.`id` where `admin_ques_ans`.`test_id` ='".$id."'");
	$number_rows = mysql_num_rows($get_product_details1);
	$positivemarks = 0;
	for ($q = 1; $q <= $number_rows; $q++){

		$positive_marks = $_POST["mark_".$q];
		$positivemarks = $positivemarks + $positive_marks;
		$positiv_marks = $positivemarks;	
	}
	$d = date('Y-m-d');
	
	$insert_result = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','250','".$positiv_marks."','".$d."')");
	$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','250','".$positiv_marks."','".$d."')");
	header('Location: list-answer.php');
	*/
	
	
	
	$d = date('Y-m-d');
	$total_marks = $_POST['total_marks'];
	
	$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','250','".$total_marks."','".$d."')");
	header('Location: list-answer.php');
	
	
	
	
}
$get_product_details = mysql_query("select * from `admin_ques_ans` inner join `admin_question_answer2` on `admin_ques_ans`.`ques_answ_id` = `admin_question_answer2`.`id` where `admin_ques_ans`.`test_id` ='".$id."'");

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
<input type="hidden" name="update_marks" value="update_marks">
<div class="box-body">

<?php
$c = 1;
while($fetch_product = mysql_fetch_array($get_product_details))
{ 
	//print_r();
	?>

	<div class="form-group">
	<label for="inputPassword3" class="col-sm-2 control-label">Question</label>
	<div class="col-sm-5">
	<img src="<?PHP echo USER_ADMIN_ANSWIMAGE_PATH.$fetch_product['question'];?>" width="180" height="160"/>
	<a href="<?php echo USER_ADMIN_ANSWIMAGE_PATH.$fetch_product['question']; ?>" download>Download</a>
	</div>
	</div>

	<div class="form-group">
	<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
	<div class="col-sm-5">
	<img src="<?PHP echo USER_ADMIN_ANSWIMAGE_PATH.$fetch_product['user_answer'];?>" width="180" height="160"/>
	<a href="<?php echo USER_ADMIN_ANSWIMAGE_PATH.$fetch_product['user_answer']; ?>" download>Download</a>
	</div>
	</div>

	<div class="form-group">
	<label for="inputPassword3" class="col-sm-2 control-label">Marks</label>
	<div class="col-sm-2">
	<input type="tel" name="total_marks" required/>
	</div>

	</div>

	<?php
	$c++;
}
?>



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