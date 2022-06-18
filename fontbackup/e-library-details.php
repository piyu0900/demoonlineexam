 <?php

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	echo "<script>
window.location.href='index.php';
</script>"; 
}

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
				
				$select_libary = mysql_query("select * from `admin_e_library` where `admin_e_library`.`id` = '".$_GET['book']."'");
				$fetch_libary = mysql_fetch_array($select_libary);
				?>
				
				
			<div class="col-md-12">

			<div class="col-md-4"><img src="images/e-library-book/<?php echo $fetch_libary['image_browse'];?>" alt=""></div>
			<div class="col-md-8">
			<h3 class="no-margin"><a class="col" href="e-library-details.php?book=<?php echo $fetch_libary['id'];?>"><?php echo $fetch_libary['book_title'];?></a></h3>
			<h4 class="no-margin"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $fetch_libary['book_price'];?></h4> 
			<h5 class="no-margin"><?php echo $fetch_libary['book_name'];?></h5>
			</div>

			<div class="col-md-12">
			<?php
			$discussion = $fetch_libary['description']; 
			$result = substr($discussion, 0, 300);
			?>
			 <p class="text-color"> <?php echo $discussion;?></p> 
			</div>
			
			 <div class="col-md-12 read-top"> 
					<p class="upload read5"><a href="e-library.php">Back</a></p>        
			 </div>        
			</div>  
				
			 
			 
			 
			
         
           
 </div>
        </div>
      </div>
  
    <div class="clearfix"></div>
    
    
    <!--....................................footer start..............................-->
    <?php include "includes/footer.php" ?>
