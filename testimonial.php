 <?php
include('header.php');

?>

 



    <!----header closed---->
   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

           <!------slider CLOSED----->
    </section>
	<section>
    	<div class="container">
			<h1 class="main-title">
				Testimonials
			</h1>
			
			<?php 
		$sql = "SELECT * FROM ".DTABLE_TESTI." ORDER BY id DESC";
		$res = $db->selectData($sql);
		while($row_rec = $db->getRow($res))
		{
			?>
            <div class="inner-testi-des">
	            	<div class="col-md-2 col-sm-3">
	            		<img src="<?php echo TESTI_FRONTEND_IMAGE_PATH.$row_rec['image_browse']; ?>" class="img-responsive">
	            	</div>
	            	<div class="col-md-10 col-sm-9">
	            		<div class="inner-text">
	            			<p><?php echo $row_rec['description']; ?></p>
	            		</div>
	            		<div class="inner-text">
	            			<h4><?php echo $row_rec['fullname']; ?></h4>
	            			<span><b><?php echo $row_rec['desig']; ?></b></span>
	            		</div>
	            	</div>
	            
            </div>
			<?php
		}
		?>
			
			
			
			
    	</div>
    </section>

    
    
<?php
include('footer.php');
?>

