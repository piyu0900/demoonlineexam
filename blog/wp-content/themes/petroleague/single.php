<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<section><div class="middle-adds"><?php dynamic_sidebar('Middle addversite');?></div></section>
<div class="row">
<div class="col-md-2">
  <div class="blog-bg">
  <div class="side-left-img">
  <?php dynamic_sidebar('left addversite');?>
  </div>
</div>




 
</div>

<div class="col-md-7">
<section class="publicaciones-blog-home">

   <h2>Article Details</h2>
   <div class="blog-details">
  <?php 
  while (have_posts ()): the_post(); 
$image33=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
?>
   <img src="<?php echo $image33[0]?>" alt="<?php echo $image33[0]?>" width="700" height="355">

   <div class="blog-details-total">
   <span class="user-date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date();?> <i class="fa fa-user-circle" aria-hidden="true"></i><a data-toggle="modal" data-target="#contact" data-original-title> <?php echo get_the_author();?></a></span>


  <h3><?php the_title();?></h3>
  <?php the_content(); ?>
  <div class="col-md-12  blog-post-bottom">
 
  </div>
 <div class="container">	<div class="row">        
 <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">  
 <div class="modal-dialog">   
 <div class="panel panel-primary"> 
 <div class="panel-heading">   
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> <?php echo get_the_author();?></h4>  
 </div>                    <form action="#" method="post" accept-charset="utf-8">   
 <div class="modal-body" style="padding: 5px;">      
 <div class="row">  <div class="col-md-2">
 <?php
    // Retrieve The Post's Author ID
    $user_id = get_the_author_meta('ID');
    // Set the image size. Accepts all registered images sizes and array(int, int)
    $size = 'thumbnail';

    // Get the image URL using the author ID and image size params
    $imgURL = get_cupp_meta($user_id, $size);

    // Print the image on the page
    echo '<img src="'. $imgURL .'" alt="" alt="image" width="100%">';
?>
 

 </div>  
 <div class="col-md-10">
 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">  
 <span class="popup-title"><?php echo get_the_author();?></span> 
 <span class="popup-des"> <?php echo nl2br(get_the_author_meta('description')); ?></span> 
 </div>  </div></div>   
 </div>        
 <div class="panel-footer" style="margin-bottom:-14px;">  
 <a href="<?php echo get_post_field('wpcf-link');?>" target="_blank">  <i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
 <a href="<?php echo get_post_field('wpcf-link1');?>"  target="_blank"> <i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
 <!-- <input type="submit" class="btn btn-success" value="Submit"/> -->                                <!--<span class="glyphicon glyphicon-ok"></span>-->                                <!--<span class="glyphicon glyphicon-remove"></span>-->                            <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>                        </div>                    </div>                </div>            </div>        </div>	</div>
  <?php endwhile; ?>

  <div class="blogs-comments-area">


  

    </div>


 
    <?php comments_template( '', true ); ?>
  </div>




  </div>
  </section>
  </div>
  
  
  
  <div class="col-md-3">
  <div class="blog-side-right-img">
  <div class="blog-side-right"><a href="#" target="_blank">
    <div class="widget">
								<h3><span>RECENT POSTS</span></h3>
								
								<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>

									
									<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

									
									 <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>

									
									

									
									<?php 
									endwhile;
									wp_reset_postdata();
									?>
								
                


							</div>
  </a></div>
  <!-- <div class="blog-side-right"><a href="http://petroleague.com/" target="_blank"><img src="img/ads.jpg" alt="add"></a></div>
  <div class="blog-side-right"><a href="http://petroleague.com/" target="_blank"><img src="img/ads.jpg" alt="add"></a></div>
  <div class="blog-side-right"><a href="http://petroleague.com/" target="_blank"><img src="img/ads.jpg" alt="add"></a></div>
  <div class="blog-side-right"><a href="http://petroleague.com/" target="_blank"><img src="img/ads.jpg" alt="add"></a></div> -->
  </div>
</div>
      </section>
  	</div>










<section><div class="middle-adds"><?php dynamic_sidebar('Middle addversite');?></div></section>







<div class="clearfix"></div>
<script>$(document).ready(function() {    var panels = $('.vote-results');    var panelsButton = $('.dropdown-results');    panels.hide();    //Click dropdown    panelsButton.click(function() {        //get data-for attribute        var dataFor = $(this).attr('data-for');        var idFor = $(dataFor);        //current button        var currentButton = $(this);        idFor.slideToggle(400, function() {            //Completed slidetoggle            if(idFor.is(':visible'))            {                currentButton.html('Hide Results');            }            else            {                currentButton.html('View Results');            }        })    });});</script>
<?php get_footer(); ?>
