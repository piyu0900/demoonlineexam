<?php 

require('configure.php'); 

$getAdminSetting = $pm->getSetting(1);

?>
<?php include "includes/header.php" ?>

<body>

<!--	<div id="introLoader" class="introLoading"></div>--> 

<!-- start Container Wrapper -->


    
    <!-- start hero-header -->
    
    <div class="row topspace">

<div class="post-hero">

<div class="row">



						

<div class="container">

<div class="marqu-icon">

 <a href="#">

<i class="fa fa-user" aria-hidden="true"></i>

</a>

</div>





<?php include "includes/dashboard-marquee.php" ?>



<p class="upload"><i class="fa fa-cloud-upload"></i>Upload Resume</p>	

</div>		

</div>

</div>









<div class="row">

<img src="images/banner/About_us.jpg" alt="" width="100%">

</div>



</div>



			<!-- end hero-header -->



<div class="row bg-shadow">

<div class="pt-80 pb-50">

          		<div class="container">

                <div class="row">

                	<div class="col-sm-6">

                	<div class="col-sm-12">

                        <div class="section-title text-left">

                            <h2>About us</h2>	

                        </div>

                    </div>

                    <div class="col-sm-12">

                    	<?php 
$sql = "SELECT * FROM ".DTABLE_USER_PAGES." where id = 1";
$res = $db->selectData($sql);
$row_rec = $db->getRow($res);


?>

<?php echo stripslashes($row_rec['pages_content'])?>

                    </div>

                </div>

                	<div class="col-sm-6">

                    	<div class="ban">

                        	<img src="images/banner/ab.png" alt="">

                        </div>

                    </div>

                </div>  

          	</div>

            </div>

          		  

</div>          




 <div class="clearfix"></div>



   



   <?php include "includes/footer.php" ?>