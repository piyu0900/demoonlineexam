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
            <div class="marqu-icon"> <a href="#"> <i class="fa fa-user" aria-hidden="true"></i> </a> </div>
            
<?php include "includes/dashboard-marquee.php" ?>
            <p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/e-library.jpg" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  <div class="row">
  <div class="side-left side-left1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="side-right side-right1"><a href="#" target="_blank"><img src="images/banner/ads.jpg"></a></div>
  </div>
      <div class="pb-50">
        <div class="container bg-shadow bg-width">
          <div class="row">
          
          
			<div class="col-md-12"><h4><a class="col" href="#">E-Library</a></h4></div>          
					  
			<hr>
			
			<?php
			
			$select_libary = mysql_query("select * from `admin_e_library`");
			
			while($fetch_libary = mysql_fetch_array($select_libary))
			{
				?>
		
			<div class="col-md-6 lib">

			<div class="col-md-4"><img src="images/e-library-book/<?php echo $fetch_libary['image_browse'];?>" alt=""></div>
			<div class="col-md-8">
			<h3 class="no-margin"><a class="col" href="e-library-details.php?book=<?php echo $fetch_libary['id'];?>"><?php echo $fetch_libary['book_title'];?></a></h3>
			<h4 class="no-margin"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $fetch_libary['book_price'];?></h4> 
			<h5 class="no-margin"><?php echo $fetch_libary['book_name'];?></h5>
			</div>

			<div class="col-md-12 text-height">
			<?php
			$discussion = $fetch_libary['description']; 
			$result = substr($discussion, 0, 100);
			?>
			 <p class="text-color"> <?php echo $result;?></p> 
			</div>

			 	<div class="clearfix"></div>   
			 <div class="col-md-12 read-top"> 
					<form action="library-checkout.php" method="post" class="upload read1 read-more">		
					<input type="hidden" name="price" value="<?php echo $fetch_libary['book_price'];?>" />
					<input type="hidden" name="name" value="<?php echo $fetch_libary['book_title'];?>" />
					<input type="hidden" name="product_id" value="<?php echo $fetch_libary['id'];?>" />
					<i class="fa fa-download"></i><input class="read5" type="submit" name="submit" value="Download Book">

					</form>
<p class="upload read1">
<i class="fa fa-arrow-circle-o-right"></i>
<a href="e-library-details.php?book=<?php echo $fetch_libary['id'];?>">Read More</a>
</p>        
			 </div>  
			 	<div class="clearfix"></div>           
			</div>  
	        
			<?php
			}
			?>
			 
         
           
 </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
