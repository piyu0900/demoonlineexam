<?php 
include('includes/admin_top.php'); 
$msg ="";
$id = $_REQUEST['id'];
$page_title = 'Update Question and Answer';
if(isset($_POST['update_questanw']) && $_POST['update_questanw']=='update_questanw'){
	
	if($_FILES['question']['name']!=''){
	$arr=getimagesize($_FILES['question']['tmp_name']);
	$userfile_extn = end(explode(".", strtolower($_FILES['question']['name'])));
	if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
	$tmp_name = $_FILES['question']['tmp_name'];
	$name = time()."_".$_FILES['question']['name'];
	move_uploaded_file($tmp_name, USER_ADMIN_ANSWIMAGE_PATH.$name);
	$_POST['question'] = $name;
	}else{
	$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
	}
	}
	
	
	$_POST['id'] = $id;	
	$db->updateArray(DTABLE_ADMIN_QUESANSW2,$_POST, "id=".$id) or die(mysql_error());
	$msg_class = 'alert-success';
	$msg = MSG_EDIT_SUCCESS;
	
}
$get_sub_details = $pm->getTableDetails(DTABLE_ADMIN_QUESANSW2,'id',$id);
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
$select_ques_answ = mysql_query("SELECT * FROM `admin_question_answer2` inner join `admin_test` on `admin_question_answer2`.`test_id` = `admin_test`.`id` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_question_answer2`.`id` = '".$_GET['id']."'");
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
<label for="inputPassword3" class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<img src="<?PHP echo USER_ADMIN_ANSWIMAGE_PATH.$fetch_ques_answ['question'];?>" width="80" height="60"/>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Question</label>
	<div class="col-sm-10" id="edi1">
	<input type="file" id="question" name="question" />
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


 




