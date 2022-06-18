<?php 

require('configure.php'); 

$getAdminSetting = $pm->getSetting(1);

?>
<?php include "includes/header.php" ?>

<body>

<!--	<div id="introLoader" class="introLoading"></div>--> 

<!-- start Container Wrapper -->





<?php
if(isset($_POST['tp']))
{
	if(empty($_SESSION["student_id"]))
	{
		?>
		<script>
		$(document).ready(function(){
			alert("Please Before Login");
		});
		</script>
		<?php
	}
	else
	{
		$date = date('Y-m-d');
		$insert_topic = mysql_query("insert into  `admin_technical_discussion` (`user_id`,`title`,`discussion`,`topic_date`,`status`) values ('".$_SESSION["student_id"]."','".$_POST["topic"]."','".$_POST["description"]."','".$date."','Inactive')");
		
	}
}
?>





<div id="topicModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Add Your Topic</h4>

				</div>
				
				
				<form id="formcodshowErroreshowError1" class="frm1" name="formcode1" method="POST" action="">
				
				<div class="modal-body">

					<div class="row gap-20">
					

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Title Topic</label>

								<input class="form-control"  type="text" name="topic" required> 
								<input type="hidden" name="tp"> 
								
							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Description</label>

								<textarea name="description" rows="6" cols="62" required></textarea>

								
							</div>

						

						</div>
						

					</div>

				</div>

				

				<div class="modal-footer text-center">

					<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				</form>
			</div>








    
    <!-- start hero-header -->
    
    <div class="row topspace">
      <div class="post-hero">
        <div class="row">
          <div class="container">
            <div class="marqu-icon"> <a href="#"> <i class="fa fa-user" aria-hidden="true"></i> </a> </div>
            
<?php include "includes/dashboard-marquee.php" ?>
            <p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/start.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    <div class="row">
  <div class="side-left side-left1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right side-right1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
  </div>
  
      <div class="pb-50">
        <div class="container bg-shadow bg-width">
          <div class="row">
  <?php
	if(isset($_POST['cmt']))
	{
		if(empty($_SESSION["student_id"]))
		{
			?>
			<script>
			$(document).ready(function(){
				alert("Please Before Login");
			});
			</script>
			<?php
		}
		else
		{
			$comments = $_POST['comments'];
			$hid = $_POST['hid'];
			$date = date("Y-m-d");
			$insert_comment = mysql_query("insert into `admin_comments` (`user_id`,`dis_id`,`comment`,`date`,`status`) values ('".$_SESSION["student_id"]."','".$hid."','".$comments."','".$date."','Inactive')");
			?>
			<script>
			$(document).ready(function(){
				alert("Thankyou for comments to this topic");
			});
			</script>
			<?php
		}
		
	}

  ?>  


	<?php
	$get_topics = mysql_query("select * from `admin_technical_discussion` where `admin_technical_discussion`.`id` = '".$_GET['topic']."'");

	$fetch_topic = mysql_fetch_array($get_topics);
	?>
		  
	<div>    
		<div class="col-md-12"><h4><a class="col" ><?php echo $fetch_topic['title']; ?></a></h4></div>          
			  
		<hr>

		<div class="col-md-12">
		 <p class="text-color"> <?php echo $fetch_topic['discussion']; ?></p> 
		</div>             

	 
	 
	 

		<div class="col-md-12">
		<div class="topic">
		<i class="fa fa-user" aria-hidden="true"></i><span> 
		by 
		<?php
		if($fetch_topic['user_id'] == 0)
		{
		?>
		Admin
		<?php
		}
		else
		{
			$select_student = mysql_query("SELECT * FROM `admin_student` where `admin_student`.`id` = '".$fetch_topic['user_id']."'");
			$fetch_student = mysql_fetch_array($select_student);
			?>
			<?php echo $fetch_student['username']; ?>
			<?php
		}
		?>
		
		
		</span>
		<i class="fa fa-calendar" aria-hidden="true"></i><span><?php echo $fetch_topic['topic_date']; ?></span>
		</div>

		</div>




		<form action="" method="post">  
		<div class="col-md-12">
		 <div class="controls no-margin">
			<label for="comments" class="col ">Comments</label>
				  <textarea name="comments" class="floatLabel" id="comments" placeholder="Comments"></textarea>
				  <input type="hidden" name="cmt"/>
				  <input type="hidden" value="<?php echo $fetch_topic['id']; ?>" name="hid"/>
				  <div style="padding-top: 20px;">
				<input type="submit" class="upload read2" name="submit" value="Submit"/>
				<!--<input type="submit" class="upload read2" name="topic" value="New Topic"/>-->
				<button type="button" class="upload read2" data-toggle="modal" data-target="#topicModal">
				<div class="txtsmall">New Topic</div>
				</button>
				 </div>
		 </div> 

		</div>

		</form>
	 </div>
        
     <div class="col-md-12 read-top">  
	 
	  <p class="note">Note: Submit Only After Login</p>      
      </div> 

	  
	  <div class="col-md-12">
	  <div class="controls no-margin">
	  <label for="comments" class="col">Comments:</label>
	  <?php
	 $select_comments = mysql_query("select * from `admin_comments` inner join `admin_student` on `admin_student`.`id` = `admin_comments`.`user_id` where `admin_comments`.`dis_id` = '".$_GET['topic']."' and `admin_comments`.`status` = 'Active'");
	  while($fetch_comments = mysql_fetch_array($select_comments))
	  {
		  ?>
		  <div><h5><?php echo $fetch_comments['username']; ?> -</h5> <p><?php echo $fetch_comments['comment']; ?></p></div>
		  <?php
	  }
	  ?>
	  </div> 
	  </div> 
	  
	  
	  
	  <div class="col-md-12 read-top">  
	 
	  <p class="upload read2"><a style="color: #fff;" href="start-technical-discussion.php">Back</a></p>      
      </div> 


	  
          </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
