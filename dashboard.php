<?php
include('header.php');

if(empty($_SESSION["firstname"]))
{
	header('Location: subscribe.php');
}
?>





   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Dashboard
			</h1>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="dashboard-grid">
			<?php
			include('sidebar.php');
			?>
			<div class="col-sm-8">
				<div class="row">
					<?php
					
					if(isset($_POST['register-submit'])){
						
						if(isset($_FILES["image_browse"]["name"]) && $_FILES['image_browse']['name']!=''){
							$time=time();
							$path=USER_FRONTEND_IMAGE_PATH;
							move_uploaded_file($_FILES['image_browse']['tmp_name'],$path.$time.$_FILES['image_browse']['name']);
							
							$update_user = mysql_query("UPDATE `onlineexam321`.`admin_user` SET `phone` = '".$_POST['phone']."',`address1` = '".$_POST['address1']."',`city` = '".$_POST['city']."',
							`state` = '".$_POST['state']."',`country` = '".$_POST['country']."',`zipcode` = '".$_POST['zipcode']."',`image_browse` = '".$time.$_FILES['image_browse']['name']."'
							WHERE `id` = '".$_SESSION["id"]."'");
						}
						$_SESSION['id'] = $id;	
						$db->updateArray(DTABLE_USER,$_POST, "id=".$id) or die(mysql_error());
						$msg_class = 'alert-success';
						$msg = MSG_EDIT_SUCCESS;
					}
					
					
					
					$select_user = mysql_query('select * from `onlineexam321`.`admin_user` where `admin_user`.`id` ="'.$_SESSION['id'].'"');
					$fetch_user = mysql_fetch_array($select_user);				
					?>
					<div class="col-sm-4">
						<?php
						if($fetch_user['image_browse'] != "")
						{
							?>
							<img class="img-responsive" src="<?php echo USER_FRONTEND_IMAGE_PATH.$fetch_user['image_browse']; ?>">
							<?php
						}
						else
						{
							?>
							<img class="img-responsive" src="img/dummy-image.jpg">
							<?php
						}
						?>
						
					</div>
					<div class="col-sm-8">
					<h3 class="small-title text-center">profile information</h3>
						<form class="panel-login dashboard-form" enctype="multipart/form-data" id="dashboard-form" action="" method="post" role="form" style="">
							<div class="form-group">
								<input type="text" id="firstname" tabindex="1" class="form-control" value="<?php echo $fetch_user['firstname']; ?>" readonly>
							</div>
							<div class="form-group">
								<input type="text" id="lastname" tabindex="1" class="form-control" value="<?php echo $fetch_user['lastname']; ?>" readonly>
							</div>
							<div class="form-group">
								<input type="email" id="email" tabindex="1" class="form-control" value="<?php echo $fetch_user['email']; ?>" readonly>
							</div>
							<div class="form-group">
								<input type="text" name="phone" id="phone" tabindex="1" class="form-control" value="<?php echo $fetch_user['phone']; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="address1" id="address1" tabindex="1" class="form-control" value="<?php echo $fetch_user['address1']; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="city" id="city" tabindex="1" class="form-control" value="<?php echo $fetch_user['city']; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="state" id="state" tabindex="1" class="form-control" value="<?php echo $fetch_user['state']; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="country" id="country" tabindex="1" class="form-control" value="<?php echo $fetch_user['country']; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="zipcode" id="zipcode" tabindex="1" class="form-control" value="<?php echo $fetch_user['zipcode']; ?>">
							</div>
							<div class="form-group">
								<input type="file" name="image_browse" id="image_browse" tabindex="1" class="form-control">
							</div>	
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Submit">
									</div>
								</div>
							</div>
						</form>
						
						
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>







<?php
include('footer.php');

?>