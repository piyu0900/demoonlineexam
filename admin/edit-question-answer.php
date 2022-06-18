<?php 
include('includes/admin_top.php'); 
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'Update Question and Answer';
if(isset($_POST['update_questanw']) && $_POST['update_questanw']=='update_questanw'){
	
	$_POST['id'] = $id;	
	$db->updateArray(DTABLE_ADMIN_QUESANSW,$_POST, "id=".$id) or die(mysql_error());
	$msg_class = 'alert-success';
	$msg = MSG_EDIT_SUCCESS;
	
}
$get_sub_details = $pm->getTableDetails(DTABLE_ADMIN_QUESANSW,'id',$id);
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
    $("#exam_id").change(function(){
		var exam_id = $(this).val();
		
         $.ajax({
			 type: 'post',
			 url: 'fetch_set.php',
			 data: "cid="+exam_id,
			 success: function (data) {
				//alert(data);
				$("#test_id").html(data);
				
			}
		 });
		 
		 
	});
	
	
});
</script>



<div class="box box-info">
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="update_questanw" value="update_questanw">
<div class="box-body">

<?php
$select_ques_answ = mysql_query("SELECT * FROM `admin_question_answer` inner join `admin_test` on `admin_question_answer`.`test_id` = `admin_test`.`id` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_question_answer`.`id` = '".$_GET['id']."'");
$fetch_ques_answ = mysql_fetch_array($select_ques_answ);


?>

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
	<div class="col-sm-10" id="edi1">
	<textarea id="question" name="question" rows="10" cols="80" required><?php echo strip_tags($get_sub_details['question']); ?></textarea>
	</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option1</label>
	<div class="col-sm-10" id="edi2">
	<textarea id="a" name="a" rows="10" cols="80" required><?php echo strip_tags($get_sub_details['a']); ?></textarea>
	</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option2</label>
	<div class="col-sm-10"  id="edi3">
	<textarea name="b" id="b" rows="10" cols="80" required><?php echo $get_sub_details['b']; ?></textarea>
	</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option3</label>
	<div class="col-sm-10"  id="edi4">
	<textarea name="c" id="c" rows="10" cols="80" required><?php echo $get_sub_details['c']; ?></textarea>
	</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option4</label>
	<div class="col-sm-10"  id="edi5">
	<textarea name="d" id="d" rows="10" cols="80" required><?php echo $get_sub_details['d']; ?></textarea>
	</div>
</div>

	



<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
<div class="col-sm-4">
<select class="form-control" id="answer" name="answer" required>
<option value="a" <?php if($get_sub_details['answer'] == 'a'){?> selected <?php }?>>A</option>
<option value="b" <?php if($get_sub_details['answer'] == 'b'){?> selected <?php }?>>B</option>
<option value="c" <?php if($get_sub_details['answer'] == 'c'){?> selected <?php }?>>C</option>
<option value="d" <?php if($get_sub_details['answer'] == 'd'){?> selected <?php }?>>D</option>

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


 




