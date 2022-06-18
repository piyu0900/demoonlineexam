<?php
include('header.php');

if(empty($_SESSION["firstname"]))
{
	header('Location: subscribe.php');
}
$id = $_GET['id'];
?>




   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				exam sheet
			</h1>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="dashboard-grid">
		<?php
		include('sidebar.php');
		?>
		
		<?php
		if(isset($_POST['add-submit']))
		{
			$select_exam = mysql_query("select * from `admin_test` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_test`.`id` ='".$id."'");
			$fetch_exam = mysql_fetch_array($select_exam);
			//print_r($fetch_exam);
			
			if($fetch_exam['examname'] == 'UPSC (PT) Paper I' || $fetch_exam['examname'] == 'PSC (PT) Paper I')
			{
				$idd = $_SESSION["id"];
				$select_question1 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
				$number_rows = mysql_num_rows($select_question1);
				$total_marks = $number_rows * 2;
				//print_r($_POST);
				for ($q = 1; $q <= $number_rows; $q++){
					
					$ques_answ_id = $_POST["ques_answ_id_".$q];
					$ques_answ = $_POST["ques_answ_".$q];
					$user_answer = $_POST["answer_".$q];
					
					$select_question2 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`id` ='".$ques_answ_id."'");
					$fetch_question2 = mysql_fetch_array($select_question2);
					$answer = $fetch_question2['answer'];
					$d = date('Y-m-d');
					$insert_ques_ans = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`ques_answ_id`,`ques_answ`,`answer`,`user_answer`,`date`) value('".$idd."','".$id."','".$ques_answ_id."','".$ques_answ."','".$answer."','".$user_answer."','".$d."')");
					
				}
				
				
				
				$select_ques_ans = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`user_id` = '".$idd."' and `admin_ques_ans`.`test_id` = '".$id."'");
				$positivemarks = 0;
				While($fet_ques_ans = mysql_fetch_array($select_ques_ans))
				{
					$select_ques_ans2 = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`id` = '".$fet_ques_ans['id']."'");
					$fet_ques_ans2 = mysql_fetch_array($select_ques_ans2);
					if($fet_ques_ans2['answer'] == $fet_ques_ans2['user_answer'])
					{
						 $positive_marks = 2;
					}
					else
					{
						 $positive_marks = -0.33;
					}
					
						
					//$positivemarks = $positive_marks;
					$positivemarks = $positivemarks + $positive_marks;
					$positiv_marks = $positivemarks;
				}
				
				//echo $positiv_marks;
				$d = date('Y-m-d');
				$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','".$total_marks."','".$positiv_marks."','".$d."')");
				header('Location: result.php');	
			}
			elseif($fetch_exam['examname'] == 'UPSC (PT) Paper II' || $fetch_exam['examname'] == 'PSC (PT) Paper II')
			{
				$idd = $_SESSION["id"];
				$select_question1 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
				$number_rows = mysql_num_rows($select_question1);
				$total_marks = $number_rows * 2.50;
				//print_r($_POST);
				for ($q = 1; $q <= $number_rows; $q++){
					
					$ques_answ_id = $_POST["ques_answ_id_".$q];
					$ques_answ = $_POST["ques_answ_".$q];
					$user_answer = $_POST["answer_".$q];
					
					$select_question2 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`id` ='".$ques_answ_id."'");
					$fetch_question2 = mysql_fetch_array($select_question2);
					$answer = $fetch_question2['answer'];
					$d = date('Y-m-d');
					$insert_ques_ans = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`ques_answ_id`,`ques_answ`,`answer`,`user_answer`,`date`) value('".$idd."','".$id."','".$ques_answ_id."','".$ques_answ."','".$answer."','".$user_answer."','".$d."')");
					
				}
				
				
				
				
				$select_ques_ans = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`user_id` = '".$idd."' and `admin_ques_ans`.`test_id` = '".$id."'");
				$positivemarks = 0;
				While($fet_ques_ans = mysql_fetch_array($select_ques_ans))
				{
					$select_ques_ans2 = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`id` = '".$fet_ques_ans['id']."'");
					$fet_ques_ans2 = mysql_fetch_array($select_ques_ans2);
					if($fet_ques_ans2['answer'] == $fet_ques_ans2['user_answer'])
					{
						 $positive_marks = 2.50;
					}
					else
					{
						 $positive_marks = -0.33;
					}
					
						
					//$positivemarks = $positive_marks;
					$positivemarks = $positivemarks + $positive_marks;
					$positiv_marks = $positivemarks;
				}
				
				//echo $positiv_marks;
				$d = date('Y-m-d');
				$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','".$total_marks."','".$positiv_marks."','".$d."')");
				header('Location: result.php');	
			}
			elseif($fetch_exam['examname'] == 'SSC Tier I')
			{
				$idd = $_SESSION["id"];
				$select_question1 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
				$number_rows = mysql_num_rows($select_question1);
				$total_marks = $number_rows * 2;
				//print_r($_POST);
				for ($q = 1; $q <= $number_rows; $q++){
					
					$ques_answ_id = $_POST["ques_answ_id_".$q];
					$ques_answ = $_POST["ques_answ_".$q];
					$user_answer = $_POST["answer_".$q];
					
					$select_question2 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`id` ='".$ques_answ_id."'");
					$fetch_question2 = mysql_fetch_array($select_question2);
					$answer = $fetch_question2['answer'];
					$d = date('Y-m-d');
					$insert_ques_ans = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`ques_answ_id`,`ques_answ`,`answer`,`user_answer`,`date`) value('".$idd."','".$id."','".$ques_answ_id."','".$ques_answ."','".$answer."','".$user_answer."','".$d."')");
					
				}
				
				
				
				
				$select_ques_ans = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`user_id` = '".$idd."' and `admin_ques_ans`.`test_id` = '".$id."'");
				$positivemarks = 0;
				While($fet_ques_ans = mysql_fetch_array($select_ques_ans))
				{
					$select_ques_ans2 = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`id` = '".$fet_ques_ans['id']."'");
					$fet_ques_ans2 = mysql_fetch_array($select_ques_ans2);
					if($fet_ques_ans2['answer'] == $fet_ques_ans2['user_answer'])
					{
						 $positive_marks = 2;
					}
					else
					{
						 $positive_marks = -0.50;
					}
					
						
					//$positivemarks = $positive_marks;
					$positivemarks = $positivemarks + $positive_marks;
					$positiv_marks = $positivemarks;
				}
				
				//echo $positiv_marks;
				$d = date('Y-m-d');
				$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','".$total_marks."','".$positiv_marks."','".$d."')");
				header('Location: result.php');
			}
			elseif($fetch_exam['examname'] == 'SSC Tier II')
			{
				$idd = $_SESSION["id"];
				$select_question1 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
				$number_rows = mysql_num_rows($select_question1);
				$total_marks = $number_rows * 2;
				//print_r($_POST);
				for ($q = 1; $q <= $number_rows; $q++){
					
					$ques_answ_id = $_POST["ques_answ_id_".$q];
					$ques_answ = $_POST["ques_answ_".$q];
					$user_answer = $_POST["answer_".$q];
					
					$select_question2 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`id` ='".$ques_answ_id."'");
					$fetch_question2 = mysql_fetch_array($select_question2);
					$answer = $fetch_question2['answer'];
					$d = date('Y-m-d');
					$insert_ques_ans = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`ques_answ_id`,`ques_answ`,`answer`,`user_answer`,`date`) value('".$idd."','".$id."','".$ques_answ_id."','".$ques_answ."','".$answer."','".$user_answer."','".$d."')");
					
				}
				
				
				
				
				$select_ques_ans = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`user_id` = '".$idd."' and `admin_ques_ans`.`test_id` = '".$id."'");
				$positivemarks = 0;
				While($fet_ques_ans = mysql_fetch_array($select_ques_ans))
				{
					$select_ques_ans2 = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`id` = '".$fet_ques_ans['id']."'");
					$fet_ques_ans2 = mysql_fetch_array($select_ques_ans2);
					if($fet_ques_ans2['answer'] == $fet_ques_ans2['user_answer'])
					{
						 $positive_marks = 2;
					}
					else
					{
						 $positive_marks = -0.25;
					}
					
						
					//$positivemarks = $positive_marks;
					$positivemarks = $positivemarks + $positive_marks;
					$positiv_marks = $positivemarks;
				}
				
				//echo $positiv_marks;
				$d = date('Y-m-d');
				$insert_user_result = mysql_query("insert into `admin_user_result` (`user_id`,`test_id`,`total_marks`,`result`,`date`) value('".$idd."','".$id."','".$total_marks."','".$positiv_marks."','".$d."')");
				header('Location: result.php');
			}
			else
			{
				$idd = $_SESSION["id"];
				$select_question1 = mysql_query("SELECT * FROM `admin_question_answer2` where `admin_question_answer2`.`test_id` ='".$id."'");
				$number_rows = mysql_num_rows($select_question1);
				//print_r($_POST);
				//exit;
				for ($q = 1; $q <= $number_rows; $q++){
					
					if($_FILES['answerfile_'.$q]['name']!=''){
					$arr=getimagesize($_FILES['answerfile_'.$q]['tmp_name']);
					$userfile_extn = end(explode(".", strtolower($_FILES['answerfile_'.$q]['name'])));
						if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
						$tmp_name = $_FILES['answerfile_'.$q]['tmp_name'];
						$user_answer = time()."_".$_FILES['answerfile_'.$q]['name'];
						move_uploaded_file($tmp_name, USER_FRONTEND_ANSWIMAGE_PATH.$user_answer);
						$_POST['answerfile_'.$q] = $user_answer;
						}else{
						$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
						}
					}
					$ques_answ2_id = $_POST["ques_answ2_id_".$q];
					$d = date('Y-m-d');
					$insert_ques_ans = mysql_query("insert into `admin_ques_ans` (`user_id`,`test_id`,`ques_answ_id`,`ques_answ`,`answer`,`user_answer`,`date`) value('".$idd."','".$id."','".$ques_answ2_id."','0','0','".$user_answer."','".$d."')");
					
				}
				header('Location: exam-list.php');
			}
			
			
			
			
		}
		
		?>
			<div class="col-sm-8">
			<form action="" method="post" enctype="multipart/form-data">
			<?php
			
			$c = 1;
			$select_question3 = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
			$select_question = mysql_query("SELECT * FROM `admin_question_answer` where `admin_question_answer`.`test_id` ='".$id."'");
			$select_question2 = mysql_query("SELECT * FROM `admin_question_answer2` where `admin_question_answer2`.`test_id` ='".$id."'");
			$fetch_ques = mysql_fetch_array($select_question3);
				
			if(isset($fetch_ques['id']))
			{ 
				while($fetch_question = mysql_fetch_array($select_question))
				{
					?>
					<div class="exam-sheet">
						<ol>
							<li><h4><?php echo $c; ?>. <?php echo $fetch_question['question']; ?></h4>
								
							<div class="radio radio-primary">
							  <input type="hidden" name="ques_answ_id_<?php echo $c; ?>" value="<?php echo $fetch_question['id']; ?>" />
							  <input type="hidden" name="ques_answ_<?php echo $c; ?>" value="<?php echo $fetch_question['question']; ?>" />
							  <input type="radio" name="answer_<?php echo $c; ?>" value="a"><?php echo $fetch_question['a']; ?><br>
							  <input type="radio" name="answer_<?php echo $c; ?>" value="b"><?php echo $fetch_question['b']; ?><br>
							  <input type="radio" name="answer_<?php echo $c; ?>" value="c"><?php echo $fetch_question['c']; ?><br/>  
							  <input type="radio" name="answer_<?php echo $c; ?>" value="d"><?php echo $fetch_question['d']; ?> 
							</div>
		 
							</li>
						</ol>
					</div>
					
					<?php
					$c++;
				}
				?>
					<div class="row">
						<div class="col-sm-12">
							<input type="submit" name="add-submit" id="ans-submit" class="form-control btn btn-register" value="Submit">
						</div>
					</div>
				<?php
			}
			else
			{
				while($fetch_question2 = mysql_fetch_array($select_question2))
				{
					?>
					<div class="exam-sheet">
						<ol>
							<li><h4><img src="<?php echo USER_FRONTEND_ANSWIMAGE_PATH.$fetch_question2['question']; ?>" width="280" height="260"/></h4>
							<a href="<?php echo USER_FRONTEND_ANSWIMAGE_PATH.$fetch_question2['question']; ?>" download>Download</a>
							<div class="radio radio-primary">
							  <input type="hidden" name="ques_answ2_id_<?php echo $c; ?>" value="<?php echo $fetch_question2['id']; ?>" />
							  <input type="file" name="answerfile_<?php echo $c; ?>" required/>
							</div>
		 
							</li>
						</ol>
					</div>					
					<?php
					$c++;
				}
				?>
				<div class="row">
						<div class="col-sm-12">
							<input type="submit" name="add-submit" id="ans-submit" class="form-control btn btn-register" value="Submit">
						</div>
				</div>
				<?php
			}
	
			?>
				
				
			</form>
			
			
			
			
			</div>
			</div>
		</div>
		</div>
	</div>
</section>






<?php
include('footer.php');

?>

