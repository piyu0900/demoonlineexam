





<div class="nav-mini-wrapper">
<?php /* if(!isset($_SESSION['student_id'])) { ?>
<button type="button" class="btn  user-bt" data-toggle="modal" data-target="#loginModal1">
<i class="fa fa-user" aria-hidden="true"></i>
<div class="txtsmall">Jobseeker</div>
<div class="txtbig">Sign in</div>

</button>
<?php } 
else { ?>
<a href="student_logout.php">
<i class="fa fa-user" aria-hidden="true"></i>
<div class="txtbig">Log Out</div>
</a>
<?php }*/ ?>

<?php
//echo $_SESSION['userid'].'/////////';
//echo $_SESSION['student_id'];
?>
<?php  if((isset($_SESSION['student_id'])) || (isset($_SESSION['userid']))){ ?>
<?php
$select_stu = mysql_query("select * from `admin_student` where `admin_student`.`id` ='".$_SESSION['student_id']."'");
$fetch_stu = mysql_fetch_array($select_stu);
$select_com = mysql_query("select * from `admin_company` where `admin_company`.`id` ='".$_SESSION['userid']."'");
$fetch_com = mysql_fetch_array($select_com);
?>
<div class="txtbig-div">
<span class="txtbig" style="color: #fff;font-size: 20px;"> <?php 
if($fetch_stu['username']) 
{ 
	?>
	<a href="student-dashboard.php">Welcome <?php echo $fetch_stu['username']; ?></a>
	<?php
} 
if($fetch_com['username']) 
{ 
	?>
	<a href="company-dasbord.php">Welcome <?php echo $fetch_com['username']; ?></a>
	<?php
} 
?></span>
<a href="student_logout.php">
<i class="fa fa-user" aria-hidden="true"></i>
<span class="txtbig">Log Out</span>
</a>
</div>
<?php 
}
else
{
	?>
	<button type="button" class="btn  user-bt" data-toggle="modal" data-target="#loginModal1">
	<i class="fa fa-user" aria-hidden="true"></i>
	<!--<div class="txtsmall">Jobseeker</div>-->
	<div class="txtsmall">Candidate</div>
	<div class="txtbig">Sign in</div>

	</button>
	<?php
}



 ?>
 
 <a href="contact-us.php">
 <button type="button" class="btn  user-bt">
	<i class="fa fa-users" aria-hidden="true"></i>
	<div class="txtsmall">Contact Us</div>
	</button>
	</a>


	
<script>
/*
$(document).ready(function(){
//alert("Hello");
	$("#empr").click(function(){
		//var a = $(this).text();
		//alert(a);
						
		//$("#loginModal2").show();
		//$("#loginModal1").hide();
		$('#loginModal2').loginModal2('open');
	});
});*/
</script>
  <!--............................................ Modal Jobseeker..................................................-->
  
  
  <?php
  if(isset($_POST['logincandidate']))
	{
		$uname = $_POST['uname'];
		$lpassword = md5($_POST['lpassword']);
					
		$select_student = mysql_query("select * from `admin_student` where (`username` = '$uname' or `email` = '$uname') and `password` = '$lpassword'");
		$fetch_student = mysql_fetch_array($select_student);
				
		if($fetch_student)
		{
			$_SESSION['student_id'] = $fetch_student['id'];
			header('Location: student-dashboard.php');
		}
		else{
		?>
		<script>
		$(document).ready(function(){
			alert("Username/Email and password is wrong!");
		});
		</script>
		<?php
		}	
	
	
	
	}
  
  
  
  ?>
  
  
  <!-- start Sign-in Modal -->

			<div id="loginModal1" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Sign-in into your account</h4>

				</div>
				
				
				<form id="formcodshowErroreshowError1" class="frm1" name="formcode1" method="POST" action="">
				
				<div class="modal-body">

					<div class="row gap-20">
					

						<!--<div id="empr" style="float: right;padding-right: 19px;padding-top: 10px;">
						Employer Login
						</div>-->
						<button class="btn" style="float: right;padding-right: 19px;padding-top: 10px;" data-toggle="modal" data-target="#loginModal2">Employer Login</button>
						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Username/email</label>

								<input class="form-control"  type="text" name="uname" id="uname"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password</label>

								<input class="form-control" placeholder="Min 4 and Max 10 characters" type="password" name="lpassword" id="lpassword"> 

							</div>

						

						</div>

						

						

						

						<div class="col-sm-6 col-md-6">

							<div class="login-box-link-action">

								<a data-toggle="modal" href="#forgotPasswordModal1">Forgot password?</a> 

							</div>

						</div>

						

						<div class="col-sm-12 col-md-12">

							<div class="login-box-box-action">

								<a data-toggle="modal" href="#registerModal1">Register</a>

							</div>

						</div>

						

					</div>

				</div>

				

				<div class="modal-footer text-center">

					<!--<button type="button" class="btn btn-primary" id="but_code1">Log-in</button>-->
					<input type="submit"  class="btn btn-primary" name="logincandidate" value="Login"/>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				</form>

