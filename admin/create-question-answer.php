<?php 
include('includes/admin_top.php'); 
$msg ="";
$page_title = 'Create Question and Answer';
if(isset($_POST['create_questanw']) && $_POST['create_questanw']=='create_questanw'){
	
	
	$get_last_id = $db->insertDataArray(DTABLE_ADMIN_QUESANSW,$_POST);
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
<option value="1">UPSC (PT) Paper I</option>
<option value="2">UPSC (PT) Paper II</option>
<option value="4">PSC (PT) Paper I</option>
<option value="5">PSC (PT) Paper II</option>
<option value="7">SSC Tier I</option>
<option value="8">SSC Tier II</option>
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
<textarea id="question"  name="question" rows="10" cols="80" required></textarea>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option1</label>
<div class="col-sm-10"  id="edi2">
<textarea id="a" name="a" rows="10" cols="80" required></textarea>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option2</label>
<div class="col-sm-10"  id="edi3">
<textarea name="b" id="b" rows="10" cols="80" required></textarea>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option3</label>
<div class="col-sm-10"  id="edi4">
<textarea name="c" id="c" rows="10" cols="80" required></textarea>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Option4</label>
<div class="col-sm-10"  id="edi5">
<textarea name="d" id="d" rows="10" cols="80" required></textarea>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
<div class="col-sm-4">
<select class="form-control" id="answer" name="answer" required>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
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