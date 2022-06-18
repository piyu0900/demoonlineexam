<?php
include('header.php');
?>


<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="yIEkykqEH3";

?>




   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>    				
	<div class="container">
		<div class="row">
			<h1>
			<?php
				$date = date('Y-m-d');
				$insert_order = mysql_query('insert into `onlineexam321`.`admin_order` (`firstname`,`amount`,`status`,`txnid`,`hash`,`key`,`productinfo`,`email`,`date`) VALUES ("'.$firstname.'","'.$amount.'","'.$status.'","'.$txnid.'","'.$posted_hash.'","'.$key.'","'.$productinfo.'","'.$email.'","'.$date.'")');
				
			
			If (isset($_POST["additionalCharges"])) {
				   $additionalCharges=$_POST["additionalCharges"];
					$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
					
							  }
				else {	  

					$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

					 }
					 $hash = hash("sha512", $retHashSeq);
			  
				   if ($hash != $posted_hash) {
					   
					   echo "Invalid Transaction. Please try again";
					   }
				   else {
					   
					  
					 echo "Your order status is ". $status.'.';
					 echo " Your transaction id is ".$txnid.". You may try making the payment by clicking the link below.";
					  
					 } 
			?>
			<a href="http://pinkwebsolutionz.com/dev/onlineexam/subscribe.php"> Try Again</a>
			</h1>
		</div>
	</div>
</section>





<?php
include('footer.php');

?>