<script>
  $('#but_code1').click(function(e){
   
  var uname = document.getElementById('uname').value;
       
 
   var lpassword = document.getElementById('lpassword').value;
  
    
      if(uname==""){
          alert('Please enter user name');
           document.getElementById('uname').focus();
           return false;
       }
       
      
	   
	    if(lpassword==""){
           alert('Please enter password');
            document.getElementById('lpassword').focus();
           return false;
       }
	   
	   
	  
	   
	   
	  
         

$.post("user-login.php",$('#formcodshowErroreshowError1').serialize(),function(data){				

alert(data);
if(data==1 )
{
	location.href="student-dashboard.php";
	
	
}

else
{
	alert("User/email is not valid.");							
	return false;
  
	
}
			
},'json');	
e.preventDefault();

});

</script>



			</div>

			<!-- end Sign-in Modal -->

			

			<!-- start Register Modal -->

			<div id="registerModal1" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

				<?php
			
				if(isset($_POST['regis']))
				{
					
					if($_POST['password'] == $_POST['re-password'])
					{
							$username=$_POST['username'];
							$email=$_POST['email'];
							$password=md5($_POST['password']);
							$date = date("Y-m-d");
							
							$insert = mysql_query("insert into `admin_student` (`state_id`,`name`,`username`,`address`,`email`,`password`,`phone_no`,`image_browse`,`gender`,`student_resume`,`zip_code`,`registration_date`,`status`) values ('0','0','".$username."','0','".$email."','".$password."','0','0','0','0','0','".$date."','Active')");
							
						if($insert){
							?>
							<script>
							/*$(document).ready(function(){
								alert("Thankyou for registration");
							});*/
							</script>
							<?php
							
							$subject="Contact Mail";    
							$headers="MIME-Version: 1.0\n"; 
							$headers.="Content-type: text/html; charset=iso-8859-1 \n"; 
							$headers .= "X-Priority: 1 (Higuest)\n";
							$headers .= "X-MSMail-Priority: High\n";
							$headers .= "Importance: High\n";
							$headers .= "X-Mailer: PHP/phpversion()";

						   
							$headers.="from:<support@petroleague.com>"; 
							$mail_body.="<tr><td>Petroleague</td></tr>";
							$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Username:".$username."</td></tr>";
							$mail_body.="<tr><td>Email:".$email."</td></tr>";
							$mail_body.="<tr><td>Password:".$password."</td></tr>";
							$mail_body.="<tr><td>Please click here for <a href='http://petroleague.com/'>login</a> activation</td></tr></table>";   
							
							$mail_to=$email;
							if(@mail($mail_to, $subject, $mail_body, $headers)) 
							{
								$select_stu = mysql_query("select * from `admin_student` order by id desc limit 1");
								$fetch_stu = mysql_fetch_array($select_stu);
								//print_r($fetch_com);
								//echo $fetch_com['id'];
									
								//$_SESSION['student_id'] = $fetch_stu['id'];
								//$_SESSION['student_type'] = "student";
								//header('Location: student-dashboard.php');
							} 
							   else
							{
								?>
							    <script type="text/javascript">
								alert("Sorry! An Error Occurred While Sending Message. Please Try Again");
								</script>
								<?php
							} 
							
						}else {
							?>
							<script>
							$(document).ready(function(){
								alert("Register Again");
							});
							</script>
							<?php
						}
					}
					else
					{
						?>
						<script>
						$(document).ready(function(){
							alert("Confirm Password is not currect!");
						});
						</script>
						<?php
					}
				}
				
				?>

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Create Your Member Account</h4>

				</div>

				<form id="formcodshowErroreshowError" name="formcode" method="POST" action="">

					<div class="modal-body">

					

						<div class="row gap-20">

						


							<div class="col-sm-12 col-md-12">


								<p class="abc" style="color:#E11417" align="center" id="demo"></p>

								<div class="form-group"> 

									<label>Username</label>

									<input class="form-control"  type="text" name="username" id="username" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

					

								<div class="form-group"> 

									<label>Email Address</label>

									<input class="form-control"  type="email" name="email" id="email" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

							

								<div class="form-group"> 

									<label>Password</label>

									<input class="form-control"  type="password" name="password" id="password" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

							

								<div class="form-group"> 

									<label>Password Confirmation</label>

									<input class="form-control"  type="password" id="re-password" name="re-password" required> 

								</div>

							

							</div>

							

							<!--<div class="col-sm-12 col-md-12">

								<div class="checkbox-block"> 

									<input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox"  type="checkbox" required> 

									<label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>

								</div>

							</div>-->

							

							<div class="col-sm-12 col-md-12">

								<div class="login-box-box-action">

									Already have account? <a data-toggle="modal" href="#loginModal1">Log-in</a>

								</div>

							</div>

							

						</div>

					

					</div>

				

					<div class="modal-footer text-center">

						<!--<button type="button" class="btn btn-primary" id="but_code">Register</button>-->
						<input type="submit" name="regis" value="register" class="btn btn-primary" id="but_code"/>

						<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

					</div>

				</form>
             <script>
