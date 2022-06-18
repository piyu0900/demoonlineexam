<?php 

require('configure.php'); 

$getAdminSetting = $pm->getSetting(1);

?>

<?php include "includes/header.php" ?>

<?php include "includes/banner.php" ?>



			<!-- end hero-header -->



	<div class="clearfix"></div>	



<div class="row bg-shadow">
<div class="hidden-sm hidden-xs visible-md visible-lg">
<div class="side-left"><a href="http://petroleague.com/" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right"><a href="http://petroleague.com/" target="_blank"><img src="images/banner/ads.jpg"></a></div>
</div>
 <div class="container">

 <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();" class="marqu mar1">

<p class="mar-p-left1">

<?php 
$sql = "SELECT * FROM ".DTABLE_MARQUEE." ORDER BY id DESC";
$res = $db->selectData($sql);
$row_rec = $db->getRow($res);
?>
<?php echo strtoupper (stripslashes(strip_tags($row_rec['marquee']))); ?>
</p>

</marquee>

 <div class="wrapper-bg">

 <div class="col-md-8">
<?php 
$sql = "SELECT * FROM ".DTABLE_USER_PAGES." where id = 2";
$res = $db->selectData($sql);
$row_rec = $db->getRow($res);


?>

<?php echo stripslashes($row_rec['pages_content'])?>

<!--<div class="redmore"><a href="about-us.php">Read More</a></div>-->



                    </div>

<div class="col-md-4">



<div class=""><p class="ling">Engaged with us</p></div>



<div class="row">

<div class="col-md-12">

<div class=" r-top">

<div class="col-md-6"> <img src="images/user/user2.png" alt="" class="img-user">

<p class="st">Students</p>
<?php

$select_student = mysql_query("select * from `admin_student` where `admin_student`.`status` = 'Active'");
$select_row = mysql_num_rows($select_student);

?>
<p class="nu"><?php echo $select_row; ?></p>

</div>

<div class="col-md-6"><img src="images/user/user2.png" alt=""  class="img-user">

<p class="st">Professor</p>
<?php

$select_company = mysql_query("select * from `admin_company` where `admin_company`.`status` = 'Active'");
$select_row2 = mysql_num_rows($select_company);

?>
<p class="nu"><?php echo $select_row2; ?></p>

</div>





</div>

</div>

</div>










</div>

</div>  
</div>
</div>          



  
<div class="clearfix"></div>


           <div class="pt-80">

<div class="container">

<div class="category-group-wrapper with-background">



                    



                    		<div class="section-title">



							



								<h2>Services</h2>



								



							</div>



					



						<div class="row">



							



							<div class="col-md-4">
								<div class="category-group">

									<div class="icon">
									<img src="images/banner/us1.png" alt="">
									</div>
									<h4>Reservoir Characterization</h4>

									<a href="reservoir-character-solution.php" class="btn btn-primary btn-sm">View Details</a>



								



								</div>



							



							</div>



							



							<div class="col-md-4">



								



								<div class="category-group">



									



									<div class="icon">

<img src="images/banner/us2.png" alt="">


									</div>

									<h4>Articels</h4>

									<a href="http://petroleague.com/blog/" class="btn btn-primary btn-sm">download</a>


								</div>



							



							</div>



							



						<!--	<div class="col-sm-4">
								<div class="category-group">
									<div class="icon"><img src="images/banner/us3.png" alt="">
									</div>
									<h4>Discussion</h4>
									<a href="#" class="btn btn-primary btn-sm">Create Discussion</a>
								</div>

							</div>-->



							



							



						



						</div>



						



					</div>







				</div>







			</div>



            



            



            



 <div class="clearfix"></div>



      





        

				<div class="clear mb-50"></div>



		

            

<!--....................................footer start..............................-->

            



           <?php include "includes/footer.php" ?> 



          



			