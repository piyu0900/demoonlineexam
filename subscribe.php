<?php
include('header.php');
?>

<?php
if($_GET['s'] == "logout")
{
	session_destroy();
}
?>

<?php

// Merchant key here as provided by Payu
$MERCHANT_KEY = "hDkYGPQe";
 
// Merchant Salt as provided by Payu
$SALT = "yIEkykqEH3";
 
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
 
$action = '';
 
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
 
  }
}
 
$formError = 0;
 
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
   || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
 $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = ''; 
 foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
 
    $hash_string .= $SALT;
 
 
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
//echo $action;
?>
<script>
    var hash = '<?php echo $hash ?>';
	//alert(hash);
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>	






















   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section onload="submitPayuForm()">    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Subscribe
			</h1>
			<div class="col-sm-8 subscribe-list">
		<h3><?php echo $get_product_details['subcribe_header']; ?></h3>
		<h4>Highlights</h4>
		<ul>
			<?php echo $get_product_details['subcribe_des']; ?>
		</ul>
			</div>
<div class="col-sm-4">
           <div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
						</div>
						<hr>
					</div>
					
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								

								<?php
								if(isset($_POST['login-submit']))
								{
									$date = date('Y-m-d');
									$check = mysql_query('select * from `onlineexam321`.`admin_user` where `admin_user`.`email` ="'.$_POST['email'].'" and `admin_user`.`password` ="'.$_POST['password'].'"');
									if(mysql_num_rows($check)>0)
									{
										header('Location: dashboard.php');
										$select = mysql_query('select * from `onlineexam321`.`admin_user` where `admin_user`.`email` ="'.$_POST['email'].'" and `admin_user`.`password` ="'.$_POST['password'].'"');
										$fetch = mysql_fetch_array($select);
										$_SESSION["email"] = $fetch['email'];
										$_SESSION["firstname"] = $fetch['firstname'];
										$_SESSION["id"] = $fetch['id'];
										
									}
									else
									{
										$wrong = "<p style='color:red'>Wrong Username or Password</p>";
									}
								
								}
								?>
							
							
							
							
							
								<form id="login-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
									<?php echo $wrong; ?>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<?php //if($formError) { ?>
 
								 <!--<span style="color:red">Please fill all mandatory fields.</span>
								  <br/>
								  <br/>-->
								<?php //} ?>
								<?php //echo $action; ?>
								<form id="register-form" action="<?php echo $action; ?>" name="payuForm" method="post" role="form" style="display: block;">
									<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
									<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
									<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
									<input type="hidden" name="amount" value="<?php echo $get_product_details['subcribe_price']; ?>" />
									<input type="hidden" name="productinfo" value="Exam Subcribsion" />
									<input type="hidden" name="surl" value="http://pinkwebsolutionz.com/dev/onlineexam/status.php" />
									<input type="hidden" name="furl" value="http://pinkwebsolutionz.com/dev/onlineexam/failure.php" />
									<input type="hidden" name="curl" value="http://pinkwebsolutionz.com/dev/onlineexam/status.php" />
									<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
									
									
									
									
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" tabindex="1" class="form-control" placeholder="Firstname" required>
									</div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" tabindex="1" class="form-control" placeholder="Lastname" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" tabindex="1" class="form-control" placeholder="Email Address" required>
									</div>
									<div class="form-group">
										<input type="tel" name="phone" id="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" tabindex="1" class="form-control" placeholder="Phone" required>
									</div>
									<div class="form-group">
										<input type="text" name="address1" id="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" tabindex="1" class="form-control" placeholder="Address" required>
									</div>
									<div class="form-group">
										<input type="text" name="city" id="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" tabindex="1" class="form-control" placeholder="City" required>
									</div>
									<div class="form-group">
										<input type="text" name="state" id="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" tabindex="1" class="form-control" placeholder="State" required>
									</div>
									<div class="form-group">
										<input type="text" name="country" id="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" tabindex="1" class="form-control" placeholder="Country" required>
									</div>
									<div class="form-group">
										<input type="text" name="zipcode" id="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" tabindex="1" class="form-control" placeholder="Zipcode" required>
									</div>
									<?php if(!$hash) { ?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Subscribe">
											</div>
										</div>
									</div>
									<?php } 
									else
									{
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit2" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Continue">
											</div>
										</div>
									</div>
									<?php
									}
									?>
									<div class="form-group">
												<h3 class="text-center">Fees : <b><?php echo $get_product_details['subcribe_price']; ?>/-</b></h3>
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