/*  $('#but_code').click(function(e){
    
  var username = document.getElementById('username').value;
       
  var email = document.getElementById('email').value;
   var password = document.getElementById('password').value;
  var repassword = document.getElementById('re-password').value;
     var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;      
       if(username==""){
          alert('Please enter user name');
           document.getElementById('username').focus();
           return false;
       }
       
       if(email==""){
           alert('Please enter email');
            document.getElementById('email').focus();
           return false;
       }
	   if(!email.match(mailformat))  
{  
 alert('Please enter valid email');
            document.getElementById('email').focus();
           return false;
}  
	   
	    if(password==""){
           alert('Please enter password');
            document.getElementById('password').focus();
           return false;
       }
	   
	   
	   if(repassword==""){
           alert('Please enter re password');
            document.getElementById('repassword').focus();
           return false;
       }
	   
	   
	   if(repassword!=password){
           alert('Password mismatch');
            document.getElementById('repassword').focus();
           return false;
       }
         
/*
$.post("user-insert.php",$('#formcodshowErroreshowError').serialize(),function(data){				

alert(data);
if(data==0 )
{
	
	alert("There is some error into your server.. Please try latter.");							
	return false;
}

else
{
	
	document.getElementById("demo").innerHTML = "Your Registration successfully";
	
	document.getElementById('username').value='';
       
  document.getElementById('email').value='';
  document.getElementById('password').value='';
  
	
}
			
},'json');	*/
/*
e.preventDefault();

});
*/
</script>
			</div>

			<!-- end Register Modal -->

			<?php
			
			
			if(isset($_POST['restore']))
			{
				
				
				
				$select_student = mysql_query("select * from `admin_student` where `admin_student`.`email` = '".$_POST['emailforget']."'");
				$fetch_student = mysql_fetch_array($select_student);
				if($fetch_student['email'])
				{
					$t=time();
					 
					 //exit;
					$subject="Forget Password";    
					$headers="MIME-Version: 1.0\n"; 
					$headers.="Content-type: text/html; charset=iso-8859-1 \n"; 
					$headers .= "X-Priority: 1 (Higuest)\n";
					$headers .= "X-MSMail-Priority: High\n";
					$headers .= "Importance: High\n";
					$headers .= "X-Mailer: PHP/phpversion()";

				   
					$headers.="from:<support@petroleague.com>"; 
					$mail_body.="<tr><td>Petroleague</td></tr>";
					$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Password:".$t."</td></tr>";
					$mail_body.="<tr><td>Click Here for <a href='http://petroleague.com/'>login</a></td></tr></table>";   

					//$mail_to=$_POST['emailforget'];
					$mail_to='webtechmind.piyu@gmail.com';
					echo $mail_to;
					echo $subject;
					echo $mail_body;
					echo $headers;
					
					
					
					if(@mail($mail_to, $subject, $mail_body, $headers)) 
					
					{
						$tmd = md5($t);
						$student_update = mysql_query("update `admin_student` set `admin_student`.`password` ='".$tmd."'  where `admin_student`.`email` = '".$_POST['emailforget']."'");
					
					?>
					
				   <script type="text/javascript">
					 alert("Please check yourmail. Password will be sent to your mail.");
					</script>
						
					<?php 
					} 
					else
					{
						?>
					    <script type="text/javascript">
						 alert("Sorry! An Error Occurred While Sending Message. Please Try Again.");
						</script>
						<?php
					} 
				}
				else
				{
					echo "Wrong Email id";
				}
			}
			?>

			<!-- start Forget Password Modal -->

			<div id="forgotPasswordModal1" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Restore your forgotten password</h4>

				</div>

				
				<form action="" method="post">
				<div class="modal-body">

					<div class="row gap-20">

						

						<div class="col-sm-12 col-md-12">

							<p class="mb-20">Please put your email id.After click restore button the password will be sent to your email.</p>

						</div>

						

							<div class="col-sm-12 col-md-12">

								<div class="form-group"> 

									<label>Email Address</label>

									<input class="form-control" name="emailforget" placeholder="Enter your email address" type="text" required> 

								</div>

							</div>


							<div class="col-sm-12 col-md-12">

								<div class="login-box-box-action">

									Return to <a data-toggle="modal" href="#loginModal1">Log-in</a>

								</div>

							</div>

						

					</div>

				</div>

				

				<div class="modal-footer text-center">

					<!--<button type="button" class="btn btn-primary">Restore</button>-->
					<input type="submit" class="btn btn-primary" name="restore" value="Restore"/>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				</form>

			</div>

			<!-- end Forget Password Modal -->
 <!--.................................................. Modal Jobseeker...........................................-->

 <!-- .....................................................Modal Recruitment.....................................................-->	
 <?php
 //echo $_SESSION['userid'];die();
 // if(!isset($_SESSION['student_id'])){ ?>
 <!-- <button class="dropbtn" data-toggle="modal" data-target="#loginModal2">Recruitment</button>-->
  <?php
 //}  
