

<div class="nav-mini-wrapper">


<?php if(isset($_SESSION['student_id']))
{
	
	$_SESSION['student_id'];
	?>
	<a href="student_logout.php">
<i class="fa fa-user" aria-hidden="true"></i>
<div class="txtbig">Log Outdxvxcvxcv</div>
</a>
<?php } ?>





  <!--............................................ Modal Jobseeker..................................................-->
  
  
  <!-- start Sign-in Modal -->

			<div id="loginModal1" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Sign-in into your account</h4>

				</div>

				<form id="formcodshowErroreshowError1" name="formcode1" method="POST" action="">

				<div class="modal-body">

					<div class="row gap-20">

					

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-facebook btn-block mb-5-xs">Log-in with Facebook</button>

						</div>-->

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-google-plus btn-block">Log-in with Google+</button>

						</div>
-->
						

						<!--<div class="col-md-12">

							<div class="login-modal-or">

								<div><span>or</span></div>

							</div>

						</div>
-->
						 

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

					<button type="button" class="btn btn-primary" id="but_code1">Log-in</button>

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

//alert(data);
if(data==1 )
{
	location.href="student-dasbord.php";
	
	
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

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Create Your Member Account</h4>

				</div>

				 <form id="formcodshowErroreshowError" name="formcode" method="POST" action="">

				<div class="modal-body">

				

					<div class="row gap-20">

					

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>

						</div>
-->
						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-google-plus btn-block">Register with Google+</button>

						</div>
-->
						

						<!--<div class="col-md-12">

							<div class="login-modal-or">

								<div><span>or</span></div>

							</div>

						</div>
-->
						

						<div class="col-sm-12 col-md-12">


				<p class="abc" style="color:#E11417" align="center" id="demo"></p>

							<div class="form-group"> 

								<label>Username</label>

								<input class="form-control"  type="text" name="username" id="username"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Email Address</label>

								<input class="form-control"  type="email" name="email" id="email" > 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password</label>

								<input class="form-control"  type="password" name="password" id="password"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password Confirmation</label>

								<input class="form-control"  type="password" id="re-password" name="re-password"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

							<div class="checkbox-block"> 

								<input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox"  type="checkbox"> 

								<label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>

							</div>

						</div>

						

						<div class="col-sm-12 col-md-12">

							<div class="login-box-box-action">

								Already have account? <a data-toggle="modal" href="#loginModal1">Log-in</a>

							</div>

						</div>

						

					</div>

				

				</div>

				

				<div class="modal-footer text-center">

					<button type="button" class="btn btn-primary" id="but_code">Register</button>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				</form>
             <script>
  $('#but_code').click(function(e){
    
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
         

$.post("user-insert.php",$('#formcodshowErroreshowError').serialize(),function(data){				

//alert(data);
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
			
},'json');	
e.preventDefault();

});

</script>
			</div>

			<!-- end Register Modal -->



			<!-- start Forget Password Modal -->

			<div id="forgotPasswordModal1" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Restore your forgotten password</h4>

				</div>

				

				<div class="modal-body">

					<div class="row gap-20">

						

						<div class="col-sm-12 col-md-12">

							<p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>

						</div>

						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Email Address</label>

								<input class="form-control" placeholder="Enter your email address" type="text"> 

							</div>

						

						</div>



						<div class="col-sm-12 col-md-12">

							<div class="checkbox-block"> 

								<input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox"> 

								<label class="" for="forgot_password_checkbox">Generate new password</label>

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

					<button type="button" class="btn btn-primary">Restore</button>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				

			</div>

			<!-- end Forget Password Modal -->
 <!--.................................................. Modal Jobseeker...........................................-->

 <!-- .....................................................Modal Recruitment.....................................................-->	
 
 <?php if(!isset($_SESSION['student_id']))
{
	
	 
	?>
 
 
  <button class="dropbtn" data-toggle="modal" data-target="#registerModal2">Recruitment</button>
 
	<?php }?>
     
  <!-- start Sign-in Modal -->

			<div id="loginModal2" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Sign-in into your account</h4>

				</div>

				

				<div class="modal-body">

					<div class="row gap-20">

					

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-facebook btn-block mb-5-xs">Log-in with Facebook</button>

						</div>-->

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-google-plus btn-block">Log-in with Google+</button>

						</div>
-->
						

						<!--<div class="col-md-12">

							<div class="login-modal-or">

								<div><span>or</span></div>

							</div>

						</div>
-->
						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Username</label>

								<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password</label>

								<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-6 col-md-6">

							<div class="checkbox-block"> 

								<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 

								<label class="" for="remember_me_checkbox">Remember me</label>

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

					<button type="button" class="btn btn-primary"><a href="student-dasbord.html">Log-in</a></button>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				

			</div>

			<!-- end Sign-in Modal -->

			

			<!-- start Register Modal -->

			<div id="registerModal2" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Create Your Recruitment Account</h4>

				</div>

				

				<div class="modal-body">

				

					<div class="row gap-20">

					

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>

						</div>-->

						<!--<div class="col-sm-6 col-md-6">

							<button class="btn btn-google-plus btn-block">Register with Google+</button>

						</div>-->

						

						<!--<div class="col-md-12">

							<div class="login-modal-or">

								<div><span>or</span></div>

							</div>

						</div>
-->
						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Username</label>

								<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Email Address</label>

								<input class="form-control" placeholder="Enter your email address" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password</label>

								<input class="form-control" placeholder="Min 8 and Max 20 characters" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

						

							<div class="form-group"> 

								<label>Password Confirmation</label>

								<input class="form-control" placeholder="Re-type password again" type="text"> 

							</div>

						

						</div>

						

						<div class="col-sm-12 col-md-12">

							<div class="checkbox-block"> 

								<input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox"> 

								<label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>

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

					<button type="button" class="btn btn-primary">Register</button>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				

			</div>

			<!-- end Register Modal -->



			<!-- start Forget Password Modal -->

			<div id="forgotPasswordModal2" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">

			

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title text-center">Restore your forgotten password</h4>

				</div>

				

				<div class="modal-body">

					<div class="row gap-20">

						

						<div class="col-sm-12 col-md-12">

							<p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>

						</div>

						

						<div class="col-sm-12 col-md-12">

				

							<div class="form-group"> 

								<label>Email Address</label>

								<input class="form-control" placeholder="Enter your email address" type="text"> 

							</div>

						

						</div>



						<div class="col-sm-12 col-md-12">

							<div class="checkbox-block"> 

								<input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox"> 

								<label class="" for="forgot_password_checkbox">Generate new password</label>

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

					<button type="button" class="btn btn-primary">Restore</button>

					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>

				</div>

				

			</div>

			<!-- end Forget Password Modal --> 

 <!-- .....................................................Modal Recruitment.....................................................-->	
					</div>