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
			
			
             <?php include('includes/dashboard-marquee.php'); ?> 
            <p class="upload"><i class="fa fa-cloud-upload"></i>Upload Resume</p>
          </div>
        </div>
      </div>
      <div class="row"> <img src="images/banner/banner_news.png" alt="" width="100%"> </div>
    </div>
    
    <!-- end hero-header -->
    
  
      <div class="pb-50">
	  <div class="news-side-left"><a href="http://petroleague.com/" target="_blank"><img src="images/banner/ads.jpg"></a></div>
<div class="news-side-right"><a href="http://petroleague.com/" target="_blank"><img src="images/banner/ads.jpg"></a></div>
        <div class="container bg-width">
          <div class="row">

		  <?php 
$sql = "SELECT * FROM ".DTABLE_NEWS." WHERE status= 'Active' ORDER BY id DESC ";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
?>
		  
	<div class="col-md-4">
	<div class="section-title1 text-left"><h2><?php echo ucfirst($row_rec['news_title']); ?></h2></div>
	<div class="line"><span class="glyphicon glyphicon-calendar"></span><?php echo $row_rec['news_date']; ?> | 
	<span class="glyphicon glyphicon-time"></span>10pm  </div>
	<img src="<?PHP echo NEWS_FRONTEND_IMAGE_PATH.$row_rec['image_browse']?>" alt="" class="line-img">
	<p class="line-p">
	<?php echo strip_tags(substr($row_rec['description'],0,300)); ?>.</p>
   <div class="redmore"><a href="news-details.php?id=<?php echo $row_rec['id'];?>">Read More</a></div> 
 <div class="author-div">   
 <img src="images/news-img.png" alt="" class="news-img">
 
 <div class="news-name"><span class="author-name">Lorem Ipsum </span> / <span class="company-name">Lorem Ipsum </span></div>
  <p class="news-line-p"><a href="#">Lorem Ipsum </a></p>
   </div> 
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