// echo $_SESSION['student_id'];
if((!isset($_SESSION['userid'])) && (!isset($_SESSION['student_id'])))
{
	?>
	<button class="dropbtn" data-toggle="modal" data-target="#loginModal2">Recruitment</button>
	<?php
}

?>
	
     
  <!-- start Sign-in Modal -->

			<div id="loginModal2" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
				
				<?php
				if(isset($_POST['login']))
				{
					$username = $_POST['username'];
					$password = md5($_POST['password']);
					
					$select = mysql_query("select * from `admin_company` where (`username` = '$username' or `company_email` = '$username') and `company_password` = '$password'");
					$fetch = mysql_fetch_array($select);
					//print_r($fetch);
					//echo $fetch['id'];
					
					if($fetch)
					{
						$_SESSION["userid"] = $fetch['id'];
						header('Location: company-dasbord.php');
					}
					else{
						?>
						<script>
							$(document).ready(function(){
								alert("Username/Email and password is wrong!");
							});
						</script>
						<?php
					}
				}
				?>
				<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title text-center">Sign-in into your account for company</h4>

				</div>
				<form class="frm2" action="" method="post">
					<div class="modal-body">
					
					

						<div class="row gap-20">
							<button type="button" style="float: right;padding-right: 19px;padding-top: 10px;" class="btn" data-toggle="modal" data-target="#loginModal1">
							Candidate Login</button>
						
							<div class="col-sm-12 col-md-12">

					

								<div class="form-group"> 

									<label>Username/Email</label>

									<input name="username" class="form-control" type="text" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

							

								<div class="form-group"> 

									<label>Password</label>

									<input name="password" class="form-control" type="password" required> 

								</div>

							

							</div>

							
							

							<div class="col-sm-6 col-md-6">

								<div class="login-box-link-action">

									<a data-toggle="modal" href="#forgotPasswordModal2">Forgot password?</a> 

								</div>

							</div>

							

							<div class="col-sm-12 col-md-12">

								<div class="login-box-box-action">

									<a data-toggle="modal" href="#registerModal2">Register</a>

								</div>

							</div>

							

						</div>
						

					</div>

				

					<div class="modal-footer text-center">

						<!--<button type="button" class="btn btn-primary"><a href="company-dasbord.php">Log-in</a></button>-->
						
						<input type="submit" class="btn btn-primary" name="login" value="Log in"/>

						<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

					</div>

				</form>

			</div>

			<!-- end Sign-in Modal -->

			
			
			
			
			
			
			
			<!-- start Register Modal -->

			<div id="registerModal2" class="modal fade login-box-wrapper abc" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
				
				<?php
			
				if(isset($_POST['register']))
				{
					
					if($_POST['password'] == $_POST['cpassword'])
					{
							$username=$_POST['username'];
							$email=$_POST['email'];
							$password=md5($_POST['password']);
							$date = date("Y-m-d");
							
							$insert = mysql_query("INSERT INTO `admin_company` (`category_id`, `state_id`, `username`,`company_name`, `company_description`, `company_contact_person`,`company_address`, `company_email`, `company_password`,`company_phone_no`, `company_website`, `image_browse`, `registration_date`, `status`) VALUES ('0','0','".$username."','0','0','0','0','".$email."','".$password."','0','0','0','".$date."','Active')");
							//echo $insert = "INSERT INTO `admin_company` (`category_id`, `state_id`, `username`,`company_name`, `company_description`, `company_contact_person`,`company_address`, `company_email`, `company_password`,`company_phone_no`, `company_website`, `image_browse`, `registration_date`, `status`) VALUES ('0','0','".$username."','0','0','0','0','".$email."','".$password."','0','0','0','".$date."','Active')";
							//echo $insert = "insert into admin_company set username='".$username."' , email='".$email."' , password='".$password."' , status='Active'");
							
							if($insert){
								
								?>
								<script>
								/*$(document).ready(function(){
									alert("Thankyou for registration");
								});*/
								</script>
								
								<?php
							
								$subject="Contact Mail";    
								$headers="MIME-Version: 1.0\n"; 
								$headers.="Content-type: text/html; charset=iso-8859-1 \n"; 
								$headers .= "X-Priority: 1 (Higuest)\n";
								$headers .= "X-MSMail-Priority: High\n";
								$headers .= "Importance: High\n";
								$headers .= "X-Mailer: PHP/phpversion()";

							   
								$headers.="from:<support@petroleague.com>"; 
								$mail_body.="<tr><td>Petroleague</td></tr>";
								$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Username:".$username."</td></tr>";
								$mail_body.="<tr><td>Email:".$email."</td></tr>";
								$mail_body.="<tr><td>Password:".$password."</td></tr>";
								$mail_body.="<tr><td>Please click here for <a href='http://petroleague.com/'>login</a> activation</td></tr></table>";   
								
								$mail_to=$email;
								if(@mail($mail_to, $subject, $mail_body, $headers)) 
								{
									$select_com = mysql_query("select * from `admin_company` order by id desc limit 1");
									$fetch_com = mysql_fetch_array($select_com);
									//print_r($fetch_com);
									//echo $fetch_com['id'];
										
									//$_SESSION["userid"] = $fetch_com['id'];
									//header('Location: company-dasbord.php');
								} 
								   else
								{
									?>
									<script type="text/javascript">
									alert("Sorry! An Error Occurred While Sending Message. Please Try Again");
									</script>
									<?php
								}
								
								
							}else {
								?>
								<script>
								$(document).ready(function(){
									alert("Register Again");
								});
								</script>
								<?php
							}
							
							
					}
					else
					{
						?>
						<script>
						$(document).ready(function(){
							alert("Confirm Password is not currect!");
						});
						</script>
						<?php
					}
				}
				
				?>
				
				
				<form action="" method="post">
				

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title text-center">Create Your Recruitment Account</h4>

					</div>

					

					<div class="modal-body">

					

						<div class="row gap-20">

						

						
							

							<div class="col-sm-12 col-md-12">

					

								<div class="form-group"> 

									<label>Username</label>

									<input class="form-control" name="username" type="text" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

					

								<div class="form-group"> 

									<label>Email Address</label>

									<input class="form-control" name="email" placeholder="Enter your email address" type="email" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

							

								<div class="form-group"> 

									<label>Password</label>

									<input class="form-control" name="password" type="password" required> 

								</div>

							

							</div>

							

							<div class="col-sm-12 col-md-12">

							

								<div class="form-group"> 

									<label>Password Confirmation</label>

									<input class="form-control"  name="cpassword" placeholder="Re-type password again" type="password" required> 

								</div>

							

							</div>
							

							<div class="col-sm-12 col-md-12">

								<div class="login-box-box-action">

									Already have account? <a data-toggle="modal" href="#loginModal2">Log-in</a>

								</div>

							</div>

							

						</div>

					

					</div>

					

					<div class="modal-footer text-center">

						<!--<button type="button" class="btn btn-primary">Register</button>-->
						<input type="submit" name="register" value="Register" class="btn btn-primary">

						<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

					</div>

				</form>	

			</div>
			
			<!-- end Register Modal -->



			<!-- start Forget Password Modal -->

			<div id="forgotPasswordModal2" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Restore your forgotten password</h4>

				</div>
				<?php
				if(isset($_POST['restr']))
				{
					
					
					
					$select_student = mysql_query("select * from `admin_company` where `admin_company`.`company_email` = '".$_POST['emailforget2']."'");
					$fetch_student = mysql_fetch_array($select_student);
					if($fetch_student['company_email'])
					{
						$t=time();
						 
						 //exit;
						$subject="Forget Password";    
						$headers="MIME-Version: 1.0\n"; 
						$headers.="Content-type: text/html; charset=iso-8859-1 \n"; 
						$headers .= "X-Priority: 1 (Higuest)\n";
						$headers .= "X-MSMail-Priority: High\n";
						$headers .= "Importance: High\n";
						$headers .= "X-Mailer: PHP/phpversion()";

					   
						$headers.="from:<support@petroleague.com>"; 
						$mail_body.="<tr><td>Petroleague</td></tr>";
						$mail_body="<table cellpadding='0' cellspacing='0' border='0'><tr><td>Password:".$t."</td></tr>";
						$mail_body.="<tr><td>Click Here for <a href='http://petroleague.com/'>login</a></td></tr></table>";   

						$mail_to=$_POST['emailforget2'];

						if(@mail($mail_to, $subject, $mail_body, $headers)) 
						
						{
							$tmd = md5($t);
							$student_update = mysql_query("update `admin_company` set `admin_company`.`company_password` ='".$tmd."'  where `admin_company`.`company_email` = '".$_POST['emailforget2']."'");
						
						?>
						
					   <script type="text/javascript">
						 alert("Please check yourmail. Password will be sent to your mail.");
						</script>
							
						<?php 
						} 
						else
						{
							?>
							<script type="text/javascript">
							 alert("Sorry! An Error Occurred While Sending Message. Please Try Again.");
							</script>
							<?php
						} 
					}
				}
				?>
				
				
				<form action="" method="post">

				<div class="modal-body">

					<div class="row gap-20">

						

						<div class="col-sm-12 col-md-12">

							<p class="mb-20">Please put your email id.After click restore button the password will be sent to your email.</p>

						</div>

						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Email Address</label>

								<input class="form-control" name="emailforget2" placeholder="Enter your email address" type="text" required> 

							</div>

						

						</div>


						<div class="col-sm-12 col-md-12">

							<div class="login-box-box-action">

								Return to <a data-toggle="modal" href="#loginModal2">Log-in</a>

							</div>

						</div>

						

					</div>

				</div>

				

				<div class="modal-footer text-center">

					<!--<button type="button" class="btn btn-primary">Restore</button>-->
					<input type="submit" class="btn btn-primary" value="Restore" name="restr"/>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				</form>

			</div>

			<!-- end Forget Password Modal --> 

 <!-- .....................................................Modal Recruitment.....................................................-->	
					</div>