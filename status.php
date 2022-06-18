<?php
include('header.php');
?>

<?PHP
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="yIEkykqEH3";
 
     

$lastname=$_POST["lastname"];
$phone=$_POST["phone"];
$address1=$_POST["address1"];
$city=$_POST["city"];
$state=$_POST["state"];
$country=$_POST["country"];
$zipcode=$_POST["zipcode"];
	 
?>

<?php 
function GeraHashh($qtd){ 
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
$QuantidadeCaracteres = strlen($Caracteres); 
$QuantidadeCaracteres--; 

$Hashh=NULL; 
    for($x=1;$x<=$qtd;$x++){ 
        $Posicao = rand(0,$QuantidadeCaracteres); 
        $Hashh .= substr($Caracteres,$Posicao,1); 
    } 

return $Hashh; 
} 

//Here you specify how many characters the returning string must have 
 $genpass = GeraHashh(30);

 
 
$date = date('Y-m-d');
$insert_order = mysql_query('insert into `onlineexam321`.`admin_order` (`firstname`,`lastname`,`amount`,`status`,`txnid`,`hash`,`key`,`productinfo`,`email`,`date`) VALUES ("'.$firstname.'","'.$lastname.'","'.$amount.'","'.$status.'","'.$txnid.'","'.$posted_hash.'","'.$key.'","'.$productinfo.'","'.$email.'","'.$date.'")');
				
?>





   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>    				
	<div class="container">
		<div class="row">
			<h1>
			<?php
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
					$date = date('Y-m-d');
					$insert_user = mysql_query('insert into `onlineexam321`.`admin_user` (`password`,`address1`,`city`,`state`,`country`,`zipcode`,`email`,`phone`,`image_browse`,`firstname`,`lastname`,`date`) VALUES ("'.$genpass.'","'.$address1.'","'.$city.'","'.$state.'","'.$country.'","'.$zipcode.'","'.$email.'","'.$phone.'","0","'.$firstname.'","'.$lastname.'","'.$date.'")');
					
					
					  echo "Thank You for Subscribe. Your order status is ". $status;
					  echo "Your Transaction ID for this transaction is ".$txnid;
					  echo "We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.";
					  echo "Your login Id and Password has been to your email.";
					   
				} 
			?>
			</h1>
		</div>
	</div>
</section>





<?php
include('footer.php');

?>