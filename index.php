<?php
include('header.php');

?>

   <section class="section_slider space-top">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="demo1">
                            <div class="span12">

                                <div id="owl-demo1" class="owl-carousel all-test text-center">

                                    <?php
									$select_test = mysql_query("select * from `admin_test` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id`");
									While($fetch_test = mysql_fetch_array($select_test))
									{
										?>
										<div class="item">
											<div class="top-text">
												<h3><?php echo $fetch_test['testname']; ?></h3>
												<p><?php echo $fetch_test['examname']; ?></p>
											</div>
											<div class="bottom-text">
												<h4> Starts on  <br> <?php echo $fetch_test['date']; ?></h4>
												<a target="_blank" href="schedule.php" class="btn btn-view">View syllabus</a>
											</div>
										</div>
										<?php
									}
									?>
									

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="price-test text-center">
	<div class="container">
		<ul class="row">
			<li class="col-sm-4">
				<div class="price-test-inner">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo $get_product_details['subcribe_price']; ?>
				</div>
			</li>
			<li class="col-sm-4">
				<div class="price-test-inner">
					<?php
					$select_tst = mysql_query("select * from `admin_test`");
					$num_tst = mysql_num_rows($select_tst);
					?>
					<i class="fa fa-list-alt" aria-hidden="true"></i>Tests Included - <?php echo $num_tst; ?>
				</div>
			</li>
			<li class="col-sm-4">
				<div class="price-test-inner">
					<a href=""><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>Subscribe</a>
				</div>
			</li>
			
		</ul>
	</div>
</section>


<section class="about-home">    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				<?php echo $get_product_details['aboutheading']; ?>
			</h1>
			<div class="col-sm-4">
			<img class="img-responsive" src="img/about-study.jpg">
			</div>	
			<div class="col-sm-8">
					<?php //echo $get_product_details['aboutdes'];
							$pieces = explode(" ", $get_product_details['aboutdes']);
							echo $first_part = implode(" ", array_splice($pieces, 0, 220));
					?>
					<br>
					<a href="<?php echo $get_product_details['link1']; ?>" class="btn read-more">Read More</a>
			</div>		

			
		</div>
	</div>
</section>


<section>    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Video
			</h1>
			<div class="col-sm-12">
				<?php echo $get_product_details['video']; ?>
			</div>
			<center><a href="<?php echo $get_product_details['link2']; ?>" class="btn read-more">View All</a></center>
				
				
		</div>
        


	</div>
</section>

<section class="blue-section">
	<div class="container">
		<div class="col-sm-6 padding-nm">
			<ul class="grid-four-col">
				<li class="grid-four-img">
					<img class="img-responsive" src="img/Studying-book.jpg">
				</li>
				<li class="grid-four-text">
					<?php echo $get_product_details['fblues']; ?>
				</li>
			</ul>
		</div>
		<div class="col-sm-6 padding-nm">
			<ul class="grid-four-col">
				<li class="grid-four-img">
					<img class="img-responsive" src="img/books.jpg">
				</li>
				<li class="grid-four-text">
					<?php echo $get_product_details['sblues']; ?>
				</li>
			</ul>
		</div>
		<div class="col-sm-6 padding-nm">
			<ul class="grid-four-col">
				<li class="grid-four-img float-right">
					<img class="img-responsive" src="img/prepare-exams.jpg">
				</li>
				<li class="grid-four-text">
					<?php echo $get_product_details['tblues']; ?>
				</li>
			</ul>
		</div>
		<div class="col-sm-6 padding-nm">
			<ul class="grid-four-col">
				<li class="grid-four-img float-right">
					<img class="img-responsive" src="img/Factors-Which-Affect.jpg">
				</li>
				<li class="grid-four-text">
					<?php echo $get_product_details['foblues']; ?>
				</li>
			</ul>
		</div>
	</div>
</section>


<section class="advantage">    				
	<div class="container">
		<div class="row white-title">
			<h1 class="main-title">
				Advantage
			</h1>
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse1'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['fads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse2'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['sads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse3'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['tads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse4'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['foads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse5'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['fifads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse6'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['sixads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse7'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['sevads']; ?>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="advantage-inner text-center">
					<img class="img-responsive" src="<?PHP echo ADV_FRONTEND_IMAGE_PATH.$get_product_details['image_browse1'];?>">
					<div class="advantage-inner-text">
					<?php echo $get_product_details['eigads']; ?>
					</div>
				</div>
			</div>	

			
		</div>
	</div>
</section>


<section id="testimonial">
<div class="container">

			<h1 class="main-title">
				testimonial
			</h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
				<?php 
				$sql = "SELECT * FROM ".DTABLE_TESTI." ORDER BY id DESC";
				$res = $db->selectData($sql);
				while($row_rec = $db->getRow($res)){
					?>
					<div class="testimonial">
						<p class="description">
							<?php
							$description = strip_tags($row_rec['description']);
							$pieces1 = explode(" ", $description);
							echo $first_part1 = implode(" ", array_splice($pieces1, 0, 50));
							?>
						</p>
						<div class="testimonial-content">
							<div class="pic">
								<img src="<?php echo TESTI_FRONTEND_IMAGE_PATH.$row_rec['image_browse']; ?>">
							</div>
							<h3 class="title"><?php echo $row_rec['fullname']; ?></h3>
						</div>
					</div>
					<?php 
				}
				?>
                
				
				
            </div>
        </div>
    </div>
</div>
</section>




<?php
include('footer.php');

?>