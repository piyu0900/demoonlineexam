<?php 
include('includes/admin_top.php'); 
$msg ="";
$page_title = 'View Question and Answer';

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
<?php
$select_ques_answ = mysql_query("SELECT * FROM `admin_question_answer` inner join `admin_test` on `admin_question_answer`.`test_id` = `admin_test`.`id` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_question_answer`.`id` = '".$_GET['id']."'");
$fetch_ques_answ = mysql_fetch_array($select_ques_answ);


?>
<div class="box box-info">
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
<div class="box-body">


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Exam Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" value="<?php echo strtoupper($fetch_ques_answ['examname']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Test Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" value="<?php echo strtoupper($fetch_ques_answ['testname']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Question</label>
<div class="col-sm-10">
	<input type="text" class="form-control" value="<?php echo strip_tags($fetch_ques_answ['question']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option1</label>
<div class="col-sm-10">
	<input type="text" class="form-control" value="<?php echo strip_tags($fetch_ques_answ['a']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option2</label>
<div class="col-sm-10">
	<input type="text" class="form-control" value="<?php echo strip_tags($fetch_ques_answ['b']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option3</label>
<div class="col-sm-10">
	<input type="text" class="form-control" value="<?php echo strip_tags($fetch_ques_answ['c']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option4</label>
<div class="col-sm-10">
	<input type="text" class="form-control" value="<?php echo strip_tags($fetch_ques_answ['d']); ?>" readonly>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
<div class="col-sm-4">
<input type="text" class="form-control" value="<?php echo strtoupper($fetch_ques_answ['answer']); ?>" readonly>
</div>
</div>



<div class="box-footer">
<a href="list-question-answer.php" class="btn btn-info">Back</a>
</div>
</div>
</form>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 