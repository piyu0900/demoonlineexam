<?php 
include('includes/admin_top.php'); 
$msg ="";
$page_title = 'Create Question and Answer';
if(isset($_POST['create_questanw']) && $_POST['create_questanw']=='create_questanw'){
	
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
	
	
	$get_last_id = $db->insertDataArray(DTABLE_ADMIN_QUESANSW2,$_POST);
	if(!empty($get_last_id)):
	$msg_class = 'alert-success';
	$msg = MSG_ADD_SUCCESS;
	else:
	$msg_class = 'alert-error';
	$msg = MSG_ADD_FAIL;
	endif;
	
	
	
	
	
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
<input type="hidden" name="create_questanw" id="create_questanw" value="create_questanw">
<div class="box-body">


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Exam Name</label>
<div class="col-sm-4">
<select class="form-control" id="exam_id" name="exam_id" required>
<option value="">Select Exam</option>
<option value="3">UPSC (Mains)</option>
<option value="6">PSC (Mains)</option>
<option value="9">SSC III</option>
</select>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Test Name</label>
<div class="col-sm-4">
<select class="form-control" id="test_id" name="test_id" required>

</select>
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